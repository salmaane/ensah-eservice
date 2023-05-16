<?php

namespace App\Controllers\administrator;
use App\Core\Controller;
use App\Models\Accounts;

class Compte {
    use Controller;

    public function index() {
        $data = [];
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $account = new Accounts();
            
            $input['email'] = $_POST['email'];
            $user_data = $account->first($input);
            
            if(!$user_data) {

                $input['password'] =     $_POST['password'];
                $input['type'] =         $_POST['acc-type'];
                $acc_input['fname'] =    $_POST['fname'];
                $acc_input['lname'] =    $_POST['lname'];
                $acc_input['birthday'] = $_POST['birthday'];

                $type = "App\Models\\" . ucfirst($input['type']);
                $type = new $type;

                $account->insert($input);
                $acc_input['id_account'] = $account->getlastInsertedId('id_account');
                $type->insert($acc_input);       

                $data['success'] = ['Compte crée avec succès'];
            } else {
                $account->errors[] = 'Ce compte existe déjà';
                $data['errors'] = $account->errors;
            }
        }


        $this->view('administrator/compte',$data);
    }



}

?>