<?php

// Filiere class

namespace App\Models;
use App\Core\Model;

class Filiere_ {
    use Model;

    protected $table = 'filiere';

    public function __construct($limit=50, $offset=0, $orderType='asc')
    {
       $this->orderColumn = 'id_filiere';
       $this->limit = $limit;
       $this->offset = $offset;
       $this->orderType = $orderType;
    }

}

?>