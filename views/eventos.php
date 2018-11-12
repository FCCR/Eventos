<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/eventos.php");
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
            <h1 class="display-4">Eventos</h1>
            <p class="lead">Esses são os eventos que estão acontecendo.</p>
        </div>
    </div>
    <hr style="width: 90%;">
    <?php if($_SESSION['admin'] == 1): ?> 
        <div class="text-right mr-5 mb-2">
            <a href="./../views/cadastro-eventos.php">Adicionar evento</a>
        </div>
    <?php endif; ?>

    <div class="px-5 mt-auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Título</th>
                    <th scope="col">Dia e Horário</th>
                    <th scope="col">Local</th>
                    <th scope="col">Criador</th>
                </tr>
            </thead>
            <tbody>

            <?php if($_SESSION['admin'] == 1): ?>   
                <?php if($allEvents):?>
                    <?php $i = 0 ?>

                        <?php foreach($allEvents as $rows): ?>

                        <tr>
                             <th scope="row"><?php echo $i+1; ?></th>
                            <td>                      
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $rows[1]; ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <h6 class="dropdown-header">Ações</h6>
                                    <a class="dropdown-item" href="./../views/evento.php?id=<? echo $rows[0]; ?>">Visualizar</a>
                                    <a class="dropdown-item" href="./../views/alterar-evento.php?id=<? echo $rows[0]; ?>">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="./../views/desativar-evento.php?id=<? echo $rows[0]; ?>">Excluir</a>
                                </div>
                            </div>
                                    </td>
                            <td><?php echo $rows[2]; ?></td>
                            <td>
                                <?php
                                    echo $rows[3];
                                ?>
                            </td>
                            <td><?php echo $rows[4]; ?></td>
                        </tr>

                    <?php $i++ ?>
                    <?php endforeach; ?>
                <tr>
                    <th scope="row"><a href="./../views/cadastro-eventos.php"><i class="fas fa-plus text-success"></i></a></th>
                    <td class="text-muted">Adicionar Evento</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <?php else: ?>
                    <div class="row d-flex justify-content-center">                      
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">                     
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Ainda não foram adicionados eventos aqui <i class="far fa-frown" ></i></p>
                        </div>                                  
                    </div>
            <?php endif; ?>

            <?php else: ?>
            <?php if($eventos):?>
                <?php foreach($eventos as $rows): ?>
                <tr>
                    <th scope="row"><?php echo $i+1?></th>
                    <td>

                        <?php if($_SESSION['admin'] == 1): ?>    
                            <div class="dropdown show">
                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <?php echo $rows[1]; ?>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <h6 class="dropdown-header">Ações</h6>
                                    <a class="dropdown-item" href="./../views/evento.php?id=<? echo $rows[0]; ?>">Visualizar</a>
                                    <a class="dropdown-item" href="./../views/alterar-evento.php?id=<? echo $rows[0]; ?>">Editar</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="./../views/desativar-evento.php?id=<? echo $rows[0]; ?>">Excluir</a>
                                </div>
                            </div>
                        <?php else: ?>
                            <a href="./../views/evento.php?id=<? echo $rows[0]; ?>"><?php echo $rows[1]; ?></a> 
                        <?php endif; ?> 

                    </td>
                    <td><?php echo $rows[2]; ?></td>
                    <td>
                        <?php
                            echo $rows[3];
                        ?>
                    </td>
                    <td><?php echo $rows[4]; ?></td>
                </tr>

                <?php $i++ ?>

                <?php endforeach; ?>
                <?php else: ?>
                    <div class="row d-flex justify-content-center">                      
                        <img src="../assets/images/avatar_f_suport.png" class="rounded-circle" width="50" height="50">                     
                        <div class="ml-2">
                            <p class="mb-0 text-success">Suporte - FCCR</p>
                            <p>Ainda não foram adicionados eventos aqui <i class="far fa-frown" ></i></p>
                        </div>                                  
                    </div>
                <?php endif; ?>   
            <?php endif; ?>
            </tbody>
        </table>
    </div>

</body>
    <?php include './partials/scripts.php';?>

</html>