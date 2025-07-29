<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Lexandria - Discover, Borrow, Read</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/lexandria-dako.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>
<?php session_start(); ?>
<script>
(function (m, a, z, e) {
  var s, t;
  try {
    t = m.sessionStorage.getItem('maze-us');
  } catch (err) {}

  if (!t) {
    t = new Date().getTime();
    try {
      m.sessionStorage.setItem('maze-us', t);
    } catch (err) {}
  }

  s = a.createElement('script');
  s.src = z + '?apiKey=' + e;
  s.async = true;
  a.getElementsByTagName('head')[0].appendChild(s);
  m.mazeUniversalSnippetApiKey = e;
})(window, document, 'https://snippet.maze.co/maze-universal-loader.js', '797117ae-7bb7-4511-9d86-9614d00c72ef');
</script>
<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2" style="margin-bottom: 25px;">
                    <img src="assets/img/lexandria-cropped.png" alt="Login Logo" width="400" class="mb-3">
                    <h5 class="card-title text-center pb-0 fs-4">Sign up to Lexandria</h5>
                    <!-- <p class="text-center small">Enter your personal details to create account</p> -->
                  </div>

                  <form class="row g-3 needs-validation" action="./controller/registration.php" method="POST" novalidate>
                    <div class="col-12">
                      <label for="firstName" class="form-label">First Name</label>
                      <input type="text" name="firstName" class="form-control" id="firstName" required>
                      <div class="invalid-feedback">Please, enter your first name</div>
                    </div>

                    <div class="col-12">
                      <label for="lastName" class="form-label">Last Name</label>
                      <input type="text" name="lastName" class="form-control" id="lastName" required>
                      <div class="invalid-feedback">Please, enter your last name</div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email Address</label>
                      <input type="email" name="email" class="form-control" id="email" required>
                      <div class="invalid-feedback">Please enter a valid email adddress</div>
                    </div>

                    <div class="col-12">
                      <label for="password" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>
                      <div class="invalid-feedback">Please enter your password</div>
                    </div>

                    <div class="col-12">
                      <label for="confirmPass" class="form-label">Confirm Password</label>
                      <input type="password" name="confirmPass" class="form-control" id="confirmPass" required>
                      <div class="invalid-feedback">Password doesn't match</div>
                    </div>

                    <div class="col-12">
                      <label for="phoneNumber" class="form-label">Phone Number</label>
                      <input type="text" name="phoneNumber" class="form-control" id="phoneNumber" required>
                      <div class="invalid-feedback">Please enter a valid phone number</div>
                    </div>

                    <div class="col-12">
                      <div class="row mb-3">
                      <label class="col-lg-3 col-form-label">Gender</label>
                        <div class="col-lg-9">
                          <select class="form-select" name="gender" aria-label="Default select example" required>
                            <option selected disabled>Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="row mb-3">
                      <label for="inputDate" class="col-sm-3 col-form-label">Birthday</label>
                      <div class="col-lg-9">
                      <input type="date" class="form-control" name="birthday" required>
                      </div>
                      </div>  
                    </div>
                    <!-- <div class="col-12">
                      <div class="row mb-3">
                      <label class="col-lg-3 col-form-label">Role</label>
                        <div class="col-lg-9">
                          <select class="form-select" name="role" aria-label="Default select example" required>
                            <option selected disabled>Select role</option>
                            <option value="user">user</option>
                            <option value="admin">admin</option>
                          </select>
                        </div>
                      </div>
                    </div> -->
                      <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="registration">Sign up</button>
                      </div>
                      <div class="col-12" style="align-items: center; display: flex; justify-content: center;">
                      <p class="small mb-0">Already have an account? <a href="./login.php">Log in</a></p>
                      </div>
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <?php
  if(isset($_SESSION['message']) && $_SESSION['code'] !='') {
      ?>
      <script>
        const Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: "<?php echo $_SESSION['code']; ?>",
          title: "<?php echo $_SESSION['message']; ?>"
        });
      </script>
      <?php
      unset($_SESSION['message']);
      unset($_SESSION['code']);
  }     
?>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>