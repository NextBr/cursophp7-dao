<?php
    spl_autoload_register(function($ClassName){
        $fileName = "Class". DIRECTORY_SEPARATOR . $ClassName . ".class.php";
        if(file_exists($fileName)){
            require_once($fileName);
        }
    });




?>