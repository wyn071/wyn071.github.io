<?php
include("../../dB/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["request_id"])) {
    $request_id = $_POST["request_id"];

    if (isset($_POST["approve"])) {
        // Insert the approved request into the borrowed_books table
        $insertQuery = "INSERT INTO borrowed_books (user_id, full_name, email, isbn, borrow_date, return_date)
                        SELECT user_id, full_name, email, isbn, borrow_date, return_date FROM borrow_requests WHERE request_id = ?";
        $insertStmt = mysqli_prepare($conn, $insertQuery);
        mysqli_stmt_bind_param($insertStmt, "i", $request_id);

        if (mysqli_stmt_execute($insertStmt)) {
            // Update the book's status in the books table
            $updateQuery = "UPDATE books SET status = 'Checked Out' WHERE isbn = 
            (SELECT isbn FROM borrow_requests WHERE request_id = ?)";
            $updateStmt = mysqli_prepare($conn, $updateQuery);
            mysqli_stmt_bind_param($updateStmt, "i", $request_id);
            mysqli_stmt_execute($updateStmt);
            mysqli_stmt_close($updateStmt);

            // Update status in user_borrow_requests table to "Approved"
            $updateUserRequestQuery = "UPDATE user_borrow_requests SET status = 'Approved' WHERE ISBN = 
            (SELECT isbn FROM borrow_requests WHERE request_id = ?)";
            $updateUserRequestStmt = mysqli_prepare($conn, $updateUserRequestQuery);
            mysqli_stmt_bind_param($updateUserRequestStmt, "i", $request_id);
            mysqli_stmt_execute($updateUserRequestStmt);
            mysqli_stmt_close($updateUserRequestStmt);

            // Delete from borrow_requests after approval
            $deleteQuery = "DELETE FROM borrow_requests WHERE request_id = ?";
            $deleteStmt = mysqli_prepare($conn, $deleteQuery);
            mysqli_stmt_bind_param($deleteStmt, "i", $request_id);
            mysqli_stmt_execute($deleteStmt);
            mysqli_stmt_close($deleteStmt);

            session_start();
            $_SESSION['alertMessage'] = "Request approved!";
            $_SESSION['alertType'] = "success";
            header("Location: requests.php");
            exit();
            // echo "<script>alert('Request Approved!'); window.location.href='requests.php';</script>";
        } else {
            echo "Error approving request: " . mysqli_error($conn);
        }
        mysqli_stmt_close($insertStmt);
        } elseif (isset($_POST["reject"])) {
            // Update status in user_borrow_requests table to "Rejected"
            $updateUserRequestQuery = "UPDATE user_borrow_requests SET status = 'Rejected' WHERE ISBN = 
            (SELECT isbn FROM borrow_requests WHERE request_id = ?)";
            $updateUserRequestStmt = mysqli_prepare($conn, $updateUserRequestQuery);
            mysqli_stmt_bind_param($updateUserRequestStmt, "i", $request_id);
            mysqli_stmt_execute($updateUserRequestStmt);
            mysqli_stmt_close($updateUserRequestStmt);
            
            // Remove request from borrow_requests
            $query = "DELETE FROM borrow_requests WHERE request_id = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "i", $request_id);
            if (mysqli_stmt_execute($stmt)) {
                session_start();
                $_SESSION['alertMessage'] = "Request rejected!";
                $_SESSION['alertType'] = "error";
                header("Location: requests.php");
                exit();            
            } else {
                echo "Error rejecting request: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        }   
}

mysqli_close($conn);
?>
