<?php 

// site name
define('SITE_NAME','php-simple-mvc');

// App Root
define('APP_ROOT',dirname(dirname(dirname(__FILE__))));
define('ROOT_DIRNAME','sm-php-mvc');
define('URL_ROOT','');
define('URL_SUBFOLDER', '');

// DB Params
define('DB_DRIVER','');
define('DB_HOST','');
define('DB_NAME','');
define('DB_USER','');
define('DB_PASS','');

// path config
define('PATHS', [
    ''=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
    'home'=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
]);

?> 