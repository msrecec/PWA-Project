<?php
include '../../config/connect.php';

if(!isset($_GET['id'])) {
  $conn->close();
  header("Location: http://localhost/projekt/index.php");
}

$query = "SELECT * FROM vijesti WHERE id = ?";

$id = intval($_GET['id']);

$stmt = $conn->prepare($query);

$stmt->bind_param("i", $id);

$stmt->execute();

$result = $stmt->get_result();

$stmt->close();

// in case of error redirrect

if(!$result) {
  $conn->close();
  header("Location: http://localhost/projekt/index.php");
}

$vijesti;

if(mysqli_num_rows($result) == 0) {
  $conn->close();
  header("Location: http://localhost/projekt/index.php");
} else {
  $vijesti = mysqli_fetch_array($result);
}

if(strcmp($vijesti['arhiva'], 1) === 0) {
  $conn->close();
  header("Location: http://localhost/projekt/index.php");
}

$conn->close();

echo '<!DOCTYPE html>
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
  <link rel="stylesheet" href="./css/page.css">
  <title>L\'Express</title>
  <style>
  </style>
</head>

<body>
  <div id="TheContainer">
    <header id="TheHeader"></header>
    <nav id="TheNavigation">
      <div id="navigation-container">
        <ul class="nav__list">
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/index.php">HOME</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/listings/categories.php?kategorija=SVIJET">SVIJET</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/listings/categories.php?kategorija=EKONOMIJA">EKONOMIJA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/input/unos.php">UNOS</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/admin/administracija.php">ADMINISTRACIJA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/registracija/registracija.php">REGISTRACIJA</a>
          </li>
        </ul>
      </div>
    </nav>
    <main id="TheMain">
      <section class="TheSection">
        <header class="TheSection__header">
          <span class="TheSection__header__span-category">' . $vijesti['kategorija'] . '</span>
          <h1 class="TheSection__header__title">' . $vijesti['naslov'] . '</h1>
          <span class="TheSection__header__span-timestamp">' . $vijesti['datum'] . '</span>
        </header>
        <figure class="TheSection__figure">
          <img class="TheSection__figure__img" src="' . $vijesti['slika'] . '" alt="">
        </figure>
        <article class="TheSection__article">
          <h3>' . $vijesti['sazetak'] . '</h3>

          <p>
            <br>
            <br>
            ' . $vijesti['tekst'] . '
          </p>
        </article>
      </section>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L\'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>
  var height = $("#TheHeader").height();

  $(window).scroll(function() {
    if ($(this).scrollTop() > height) {
      $("#navigation-container").addClass("fixed");
    } else {
      $("#navigation-container").removeClass("fixed");
    }
  })
  </script>
</body>

</html>'

?>