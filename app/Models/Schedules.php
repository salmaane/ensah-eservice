<?php

// Accounts class

namespace App\Models;
use App\Core\Model;

class Schedules {
    use Model;

    protected $table = 'schedules';
    
    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_schedule';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>