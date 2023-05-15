<?php

// Chef departement class

namespace App\Models;
use App\Core\Model;

class ChefDep {
    use Model;

    protected $table = 'chef_dep';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
}

?>