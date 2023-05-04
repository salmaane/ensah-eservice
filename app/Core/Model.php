<?php

// Main Model class

namespace App\Core;

trait Model {

    use Database;

    public $limit = 10;
    public $offset = 0;
    public $orderColumn = 'id';
    public $orderType = 'asc';

    public function findAll() {
        $query = "select * from $this->table "
                ."order by $this->orderColumn $this->orderType "
                ."limit $this->limit offset $this->offset;";

        return $this->query($query);
    }

    public function where($data, $notData = []) {
        $keys = array_keys($data);
        $notkeys = array_keys($notData);

        $query = "select * from $this->table where ";
        foreach($keys as $cond) {
            $query .= $cond . ' = :' . $cond . ' && ';
        }
        foreach($notkeys as $notCond) {
            $query .= $notCond . ' != :' . $notCond . ' && ';
        }
        $query = trim($query,' && ');
        $query .= " order by $this->orderColumn $this->orderType limit $this->limit offset $this->offset;";

        $data = array_merge($data,$notData);
        return $this->query($query, $data);
    }

    public function first($data,$notData = []) {
        $keys = array_keys($data);
        $notkeys = array_keys($notData);

        $query = "select * from $this->table where ";
        foreach($keys as $cond) {
            $query .= $cond . ' = :' . $cond . ' && ';
        }
        foreach($notkeys as $notCond) {
            $query .= $notCond . ' != :' . $notCond . ' && ';
        }
        $query = trim($query,' && ');
        $query .= " limit $this->limit offset $this->offset;";

        $data = array_merge($data,$notData);
        $results = $this->query($query, $data);

        if($results)
            return $results[0];
        return false;
    }

    public function insert($data) {
        $keys = array_keys($data);
        $query = "insert into $this->table (" . implode(',',$keys) . ") values(:" . implode(',:',$keys) . ")";
        $this->query($query,$data);

        return false;
    }

    public function update($id, $id_column = 'id', $data) {
        $keys = array_keys($data);
        
        $query = "update $this->table set ";
        foreach($keys as $key) {
            $query .= $key . ' = :' . $key . ', ';
        }
        $query = trim($query,', ');

        $query .= " where $id_column = :$id_column;";
        $data[$id_column] = $id;

        $this->query($query,$data);
        return false;
    }

    public function delete($id, $id_column= 'id') {
        $query = "delete from $this->table where $id_column = :$id_column;";
        $data[$id_column] = $id;

        show($query);
        $this->query($query,$data);
    }

}

?>