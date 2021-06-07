<?php

include "../../config/connect.php";

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
    
    $target_dir = "./uploads/images/";

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
    
    //------------------------------------------------------------------------------

    // handle image uploads

    //------------------------------------------------------------------------------

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
      $check = getimagesize($_FILES["photo"]["tmp_name"]);
      if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
      } else {
        echo "File is not an image.";
        $uploadOk = 0;
      }
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
      $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["photo"]["size"] > 20000000) {
      echo "Sorry, your file is too large.";
      $uploadOk = 0;
    }
    
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
      $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
      echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
      if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
      } else {
        echo "Sorry, there was an error uploading your file.";
      }
    }

    //------------------------------------------------------------------------------
    
    // redirrect to the frontpage

    //------------------------------------------------------------------------------
    
    header("Location: http://localhost/projekt/index.php");
    
}
?>