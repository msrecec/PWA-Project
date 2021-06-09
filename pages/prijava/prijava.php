<?php 

$usernameOrPasswordError = '';
if(isset($_GET['username-or-password-alert'])) {
  $usernameOrPasswordError = '<p id="username-or-password-alert" style="display:block; color:red;">Korisnicko ime ili lozinka ne postoje</p>';
} else {
  $usernameOrPasswordError = '<p id="username-or-password-alert" style="display:none; color:red;">Korisnicko ime ili lozinka ne postoje</p>';
}

echo '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="/projekt/css/header.css">
  <link rel="stylesheet" href="/projekt/css/main.css">
  <link rel="stylesheet" href="/projekt/css/footer.css">
  <link rel="stylesheet" href="/projekt/css/navigation.css">
  <link rel="stylesheet" href="/projekt/css/style.css">
  <link rel="stylesheet" href="/projekt/pages/input/css/input.css">
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
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="/projekt/pages/prijava/prijava.php">PRIJAVA</a>
          </li>
          <li class="nav__list__li">
            <a class="nav__list__li__a" href="http://localhost/projekt/pages/odjava/odjava.php">ODJAVA</a>
          </li>
        </ul>
      </div>
    </nav>
    <main id="TheMain">
      <div class="form-container">
        <form id="form" class="TheForm" action="skripta.php" method="POST">
          <div class="form__item">
            <label for="username">Korisničko ime
              <div class="form__item__field">
                <p id="username-alert" style="display:none; color:red;">Korisničko ime ne smije biti prazno</p>
                ' . $usernameOrPasswordError . '
                <input style="margin: 5px 0px 5px 0px" id="username" class="form__item__field__text" type="text"
                  name="username">
              </div>
            </label>
            <label for="password">Lozinka
              <div class="form__item__field">
                <p id="password-alert" style="display:none; color:red;">Lozinka ne smije biti prazna</p>
                <input style="margin: 5px 0px 5px 0px" id="password" class="form__item__field__text" type="password"
                  name="password">
              </div>
            </label>
          </div>
          <div class="form__item">
            <button type="reset" id="cancel" value="Poništi">Poništi</button>
            <button type="submit" id="submit" value="Prihvati">Prijavi se</button>
          </div>
        </form>
      </div>
    </main>
  </div>
  <footer id="TheFooter">
    <p>Les sites du reseau Groupe L\'Epress: Food avec Mycuisine.fr</p>
  </footer>
  <script>
  const form = document.getElementById("form");
  const userName = document.getElementById("username");
  const password = document.getElementById("password");

  // adding form validation

  form.addEventListener("submit", (event) => {
    userNameOrPasswordAlert.style.display="none";
    let flag = false;

    const userNameAlert = document.getElementById("username-alert");
    const passwordAlert = document.getElementById("password-alert");
    const userNameOrPasswordAlert = document.getElementById("username-or-password-alert");

    userName.style.borderColor = "";
    userName.style.borderStyle = "";

    password.style.borderColor = "";
    password.style.borderStyle = "";

    if (!userName.value || userName.value.trim().length == 0) {
      flag = true;

      userNameAlert.style.display = "block";

      userName.style.borderColor = "red";
      userName.style.borderStyle = "dotted";

    }

    if (!password.value || password.value.trim().length == 0) {
      flag = true;

      passwordAlert.style.display = "block";

      password.style.borderColor = "red";
      password.style.borderStyle = "dotted";

    }

    if (flag) {
      event.preventDefault();
    }

  });

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