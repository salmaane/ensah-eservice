<?php

// Main Controller class

namespace App\Core;

class Controller {

    public function view($name) {
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