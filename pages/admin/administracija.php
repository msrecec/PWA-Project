<?php

include '../../config/connect.php';

$MAX_LISTINGS = 8;

$query = "SELECT * FROM vijesti ORDER BY id DESC";

$result = $conn->query($query);

if(!$result) die('Error while querying');

$vijesti = array();

if(mysqli_num_rows($result) == 0) {
  // $conn->close();
  // die('no content');
} else {
  for($i = 0; $i < $MAX_LISTINGS; ++$i) {
    $row = mysqli_fetch_array($result);
    if (!$row) break;
    
    $vijesti[$i] = $row;
    $vijesti[$i]['id'] = $row['id'];
    $vijesti[$i]['datum'] = $row['datum'];
    $vijesti[$i]['naslov'] = $row['naslov'];
    $vijesti[$i]['sazetak'] = $row['sazetak'];
    $vijesti[$i]['tekst'] = $row['tekst'];
    $vijesti[$i]['slika'] = $row['slika'];
    $vijesti[$i]['kategorija'] = $row['kategorija'];
    $vijesti[$i]['arhiva'] = $row['arhiva'];
  }
}

$svijet = '';

$ekonomija = '';

if(!empty($vijesti)) {
  for($i = 0; $i < count($vijesti); ++$i) {
    $temp = '<article class="article">
      <div class="article__link__card">
        <img src="' . $vijesti[$i]['slika'] . '" alt="grains">
        <h3>' . $vijesti[$i]['naslov'] . '</h3>
        <p>
          ' . $vijesti[$i]['sazetak'] . '
        </p>
      </div>
  </article>
  <div style="display: flex; align-items: center; justify-content:center; margin: 2px;">
  <a style="margin-right: 5px" href="edit.php?id=' . $vijesti[$i]['id'] . '"><button>Editiraj</button></a>
  <a href="delete.php?id=' . $vijesti[$i]['id'] . '"><button>Izbrisi</button></a>
  </div>
  ';
    if(strcmp($vijesti[$i]['kategorija'], 'EKONOMIJA') === 0) {
      $ekonomija = $ekonomija . $temp;
    } else if(strcmp($vijesti[$i]['kategorija'], 'SVIJET') === 0) {
      $svijet = $svijet . $temp;
    }
  }
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
  <link rel="stylesheet" href="../../css/list_admin.css">
  <link rel="stylesheet" href="../../css/footer.css">
  <link rel="stylesheet" href="../../css/navigation.css">
  <link rel="stylesheet" href="../../css/style.css">
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
      <section class="section">
        <header class="section__header">
          <h2>SVIJET</h2>
        </header>
        <div class="article-container">
          ' . $svijet . '
        </div>
      </section>
      <section class="section">
        <header class="section__header">
          <h2>EKONOMIJA</h2>
        </header>
        <div class="article-container">
        ' . $ekonomija . '
        </div>
      </section>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L\'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>
    var height = $(\'#TheHeader\').height();

    $(window).scroll(function() {
      if($(this).scrollTop() > height) {
        $(\'#navigation-container\').addClass(\'fixed\');
      } else {
        $(\'#navigation-container\').removeClass(\'fixed\');
      }
    })
  </script>
</body>

</html>';
?>