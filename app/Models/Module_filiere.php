<?php

// Module_filiere class

namespace App\Models;

use App\Core\Model;

class Module_filiere {
    use Model;

    protected $table = 'module_filiere';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_module';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
    

}

?>