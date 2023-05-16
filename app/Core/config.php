<?php 

// site name
define('SITE_NAME','ensah eservice');

// App Root
define('APP_ROOT',dirname(dirname(dirname(__FILE__))));
define('ROOT_DIRNAME','ensah-eservice');
define('URL_ROOT','http://127.0.0.1/ensah-eservice/');
define('URL_SUBFOLDER', '');

// Assets
define('ASSETS_CSS',URL_ROOT . 'public/assets/css/');
define('ASSETS_IMAGES',URL_ROOT . 'public/assets/images/');
define('ASSETS_JS',URL_ROOT . 'public/assets/js/');
define('ASSETS_ICONS',URL_ROOT . 'public/assets/icons/');

// DB Params
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','eservice_ensah');
define('DB_USER','root');
define('DB_PASS','');

// path config
define('PATHS', [
    ''=>['class' =>  'App\Controllers\Login', 'method' => 'index'],
    'login'=>['class' =>  'App\Controllers\Login', 'method' => 'index'],
    'home'=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
    'logout' => ['class' => 'App\Controllers\Logout' , 'method' => 'index'],
    'home/compte' => ['class' => 'App\Controllers\Compte' , 'method' => 'index'],
    'home/departement' => ['class' => 'App\Controllers\Departement' , 'method' => 'index'],
    'home/filiere' => ['class' => 'App\Controllers\Filiere' , 'method' => 'index'],
    'home/coordinateur' => ['class' => 'App\Controllers\Coordinateur' , 'method' => 'index'],
]);

//Account types
define('ACC_TYPES', 
    [
        'administrateur' => [
            'Créer département' => 'home/departement',
            'Créer filière' => 'home/filiere',
            'Créer compte utilisateur' => 'home/compte',
            'Designer cordinateur'  => 'home/coordinateur',
            'Designer chef departement'  => 'home/chef_dep',
        ],
        'professeur' => [
            'Saisir notes N/R'=> '',
            'Consulter emploi du temps' => '',
            'Consulter les modules' => '',
            'Consulter etudiants de chaque modules' => ''
        ],
        'chef du département' => [
            'Saisir notes N/R'=>'',
            'Consulter emploi du temps'=>'',
            'Consulter les modules'=>'',
            'Consulter etudiants de chaque modules'=>'',
            'consulter module du departement'=>'',
            'consulter liste des profs du departement'=>''
        ],
        'coordinateur' => [
            'Saisir notes N/R'=>'',
            'Consulter emploi du temps'=>'',
            'Consulter les modules'=>'',
            'Consulter etudiants de chaque modules'=>'',
            'affecter modules aux professeurs'=>'',
            'Gerer emploi du temps'=>'',
            'Consulter les notes'=>'',
            'Consulter les descriptifs du filière'=>''
        ],
        'étudiant' => []
    ]
);

?> 