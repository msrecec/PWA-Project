<?php

include "../../config/connect.php";

if(isset($_GET['id'])) {

  $id = intval($_GET['id']);
  
  $stmt = $conn->prepare("SELECT * FROM vijesti WHERE id = ?");

  $stmt->bind_param("i", $id);

  $stmt->execute();

  $result = $stmt->get_result();
  
  if(!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    header("Location: http://localhost/projekt/index.php");
  }

  $result = $stmt->get_result();

  $stmt->close();

  if(mysqli_num_rows($result) === 0) {

    $conn->close();

    header("Location: http://localhost/projekt/index.php");

  }
    
  $row = mysqli_fetch_array($result);

  $id = intval($_GET['id']);

  // delete row from database

  $stmt = $conn->prepare("DELETE FROM vijesti WHERE id = ?");

  $stmt->bind_param("i", $id);

  $stmt->execute();

  // delete an img from fs

  $slika = $row['slika'];

  unlink('C:/xampp/htdocs'.$slika);

  $conn->close();
  
  header("Location: http://localhost/projekt/index.php");
    
} else {
  header("Location: http://localhost/projekt/index.php");
  $conn->close();
}
?>