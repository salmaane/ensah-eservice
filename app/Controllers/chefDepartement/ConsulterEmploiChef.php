<?php

namespace App\Controllers\chefDepartement;

use App\Models\Dep;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Class_;

class ConsulterEmploiChef
{
    use Controller;

    public function index()
    {
        $data = [];

        $account = new Accounts();
        $departement = new Dep();
        $class = new Class_();

        $tables = ['chef_dep', 'departement'];
        $columns = ['id_account', 'id_chef'];
        $columnValue = [
            'column' => 'id_account',
             'value' => $_SESSION['user_data']->id_account
        ];
        $data['departement'] = $account->join($tables, $columns, $columnValue)[0];
        if (empty($data['departement'])) $data['departement'] = [];

        $tables = ['filiere'];
        $columns = ['id_dep'];
        $columnValue = [
            'column' => 'id_dep',
            'value' => $data['departement']->id_dep
        ];
        $data['filieres'] = $departement->join($tables, $columns, $columnValue);
        if (empty($data['filieres'])) $data['filieres'] = [];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tables = ['schedules','filiere'];
            $columns = ['id_class','id_filiere'];
            $columnValue = [
                'column' => 'id_filiere',
                'value' => $_POST['filiere']
            ];
            $data['schedule_rows'] = $class->join($tables, $columns, $columnValue, "&& level = " . $_POST['level']);

            if ($data['schedule_rows']) $_SESSION['id_class'] = $data['schedule_rows'][0]->id_class;
        }
        $this->view('chefDepartement/consulterEmploiChef', $data);
    }
}
