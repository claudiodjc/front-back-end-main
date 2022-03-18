<?php
$acao = 'recuperaTarefasRealizadas';
require 'tarefa_controller.php';

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- cdn fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">

    <!-- css personalizado -->
    <link rel="stylesheet" href="css/estilo_todas_tarefas.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <script>
        //excluir tarefa
        function removerTarefa(id) {
            location.href = "todas_tarefas.php?pag=todas_tarefas&acao=remover&id=" + id
        }
    </script>

    <title>Minhas Tarefas - Todas Tarefas</title>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Início</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Tarefas Realizadas</h4>
                       

                            <?php foreach ($tarefas as $indice => $tarefa) { ?>

                                <div class="list-wrapper " name="<?= $tarefa->status ?>">
                                    <div class="row mb-3 d-flex align-items-center tarefas">
                                        <div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
                                            <?= $tarefa->tarefa ?>
                                        </div>
                                        <div class="col-sm-3 mt-2">
                                            <i class="icones far fa-times-circle " onclick="removerTarefa(<?= $tarefa->id ?>)"></i>
                                            <i class="icones"><?= $tarefa->status ?> em  <?= $data_brasil = date('d/m/Y H:i:s', strtotime($tarefa->data_modificado)); ?></i>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                      
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>