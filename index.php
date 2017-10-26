<?php
    require_once("Config.php");

     $root = new Usuario();
     $root -> loadById(1);

     echo $root;
?>