<?php

// Prof_dep class

namespace App\Models;

use App\Core\Model;

class Prof_dep {
    use Model;

    protected $table = 'prof_dep';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_prof_dep';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
    

}

?>