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
  &&isset($_POST['content'])&&isset($_POST['photo'])
  &&isset($_POST['category'])/*&&isset($_POST['archive'])*/) {
    $title = $_POST['title'];
    // $about = $_POST['about'];
    $about = nl2br(htmlentities($_POST['about'], ENT_QUOTES, 'UTF-8'));
    // $content = $_POST['content'];
    $content = nl2br(htmlentities($_POST['content'], ENT_QUOTES, 'UTF-8'));
    $photo = $_POST['photo'];
    $category = $_POST['category'];
    // $title = $_POST['archive'];
} else {
  header("location:javascript://history.go(-1)");
  die();
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
          <span class="TheSection__header__span-timestamp">publie le 16/05/2019 a 19:35</span>
        </header>
        <figure class="TheSection__figure">
          <!-- <img class="TheSection__figure__img" src="/projekt/assets/images/boris.jpg" alt=""> -->
          <?php echo $photo;?>
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