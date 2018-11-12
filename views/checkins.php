<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/checkin.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php include './partials/head.php';?>
</head>
<body>
    <?php include './partials/navbar.php';?>
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Meus Eventos</h1>
            <p class="lead">Aqui você vai encontrar os eventos que você deu check-in.</p>
        </div>
    </div>
    <hr style="width: 90%;">
    <div class="px-5 mt-auto">       
                <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Título</th>
                        <th scope="col">Dia e Horário</th>
                        <th scope="col">Local</th>
                        <th scope="col">Criador</th>
                        <th scope="col" class="text-center">Check-in</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($eventos):?>
                <?php $i = 0 ?>
                    <?php foreach($eventos as $rows): ?>
                    <tr>
                        <th scope="row"><?php echo $i+1; ?></th>
                        <td><a href="./../views/checkin.php?id=<? echo $rows[0]; ?>"><?php echo $rows[1]; ?></a></td>
                        <td><?php echo $rows[2]; ?></td>
                        <td>
                            <?php
                                echo $rows[3];
                            ?>
                        </td>
                        <td><?php echo $rows[4]; ?></td>
                        <td class="text-center">
                            <a href="#">
                                <i class="fas fa-check"></i>
                            </a>
                        </td>
                    </tr>
                    <?php $i++ ?>
            <?php endforeach; ?>
            <?php else: ?>
                    <div class="row d-flex justify-content-center">
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Essa tabela está em branco porque você ainda nao deu check-in em nenhum evento <i class="far fa-frown" ></i></p>
                        </div>                                  
                    </div>
            <?php endif; ?>   
            </tbody>
        </table>
    </div>

</body>
    <?php include './partials/scripts.php';?>
</html>