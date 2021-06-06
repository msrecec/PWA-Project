<?php
if(
  isset($_POST['title'])&&isset($_POST['about'])
  &&isset($_POST['content'])/*&&isset($_POST['photo']*/
  &&isset($_POST['category'])/*&&isset($_POST['archive'])*/
  &&isset($_FILES["photo"])) {
    $title = $_POST['title'];
    $about = nl2br(htmlentities($_POST['about'], ENT_QUOTES, 'UTF-8'));
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    // $photo = $_POST['photo'];
    $category = $_POST['category'];
    // $title = $_POST['archive'];
    $this_date = date("Y/m/d H:i:s");
    // handle image uploads

    $target_dir = "../../uploads/images/";
    $target_file = $target_dir . basename($_FILES["photo"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
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
    
    header("Location: http://localhost/projekt/index.php");
    
} else if(  isset($_GET['title'])&&isset($_GET['about'])
&&isset($_GET['content'])
&&isset($_GET['category'])
&&isset($_FILES["photo"])) {
  // header("location:javascript://history.go(-1)");
  // die();
  $title = "['title']";
  $about = "nl2br(htmlentities(['about'], ENT_QUOTES, 'UTF-8'))";
  $content = "nl2br(htmlentities(['content'], ENT_QUOTES, 'UTF-8'))";
  $photo = "[photo]";
  $category = 'category';
}
?>