<?php

namespace App\Controllers\professeur;

use App\Core\Controller;
use App\Models\Schedules;

class ConsulterEmploi
{
    use Controller;

    public function index()
    {
        $data = [];

        $name = $_SESSION['user_data']->lname . ' ' . $_SESSION['user_data']->fname;

        $schedules = new Schedules();
        $input['h8_10_prof'] = $name;
        $input['h10_12_prof'] = $name;
        $input['h2_4_prof'] = $name;
        $input['h4_6_prof'] = $name;
        $prof_schedule = $schedules->where($input,[],'||');

        $schedule_rows = [  
            'lundi' => [
                'day_of_week' => 'lundi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],
            'mardi' => [
                'day_of_week' => 'mardi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],
            'mercredi' => [
                'day_of_week' => 'mercredi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],
            'jeudi' => [
                'day_of_week' => 'jeudi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],
            'vendredi' => [
                'day_of_week' => 'vendredi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],
            'samedi' => [
                'day_of_week' => 'samedi',
                'h8_10_module' => '',
                'h10_12_module' => '',
                'h2_4_module' => '',
                'h4_6_module' => '',
                'h8_10_prof' => '',
                'h10_12_prof' => '',
                'h2_4_prof' => '',
                'h4_6_prof' => '',
            ],

        ];

        foreach($prof_schedule as $day) {
            if(strtolower($day->h8_10_prof) == strtolower($name)) $schedule_rows[$day->day_of_week]['h8_10_module'] = $day->h8_10_module;
            if(strtolower($day->h10_12_prof) == strtolower($name)) $schedule_rows[$day->day_of_week]['h10_12_module'] = $day->h10_12_module;
            if(strtolower($day->h2_4_prof) == strtolower($name)) $schedule_rows[$day->day_of_week]['h2_4_module'] = $day->h2_4_module;
            if(strtolower($day->h4_6_prof) == strtolower($name)) $schedule_rows[$day->day_of_week]['h4_6_module'] = $day->h4_6_module;
        }
        
            
        $data['schedule_rows'] = $schedule_rows;
        $this->view('professeur/consulterEmploi', $data);
    }
}
