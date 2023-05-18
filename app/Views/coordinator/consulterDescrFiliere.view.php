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

  <style>

    #update-descriptif {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.7s ease-in-out;
    }

    #update-descriptif.open-textarea {
        max-height: 783px;
    }

  </style>

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
      <div class="me-2 card card-deck p-5 bg-light d-flex">
        <h1 class="mb-3">Descriptif du filiere <?=$coord_filiere_rows->name?></h1>
        <div class="card card-deck p-4 mb-3">
            <strong><?=$coord_filiere_rows->descriptif?></strong>
        </div>
        <button class="btn btn-warning align-self-end" style="width: fit-content;"
         onclick="updateTextArea()" id='update-button'>Modifier</button>

        <form class="d-flex flex-column" id="update-descriptif" method="post">
            <div class="mb-3 form-group">
                <label for="descriptif" class="form-label">Modifier le descriptif du filiere</label>
                <textarea name="descriptif" class="form-control w-100" id="descriptif" rows="3"></textarea>
            </div>
            <div class="align-self-end">
            <button class="btn btn-secondary" style="width: fit-content;" onclick="cancelUpdate(event)">Cancel</button>
            <button class="btn btn-success" style="width: fit-content;">Enregistrer</button>
            </div>
        </form>


      </div>
  </main>
<script src="<?=ASSETS_JS . 'consulterDescrFiliere.js'?>"></script>
</body>
</html>