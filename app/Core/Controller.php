<?php

// Main Controller class

namespace App\Core;

trait Controller {

    public function view($name,$data = []) {
        if(!empty($data)) extract($data);

        $filename = __DIR__ . "\\..\\Views\\" . $name . ".view.php";
        
        if(file_exists($filename)) {
            require $filename;
        } else {
            $filename = __DIR__ . '\\..\\Views\\notFound.view.php';
            require $filename;
        }
    }
}

?>