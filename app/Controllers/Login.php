<?php

// Login Controller

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Accounts;

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
                    redirect('home');
                }
            }
            $account->errors[] = 'Incorrect email or password';
            $data['errors'] = $account->errors;
        }
        
        $this->view('login',$data);
    }

}



?>