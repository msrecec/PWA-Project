<?php

// in case id was not passed

if(!isset($_GET['id'])) {
  header("Location: http://localhost/projekt/index.php");
}

$id = intval($_GET['id']);

include '../../config/connect.php';

$query = 'SELECT * FROM vijesti WHERE id = ?';

$stmt = $conn->prepare($query);

$stmt->bind_param('i', $id);

$stmt->execute();

$result = $stmt->get_result();

$row;

if(!$result) {
  $stmt->close();
  $conn->close();
  header("Location: http://localhost/projekt/index.php" );
} else {
  $row = mysqli_fetch_array($result);
}



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
  <link rel="stylesheet" href="../input/css/input.css">
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
        </ul>
      </div>
    </nav>
    <main id="TheMain">
      <div class="form-container">
        <form enctype="multipart/form-data" class="TheForm" action="editSkripta.php" method="POST">
          <div class="form__item">
            <label hidden for="id">Id
              <div class="form__item__field">
                <input class="form__item__field__text" type="text" name="id" id="id" value="' . $row['id'] . '">
              </div>
            </label>
            <label for="title">Naslov vijesti
              <div class="form__item__field">
                <input class="form__item__field__text" type="text" name="title" id="title" value="' . $row['naslov'] . '">
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="about">Kratki sadržaj vijesti (do 50 znakova)
              <div class="form__item__field">
                <textarea class="form__item__field__text" rows="10" name="about" id="about">'. $row['sazetak'] .'</textarea>
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="content">Sadržaj vijesti
              <div class="form__item__field">
                <textarea class="form__item__field__text" rows="20" name="content" id="content">'. $row['tekst'] .'</textarea>
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="photo">Slika:
              <div class="form__item__field">
                <input type="file" accept="image/jpeg,image/gif,image/png" name="photo" id="photo">
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="category">Kategorija vijesti
              <div class="form__item__field">
                <select name="category" id="category" class="form__item__field__select">
                  <option '. (strcmp($row['kategorija'], 'SVIJET') === 0 ? 'selected' : '') .' value="SVIJET">Svijet</option>
                  <option '. (strcmp($row['kategorija'], 'EKONOMIJA') === 0 ? 'selected' : '') .' value="EKONOMIJA">Ekonomija</option>
                </select>
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="archive">Spremiti u arhivu:
              <div class="form__item__field">
                <input ' . (strcmp(strval($row['arhiva']), '1') === 0 ? 'checked' : '') . ' type="checkbox" name="archive" id="archive">
              </div>
            </label>
          </div>
          <div class="form__item">
            <a href="http://localhost/projekt/index.php"><button type="button" id="cancel" value="Poništi">Poništi</button></a>
            <button type="submit" value="Prihvati">Prihvati</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L\'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>

  var height = $(\'#TheHeader\').height();

  $(window).scroll(function() {
    if ($(this).scrollTop() > height) {
      $(\'#navigation-container\').addClass(\'fixed\');
    } else {
      $(\'#navigation-container\').removeClass(\'fixed\');
    }
  })
  </script>
</body>

</html>';
?>