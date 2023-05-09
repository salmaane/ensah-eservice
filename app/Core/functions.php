<?php 

function show($stuff) {
    echo "<h1><pre>";
    print_r($stuff);
    echo "</pre></h1>";
}

function esc($str) {
    return htmlspecialchars($str);
}

function redirect($path) {
    header("Location: " . URL_ROOT . $path);
    die;
}