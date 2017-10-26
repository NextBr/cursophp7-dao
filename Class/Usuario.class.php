<?php

    class Usuario{
        private $idusuario;
        private $deslogin;
        private $dessenha;
        private $dtcadastro;


        public function getIdusuario(){
            return $this -> idusuario;
        }

        public function setIdusuario($idusuario){
            $this -> idusuario = $idusuario;
        }


        public function getDeslogin(){
            return $this -> deslogin;
        }

        public function setDeslogin($deslogin){
            $this -> deslogin = $deslogin;
        }



        public function getDessenha(){
            return $this -> dessenha;
        }

        public function setDessenha($dessenha){
            $this -> dessenha = $dessenha;
        }



        public function getDtcadastro(){
            return $this -> dtcadastro;
        }

        public function setDtcadastro($dtcadastro){
            $this -> dtcadastro = $dtcadastro;
        }

        public function loadById($id){
            $sql = new Sql();
            $results = $sql -> select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(
                ":ID" => $id
            ));

            if(isset($results[0])){
               return json_encode($this -> setData($results[0]));
            }
        }

        public static function getList(){
            $sql = new Sql();
            return $sql -> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
        }


        public static function search($Login){
            $sql = new Sql();
            return $sql -> select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :search ORDER BY deslogin", array(
                ':search' => "%". $Login ."%"
            ));
        }


        public function login($Login, $Password){
            $Sql = new Sql();
            $results = $Sql -> select("SELECT * FROM tb_usuarios WHERE deslogin = :login AND dessenha = :password", array(
                ":login" => $Login,
                ":password" => $Password
            ));

            if(count($results) > 0){
                $this -> setData($results[0]);
            } else{
                throw new Exception("Login e/ou senha incorretos !");
            }
        }


        public function setData($data){
            $this -> setIdusuario($data['idusuario']);
            $this -> setDeslogin($data['deslogin']);
            $this -> setDessenha($data['dessenha']);
            $this -> setDtcadastro(new DateTime($data['dtcadastro']));
        }





        public function insert(){
            $sql = new Sql();
            $results = $sql -> select("CALL sp_usuarios_insert(:login, :password)", array(
                ':login' => $this -> getDeslogin(),
                ':password' => $this -> getDessenha()
            ));

            if(count($results) > 0){
                $this -> setData($results[0]);
            }
        }



        public function update($Login, $Senha){

            $this -> setDeslogin($Login);
            $this -> setDessenha($Senha);


            $sql = new Sql();
            $sql -> query("UPDATE tb_usuarios SET deslogin = :login AND dessenha = :password WHERE idusuario = :id", array(
                ":login" => $this -> getDeslogin(),
                ":password" => $this -> getDessenha(),
                ":id" => $this -> getIdusuario()
            ));
        }




        public function __construct($login = "", $password = "" ){
            $this -> setDeslogin($login);
            $this -> setDessenha($password);
        }




        public function __toString(){
            return json_encode(array(
                "idusuario" => $this -> getIdusuario(),
                "deslogin" => $this -> getDeslogin(),
                "dessenha" => $this -> getDessenha(),
                "dtcadastro" => $this -> getDtcadastro() -> format("d/m/Y H:i:s")
            ));
        }


    }


?>