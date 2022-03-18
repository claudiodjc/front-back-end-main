<?php
    $acao = 'recuperar';
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
    <link rel="stylesheet" href="css/estilo.css">

    <!-- favicon -->
    <link rel="icon" href="img/favicon.ico" type="image/x-icon" />

    <title>Minhas Tarefas</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" >
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="todas_tarefas.php">Tarefas Realizadas</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    
    <?php
        if( isset ($_GET['inclusao']) && $_GET['inclusao'] == 1){ ?>

            <div class="container ">
                <div class="row justify-content-center" id="alerta-mensagem">
                    <div class="col-md-6">
                        <div class="alert alert-success justify-content-center d-flex" role="alert">
                            Tarefa incluída com sucesso!
                        </div>
                    </div>
                </div>
            </div>
        <?php } else if (isset ($_GET['inclusao']) && $_GET['inclusao'] == 2) { ?>
            <div class="container ">
                <div class="row justify-content-center" id="alerta-mensagem">
                    <div class="col-md-6">
                        <div class="alert alert-info justify-content-center d-flex" role="alert">
                            Preencha o campo tarefa!
                        </div>
                    </div>
                </div>
            </div>

        <?php } ?>

    <section id="busca" class="d-flex">

        <div class="container align-self-center">
            <div class="row">
                <div class="col-md-12">
                    <div class="card px-3">
                        <div class="card-body">
                            <h4 class="card-title">Minhas Tarefas</h4>
                            
                                <form method="post" action="tarefa_controller.php?acao=inserir" class="add-itens d-flex">
                                    <input type="text" class="form-control" name="tarefa" placeholder="Adicione uma nova tarefa">
                                    <button class="btn btn-primary font-weight-bold">ADICIONAR</button>
                                </form>
                               
                           <?php foreach($tarefas as $indice => $tarefa){ ?>

                                <div class="list-wrapper " name="<?= $tarefa->status?>">
                                    <div class="row mb-3 d-flex align-items-center tarefas">
                                        <div class="col-sm-9" id="tarefa_<?= $tarefa->id ?>">
                                            <?= $tarefa->tarefa ?>
                                        </div>
                                        <div class="col-sm-3 mt-2 d-flex justify-content-between">
                                            <i class="icones far fa-times-circle" onclick="removerTarefa(<?= $tarefa->id ?>)" ></i>
                                            <i class="icones far fa-edit" onclick="editarTarefa(<?= $tarefa->id ?>, '<?= $tarefa->tarefa ?>')"></i>
                                            <i class="icones fas fa-check" onclick="marcarRealizada(<?= $tarefa->id ?>)"></i>
                                            ( <?= $tarefa->status ?> )
                                        </div>
                                    </div>
                                </div>

                           <?php } ?>

                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

<!-- jquery / Javascript-->
<script src="js/jquery-3.6.0.slim.min.js"></script>
<script src="js/minhas_tarefas.js"></script>

</html>