<?php

// Module class

namespace App\Models;

use App\Core\Database;
use App\Core\Model;

class Module {
    use Model;

    protected $table = 'module';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_module';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }
    

}

?>