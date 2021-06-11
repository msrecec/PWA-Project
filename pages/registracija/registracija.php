<?php

$usernameTaken;
if(isset($_GET['username-taken'])) {
  $usernameTaken = '<p id="username-taken-alert" style="color:red;">Korisničko ime se koristi</p>';
} else {
  $usernameTaken = '<p id="username-taken-alert" style="display:none; color:red;">Korisničko ime se koristi</p>';
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
            <label for="name">Ime
              <div class="form__item__field">
                <p id="name-alert" style="display:none; color:red;">Ime mora biti između 5 i 32
                  znakova</p>
                <input style="margin: 5px 0px 5px 0px" id="name" class="form__item__field__text" type="text" name="name"
                  id="name">
              </div>
            </label>
            <label for="lastname">Prezime
              <div class="form__item__field">
                <p id="lastname-alert" style="display:none; color:red;">Prezime mora biti između 5 i 32
                  znakova</p>
                <input style="margin: 5px 0px 5px 0px" id="lastname" class="form__item__field__text" type="text"
                  name="lastname">
              </div>
            </label>
            <label for="username">Korisničko ime
              <div class="form__item__field">
                <p id="username-alert" style="display:none; color:red;">Korisničko ime mora biti između 5 i 32
                  znakova</p>
                '. $usernameTaken .'
                <input style="margin: 5px 0px 5px 0px" id="username" class="form__item__field__text" type="text"
                  name="username">
              </div>
            </label>
            <label for="password">Lozinka
              <div class="form__item__field">
                <p id="password-alert" style="display:none; color:red;">Lozinka mora biti između 5 i 32
                  znakova</p>
                <input style="margin: 5px 0px 5px 0px" id="password" class="form__item__field__text" type="password"
                  name="password">
              </div>
            </label>
            <label for="passwordRepeat">Ponovljena Lozinka
              <div class="form__item__field">
                <p id="password-repeat-alert" style="display:none; color:red;">Lozinka mora biti između 5 i 32
                  znakova</p>
                <p id="password-duplicate-alert" style="display:none; color:red;">Lozinke moraju biti iste</p>
                <input style="margin: 5px 0px 5px 0px" id="passwordRepeat" class="form__item__field__text"
                  type="password" name="passwordRepeat">
              </div>
            </label>
          </div>
          <div class="form__item">
            <button type="reset" id="cancel" value="Poništi">Poništi</button>
            <button type="submit" id="submit" value="Prihvati">Registriraj se</button>
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
  const name = document.getElementById("name");
  const lastName = document.getElementById("lastname");
  const userName = document.getElementById("username");
  const password = document.getElementById("password");
  const passwordRepeat = document.getElementById("passwordRepeat");

  // adding form validation

  form.addEventListener("submit", (event) => {
    let flag = false;

    const nameAlert = document.getElementById("name-alert");
    const lastNameAlert = document.getElementById("lastname-alert");
    const userNameAlert = document.getElementById("username-alert");
    const userNameTakenAlert = document.getElementById("username-taken-alert");
    const passwordAlert = document.getElementById("password-alert");
    const passwordRepeatAlert = document.getElementById("password-repeat-alert");
    const passwordDuplicateAlert = document.getElementById("password-duplicate-alert");

    name.style.borderColor = "";
    name.style.borderStyle = "";

    lastName.style.borderColor = "";
    lastName.style.borderStyle = "";

    userName.style.borderColor = "";
    userName.style.borderStyle = "";

    password.style.borderColor = "";
    password.style.borderStyle = "";

    passwordRepeat.style.borderColor = "";
    passwordRepeat.style.borderStyle = "";

    nameAlert.style.display = "none";
    lastNameAlert.style.display = "none";
    userNameAlert.style.display = "none";
    userNameTakenAlert.style.display = "none";
    passwordAlert.style.display = "none";
    passwordRepeatAlert.style.display = "none";
    passwordDuplicateAlert.style.display = "none";

    if (!name.value || name.value.trim().length < 5 || name.value.trim().length > 32) {
      flag = true;

      nameAlert.style.display = "block";

      name.style.borderColor = "red";
      name.style.borderStyle = "dotted";

    }

    if (!lastName.value || lastName.value.trim().length < 5 || lastName.value.trim().length > 32) {
      flag = true;

      lastNameAlert.style.display = "block";

      lastName.style.borderColor = "red";
      lastName.style.borderStyle = "dotted";

    }

    if (!userName.value || userName.value.trim().length < 5 || userName.value.trim().length > 32) {
      flag = true;

      userNameAlert.style.display = "block";

      userName.style.borderColor = "red";
      userName.style.borderStyle = "dotted";

    }

    if (!password.value || password.value.trim().length < 5 || password.value.trim().length > 32) {
      flag = true;

      passwordAlert.style.display = "block";

      password.style.borderColor = "red";
      password.style.borderStyle = "dotted";

    }

    if (!passwordRepeat.value || passwordRepeat.value.trim().length < 5 || passwordRepeat.value.trim().length >
      32) {
      flag = true;

      passwordRepeatAlert.style.display = "block";

      passwordRepeat.style.borderColor = "red";
      passwordRepeat.style.borderStyle = "dotted";

    }

    if (password && passwordRepeat && password.value !== passwordRepeat.value) {
      flag = true;

      passwordDuplicateAlert.style.display = "block";

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