<?php

// Student class

namespace App\Models;
use App\Core\Model;

class Accounts {
    use Model;

    protected $table = 'student';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>