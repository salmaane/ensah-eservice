<?php

namespace App\Controllers\chefDepartement;

use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Module;

class ConsulterModuleProf {
  use Controller;

  public function index() {
    $data = [];

    $account = new Accounts();

    $tables = ['chef_dep','departement'];
    $columns = ['id_account','id_chef'];
    $columnValue = [ 'column' => 'id_account', 'value' => $_SESSION['user_data']->id_account ];

    $data['departement'] = $account->join($tables, $columns, $columnValue)[0];
    if(empty($data['departement'])) $data['departement'] = [];

    if(isset($data['departement'])) {
        $module = new Module();

        $tables = ['prof','module_dep'];
        $columns = ['id_prof','id_module'];
        $columnValue = [ 'column' => 'id_dep', 'value' => $data['departement']->id_dep ];

        $data['modules'] = $module->join($tables, $columns, $columnValue);
        if(empty($data['modules'])) $data['modules'] = [];        
    }


    $this->view('chefDepartement/consulterModuleProf', $data);
  }

}