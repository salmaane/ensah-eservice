<?php

namespace App\Controllers\coordinator;

use App\Core\Controller;
use App\Models\Schedules;

class DeleteSchedule {
    use Controller;

    public function index() {   
        $id_class = $_SESSION['id_class'];
        $schedule = new Schedules();

        $schedule->delete($id_class,'id_class');
        header('Location: ./gererEmploi');
    }
}