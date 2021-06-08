<?php
$target_dir = "/projekt/uploads/images/";

include "../../uploads/upload.php";


if (isset($_POST['id'])&&
isset($_POST['title'])&&
isset($_POST['about'])&&
isset($_POST['content'])&&
isset($_POST['category'])&&
!isset($_POST['archived'])&&
!fileUploaded('photo')) {
  $id = intval($_POST['id']);
  $title = $_POST['title'];
  $about = $_POST['about'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $archived = 0;

  insertMetadata($id, $title, $about, $content, $category, $archived);

  header("Location: http://localhost/projekt/index.php" );

}
else if (
  isset($_POST['id'])&&
  isset($_POST['title'])&&
  isset($_POST['about'])&&
  isset($_POST['content'])&&
  isset($_POST['category'])&&
  isset($_POST['archived'])&&
  !fileUploaded('photo')) {
  $id = intval($_POST['id']);
  $title = $_POST['title'];
  $about = $_POST['about'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $archived = 1;
  
  insertMetadata($id, $title, $about, $content, $category, $archived);

  header("Location: http://localhost/projekt/index.php" );

}
else if (isset($_POST['id'])&&
isset($_POST['title'])&&
isset($_POST['about'])&&
isset($_POST['content'])&&
isset($_POST['category'])&&
!isset($_POST['archived'])&&
fileUploaded('photo')) {
  $id = intval($_POST['id']);
  $title = $_POST['title'];
  $about = $_POST['about'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $photo = $_FILES['photo'];
  $archived = 0;
  
  $last_id = $_POST['id'];

  $target_file = $target_dir . $last_id . '.' .  strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));
  
  deleteImgFromFS($id);

  insertMetadata($id, $title, $about, $content, $category, $archived, $target_file);

  uploadHandler($target_file, $last_id);

  header("Location: http://localhost/projekt/index.php" );

}
else if (isset($_POST['id'])&&
isset($_POST['title'])&&
isset($_POST['about'])&&
isset($_POST['content'])&&
isset($_POST['category'])&&
isset($_POST['archived'])&&
fileUploaded('photo')) {
  $id = intval($_POST['id']);
  $title = $_POST['title'];
  $about = $_POST['about'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $photo = $_FILES['photo'];
  $archived = 1;

  $last_id = $_POST['id'];

  $target_file = $target_dir . $last_id . '.' .  strtolower(pathinfo($_FILES["photo"]["name"], PATHINFO_EXTENSION));

  deleteImgFromFS($id);

  insertMetadata($id, $title, $about, $content, $category, $archived, $target_file);

  uploadHandler($target_file, $last_id);

  header("Location: http://localhost/projekt/index.php" );

} else {
  
  die('random error lol');
  
}

/**
 * Inserts data into the database
 * 
 */

function insertMetadata($id, $title, $about, $content, $category, $archived, $slika_param = '') {

  include "../../config/connect.php";

  $this_date = date("Y/m/d H:i:s");

  $archived = intval($archived);
  $id = intval($id);

  $slika = $slika_param;

  $conn->autocommit(false);

  $stmt;

  if (strcmp($slika, '') === 0) {

    $query = "SELECT * FROM vijesti WHERE id = ?";
  
    $stmt = $conn->prepare($query);

    $stmt->bind_param('i', $id);
  
    $stmt->execute();
  
    $result = $stmt->get_result();

    if($result) {
      
      $row = mysqli_fetch_array($result);
      
      $slika = $row['slika'];
    }
  
  }

  $query = "UPDATE vijesti SET naslov = ?, sazetak = ?, tekst = ?, kategorija = ?, arhiva = ?, datum = ?, slika = ? WHERE id = ? ";

  $stmt = $conn->prepare($query);

  $stmt->bind_param("ssssissi", $title, $about, $content, $category, $archived, $this_date, $slika, $id);

  $stmt->execute();

  // error handling statement

  if(!$stmt->execute()) {
    $stmt->close();
    $conn->close();
    die("error in transaction");
  }

  // Commit transaction

  if (!$conn -> commit()) {
    die('Commit transaction failed');
  }

  $conn->autocommit(true);

}

function fileUploaded($formField)
{
    if(empty($_FILES)) {
        return false;       
    }  
    return strcmp($_FILES[$formField]['name'], '') !== 0;
}

?>