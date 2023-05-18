<?php

namespace App\Controllers\administrator;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\Dep;

class Filiere {
    use Controller;

    public function index() {
        $departements = $this->getDepartments();
        $data['departements'] = $departements; 

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filiere = new Filiere_();

            $inputs['name'] = ucwords($_POST['name']);
            $filiere_row = $filiere->first($inputs);
            
            if(!$filiere_row) {
                $inputs['descriptif'] = $_POST['descriptif'];
                $inputs['id_dep'] = $_POST['departement'];
                $filiere->insert($inputs);

                $data['success'] = ['filiere crée avec success.','veuillez designer un coordinateur pour cette filiere'];
            } else {
                $filiere->errors = ['cette filiere existe déjà'];
                $data['errors'] = $filiere->errors;
            }
        }


        $this->view('administrator/filiere',$data);
    }

    private function getDepartments() {
        $dep = new Dep();
        return $dep->findAll();
    }



}