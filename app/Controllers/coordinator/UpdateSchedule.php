<?php

namespace App\Controllers\coordinator;

use App\Core\Controller;
use App\Models\Class_;
use App\Models\Filiere_;
use App\Models\Module;
use App\Models\Schedules;

class UpdateSchedule {
    use Controller;

    public function index()
    {   
        $data = [];
        $id_filiere = $_SESSION['id_filiere'];
        $level = $_SESSION['level'];

        $module = new Module();
        $filiere = new Filiere_();
        $class = new Class_();

        // get this class number modules from database
        $tables = ['module_filiere', 'class', 'prof'];
        $columns = ['id_module', 'id_class', 'id_prof'];
        $columnValue = [
            'column' => 'level',
            'value' => $level,
        ];
        $modules_profs = $module->join($tables, $columns, $columnValue, " and class.id_filiere = " . $id_filiere);
        if (!$modules_profs) $modules_profs = [];

        $tables = ['module_filiere', 'module', 'class'];
        $columns = ['id_filiere', 'id_module', 'id_class'];
        $module_rows = $filiere->join($tables, $columns, [], 'id_prof is null and class.id_filiere = ' . $id_filiere);
        if (!$module_rows) $module_rows = [];

        $data['modules_profs'] = array_merge($modules_profs, $module_rows);

        $data['colors'] = [
            '#02c2c7',
            '#ff5722',
            '#5bbd2a',
            '#f0d001',
            '#ff48a4',
            '#9d60ff',
            '#724E91',
            '#1B2845',
            '#0B5563',
            '#183A37',
            '#e95601',
        ];

        // Get schedule rows from database
        $tables = ['schedules'];
        $columns = ['id_class'];
        $columnValue = [
            'column' => 'id_filiere',
            'value' => $id_filiere
        ];
        $data['schedule_rows'] = $class->join($tables, $columns, $columnValue, "&& level = " . $level);

        // update the schedule
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $scheduleData = json_decode($_POST['jsonData']);
            $schedule = new Schedules();
            $i = 0;
            foreach ($scheduleData as $day => $value) {
                $input = [
                    'day_of_week' => $day,
                    'h8_10_module' => $value->{'08:00-10:00'}->{'module'},
                    'h8_10_prof' => $value->{'08:00-10:00'}->{'prof'},
                    'h10_12_module' => $value->{'10:00-12:00'}->{'module'},
                    'h10_12_prof' => $value->{'10:00-12:00'}->{'prof'},
                    'h2_4_module' => $value->{'14:00-16:00'}->{'module'},
                    'h2_4_prof'  => $value->{'14:00-16:00'}->{'prof'},
                    'h4_6_module' => $value->{'16:00-18:00'}->{'module'},
                    'h4_6_prof' => $value->{'16:00-18:00'}->{'prof'}
                ];


                $schedule->update($data['schedule_rows'][$i++]->id_schedule, 'id_schedule',$input);
                header('Refresh:0');
            }
        }



        $this->view('coordinator/updateSchedule', $data);
    }


}
