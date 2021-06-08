<?php
include '/xampp/htdocs/projekt/config/connect.php';

if(isset($_POST['name'])&&isset($_POST['lastname'])&&isset($_POST['username'])&&isset($_POST['password'])) {
  session_start();

  $query = 'SELECT * FROM korisnik WHERE username = ?';
  
  $stmt = $conn->prepare($query);

  $stmt->bind_param('s', $_POST['username']);

  if(!$stmt->execute()) {
    die('Server error while querying the DB');
  }

  $result = $stmt->get_result();
  
  if(mysqli_num_rows($result) != 0) {
    echo 'User is already registered, redirecting to the frontpage';
    sleep(3);
    $stmt->close();
    $conn->close();
    header('Location: http://localhost/projekt/index.php');
  }

  $password = password_hash($_POST['password'], CRYPT_BLOWFISH);

  $query = "INSERT INTO korisnik (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, 1)";

  $stmt = $conn->prepare($query);

  $stmt->bind_param('ssss', $_POST['name'], $_POST['lastname'], $_POST['username'], $password);

  $_SESSION['username'] = $_POST['username'];
  $_SESSION['password'] = $password;
  $_SESSION['role'] = 'user';
  
  if(!$stmt->execute()) {
    die('Server error while querying the DB');
  }

} else {
  die('Registration failed error: Not passed all parameters');
}





?>