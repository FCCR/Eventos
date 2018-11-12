<?php 
    session_start(); 
    if(!$_SESSION['logged']) header('Location: ./index.php');

    include_once("./../src/controllers/variables.php");

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
            <h1 class="display-4">Check-in</h1>
            <p class="lead">Aqui você pode contribuir com as outras pessoas comentando sobre esse evento e adicionando fotos!</p>
        </div>
    </div>
     <hr style="width: 90%;">
    <div class="row">
            <div class="col-lg-6 border-right">
                <div class="text-center mb-3 ml-6">
                    <div class="form-group">
                        <label class="label">
                            <i class="fas fa-images"></i>
                            <span class="title">Adicionar Fotos</span>
                            <form action="../src/controllers/uploadImages.php?id=<?php echo $_GET['id'] ?>" method="POST" enctype="multipart/form-data">
                                <input type="file" name="arquivo" accept="image/png, image/jpeg" required multiple/>
                                <input type="submit" name="enviar" value="Enviar" />
                            </form>
                        </label>
                    </div>                  
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-2">
                    <h4>Comentários</h4>
                </div>
                <div class="ml-3">
                    <div class="row mt-3 ">

                    <div class="imagem">
                        <?php if($_SESSION['sexo'] == 'm'): ?> 
                            <img src="../img/img_avatar.png" class="ml-1 rounded-circle" width="50" height="50"> 
                        <?php else: ?>
                            <img src="../img/img_avatar2.png" class="ml-1 rounded-circle" width="50" height="50">
                        <?php endif; ?> 
                    </div>

                    <div class="coment w-90">
                        <form action="./../src/controllers/cadastroComentario.php" method="POST">
                        <input typ="text" name="id" value="<? echo $_GET['id'] ?>" hidden></input>
                        <input type="text" name="comentario" id="comentario" placeholder="O que você achou do evento?" class="w-80 ml-2 mt-3 comentario" required>
                        <button type="submit" class="btn-send" id="btn-send"><i class="fas fa-angle-right"></i></button>
                        </form>
                    </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>
</body>
    <?php include './partials/scripts.php';?>
</html>