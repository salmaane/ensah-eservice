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
        <h5 class="m-0">Mohamed Haitham</h5>
        <p class="acc-type m-0"><?= parseAccType($_SESSION['user_data']->type) ?></p>
      </div>
    </div>
    <div class="tache">

      <a href="<?= URL_ROOT ?>home">Acceuil</a>
      <?php foreach (ACC_TYPES[$_SESSION['user_data']->type] as $acc_type => $link) { ?>
        <a href="<?= URL_ROOT . $link ?>"><?= $acc_type ?></a>
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
    <div class="me-2 card card-deck p-5 ">
        <?php if(empty($departement)) {?>
            <p class="alert alert-warning">Aucun departement est affecté</p>
        <?php } else { ?>
            <h1 class="mb-5">Les modules du departement <?=$departement->name?></h1>

            <?php if(!empty($modules)) { ?>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="col-1 text-center">#</th>
                            <th scope="col" class="col-3 text-center">Nom du Module</th>
                            <th scope="col" class="col-3 text-center">Professeur</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1;
                         foreach($modules as $row) {?>
                            <tr id="module_row" >
                                <td class="text-center"><?=$i++?></td>
                                <td class="text-center"><?=$row->name?></td>
                                <td class="text-center"><?=$row->lname . ' ' . $row->fname?></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
             <?php } else { ?>
                <p class="alert alert-warning">Aucun module dans ce departement</p>
             <?php } ?>

        <?php } ?>
    </div>
  </main>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>