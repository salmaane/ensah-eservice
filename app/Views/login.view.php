<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="icon" href="<?=URL_ROOT?>public/favicon.ico"/>
  <link rel="stylesheet" href="<?=ASSETS_CSS?>loginPage.css"/>
  <title>Login</title>

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
        <form action="" method="post" >
          <picture>
            <source media="(max-width: 767px)" srcset="<?=ASSETS_IMAGES?>logo-ensah.png" >
            <img src="" class="phone-logo"/>
          </picture>
          <h2 class="login-title">LOGIN</h2>

          <?php if(!empty($errors)) {?>
            <div style="color: #721c24; background-color: #f8d7da;padding: 10px 30px; border: 1px solid #721c24; border-radius:5px;">
                <?php echo implode('<br/>',$errors); ?>
            </div>
          <?php } ?>
          
          <div class="inputs">
            <label>
              Email
              <input name='email' type="email" placeholder="nom@uae.ac.ma" required>
            </label>
            <label>
              Mot de passe
              <input name="password" type="password" placeholder="Entrez votre mot de passe" required>
            </label>
            <a class="forgotPassword">Mot de passe oublié ?</a>
          </div>
          <button type="submit" class="login-button"><a>Se Connecter</a></button>
        </form>
      </div>
    </div>
  </main>

</body>
</html>