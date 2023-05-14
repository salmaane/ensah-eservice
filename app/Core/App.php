<?php

namespace App\Core;
use App\Controllers\NotFound;

class App {

    private $controller = 'login';
    private $method = 'index';

    public function __construct() {
        $this->loadController();
    }

    private function URLparse()  {
        $URL = parse_url($_SERVER['REQUEST_URI'])['path'];
        
        $URL = str_replace('/'. ROOT_DIRNAME,'',$URL);
        $URL = trim($URL,'/');

        return $URL;
    }

    public function loadController() {
        $URL = $this->URLparse();
        
        if(isset(PATHS[$URL])) {
            $this->controller = PATHS[$URL]['class'];
            $controller = new $this->controller;
            $this->method = PATHS[$URL]['method'];
        } else {
            $controller = new NotFound();
        }

        call_user_func_array([$controller,$this->method],[]);
    }
}

?>