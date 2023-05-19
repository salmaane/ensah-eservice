<?php

namespace App\Controllers;

use App\Models\Dep;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\Module;
use App\Models\professeur;
use App\Models\Visitors;

class Home {
    use Controller;

    public function index() {
        if(!isset($_SESSION['user_data'])) {
            redirect('');
        }

        $data = $this->getStatistics();

        $data['visitors_count'] = $this->getVisitorsCount();

        $this->view('home',$data);
    }

    public function getStatistics() {
        $departement = new Dep();
        $filiere = new Filiere_();
        $professeur = new Professeur();
        $module = new Module();

        $data['dep_count'] = $departement->count();
        $data['profs_count'] = $professeur->count();
        $data['filiere_count'] = $filiere->count();
        $data['module_count'] = $module->count();

        return $data;
    }

    public function getVisitorsCount() {
        $visitors = new Visitors();
        $input['date'] = date("Y-m-d");
        return $visitors->first($input);
    }

}

?>