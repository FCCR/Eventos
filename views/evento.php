<?php
    ini_set('display_errors', 1);
    error_reporting(E_ERROR);

    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/evento.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include './partials/head.php';?>
</head>

<body style="overflow-y: scroll !important;">
    <?php include './partials/navbar.php';?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">
                <? echo $evento[0]['titulo'] ?>
            </h1>
            <p class="lead">
                <b>Endereço: </b>
                <? echo $evento[0]['endereco'] ?><br>
                <b>Local: </b>
                <? echo $evento[0]['local'] ?><br>
                <b>Data e Horário: </b>
                <? echo $evento[0]['inicio'] ?><br>

                <? if(!$registro): ?>
                <a href="../src/controllers/checkins.php">
                    <button class="btn btn-success">Fazer check-in</button>
                </a>
                <? else: ?>
                <a class="text-success" href="../views/checkins.php">
                    Você está participando!
                </a>
                <? endif; ?>
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 border-right">
            <div class="text-center mb-3">
                <div class="slideshow-container">
                    <?php if ($imagens == null): ?>
                    <div class="mySlides fadeInOut">
                        <img src="../../img/fccr_horizontal.png" class="rounded mx-auto d-block" style="width:100%">
                    </div>
                    <?php else: ?> 
                    <?php foreach($imagens as $imagem): ?>
                    <div class="mySlides fadeInOut">
                        <img src="<? echo $imagem[nome] ?>" class="rounded mx-auto d-block" style="width:100%">
                    </div>
                    <?php endforeach; ?>
                    <?php endif ?>
                    <div class="text-left" <?php if ($imagens == null): ?>style="display: none;"<?php endif ?>>
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <? if($_GET['sucesso']): ?>
            <div class="alert alert-success text-center" role="alert">
                Comentário registrado!
            </div>
            <? endif; ?>
            <div class="mb-2">
                <h4>Comentários</h4>
            </div>
            <div class="ml-0">
                <? if($comentarios): ?>

                <?php foreach($comentarios as $comentario): ?>
                <? if($comentario[sexo] == 'm'): ?>
                <div class="row mt-3">
                    <div class="col-lg-1">
                        <img src="../assets/images/avatar_m.png" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="col-lg-11">
                        <div class="ml-2">
                            <p class="mb-0 text-success">
                                <? echo $comentario[nome] ?>
                            </p>
                            <p>
                                <? echo $comentario[comentario] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <? else: ?>
                <div class="row">
                    <div class="col-lg-1">
                        <img src="../assets/images/avatar_f.png" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="col-lg-11">
                        <div class="ml-2">
                            <p class="mb-0 text-success">
                                <? echo $comentario[nome] ?>
                            </p>
                            <p>
                                <? echo $comentario[comentario] ?>
                            </p>
                        </div>
                    </div>
                </div>
                <? endif; ?>

                <?php endforeach; ?>
                <? else: ?>
                <div class="row">
                    <div class="col-lg-1">
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="col-lg-11">
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Poxa, ninguem comentou nesse evento ainda <i class="far fa-frown"></i></p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="col-lg-11">
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Que tal ser o primeiro a comentar? :)</p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-1">
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">
                    </div>
                    <div class="col-lg-11">
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>É só ir na sessão 'Meus Eventos' do menu superior, clicar no evento desejado e adicionar
                                um comentário. Você pode até colocar fotos!</p>
                        </div>
                    </div>
                </div>
                <? endif; ?>

            </div>
        </div>
    </div>
    </div>
</body>
<?php include './partials/scripts.php';?>

</html>