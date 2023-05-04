<?php 

// site name
define('SITE_NAME','php-simple-mvc');

// App Root
define('APP_ROOT',dirname(dirname(dirname(__FILE__))));
define('ROOT_DIRNAME','ensah-eservice');
define('URL_ROOT','http://127.0.0.1/ensah-eservice/');
define('URL_SUBFOLDER', '');

// DB Params
define('DB_DRIVER','mysql');
define('DB_HOST','localhost');
define('DB_NAME','ensah');
define('DB_USER','root');
define('DB_PASS','salmane');

// path config
define('PATHS', [
    ''=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
    'home'=>['class' =>  'App\Controllers\Home', 'method' => 'index'],
]);

?> 