<?php

// Coordinator class

namespace App\Models;
use App\Core\Model;

class Coordinateur {
    use Model;

    protected $table = 'coordinator';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>