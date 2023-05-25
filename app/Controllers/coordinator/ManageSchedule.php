<?php


namespace App\Controllers\coordinator;
use App\Core\Controller;

class ManageSchedule {
    use Controller;

    public function index() {
        $data = [];
        $id_filiere = $_SESSION['id_filiere'];
        $level = $_SESSION['level'];

        show($id_filiere);
        show($level);

        $tables = [''];
        
        $this->view('coordinator/manageSchedule',$data);
    }


}

?>