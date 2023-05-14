<?php

namespace App\Controllers;
use App\Core\Controller;

class NotFound {
    use Controller;

    public function index() {
        $this->view('notFound');
    }

}

?>