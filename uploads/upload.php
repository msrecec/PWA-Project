<?php
  function uploadHandler($target_file, $last_id) {

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
    if (move_uploaded_file($_FILES["photo"]["tmp_name"], '../../uploads/images/' . $last_id . '.' .  strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION)))) {
      echo "The file ". htmlspecialchars( basename( $_FILES["photo"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
  }
}

/**
 * Deletes the image from the filesystem
 * 
 */

function deleteImgFromFS($id) {
  include "../../config/connect.php";

  // query for data in db

  $stmt = $conn->prepare("SELECT * FROM vijesti WHERE id = ?");

  $stmt->bind_param("i", $id);

  $stmt->execute();

  $result = $stmt->get_result();

  $row = mysqli_fetch_array($result);

  // delete an img from fs

  $slika = $row['slika'];

  unlink('C:/xampp/htdocs'.$slika);

  $conn->close();
}
?>