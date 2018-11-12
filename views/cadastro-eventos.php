<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');
    
    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/usuarios.php");
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include './partials/head.php';?>
</head>

<body style="overflow-y: scroll !important;">
    <?php include './partials/navbar.php';?>
    <div class="vh-100">
        <div class="row vh-100">
            <div class="col-lg-6 block border-right">
                <div class="text-center centered ">
                    <h1>Novo Evento</h1>
                </div>
            </div>
            <div class="col-lg-6 block">
                <form class="w-80 mx-auto centered" method="POST" action="../src/controllers/cadastroEvento.php">
                    <h4>Cadastro de eventos</h4>
                    <div class="form-group text-left mt-3">
                        <label for="titulo">Titulo</label>
                        <input name="titulo" type="text" class="form-control" id="titulo" aria-describedby="tituloHelp"
                            placeholder="Titulo do evento" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="local">Local</label>
                        <input name="local" type="text" class="form-control" id="local" placeholder="Onde vai acontecer?" required>
                    </div>
                    <div class="form-group text-left">
                        <label for="endereco">Endereço</label>
                        <input name="endereco" type="text" class="form-control" id="endereco" placeholder="Onde fica o local do evento?" required>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-left">
                                <label for="inicio">Hora de inicio</label>
                                <input name="inicio" type="datetime-local" class="form-control" id="inicio" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group text-left">
                                <label for="fim">Hora de fim</label>
                                <input name="fim" type="datetime-local" class="form-control" id="fim" required>
                            </div>
                        </div>
                    </div>
                    <button type="button" class="btn btn-primary mt-3" data-toggle="modal" data-target="#exampleModalCenter">
                        Adicionar participantes
                    </button>
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Adicionar Participantes</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php foreach($users as $rows): ?>
                                <input type="checkbox" name="user[]" value=<? echo $rows[id]; ?>><? echo " " . $rows[nome] . " " . $rows[sobrenome] ; ?><br>
                            <?php endforeach; ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="ClearBoxes()">Cancelar</button>
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Criar Evento</button>
                </form>
            </div>
        </div>
    </div>
</body>
    <?php include './partials/scripts.php';?>
</html>