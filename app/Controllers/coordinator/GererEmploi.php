<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Class_;

class GererEmploi {
    use Controller;

    public function index() {
        $data = [];

        $account = new Accounts();
        $class = new Class_();

        $tables = ['coordinator', 'filiere'];
        $columns = ['id_account', 'id_coordinator'];
        $columnValue = [
            'column' => 'id_account',
            'value' => $_SESSION['user_data']->id_account
        ];
        $data['filiere_infos'] = $account->join($tables, $columns, $columnValue)[0];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tables = ['schedules'];
            $columns = ['id_class'];
            $columnValue = [
                'column' => 'id_filiere',
                 'value'=> $data['filiere_infos']->id_filiere
            ];
            $data['schedule_rows'] = $class->join($tables, $columns, $columnValue,"&& level = ". $_POST['level']);
            show($data['schedule_rows']);
        }
        
        $this->view('coordinator/gererEmploi',$data);
    }


}

?>