<?php 
    session_start(); 
    if(!$_SESSION['logged'] || !$_SESSION['admin']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");
    include_once("./../src/controllers/usuarios.php");
    
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
            <h1 class="display-4">Gerenciamento de usuários</h1>
            <p class="lead">Aqui estão todos os usuários cadastrados no sistema.</p>
        </div>
    </div>
    <hr style="width: 90%;">
    <div class="text-right mr-5 mb-2">
        <a href="./../views/cadastro.php">Adicionar novo usuário</a>
    </div>
    <div class="px-5 mt-auto">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col" class="text-center">Administrador</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 0 ?>
                <?php foreach($users as $rows): ?>
                <tr>
                    <th scope="row"><? echo $i+1 ?></th>
                    <td>

                        <a href=""></a>

                        <div class="dropdown show">
                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php echo $rows[1] ." ".  $rows[2]; ?>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                <h6 class="dropdown-header">Ações</h6>
                                <a class="dropdown-item" href="./../views/alterar-user.php?id=<?php echo $rows[0]; ?>">Alterar</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="./../views/desativar-user.php?id=<?php echo $rows[0]; ?>">Excluir</a>
                            </div>
                        </div>

                    </td>
                    <td><?php echo $rows[4]; ?></td>
                    <td>
                        <?php if($rows[3] == 1): ?>
                            <div class="text-center">
                                <i class="fas fa-check text-success"></i> 
                            </div> 
                        <?php else: ?>
                            <div class="text-center">
                                <i class="fas fa-times text-secondary"></i> 
                            </div>
                        <?php endif; ?>     
                    </td>
                </tr>
                <?php $i++ ?>
                <?php endforeach; ?>
                <tr>
                    <th scope="row"><a href="./../views/cadastro.php"><i class="fas fa-plus"></i></a></th>
                    <td class="text-muted">Adicionar Usuário</td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
<?php include './partials/scripts.php';?>

</html>