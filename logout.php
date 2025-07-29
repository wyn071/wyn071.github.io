<?php
session_start();
session_unset();
session_destroy();

// Prevent browser from using cached session
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect to login page
header("Location: ../../../IT322/login.php");
exit();
?>
<script>
  window.history.pushState(null, "", window.location.href);
  window.onpopstate = function() {
    window.location.replace("login.php");
  };
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