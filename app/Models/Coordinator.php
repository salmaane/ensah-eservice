<?php

// Coordinator class

namespace App\Models;
use App\Core\Model;

class Coordinator {
    use Model;

    protected $table = 'coordinator';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_coordinator';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>