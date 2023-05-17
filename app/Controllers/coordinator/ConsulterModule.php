<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Filiere_;
use App\Models\Module;
use App\Models\Module_filiere;
use App\Models\Module_dep;

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
            if(!$module_prof_rows) $module_prof_rows=[];

            $tables = ['module_filiere','module'];
            $columns = ['id_filiere', 'id_module'];
            $module_rows = $filiere->join($tables, $columns, [], 'where id_prof is null');
            if(!$module_rows) $module_rows = [];

            $data['modules_merged'] = array_merge($module_prof_rows,$module_rows);            
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $module = new Module();
            $module_filiere = new Module_filiere();
            $module_dep = new Module_dep();

            if(isset($_POST['module-Ajouter'])) {
                $input['name'] = $_POST['module-Ajouter'];

                if(!$module->first($input)) {
                    $module->insert($input);

                    $module_filiere_input['id_module'] = $module->getlastInsertedId('id_module');
                    $module_filiere_input['id_filiere'] = $coord_filiere_rows[0]->id_filiere;
                    $module_filiere->insert($module_filiere_input);

                    $module_dep_input['id_module'] = $module->getlastInsertedId('id_module');
                    $module_dep_input['id_dep'] = $coord_filiere_rows[0]->id_dep;
                    $module_dep->insert($module_dep_input);

                    header("Refresh:0");
                } else {
                    $data['existe'] = 'module existe déjà';
                }
            } 

            if(isset($_POST['module-Modifier'])) {
                $input['name'] = $_POST['module-Modifier'];
                $module->update($_POST['id_module'],'id_module',$input);
                
                header("Refresh:0");
            }

            if(isset($_POST['delete-module'])) {
                $module->delete($_POST['delete-module'],'id_module');
                header("Refresh:0");
            }
        }
        
        $this->view('coordinator/consulterModule',$data);
    }

    private function search($array,$value) {
        foreach($array as $var) {
            if($value == $var->name) {
                return $var->id_module;
            }
        }
        return false;
    }

}

?>