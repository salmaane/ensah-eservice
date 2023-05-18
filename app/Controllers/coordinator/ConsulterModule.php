<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Filiere_;
use App\Models\Module;
use App\Models\Module_filiere;
use App\Models\Module_dep;
use App\Models\Prof_dep;
use App\Models\professeur;

class ConsulterModule {
    use Controller;

    public function index() {
        $data = [];

        $account = new Accounts();

        $tables = ['coordinator', 'filiere'];
        $columns = ['id_account', 'id_coordinator'];
        $columnValue = [
            'column' => 'id_account',
            'value' => $_SESSION['user_data']->id_account
        ];
        $coord_filiere_rows = $account->join($tables, $columns,$columnValue);
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
            $module_rows = $filiere->join($tables, $columns, $columnValue, 'and id_prof is null');
            if(!$module_rows) $module_rows = [];

            $data['modules_merged'] = array_merge($module_prof_rows,$module_rows);            
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $module = new Module();
            $module_filiere = new Module_filiere();
            $prof_dep = new Module_dep();

            if(isset($_POST['module-Ajouter'])) {
                $input['name'] = ucfirst(strtolower($_POST['module-Ajouter']));

                if(!$module->first($input)) {
                    $module->insert($input);

                    $module_filiere_input['id_module'] = $module->getlastInsertedId('id_module');
                    $module_filiere_input['id_filiere'] = $coord_filiere_rows[0]->id_filiere;
                    $module_filiere->insert($module_filiere_input);

                    $module_dep_input['id_module'] = $module->getlastInsertedId('id_module');
                    $module_dep_input['id_dep'] = $coord_filiere_rows[0]->id_dep;
                    $prof_dep->insert($module_dep_input);

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

        $prof = new professeur();
        $data['profs'] = $prof->findAll();

        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST['prof']) {
            $module = new Module();
            $prof_dep = new Prof_dep();

            $input['id_prof'] = $_POST['prof'];
            $module->update($_POST['affecter-module'],'id_module',$input);

            $input_dep['id_prof'] = $_POST['prof'];
            $input_dep['id_dep'] = $data['coord_filiere_rows'][0]->id_dep;
            if(!$prof_dep->first($input_dep)) $prof_dep->insert($input_dep); 

            header("Refresh:0");
        }
        
        $this->view('coordinator/consulterModule',$data);
    }


}

?>