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
define('DB_NAME','ensah');
define('DB_USER','root');
define('DB_PASS','salmane');

// path config
define('PATHS', [
    ''=>['class' =>  'App\Controllers\Login', 'method' => 'index'],
    'login'=>['class' =>  'App\Controllers\Login', 'method' => 'index'],
    'home'=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
]);

?> 