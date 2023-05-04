<?php 

namespace App\Core;
use PDO;


trait Database {

    private function connect() {
        $dsn = DB_DRIVER . ':hostname=' . DB_HOST . ';dbname=' . DB_NAME;
        $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
        try {
            $pdo = new PDO($dsn,DB_USER,DB_PASS,$options);
            return $pdo;
        } catch(\PDOException $e) {
            echo $e->getMessage();
        }
    }

    private function query($query, $data = []) {
        $pdo = $this->connect();
        
        $statement = $pdo->prepare($query);
        $check = $statement->execute($data);
        
        if($check) {
            $result = $statement->fetchAll(PDO::FETCH_OBJ);
            if(is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }

}


?>