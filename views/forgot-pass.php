<!DOCTYPE html>
<html lang="en">
<head>
<?php include './partials/head.php';?>
</head>
<body>
<div class="vh-100">
        <div class="row vh-100">
            <div class="col-lg-4 bg-success block">
                <div class="text-center text-white centered">
                    <h1>Eventos FCCR</h1>
                    <img src="../img/fccr_horizontal_white.png" width="150">
                </div>
            </div>
            <div class="col-lg-8 block">
                <form class="w-50 mx-auto centered" action="../src/controllers/verificaUsuario.php" method="POST">
                    <h4>Esqueci minha senha</h4>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-left mt-5">
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" class="form-control" id="nome" placeholder="Fulano" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group text-left mt-5">
                                <label for="sobrenome">Sobrenome</label>
                                <input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="da Silva">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="nome.sobrenome@fccr.sp.gov.br" required>
                        <small id="emailHelp" class="form-text text-muted text-right">
                            <a href="../views/index.php">Não precisa, eu lembrei a minha senha.</a>
                        </small>                  
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include './partials/scripts.php';?>
</html>