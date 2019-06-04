<?php

    class Dabatase{
        private $server;
        private $db;
        private $user;
        private $password;
        private $charset;

        public function __construct(){
            $this->server=constant('SERVER');
            $this->db=constant('DATABASE');
            $this->user=constant('USER');
            $this->password=constant('PASSWORD');
            $this->charset=constant('CHARSET');
        }

        function conn(){
            try {
                $connection="mysql:host=".$this->server.";dbname=".$this->db.";charset".$this->charset;
                $options=[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
                            PDO::ATTR_EMULATE_PREPARES=>false];
                
                $pdo= new PDO($connection,$this->user,$this->password,$options);
                return $pdo;
            } catch (PDOException $ex) {
                print_r("Error en la conexion de la BD".$ex->getMessage());
            }
        }
        
    }

?>