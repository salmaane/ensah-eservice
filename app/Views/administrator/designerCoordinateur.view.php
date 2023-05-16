<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="images/favicon.ico"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
    crossorigin="anonymous">
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="<?=ASSETS_CSS?>home.css" />
</head>
<body class="body">
  
  <aside class="side-navbar">
    <div class="profile">
      <img src="<?=ASSETS_IMAGES?>Profile-Icon.png" alt="" class="profile-icon"/>
      <div>
        <h5 class="m-0">Mohamed Haitham</h5>
        <p class="acc-type m-0"><?= parseAccType($_SESSION['user_data']->type) ?></p>
      </div>
    </div>
    <div class="tache">
        <a href="<?=URL_ROOT?>home">Acceuil</a>

      <?php foreach(ACC_TYPES[$_SESSION['user_data']->type] as $acc_type => $link) {?>
        <a href="<?=URL_ROOT . $link?>"><?=$acc_type?></a>
      <?php } ?>

    </div>
  </aside>

  <header class="top-navbar d-flex justify-content-between z-3 me-1" >
    <form class="d-flex justify-content-between">
      <input type="search" placeholder="Recherche par mot clé" class="search-input"/>
      <button class="search-button"><img src="<?=ASSETS_ICONS?>search.svg" alt="" class="search-icon"/></button>
    </form>
    <a class="logout" href="<?=URL_ROOT?>logout">
      <p class="logout-p m-0" >LogOut</p>
      <button class="logout-button m-0"><img src="<?=ASSETS_ICONS?>logoutIcon.svg" alt="" class="logout-icon"/></button>
    </a>
  </header>

  <main>
  <div class="me-2 card card-deck p-5 bg-light">
      <h1 class="mb-4">Designer coordinateur</h1>

        <?php if(isset($errors)) {?>
            <div class="alert alert-danger w-50"><?=implode('<br/>',$errors)?></div>
        <?php } ?>

        <?php if(isset($success)) {?>
            <div class="alert alert-success w-50"><?=implode('<br/>',$success)?></div>
        <?php } ?>

      <p class="fw-bold">Veuillez Choisir le coordinateur et le filiere :</p>
        
      <form class="w-50 mb-5" method="post">

        <div class="mb-3">
          <label class="form-label" for="acc-type">Choisir le filiere </label>
          <select name="filiere" class="form-select" id="acc-type">
            <option selected disabled>Ouvrir ce menu pour choisir</option>
            <?php foreach($filieres as $fil) { ?>
                <option value="<?=$fil->id_filiere?>"><?= ucfirst(strtolower($fil->name)) ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="acc-type">Choisir le coordinateur </label>
          <select name="coordinator" class="form-select" id="acc-type">
            <option selected disabled>Ouvrir ce menu pour choisir</option>
            <?php foreach($coordinators as $coord) { ?>
                <option value="<?=$coord->id_coordinator?>"><?= ucfirst(strtolower($coord->fname .' '. $coord->lname)) ?></option>
            <?php } ?>
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Designer coordinateur</button>
      </form>
    </div>
  </main>
</body>
</html>