<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="images/favicon.ico" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Home</title>
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>home.css" />
    <link rel="stylesheet" href="<?= ASSETS_CSS ?>manageSchedule.css" />
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
        <div class="me-2 card card-deck p-5 bg-light mb-3">
            <h2 class="mb-5">Les emploi de temps du departement <?= $departement->name ?></h2>

            <form method="post" class="d-flex flex-column" id="chooseClassFrom">
                <div class="mb-3">
                    <label class="form-label" for="acc-type">Choisir la filiere</label>
                    <select name="filiere" class="form-select mb-3" id="acc-type" required>
                        <?php foreach ($filieres as $filiere) { ?>
                            <option value="<?= $filiere->id_filiere ?>" <?= $_POST['filiere'] == $filiere->id_filiere ? 'selected' : null ?>><?= $filiere->name ?></option>
                        <?php } ?>
                    </select>
                    <label class="form-label" for="acc-type">Choisir le Niveau</label>
                    <select name="level" class="form-select" id="acc-type" required>
                        <?php for ($i = 1; $i < 4; $i++) { ?>
                            <option value="<?= $i ?>" <?= $_POST['level'] == $i ? 'selected' : null ?>><?= 'Classe ' . $i ?></option>
                        <?php } ?>
                    </select>
                </div>
                <button class="btn btn-warning align-self-end" type="submit" onclick="chooseClass(event)">Choisir</button>
            </form>
        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] == 'POST') { ?>
            <?php if (empty($schedule_rows)) { ?>
                <div class="card card-deck bg-light p-5 d-flex align-items-center flex-column gap-4">
                    <h2 class="opacity-50">Il n'y a pas d'emploi du temps pour ce classe</h2>
                </div>
            <?php } else { ?>
                <div class="card card-deck bg-light pt-3 mb-5 d-flex flex-column">
                    <h2 class="ms-3 mb-4"><?=$schedule_rows[0]->name .' '. $schedule_rows[0]->level?></h2>
                    <div class="container mb-3">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr class="bg-light-gray">
                                        <th class="text-uppercase" style="width: 11%;">Time</th>
                                        <th class="align-middle" style="width: calc(89% / 4);">08:00 - 10:00</th>
                                        <th class="align-middle" style="width: calc(89% / 4);">10:00 - 12:00</th>
                                        <th class="align-middle" style="width: calc(89% / 4);">14:00 - 16:00</th>
                                        <th class="align-middle" style="width: calc(89% / 4);">16:00 - 18:00</th>
                                    </tr>
                                </thead>
                                <tbody id="tableBody">

                                    <?php foreach ($schedule_rows as $row) { ?>
                                        <tr style="height: 5rem">
                                            <th class="text-uppercase align-middle"><?= $row->day_of_week ?></th>

                                            <td class="module-dropzone">
                                                <?php if ($row->h8_10_module != '') { ?>
                                                    <div id="module-0-Cours-cloned" style="background-color: #5bbd2a;cursor:pointer;" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 text-white font-size16  xs-font-size13">
                                                        <p class="module-name lh-1 mb-1 mt-1 fw-bold text-center"><?= $row->h8_10_module ?></p>
                                                        <div class="prof-name text-center" style="font-size: 13px"><?= $row->h8_10_prof ?></div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="module-dropzone">
                                                <?php if ($row->h10_12_module != '') { ?>
                                                    <div id="module-0-Cours-cloned" style="background-color: #f0d001;cursor:pointer;" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 text-white font-size16  xs-font-size13">
                                                        <p class="module-name lh-1 mb-1 mt-1 fw-bold text-center"><?= $row->h10_12_module ?></p>
                                                        <div class="prof-name text-center" style="font-size: 13px"><?= $row->h10_12_prof ?></div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="module-dropzone">
                                                <?php if ($row->h2_4_module != '') { ?>
                                                    <div id="module-0-Cours-cloned" style="background-color: #724E91;cursor:pointer;" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 text-white font-size16  xs-font-size13">
                                                        <p class="module-name lh-1 mb-1 mt-1 fw-bold text-center"><?= $row->h2_4_module ?></p>
                                                        <div class="prof-name text-center" style="font-size: 13px"><?= $row->h2_4_prof ?></div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                            <td class="module-dropzone">
                                                <?php if ($row->h4_6_module != '') { ?>
                                                    <div id="module-0-Cours-cloned" style="background-color: #02c2c7;cursor:pointer;" class="bg-green padding-5px-tb padding-15px-lr border-radius-5 text-white font-size16  xs-font-size13">
                                                        <p class="module-name lh-1 mb-1 mt-1 fw-bold text-center"><?= $row->h4_6_module ?></p>
                                                        <div class="prof-name text-center" style="font-size: 13px"><?= $row->h4_6_prof ?></div>
                                                    </div>
                                                <?php } ?>
                                            </td>

                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>