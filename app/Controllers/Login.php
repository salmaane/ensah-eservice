<?php

// Login Controller

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Visitors;

class Login {
    use Controller;

    public function index() {
        $data = [];

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $account = new Accounts();
            
            $input['email'] = $_POST['email'];
            $user_data = $account->first($input);
            
            if($user_data) {
                if($user_data->password == $_POST['password']) {
                    $_SESSION['user_data'] = $user_data;

                    $this->setVisitorsCount();
                    $this->getInfos();
                    
                    redirect('home');
                }
            }
            $account->errors[] = 'Incorrect email or password';
            $data['errors'] = $account->errors;
        } 
        $this->view('login',$data);
    }

    public function setVisitorsCount() {
        $visitors = new Visitors();

        $curr_date = date('Y-m-d');
        $input['date'] = $curr_date;
        
        $row = $visitors->first($input);

        if($row) {        
            $inp['count'] = $row->count + 1;
            $visitors->update($row->id_visitors, 'id_visitors',$inp);
        } else {
            $inp['count'] = 1;
            $inp['date'] = $curr_date;
            $visitors->insert($inp);
        }
    }

    public function getInfos()
    {
        $account = new Accounts();
        switch ($_SESSION['user_data']->type) {
            case 'administrateur':
                $tables = ['admin'];
                break;

            case 'coordinator':
                $tables = ['coordinator'];
                break;

            case 'chefDepartement':
                $tables = ['chef_dep'];
                break;

            case 'professeur':
                $tables = ['prof'];
                break;
        }
        $joinColumns = ['id_account'];
        $columnValue = ['column' => 'id_account', 'value' => $_SESSION['user_data']->id_account];
        $_SESSION['user_data'] = $account->join($tables, $joinColumns, $columnValue)[0];
    }
}



?>