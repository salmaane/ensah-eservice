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
define('ASSETS_FONTS',URL_ROOT . 'public/assets/fonts/');

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
    'home/compte' => ['class' => 'App\Controllers\administrator\Compte' , 'method' => 'index'],
    'home/departement' => ['class' => 'App\Controllers\administrator\Departement' , 'method' => 'index'],
    'home/filiere' => ['class' => 'App\Controllers\administrator\Filiere' , 'method' => 'index'],
    'home/coordinateur' => ['class' => 'App\Controllers\administrator\Coordinateur' , 'method' => 'index'],
    'home/chef_dep' => ['class' => 'App\Controllers\administrator\Chef_dep', 'method' => 'index'],

    'home/consulterModule' => ['class' => 'App\Controllers\coordinator\ConsulterModule', 'method' => 'index'], 
    'home/consulterDescriptif' => ['class' => 'App\Controllers\coordinator\ConsulterDescriptif', 'method' => 'index'], 
    'home/gererEmploi' => ['class'=> 'App\Controllers\coordinator\GererEmploi', 'method' => 'index'],
    'home/addSchedule' => ['class'=> 'App\Controllers\coordinator\AddSchedule', 'method' => 'index'],
    'home/updateSchedule' => ['class'=> 'App\Controllers\coordinator\UpdateSchedule', 'method' => 'index'],
    'home/deleteSchedule' => ['class'=> 'App\Controllers\coordinator\DeleteSchedule', 'method' => 'index'],

    'home/consulterModuleProf' => ['class' => 'App\Controllers\professeur\ConsulterModuleProf', 'method' => 'index'],
    'home/consulterEmploi' => ['class' => 'App\Controllers\professeur\ConsulterEmploiChef', 'method' => 'index'],
    
    'home/consulterModuleChef' => ['class' => 'App\Controllers\chefDepartement\ConsulterModuleProf', 'method' => 'index'],
    'home/consulterEmploi' => ['class' => 'App\Controllers\chefDepartement\ConsulterEmploiChef', 'method' => 'index'],
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
            'Consulter emploi du temps' => 'home/consulterEmploi',
            'Consulter les modules' => 'home/consulterModuleProf',
        ],
        'chefDepartement' =>  [
            'Consulter emploi du temps'=>'home/consulterEmploi',
            'consulter modules et professeurs du departement'=>'home/consulterModuleChef',
        ],
        'coordinator' => [
            'Consulter les modules'=>'home/consulterModule',
            'Gerer emploi du temps'=>'home/gererEmploi',
            'Consulter les descriptifs du filière'=>'home/consulterDescriptif'
        ],
    ]
);

?> 