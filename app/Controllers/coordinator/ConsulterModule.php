<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Filiere_;
use App\Models\Module;

class ConsulterModule {
    use Controller;

    public function index() {
        $data = [];

        $account = new Accounts();

        $tables = ['coordinator', 'filiere'];
        $columns = ['id_account', 'id_coordinator'];
        $coord_filiere_rows = $account->join($tables, $columns);
        $data['coord_filiere_rows'] = $coord_filiere_rows;

        if(isset($coord_filiere_rows[0])) {
            $filiere = new Filiere_();
            $tables = ['module_filiere', 'module', 'prof'];
            $columns = ['id_filiere', 'id_module', 'id_prof'];
            $columnValue = [
                'column' => 'id_filiere',
                'value' => $coord_filiere_rows[0]->id_filiere
            ];
            $module_prof_rows = $filiere->join($tables, $columns, $columnValue);
            $data['module_prof_rows'] = $module_prof_rows;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $module = new Module();

            if(isset($_POST['module-Ajouter'])) {
                $input['name'] = $_POST['module-Ajouter'];

                if(!$module->first($input)) {
                    $module->insert($input);
                    $data['ajouter'] = 'module ajouté acvec success';
                } else {
                    $data['existe'] = 'module existe déjà';
                }
            } 

            if(isset($_POST['module-Modifier'])) {
                
            }
        }

        

        $this->view('coordinator/consulterModule',$data);
    }

}

?>