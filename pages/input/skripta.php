<?php

include "../../config/connect.php";
include "../../uploads/upload.php";

$target_dir = "/projekt/uploads/images/";

if(
  isset($_POST['title'])&&isset($_POST['about'])
  &&isset($_POST['content'])
  &&isset($_POST['category'])
  &&isset($_FILES["photo"])) {
    
    // title

    $title = $_POST['title'];
    $about = nl2br(htmlentities($_POST['about'], ENT_QUOTES, 'UTF-8'));
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $category = $_POST['category'];
    $this_date = date("Y/m/d H:i:s");
    
    $target_dir = "/projekt/uploads/images/";

    //------------------------------------------------------------------------------

    // atomic transaction

    //------------------------------------------------------------------------------

    $conn->autocommit(false);
    
    $stmt = $conn->prepare("INSERT INTO vijesti(datum, naslov, sazetak, tekst, kategorija, arhiva) VALUES (?, ?, ?, ?, ?, ?)");

    $archive = isset($_POST['archive']) ? 1 : 0;
    
    $stmt->bind_param("sssssi", $this_date, $title, $about, $content, $category, $archive);
    
    $last_id;
    
    if($stmt->execute()) {
      $last_id = $conn->insert_id;
    }

    $target_file = $target_dir . $last_id . '.' .  strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));

    $stmt = $conn->prepare("UPDATE vijesti SET slika = ? WHERE id = ?");

    $stmt->bind_param("si", $target_file, $last_id);

    $stmt->execute();
    
    $stmt->close();

    // Commit transaction
    
    if (!$conn -> commit()) {
      die('Commit transaction failed');
    }

    $conn->autocommit(true);

    $conn->close();
    
    uploadHandler($target_file, $last_id);

    //------------------------------------------------------------------------------
    
    // redirrect to the frontpage

    //------------------------------------------------------------------------------
    
    header("Location: http://localhost/projekt/index.php");
    
}
?>