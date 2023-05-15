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
        <p class="acc-type m-0"><?=$_SESSION['user_data']->type?></p>
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
      <h1 class="mb-4">Créer compte utilisateur</h1>

        <?php if(isset($errors)) {?>
            <div class="alert alert-danger w-50"><?=implode('<br/>',$errors)?></div>
        <?php } ?>

        <?php if(isset($success)) {?>
            <div class="alert alert-success w-50"><?=implode('<br/>',$success)?></div>
        <?php } ?>

      <p class="fw-bold">Veuillez entrez les informations du compte à créer :</p>
        
      <form class="w-50 mb-5" method="post">
        <div class="mb-3 w-50">
            <label for="fname" class="form-label">Prénom</label>
            <input name="fname" type="text" class="form-control" id="fname" required autocomplete="off">
        </div>
        <div class="mb-3 w-50">
            <label for="lname" class="form-label">Nom</label>
            <input name="lname" type="text" class="form-control" id="lname" required autocomplete="off">
        </div>
        <div class="form-group w-50 mb-3">
            <label for="datepicker">Date de naissance </label>
            <input name="birthday" type="date" class="form-control" id="datepicker">
        </div>
        <div class="mb-3">
          <label class="form-label" for="acc-type">Choisir le type du compte</label>
          <select name="acc-type" class="form-select" id="acc-type">
            <option selected disabled>Ouvrir ce menu pour choisir</option>
            <option value="administrateur">Administrateur</option>
            <option value="chef du département">Chef du département</option>
            <option value="coordinateur">Coordinateur</option>
            <option value="professeur">Professeur</option>
          </select>
        </div>

        <div class="mb-3">
          <label for="email" class="form-label">Adresse email</label>
          <input name="email" type="email" class="form-control" id="email" required autocomplete="off">
        </div>

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input name="password" type="password" class="form-control" id="password" required>
        </div>

        <button type="submit" class="btn btn-primary">Créer compte</button>
      </form>
    </div>
  </main>
</body>
</html>