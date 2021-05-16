<?php
header('Content-Type: text/html; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$basename = "projekt";

// create connection
$conn = new mysqli($servername, $username, $password, $basename);

// error handling
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// setting character set
$conn->set_charset("utf8");

?>