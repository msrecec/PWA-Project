<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="./css/header.css">
  <link rel="stylesheet" href="./css/main.css">
  <link rel="stylesheet" href="./css/footer.css">
  <link rel="stylesheet" href="./css/list.css">
  <link rel="stylesheet" href="./css/navigation.css">
  <link rel="stylesheet" href="./css/style.css">
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
            <a class="nav__list__li__a" href="">HOME</a>
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
            <a class="nav__list__li__a" href="/projekt/pages/input/unos.php">UNOS</a>
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
          <article class="article">
            <a class="article__link" href="/projekt/pages/page/boris.html">
              <div class="article__link__card">
                <img src="/projekt/assets/images/boris.jpg" alt="boris">
                <h3>COME-BACK</h3>
                <p>
                  Royaume-Uni:le pro-Brexit Boris Johnson candidat au poste de Premier ministre
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/grains.jpg" alt="grains">
                <h3>XYLELLA FASTIDIOSA</h3>
                <p>
                  Une bacterie tueuse d'oliviers pourrait rejoindre le nord de l'Europe
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/phone.jpg" alt="phone">
                <h3>PARTENAIRE</h3>
                <p>
                  Expertiese compatible a partir de 99€/mois
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/phone.jpg" alt="phone">
                <h3>PARTENAIRE</h3>
                <p>
                  Expertiese compatible a partir de 99€/mois
                </p>
              </div>
            </a>
          </article>
        </div>
      </section>
      <section class="section">
        <header class="section__header">
          <h2>EKONOMIJA</h2>
        </header>
        <div class="article-container">
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/pinault.jpg" alt="pinault">
                <h3>"ONE PLANET LAB"</h3>
                <p>
                  Transition ecologique: Macron charge Pinault de mobiliser l'industrie de la mode
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/whatsapp.jpg" alt="whatsapp">
                <h3>CONCURRENCE</h3>
                <p>
                  Le fondateour de Telegram enfonce WhatsApp, victime d'une nouvelle faille
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/zuck.jpg" alt="zuck">
                <h3>LE DOSSIER DE L'EXPRESS</h3>
                <p>
                  Le veritable inventeur de "The Face Book" veut voir "Zuckerberg en prison"
                </p>
              </div>
            </a>
          </article>
          <article class="article">
            <a class="article__link" href="">
              <div class="article__link__card">
                <img src="/projekt/assets/images/zuck.jpg" alt="zuck">
                <h3>LE DOSSIER DE L'EXPRESS</h3>
                <p>
                  Le veritable inventeur de "The Face Book" veut voir "Zuckerberg en prison"
                </p>
              </div>
            </a>
          </article>
        </div>
      </section>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>
    var height = $('#TheHeader').height();

    $(window).scroll(function() {
      if($(this).scrollTop() > height) {
        $('#navigation-container').addClass('fixed');
      } else {
        $('#navigation-container').removeClass('fixed');
      }
    })
  </script>
</body>

</html>