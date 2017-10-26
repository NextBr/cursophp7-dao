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


    $Aluno = new Usuario("Aluno_1", "@luno@");
    //$Aluno -> setDeslogin("");
    //$Aluno -> setDessenha("");

    $Aluno -> insert();


    echo $Aluno;

?>