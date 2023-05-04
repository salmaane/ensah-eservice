<?php 
session_start();

// Composer Autoloader
require_once __DIR__ . "/vendor/autoload.php";
// config
require_once 'app/Core/config.php';
// Core functions
require_once 'app/Core/functions.php';

use App\Core\App;

$app = new App();

?>