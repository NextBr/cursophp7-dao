<?php

    class Sql extends PDO{
        private $Conn;

        public function __construct(){
            $this -> Conn = new PDO("mysql:host=localhost:3306;dbname=dbphp7", "root", "admin");
        }


        private function setParams($statement, $parameters = array()){
            foreach($parameters as $key => $value){
                $this -> setParam($statement, $key, $value);
            }
        }

        private function setParam($statement, $key, $value){

            $statement -> bindParam($key, $value);
        }



        public function query($rawQuery, $params = array()){
            $stmt = $this -> Conn -> prepare($rawQuery);
            $this -> setParams($stmt, $params);
            $stmt -> execute();
            return $stmt;
        }


        public function select($rawQuery, $params = array()):array{
            $stmt = $this -> query($rawQuery, $params);

            return $stmt -> fetchAll(PDO::FETCH_ASSOC);
        }



    }


?>