<?php

namespace App\Controllers;
use App\Core\Controller;

class Home {
    use Controller;

    public function index() {

        $this->view('home');
    }

}

?>