<?php

namespace App\Controllers;
use App\Core\Controller;

class Logout {
    use Controller;

    public function index() {
        if(isset($_SESSION['user_data'])) {
            unset($_SESSION['user_data']);
        }
        redirect('');
    }


}

?>