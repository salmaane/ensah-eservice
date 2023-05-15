<?php

// Professeur class

namespace App\Models;
use App\Core\Model;

class professeur {
    use Model;

    protected $table = 'prof';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>