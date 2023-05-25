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
  <link rel="stylesheet" href="<?=ASSETS_CSS?>manageSchedule.css" />
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

  <div class="card card-deck bg-light mb-4">
    <ul class="modules-list list-unstyled d-flex gap-2 p-3 flex-wrap m-0">
        <?php
        $i = 1; 
        foreach($modules_profs as $module) { ?>
          <li>
            <div id="<?='module-'.$i++?>" draggable="true" ondragstart="dragStartHandler(event)" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 text-white font-size16  xs-font-size13">
              <p class="lh-1 mb-1 mt-1 fw-bold text-center" ><?=$module->name?></p>
              <div class="text-center" style="font-size: 13px"><?= isset($module->fname) ? ucwords(strtolower($module->lname.' '.$module->fname)) : '?'?></div>
            </div>
          </li>
        <?php } ?>
    </ul>
  </div>

  <div class="card card-deck bg-light pt-3" >
    <div class="container">
      <div class="table-responsive">
        <table class="table table-bordered text-center">
          <thead>
            <tr class="bg-light-gray">
              <th class="text-uppercase" style="width: 11%;">Time</th>
              <th class="align-middle" style="width: calc(89% / 4);">08:00 - 10:00</th>
              <th class="align-middle" style="width: calc(89% / 4);">10:00 - 12:00</th>
              <th class="align-middle" style="width: calc(89% / 4);">14:00 - 16:00</th>
              <th class="align-middle" style="width: calc(89% / 4);"  >16:00 - 18:00</th>
            </tr>
          </thead>
          <tbody>
            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Lundi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Mardi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Mercredi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Jeudi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Vendredi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            <tr style="height: 5rem">
              <th class="text-uppercase align-middle">Samedi</th>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
              <td class="module-dropzone" ></td>
            </tr>

            </tbody>
        </table>
      </div>
    </div>
  </div>
  
</main>
<script src="<?=ASSETS_JS . 'manageSchedule.js'?>" ></script>
</body>
</html>