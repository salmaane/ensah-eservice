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
        $_SESSION['id_filiere'] = $data['filiere_infos']->id_filiere;


        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['level'] = $_POST['level'];

            $tables = ['schedules'];
            $columns = ['id_class'];
            $columnValue = [
                'column' => 'id_filiere',
                 'value'=> $data['filiere_infos']->id_filiere
            ];
            $data['schedule_rows'] = $class->join($tables, $columns, $columnValue,"&& level = ". $_POST['level']);

        }
        
        $this->view('coordinator/gererEmploi',$data);
    }


}

?>