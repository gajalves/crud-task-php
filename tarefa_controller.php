<?php
    
    require_once 'connection.php';
    require_once 'tarefa.model.php';
    require_once 'tarefa.service.php';

    $tarefa = new Tarefa();
    
    $con = new Conection();

    $tarefaService = new TarefaService($con, $tarefa);

    if(isset($_GET['action'])) {
        $action = $_GET['action'];        
    } else {
        //return false;                                              
        $tarefa = false;
        return $tarefa;        

    }
    //$action = isset($_GET['action']) ? $_GET['action'] : $action;
              
    if($action == 'create') {
        $tarefa = new Tarefa();

        $tarefa->__set('tarefa', htmlspecialchars($_POST['tarefa']));
        
        $con = new Conection();

        $tarefaService = new TarefaService($con, $tarefa);
        $tarefaService->create();

        header('location: new_task.php?include=1');
    }     
    
    if($action == 'read') {
        $tarefas = $tarefaService->read();                  
        return $tarefas;            
    }

    if($action == 'update') {
        $tarefa->__set('id',$_POST['id']);
        $tarefa->__set('tarefa', $_POST['tarefa']);
        
        if($tarefaService->update()) {
            header('location: show_task.php?action=read');
        } else {
            echo 'deu ruim ao atualizar';
        }
        
    }

    if($action == 'remove') {
        $tarefa = new Tarefa();

        $tarefa->__set('id', $_GET['id']);
        
        $con = new Conection();

        $tarefaService = new TarefaService($con, $tarefa);

        if($tarefaService->delete()) {
            echo 'task deleted';            
        } else {
            header('location: show_task.php?action=read');
        }
        
    }
    if ($action == 'fulfilled') {
        $tarefa = new Tarefa();
        $tarefa->__set('id', $_GET['id']);
        $tarefa->__set('id_status', 2);
        $con = new Conection();

        $tarefaService = new TarefaService($con, $tarefa);
        $tarefaService->checkTask();

        header('location: show_task.php?action=read');
    }

    else {
        return $tarefa = false;
    }

    
    
        

    


    

    