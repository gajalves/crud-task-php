<?php
    require 'tarefa_controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" style="border: 0 !important;" href="#">CRUD TASKS</a>        
    </nav>    
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="new_task.php">Criar Tarefa</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="show_task.php?action=read">Ver Tarefas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron text-center">
                    <h2>Total de Tarefas</h2>
                    <hr>
                        <h3>
                            <?php 
                                $tarefa = $tarefaService->readAll(); 
                                if($tarefa != 1 && $tarefa != 0 ) {
                                    echo $tarefa.' Tarefas';
                                }                      
                            ?> 
                        </h3>
                        <h3>
                        <?php 
                            $status = $tarefaService->read(); 
                            $contPen = 0;
                            $contRea = 0;
                            if($status) {
                                foreach($status as  $s) {
                                    $s->status == 'pendente' ? $contPen++ : $contRea++;
                                } 
                                if ($contPen) {
                                    echo 'Tarefas Pendentes: '.$contPen.' Tarefa(s)';                                    
                                }
                                echo '<br>';
                                if ($contRea) {                                    
                                    echo 'Tarefas Realizadas: '.$contRea.' Tarefa(s)';
                                }                                                  
                            } else {
                                echo '0 Tarefa';
                            }                            
                        ?> </h3>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</body>
</html>