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
  <link rel="stylesheet" href="./css/input.css">
  <title>L'Express</title>
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
            <a class="nav__list__li__a" href="">SVIJET</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="">EKONOMIJA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/input/unos.html">UNOS</a>
          </li>
        </ul>
      </div>
    </nav>
    <main id="TheMain">
      <div class="form-container">
        <form enctype="multipart/form-data" class="TheForm" action="skripta.php" method="POST">
          <div class="form__item">
            <label for="title">Naslov vijesti
              <div class="form__item__field">
                <input class="form__item__field__text" type="text" name="title" id="title">
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="about">Kratki sadržaj vijesti (do 50 znakova)
              <div class="form__item__field">
                <textarea class="form__item__field__text" rows="10" name="about" id="about"></textarea>
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="content">Sadržaj vijesti
              <div class="form__item__field">
                <textarea class="form__item__field__text" rows="20" name="content" id="content"></textarea>
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
                  <option select="selected" value="SVIJET">Svijet</option>
                  <option value="EKONOMIJA">Ekonomija</option>
                </select>
              </div>
            </label>
          </div>
          <div class="form__item">
            <label for="archive">Spremiti u arhivu:
              <div class="form__item__field">
                <input type="checkbox" name="archive" id="archive">
              </div>
            </label>
          </div>
          <div class="form__item">
            <button type="reset" value="Poništi">Poništi</button>
            <button type="submit" value="Prihvati">Prihvati</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>
  var height = $('#TheHeader').height();

  $(window).scroll(function() {
    if ($(this).scrollTop() > height) {
      $('#navigation-container').addClass('fixed');
    } else {
      $('#navigation-container').removeClass('fixed');
    }
  })
  </script>
</body>

</html>