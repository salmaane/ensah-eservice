<?php

// Departement class

namespace App\Models;
use App\Core\Model;

class Dep {
    use Model;

    protected $table = 'departement';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_dep';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }


}

?>