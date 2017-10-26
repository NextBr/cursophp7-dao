<?php
    require_once("Config.php");

    // CARREGA UM UNICO USUARIO
     //$root = new Usuario();
     //$root -> loadById(1);

     //echo $root;


     // Carregar uma lista de usuarios
     //$lista = Usuario::getList();
     //echo json_encode($lista);

     // Carrega uma lista de usuarios buscando pelo login
    // $search = Usuario::search("A");
    // echo json_encode($search);

    // Carrega um usuario usando login e a senha
    //$Usuario = new Usuario();
   // $Usuario -> login("Ana", "210696");
    //echo $Usuario;

    // Inserindo um usuario 
    //$Aluno = new Usuario("Aluno_1", "@luno@");
    //$Aluno -> setDeslogin("");
    //$Aluno -> setDessenha("");

    //$Aluno -> insert();
    //echo $Aluno;
/*
    // Alterando Usuario
    $Sql = new Usuario();
    $Sql -> loadById(4);
    $Sql -> update("professor", "prof@1234");
    echo $Sql;
*/

    // Deletar usuario
    $usuario = new Usuario();
    $usuario -> loadById(1);
    $usuario -> delete();
    echo $usuario;

?>