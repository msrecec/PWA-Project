<?php
session_start();
if(!(isset($_SESSION['username'])&&isset($_SESSION['role'])&&isset($_SESSION['id']))) {
  header('Location: http://localhost/projekt/pages/prijava/prijava-neuspjeh.php');
}

$username = $_SESSION['username'];

echo '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <h1>Welcome ' . $username . ' redirecting to the frontpage: <span id="timeout"></span></h1>
  <script type="text/javascript">
  const timeout = document.getElementById("timeout");
  let count = 4;

  var x = setInterval(function() {
    timeout.innerHTML = count;
    count--;
    if (count < 0) {
      clearInterval(x);
      window.location.href = "http://localhost/projekt/index.php";
    }
  }, 1000);
  </script>
</body>

</html>';
?>