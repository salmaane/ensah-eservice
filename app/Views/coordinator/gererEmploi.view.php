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
    <div class="me-2 card card-deck p-5 bg-light mb-5">
        <h1 class="mb-3">Gérer Emploi du temps</h1>
        
        <form method="post" class="d-flex flex-column">
            <div class="mb-3">
                <label class="form-label" for="acc-type">Choisir le Niveau</label>
                <select name="level" class="form-select" id="acc-type" required>
                    <?php for($i=1; $i<4; $i++) { ?>
                        <option value="<?=$i?>"><?=$filiere_infos->name . ' ' . $i?></option>
                    <?php } ?>
                </select>
            </div>
            <button class="btn btn-warning align-self-end" type="submit">Choisir</button>
        </form>
    </div>
    
    <?php if($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
      <?php if(empty($schedule_rows)) {?>
        <div class="card card-deck bg-light p-5 d-flex align-items-center flex-column gap-4" >
          <h2 class="opacity-50">Il n'y a pas d'emploi du temps pour ce classe</h2>
            <a href="<?=URL_ROOT.'home/manageSchedule'?>" class="btn btn-success text-decoration-none" style="width: fit-content;color: #fff;">Ajouter</a>
        </div>
      <?php } ?>
    <?php } ?>
  </main>

</body>
</html>