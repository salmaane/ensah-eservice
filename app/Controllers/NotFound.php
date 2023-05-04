<?php

namespace App\Controllers;
use App\Core\Controller;

    class NotFound extends Controller {

        public function index() {
            $this->view('notFound');
        }


    }

?>