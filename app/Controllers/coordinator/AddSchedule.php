<?php

namespace App\Controllers\coordinator;
use App\Core\Controller;
use App\Models\Filiere_;
use App\Models\Module;
use App\Models\Schedules;

class AddSchedule {
    use Controller;

    public function index() {
        $data = [];
        $id_filiere = $_SESSION['id_filiere'];
        $level = $_SESSION['level'];

        $module = new Module();
        $filiere = new Filiere_();

        $tables = ['module_filiere', 'class', 'prof'];
        $columns = ['id_module','id_class','id_prof'];
        $columnValue = [
            'column' => 'level',
            'value' => $level, 
        ];
        $modules_profs = $module->join($tables, $columns, $columnValue," and class.id_filiere = ". $id_filiere);
        if(!$modules_profs) $modules_profs = [];

        $tables = ['module_filiere','module', 'class'];
        $columns = ['id_filiere', 'id_module', 'id_class'];
        $module_rows = $filiere->join($tables, $columns, [], 'id_prof is null and class.id_filiere = '.$id_filiere );
        if(!$module_rows) $module_rows = [];

        $data['modules_profs'] = array_merge($modules_profs,$module_rows);

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

        $data['full_hours'] = [];
        $full = 0;

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $scheduleData = json_decode($_POST['jsonData']);
            $schedule = new Schedules();
            foreach($scheduleData as $day => $value) {  

                $check_hour1['day_of_week'] = $day;
                $check_hour1['h8_10_prof'] = $value->{'08:00-10:00'}->{'prof'};
                if($schedule->first($check_hour1) && $check_hour1['h8_10_prof'] != '') {
                    array_push($data['full_hours'], ['name' => $check_hour1['h8_10_prof'], 'hour' => '8h à 10h']);
                    $full = 1;
                }

                $check_hour2['day_of_week'] = $day;
                $check_hour2['h10_12_prof'] = $value->{'10:00-12:00'}->{'prof'};
                if($schedule->first($check_hour2) &&  $check_hour2['h10_12_prof'] != '') {
                    array_push($data['full_hours'], ['name' => $check_hour2['h10_12_prof'], 'hour' => '10h à 12h']);
                    $full = 1;
                }

                $check_hour3['day_of_week'] = $day;
                $check_hour3['h2_4_prof'] = $value->{'14:00-16:00'}->{'prof'};
                if($schedule->first($check_hour3) && $check_hour3['h2_4_prof'] != '') {
                    array_push($data['full_hours'], ['name' => $check_hour3['h2_4_prof'], 'hour' => '14h à 16h']);
                    $full = 1;
                }

                $check_hour4['day_of_week'] = $day;
                $check_hour4['h4_6_prof'] = $value->{'16:00-18:00'}->{'prof'};
                if($schedule->first($check_hour4) && $check_hour4['h4_6_prof'] != '') {
                    array_push($data['full_hours'], ['name' => $check_hour4['h4_6_prof'], 'hour' => '16h à 18h']);
                    $full = 1;
                }
            }
            if(!$full) {
                foreach($scheduleData as $day => $value) {
                    $input = [
                        'id_class' => $data['modules_profs'][0]->id_class,
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
                    $schedule->insert($input);
                    header('Location: ./gererEmploi');
                }
            }
        }



        $this->view('coordinator/addSchedule',$data);
    }



}

?>