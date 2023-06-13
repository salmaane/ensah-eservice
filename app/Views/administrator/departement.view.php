<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="icon" href="images/favicon.ico" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="<?= ASSETS_CSS ?>home.css" />
</head>

<body class="body">

  <aside class="side-navbar">
    <div class="profile">
      <img src="<?= ASSETS_IMAGES ?>Profile-Icon.png" alt="" class="profile-icon" />
      <div>
        <h5 class="m-0"><?= ucwords($_SESSION['user_data']->lname . ' ' . $_SESSION['user_data']->fname) ?></h5>
        <p class="acc-type m-0"><?= parseAccType($_SESSION['user_data']->type) ?></p>
      </div>
    </div>
    <div class="tache">


      <a href="<?= URL_ROOT ?>home">
        <img alt="" src="<?= ASSETS_ICONS ?>acceuil.svg" class="book-icon" />
        Acceuil
      </a>

      <?php foreach (ACC_TYPES[$_SESSION['user_data']->type] as $acc_type => $link) { ?>
        <a href="<?= URL_ROOT . $link ?>">
          <img alt="" src="<?= ASSETS_ICONS . ICONS_NAMES[$_SESSION['user_data']->type][$acc_type] ?>" class="book-icon" />
          <?= $acc_type ?>
        </a>
      <?php } ?>

    </div>
  </aside>

  <header class="top-navbar d-flex justify-content-between z-3 me-1">
    <form class="d-flex justify-content-between">
      <input type="search" placeholder="Recherche par mot clé" class="search-input" />
      <button class="search-button"><img src="<?= ASSETS_ICONS ?>search.svg" alt="" class="search-icon" /></button>
    </form>
    <a class="logout" href="<?= URL_ROOT ?>logout">
      <p class="logout-p m-0">LogOut</p>
      <button class="logout-button m-0"><img src="<?= ASSETS_ICONS ?>logoutIcon.svg" alt="" class="logout-icon" /></button>
    </a>
  </header>

  <main>

    <div class="me-2 bg-light card-deck p-5 card me-1">
      <h1 class="mb-4">Créer département</h1>

      <?php if (isset($errors)) { ?>
        <div class="alert alert-danger w-50"><?= implode('<br/>', $errors) ?></div>
      <?php } ?>

      <?php if (isset($success)) { ?>
        <div class="alert alert-success w-50"><?= implode('<br/>', $success) ?></div>
      <?php } ?>

      <p class="fw-bold">Veuillez entrez les informations du déepartement à créer :</p>

      <form class="w-50 mb-5" method="post">
        <div class="mb-3 w-50">
          <label for="name" class="form-label">Nom du département</label>
          <input name="name" type="text" class="form-control" id="name" required autocomplete="off">
        </div>

        <div class="mb-3 form-group">
          <label for="descriptif" class="form-label">Ajouter descriptif</label>
          <textarea name="descriptif" class="form-control" id="descriptif" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Ajouter</button>
      </form>
    </div>
  </main>
</body>

</html>