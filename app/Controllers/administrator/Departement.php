<?php

namespace App\Controllers\administrator;
use App\Core\Controller;
use App\Models\Dep;

class Departement {
    use Controller;

    public function index() {
        $data = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dep = new Dep();

            $inputs['name'] = strtoupper($_POST['name']);
            
            $dep_row = $dep->first($inputs);
            
            if(!$dep_row) {
                $inputs['descriptif'] = $_POST['descriptif'];
                $dep->insert($inputs);

                $data['success'] = ['département crée avec success.','veuillez designer un chef pour ce departement'];
            } else {
                $dep->errors = ['cette département existe déjà'];
                $data['errors'] = $dep->errors;
            }
        }


        $this->view('administrator/departement',$data);
    }



}

?>