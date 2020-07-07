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
    <?php if(isset($_GET['include']) && $_GET['include'] == 1) { ?>    
        <div class="w-2 p-3 m-5 alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Parabéns!</strong> Tarefa cadastrada com sucesso.
        </div>
    <?php } ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="index.php">Home</a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center active">
                            Criar Tarefa
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="show_task.php?action=read">Ver Tarefas</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron">
                    <div class="form-group">
                        <label for=""><h3>Tarefa</h3></label>
                        <form action="tarefa_controller.php?action=create" method="POST">
                            <input type="text" class="form-control" name="tarefa"  placeholder="Descreva a tarefa">                        
                            <input type="submit" class="btn btn-success mt-3" value="Cadastrar">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- 
    <form action="tarefa_controller.php?action=create" method="POST">
        <input name="tarefa" type="text">
        <input type="submit"  class="btn btn-success" value="Enviar">
    </form>

    
    <form action="show_task.php?action=read" method="POST">       
        <input type="submit" value="busca ai">
    </form>
    -->
</body>
</html>