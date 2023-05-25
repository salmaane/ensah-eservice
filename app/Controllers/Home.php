<?php

namespace App\Controllers;

use App\Models\Dep;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\professeur;
use App\Models\Visitors;

class Home {
    use Controller;

    public function index() {
        if(!isset($_SESSION['user_data'])) {
            redirect('');
        }

        $data = $this->getStatistics();

        $data['visitors_count'] = json_encode(array_reverse($this->getVisitorsCount(6)));

        $this->view('home',$data);
    }

    public function getStatistics() {
        $departement = new Dep();
        $filiere = new Filiere_();
        $professeur = new Professeur();
        $departement = new Dep();

        $data['dep_count'] = $departement->count();
        $data['profs_count'] = $professeur->count();
        $data['filiere_count'] = $filiere->count();
        $data['dep_count'] = $departement->count();

        return $data;
    }

    public function getVisitorsCount($limit) {
        $visitors = new Visitors();
        $visitors->limit = $limit;
        $visitors->orderType = 'desc';
        $visitors->orderColumn = 'id_visitors';
        
        return $visitors->findAll();
    }

}

?>