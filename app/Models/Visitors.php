<?php

// Visitors class

namespace App\Models;
use App\Core\Model;

class Visitors {
    use Model;

    protected $table = 'visitors';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_visitors';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>