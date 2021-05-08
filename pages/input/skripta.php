<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="../../css/header.css">
  <link rel="stylesheet" href="../../css/main.css">
  <link rel="stylesheet" href="../../css/footer.css">
  <link rel="stylesheet" href="../../css/navigation.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../page/css/page.css">
  <title>L'Express</title>
  <style>
  </style>
</head>
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

    $target_dir = "uploads/";
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
    if ($_FILES["photo"]["size"] > 500000) {
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


} else {
  // header("location:javascript://history.go(-1)");
  // die();
  $title = "['title']";
  $about = "nl2br(htmlentities(['about'], ENT_QUOTES, 'UTF-8'))";
  $content = "nl2br(htmlentities(['content'], ENT_QUOTES, 'UTF-8'))";
  $photo = "[photo]";
  $category = 'category';
}
?>
<body>
  <div id="TheContainer">
    <header id="TheHeader"></header>
    <nav id="TheNavigation">
      <div id="navigation-container">
        <ul class="nav__list">
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/index.html">HOME</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="">SVIJET</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="">EKONOMIJA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="">SPORT</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="">KULTURA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/input/unos.html">UNOS</a>
          </li>
        </ul>
      </div>
    </nav>
    <main id="TheMain">
      <section class="TheSection">
        <header class="TheSection__header">
          <span class="TheSection__header__span-category"><?php echo $category;?></span>
          <h1 class="TheSection__header__title"><?php echo $title;?></h1>
          <span class="TheSection__header__span-timestamp">objavljeno: <?php echo $this_date ?></span>
        </header>
        <figure class="TheSection__figure">
          <img class="TheSection__figure__img" src="<?php echo $target_file;?>" alt="">
        </figure>
        <article class="TheSection__article">
          <h3><?php echo $about;?></h3>
          <br>
          <p><?php echo $content;?>
          </p>
        </article>
      </section>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>

    var height = $('#TheHeader').height();

    $(window).scroll(function () {
      if ($(this).scrollTop() > height) {
        $('#navigation-container').addClass('fixed');
      } else {
        $('#navigation-container').removeClass('fixed');
      }
    })
    
  </script>
</body>

</html>