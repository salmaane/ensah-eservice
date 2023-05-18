<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;


class ConsulterDescriptif {
    use Controller;

    public function index() {
        $data = [];


        
        $this->view('coordinator/consulterDescrFiliere',$data);
    }


}

?>