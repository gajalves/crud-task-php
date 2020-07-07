<?php

    require 'tarefa_controller.php';
    //echo '<pre>';
    //print_r($tarefas);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://bootswatch.com/4/slate/bootstrap.min.css">
    <title>Document</title>
    <style>
        i {
            cursor: pointer;
        }
    </style>
    <script>
        function edit(id, txt_task) {
            
            let form = document.createElement('form');
            form.action = 'tarefa_controller.php?action=update';
            form.method = 'POST';
            form.className = 'row';

            let input = document.createElement('input');
            input.type = 'text';
            input.name = 'tarefa';
            input.className = 'col-7 ml-1 form-control ';
            input.value = txt_task;
              
            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id';
            inputId.value = id;
   
            let btn = document.createElement('button');
            btn.type = 'submit';
            btn.className = 'col-3 ml-1 btn btn-primary btn-sm';
            btn.innerHTML = 'Atualizar';            
         
            form.appendChild(input);
            form.appendChild(inputId);
            form.appendChild(btn);
            
            let tarefa = document.getElementById(`tarefa_${id}`);
            
            tarefa.innerHTML = '';
            
            tarefa.insertBefore(form, tarefa[0]);
            
        }

        function remove(id) {
            location.href = 'show_task.php?action=remove&id='+id;
        }
        function fulfilled(id) {
            location.href = 'show_task.php?action=fulfilled&id='+id;
        }
    </script>
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
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="new_task.php">Criar Tarefa</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                            <a href="show_task.php?action=read">Ver Tarefas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <div class="form-group">
                        <label for=""><h3>Todas as Tarefas</h3></label>
                        <hr>
                        <ul class="list-group">                            
                            <?php 
                                if(!$tarefas) {                                    
                                    //echo 'Erro ao buscar registros';                                    
                                    return false;
                                }                                
                                foreach($tarefas as $task) {                                 
                            ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <h5 class="container" id="tarefa_<?= $task->id ?>"><?= $task->tarefa ?> (<?= $task->status ?>)</h5>                               
                                <div class="d-flex justify-content-between">                                
                                    <i onclick="remove(<?= $task->id ?>)"><svg class="m-2 badge badge-primary badge-pill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 24 24" stroke-width="2"><g stroke-width="2" transform="translate(0, 0)"><path d="M20,9V21a2,2,0,0,1-2,2H6a2,2,0,0,1-2-2V9" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></path> <line data-color="color-2" x1="1" y1="5" x2="23" y2="5" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></line> <line x1="12" y1="12" x2="12" y2="18" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></line> <line x1="8" y1="12" x2="8" y2="18" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></line> <line x1="16" y1="12" x2="16" y2="18" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></line> <polyline data-cap="butt" data-color="color-2" points="8 5 8 1 16 1 16 5" fill="none" stroke="#cccccc" stroke-miterlimit="10" stroke-width="2" stroke-linecap="butt" stroke-linejoin="miter"></polyline></g></svg></i>                                    
                                    <?php if ($task->status == 'pendente') { ?>
                                        <i onclick="edit(<?= $task->id ?>, '<?= $task->tarefa ?>')" ><svg class="m-2 badge badge-primary badge-pill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 32 32" stroke-width="2"><g stroke-width="2" transform="translate(0, 0)"><line data-cap="butt" data-color="color-2" x1="20" y1="5" x2="27" y2="12" fill="none" stroke="#cccccc" stroke-miterlimit="10" stroke-width="2" stroke-linecap="butt" stroke-linejoin="miter"></line> <line data-color="color-2" x1="10" y1="22" x2="23.5" y2="8.5" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></line> <line data-cap="butt" data-color="color-2" x1="4" y1="21" x2="11" y2="28" fill="none" stroke="#cccccc" stroke-miterlimit="10" stroke-width="2" stroke-linecap="butt" stroke-linejoin="miter"></line> <path d="M11,28,2,30l2-9L22.414,2.586a2,2,0,0,1,2.828,0l4.172,4.172a2,2,0,0,1,0,2.828Z" fill="none" stroke="#cccccc" stroke-linecap="square" stroke-miterlimit="10" stroke-width="2" stroke-linejoin="miter"></path></g></svg></i>                                    
                                        <i onclick="fulfilled(<?= $task->id ?>)"><svg class="m-2 badge badge-primary badge-pill" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="32px" height="32px" viewBox="0 0 24 24"><g transform="translate(0, 0)"><path d="M11,23A11,11,0,0,1,11,1a10.832,10.832,0,0,1,5.83,1.652l-1.06,1.7A8.864,8.864,0,0,0,11,3a9,9,0,1,0,9,9,9.9,9.9,0,0,0-.27-2.358l1.94-.484A11.909,11.909,0,0,1,22,12,11.013,11.013,0,0,1,11,23Z" fill="#fff"></path> <path data-color="color-2" d="M11,15a1,1,0,0,1-.707-.293L5.586,10,7,8.586l4,4,11-11L23.414,3,11.707,14.707A1,1,0,0,1,11,15Z" fill="#fff"></path></g></svg></i>
                                    <?php } ?>
                                </div>                                
                            </li>                                                           
                            <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>           
</body>
</html>