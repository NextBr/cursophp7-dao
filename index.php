<?php
    require_once("Config.php");

     $Sql = new Sql();
    $Usuarios = $Sql -> select("SELECT * FROM tb_usuarios");
    echo json_encode($Usuarios);

?>