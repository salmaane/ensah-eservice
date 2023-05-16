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
  <link rel="stylesheet" href="<?=ASSETS_CSS?>consulterModule.css" />
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
            <?php if(!empty($coord_filiere_rows)) { ?>
                <h1 class="mb-4">Les modules du filiere <?=ucfirst(strtolower($coord_filiere_rows[0]->name))?></h1>

                <button class="btn btn-success mb-4" style="width: fit-content;" data-bs-toggle="modal" data-bs-target="#Modal" data-bs-whatever="Ajouter">Ajouter Module</button>
                
                <?php if(isset($ajouter)) { ?>
                    <p class="alert alert-success w-50"><?=$ajouter?></p>
                <?php } ?>
                <?php if(isset($existe)) { ?>
                    <p class="alert alert-danger w-50"><?=$existe?></p>
                <?php } ?>

            <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ajouter Module</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post">
                            <div class="mb-3">
                                <label for="module-name" class="col-form-label">Nom du module</label>
                                <input name="" type="text" class="form-control mb-3" id="module-name" required>
                                <button type="submit" class="btn btn-success ">Confirmer</button>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                    </div>
                </div>
            </div>

                <?php if(!empty($module_prof_rows)) {?>
                   <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col" class="col-3 text-center">Module</th>
                                <th scope="col" class="col-3 text-center">Prof</th>
                                <th class="col-3 text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($module_prof_rows as $row) {?>
                                <tr>
                                    <td class="text-center"><?=$row->name?></td>
                                    <td class="text-center"><?=$row->lname .' '.$row->fname?></td>
                                    <td class="text-center">
                                        <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modal" data-bs-whatever="Modifier">Modifier</button>
                                        <button class="btn btn-danger btn-sm" >Supprimer</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>
                    <p class="alert alert-warning">Il n'y a aucun module</p> 
                <?php } ?>
            <?php } else {?>
                <h1>Vous n'avez aucune filiere</h1>
            <?php } ?>
        </div>
  </main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?=ASSETS_JS . 'consulterModule.js'?>"></script>
</body>
</html>