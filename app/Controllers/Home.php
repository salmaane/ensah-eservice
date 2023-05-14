<?php

namespace App\Controllers;
use App\Core\Controller;

class Home {
    use Controller;

    public function index() {
        if(!isset($_SESSION['user_data'])) {
            redirect('');
        }
        $this->view('home');
    }

}

?>