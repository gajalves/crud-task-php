<?php
    
    class Conection {
        
        private $host = 'localhost';
        private $dbname = 'tasks_php';
        private $user = 'root';
        private $pass = '';

        public function conect () {

            try {

                $con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->pass);                                                                               
                
                return $con;

            } catch (PDOException $e) {                
                
                echo 'Erro: '.$e->getMessage();

            }

        }
    }