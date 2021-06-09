<?php
include '/xampp/htdocs/projekt/config/connect.php';

if(isset($_POST['username'])&&isset($_POST['password'])) {
  session_start();

  $query = 'SELECT * FROM korisnik WHERE korisnicko_ime = ?';
  
  $stmt = $conn->prepare($query);

  $stmt->bind_param('s', $_POST['username']);

  if(!$stmt->execute()) {
    die('Server error while querying the DB');
  }

  $result = $stmt->get_result();
  
  if(mysqli_num_rows($result) == 0) {
    $stmt->close();
    $conn->close();
    header('Location: http://localhost/projekt/pages/prijava/prijava.php?username-or-password-alert=false');
    die();
  }

  $array = mysqli_fetch_array($result);

  if(!password_verify($_POST['password'], $array['lozinka'])) {
    $stmt->close();
    $conn->close();
    header('Location: http://localhost/projekt/pages/prijava/prijava.php?username-or-password-alert=false');
    die();
  }
  
  $_SESSION['id'] = $array['id'];
  $_SESSION['username'] = $array['korisnicko_ime'];
  $_SESSION['role'] = strval($array['razina']);

  $stmt->close();
  $conn->close();
  
  header('Location: http://localhost/projekt/pages/prijava/prijava-uspjeh.php');

} else {
  header('Location: http://localhost/projekt/pages/prijava/prijava-neuspjeh.php');
}





?>