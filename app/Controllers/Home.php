<?php

namespace App\Controllers;
use App\Core\Controller;

class Home {
    use Controller;

    public function index() {
        if(!isset($_SESSION['user_data'])) {
            redirect('');
        }
        $data['acc_types'] = [
            'admin' => ['Créer filière','Créer compte utilisateur','Designer cordinateur','Designer chef departement']
        ];
        $this->view('home',$data);
    }

}

?>