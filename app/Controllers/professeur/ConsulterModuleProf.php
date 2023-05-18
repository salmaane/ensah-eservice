<?php

namespace App\Controllers\professeur;

use App\Core\Controller;
use App\Models\Accounts;

class ConsulterModuleProf {
  use Controller;

  public function index() {
    $data = [];

    $account = new Accounts();

    $tables = ['prof','module'];
    $columns = ['id_account', 'id_prof'];
    $columnValue = [ 'column' => 'id_account', 'value' => $_SESSION['user_data']->id_account ];

    $data['modules'] = $account->join($tables, $columns, $columnValue);
    if(empty($data['modules'])) $data['modules'] = [];


    $this->view('professeur/consulterModule', $data);
  }

}