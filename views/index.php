<?php 
    session_start();
    if(isset($_SESSION['logged']) && $_SESSION['logged']) {
     header('Location: ./home.php');
    }
?>
<!DOCTYPE html>
<html>

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
                <form class="w-50 mx-auto centered" action="../src/controllers/login.php" method="POST">
                    <h4>Login</h4>
                    <div class="form-group text-left mt-5">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="nome.sobrenome@fccr.sp.gov.br" required>
                        <small id="emailHelp" class="form-text text-muted">
                            Não tem uma conta? Crie uma com o chefe do seu setor :)
                        </small>
                    </div>
                    <div class="form-group text-left">
                        <label for="Password">Senha</label>
                        <input name="senha" type="password" class="form-control" id="Password" placeholder="Digite sua senha" required>
                        <small id="emailHelp" class="form-text text-muted text-right">
                            <a href="../views/forgot-pass.php">Esqueceu a sua senha?</a>
                        </small>
                    </div>
                    <button type="submit" class="btn btn-success">Entrar</button>
                </form>
            </div>
        </div>
    </div>
</body>
<?php include './partials/scripts.php';?>
</html>