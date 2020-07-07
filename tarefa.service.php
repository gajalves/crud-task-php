<?php

    class TarefaService {

        private $con;
        private $tarefa;

        public function __construct (Conection $con, Tarefa $tarefa) {
            $this->con = $con->conect();
            $this->tarefa = $tarefa;
        }
        
        public function create() {
            $con = $this->con;              
            $query = $con->prepare("INSERT INTO tb_tarefas(tarefa)VALUES(:tarefa)");           
            $tarefa =  $this->tarefa->__get('tarefa');
            $query->bindParam(':tarefa', $tarefa, PDO::PARAM_STR);

            if($query->execute()) {
                echo 'cabo deu bom';
                return true;
            } else {                
                echo 'deu merda';                
            }            
        } 

        public function read() {
            $con = $this->con;
            $query = $con->prepare("SELECT t.id, s.status, t.tarefa FROM tb_tarefas AS t LEFT JOIN tb_status AS s ON (t.id_status = s.id) ");
            $query->execute();
                                                                    
            if($query->rowCount() == 0) {
                return false;                            
            } else {
                return $query->fetchAll(PDO::FETCH_OBJ);
            }             

        }

        public function readAll() {
            $con = $this->con;
            $query = $con->prepare("SELECT * FROM tb_tarefas"); 
            $query->execute();

            return $query->rowCount();
        }
        
        public function update() {
            $con = $this->con;
            $query = $con->prepare("UPDATE tb_tarefas set tarefa = :tarefa WHERE id = :id");

            $id = $this->tarefa->__get('id');
            $tarefa =  $this->tarefa->__get('tarefa');

            $query->bindParam(':tarefa', $tarefa, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            return $query->execute();
        } 

        public function delete() {
           $con = $this->con;
           $query = $con->prepare("DELETE FROM tb_tarefas WHERE ID = :id");

           $id = $this->tarefa->__get('id');

           $query->bindParam(':id', $id, PDO::PARAM_INT);
           $query->execute();
        } 

        public function checkTask() {
            $con = $this->con;
            $query = $con->prepare("UPDATE tb_tarefas set id_status = :id_status WHERE id = :id");

            $id_status = $this->tarefa->__get('id_status');
            $id =  $this->tarefa->__get('id');

            $query->bindParam(':id_status', $id_status, PDO::PARAM_STR);
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            $query->execute();
        }

    }