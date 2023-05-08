<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="<?=ASSETS_CSS?>loginPage.css"/>
  <link rel="icon" href="<?=URL_ROOT?>public/favicon.ico"/>
  <title>ENSAH</title>

</head>
<body>

  <main>
    <div class="logo-back-container">
      <div class="logo-container">
        <img src="<?=ASSETS_IMAGES?>logo-ensah.png" alt="logo" class="logo"/>
      </div>
    </div>
    <div class="form-back-container">
      <div class="form-container">
        <form>
          <picture>
            <source media="(max-width: 767px)" srcset="images/logo-ensah.png" >
            <img src="" alt="" class="phone-logo"/>
          </picture>
          <h2 class="login-title">LOGIN</h2>
          <div class="inputs">
            <label>
              Email
              <input type="email" placeholder="nom@uae.ac.ma" required>
            </label>
            <label>
              Mot de passe
              <input type="password" placeholder="Entrez votre mot de passe" required>
            </label>
            <a class="forgotPassword">Mot de passe oublié ?</a>
          </div>
          <button class="login-button"><a>Se Connecter</a></button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>