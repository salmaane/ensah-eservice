<?php

// Class class

namespace App\Models;
use App\Core\Model;

class Class_ {
    use Model;

    protected $table = 'class';
    
    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_class';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>