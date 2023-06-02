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

    <div class="me-2 card-deck p-4 card me-1">
      <h1 class="mt-1 text-center">Statistiques de l'école</h1>
      <div class="col p-5 gap-3">
        <div class="row mb-3 gap-3">

          <div class="card col text-white" style="background-color: #F9C80E;">
            <div class="card-body d-flex align-items-center gap-5 justify-content-between">
              <h3 class="card-title m-0">Nombre de départements</h3>
              <h2 class="card-text"><?= $dep_count->count ?></h2>
            </div>
          </div>

          <div class="card col text-white" style="background-color: #F86624;">
            <div class="card-body d-flex align-items-center gap-5 justify-content-between">
              <h3 class="card-title m-0">Nombre de filières</h3>
              <h2 class="card-text"><?= $filiere_count->count ?></h2>
            </div>
          </div>

        </div>

        <div class="row mb-3 gap-3">

          <div class="card col text-white" style="background-color: #EA3546;">
            <div class="card-body d-flex align-items-center gap-5 justify-content-between">
              <h3 class="card-title m-0">Nombre de professeurs</h3>
              <h2 class="card-text"><?= $profs_count->count ?></h2>
            </div>
          </div>

          <div class="card col text-white" style="background-color: #662E9B;">
            <div class="card-body d-flex align-items-center gap-5 justify-content-between">
              <h3 class="card-title m-0">Nombre de départements</h3>
              <h2 class="card-text"><?= $dep_count->count ?></h2>
            </div>
          </div>

        </div>

      </div>

      <div class="m-3 m-auto" style="width: 550px;">
        <div class="p-3 text-white" style="background-color: #3F52E3;">Statistiques d'accès à eServices</div>
        <canvas id="visitorsChart" class="bg-light" style="background-color: #eee;"></canvas>
      </div>


      <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
      <script>
        let data = <?= $visitors_count ?>;
        const ctx = document.getElementById('visitorsChart');

        new Chart(ctx, {
          type: 'line',
          data: {
            labels: data.map(date => date.date),
            datasets: [{
              label: 'Nbr. de visiteurs: ',
              lineTension: 0.2,
              data: data.map(date => date.count),
              fill: true,
              borderWidth: 1,
              borderColor: '#3F52E3',
              backgroundColor: 'rgba(63, 82, 227, 0.05)',
            }]
          },
          options: {
            layout: {
              padding: {
                left: 10,
                right: 25,
                top: 25,
                bottom: 0
              }
            },
            scales: {
              y: {
                beginAtZero: true,
                suggestedMin: 10,
                suggestedMax: 50,
                ticks: {
                  stepSize: 10,
                },
                grid: {
                  color: 'rgba(0, 0, 0, 0.1)'
                }
              },
              x: {
                grid: {
                  color: 'rgba(0, 0, 0, 0.05)'
                }
              }
            },
            elements: {
              point: {
                pointBackgroundColor: '#3F52E3',
                pointBorderWidth: 3,
              }
            },
            plugins: {
              legend: {
                display: false,
              },
              tooltip: {
                backgroundColor: "rgb(255,255,255)",
                bodyColor: "#333",
                titleMarginBottom: 10,
                titleColor: '#6e707e',
                titleFontSize: 14,
                borderColor: '#dddfeb',
                borderWidth: 1,
                xPadding: 15,
                yPadding: 15,
                displayColors: false,
                intersect: false,
                mode: 'index',
                caretPadding: 10,
                callbacks: {
                  label: function(context) {
                    let label = context.dataset.label || '';
                    if (label) {
                      label += ': ';
                    }
                    if (context.parsed.y !== null) {
                      label += context.parsed.y;
                    }

                    return label;
                  }
                }
              }
            },
          },
        });
      </script>
  </main>
</body>

</html>