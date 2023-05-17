<?php

// Module_dep class

namespace App\Models;

use App\Core\Model;

class Module_dep {
    use Model;

    protected $table = 'module_dep';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_module';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
    

}

?>