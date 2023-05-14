<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="icon" href="images/favicon.ico"/>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp"
    crossorigin="anonymous">
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="<?=ASSETS_CSS?>layout.css" />
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
      
      <?php foreach($acc_types[$_SESSION['user_data']->type] as $acc_type) {?>
        <a><?=$acc_type?></a>
      <?php } ?>

    </div>
  </aside>

  <header class="top-navbar d-flex justify-content-between" >
    <form class="d-flex justify-content-between">
      <input type="search" placeholder="Recherche par mot clé" class="search-input"/>
      <button class="search-button"><img src="<?=ASSETS_ICONS?>search.svg" alt="" class="search-icon"/></button>
    </form>
    <a class="logout" href="<?=URL_ROOT?>">
      <p class="logout-p m-0" >LogOut</p>
      <button class="logout-button m-0"><img src="<?=ASSETS_ICONS?>logoutIcon.svg" alt="" class="logout-icon"/></button>
    </a>
  </header>

  <main>

  </main>
</body>
</html>