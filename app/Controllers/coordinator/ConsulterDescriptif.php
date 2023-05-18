<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Accounts;
use App\Models\Filiere_;

class ConsulterDescriptif {
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
        $data['coord_filiere_rows'] = $account->join($tables, $columns,$columnValue)[0];

        // show($data['coord_filiere_rows']);

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $filiere = new Filiere_();
            $id_filiere = $data['coord_filiere_rows']->id_filiere;
            $input['descriptif'] = $_POST['descriptif'];

            $filiere->update($id_filiere,'id_filiere',$input);
            header('Refresh:0');
        }

        $this->view('coordinator/consulterDescrFiliere',$data);
    }


}

?>