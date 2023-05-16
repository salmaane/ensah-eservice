<?php

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\Coordinator;

class Coordinateur {
    use Controller;

    public function index() {
        $data = [];

        $filiere = new Filiere_();
        $data['filieres'] =  $filiere->getFiliereWithoutCoordinator();
        $data['coordinators'] = $this->getAllCoordinator();

       if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $input['id_coordinator'] = $_POST['coordinator'];

            $filiere->update($_POST['filiere'],'id_filiere',$input);
            $data['success'] = ['Coordinateur designé avec success'];
       }
       
        $this->view('designerCoordinateur',$data);
    }

    private function getAllCoordinator() {
        $coord = new Coordinator();
        return $coord->findAll();
    }

}

?>