<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\Module;

class ManageSchedule {
    use Controller;

    public function index() {
        $data = [];
        $id_filiere = $_SESSION['id_filiere'];
        $level = $_SESSION['level'];

        $module = new Module();
        $filiere = new Filiere_();

        $tables = ['module_filiere', 'class', 'prof'];
        $columns = ['id_module','id_class','id_prof'];
        $columnValue = [
            'column' => 'level',
            'value' => $level, 
        ];
        $modules_profs = $module->join($tables, $columns, $columnValue," and class.id_filiere = ". $id_filiere);

        $tables = ['module_filiere','module', 'class'];
        $columns = ['id_filiere', 'id_module', 'id_class'];
        $module_rows = $filiere->join($tables, $columns, [], 'id_prof is null and class.id_filiere = '.$id_filiere );
        if(!$module_rows) $module_rows = [];

        $data['modules_profs'] = array_merge($modules_profs,$module_rows);

        $data['colors'] = [
            '#02c2c7',
            '#ff5722',
            '#5bbd2a',
            '#f0d001',
            '#ff48a4',
            '#9d60ff',
            '#724E91',
            '#1B2845',
            '#0B5563',
            '#183A37',
            '#e95601',
        ];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(isset($_SESSION['scheduleData'])) {
                show($_SESSION['scheduleData']);
            }
        }

        $this->view('coordinator/manageSchedule',$data);
    }



}

?>