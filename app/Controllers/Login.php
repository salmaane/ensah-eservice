<?php

// Login Controller

namespace App\Controllers;
use App\Core\Controller;
use App\Models\Users;

class Login {
    use Controller;

    public function index() {
        $data = [];
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $user = new Users();
            
            $input['email'] = $_POST['email'];
            $user_data = $user->first($input);
            
            if($user_data) {
                if($user_data->password == $_POST['password']) {
                    $_SESSION['user_data'] = $user_data; 
                    redirect('home');
                }
            }
            $user->errors[] = 'Incorrect email or password';
            $data['errors'] = $user->errors;
        }
        
        $this->view('login',$data);
    }

}



?>