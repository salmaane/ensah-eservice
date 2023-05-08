<?php

// Login Controller

namespace App\Controllers;
use App\Core\Controller;

class Login extends Controller {

    public function index() {
        $this->view('login');
    }

}



?>