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
    <div class="vh-100">
        <div class="row vh-100">
            <div class="col-lg-6  block border-right">
                <div class="text-center centered ">
                    <h1> Alterar Cadastro</h1>
                </div>
            </div>
            <div class="col-lg-6 block">
                <form class="w-80 mx-auto centered" action="../src/controllers/alterarcadastro.php" method="POST">
                    <h4>Alterar Cadastro</h4>
                    <div class="row">
                        <div class="col">
                            <div class="form-group text-left mt-3">
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" class="form-control" id="nome" placeholder="Fulano" value="<? echo $_SESSION['nome'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group text-left mt-3">
                                <label for="sobrenome">Sobrenome</label>
                                <input name="sobrenome" type="text" class="form-control" id="sobrenome" placeholder="da Silva" value="<? echo $_SESSION['sobrenome'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group text-left">
                        <label for="Email">Email</label>
                        <input name="email" type="email" class="form-control" id="Email" aria-describedby="emailHelp"
                            placeholder="nome.sobrenome@fccr.sp.gov.br" value="<? echo $_SESSION['email'] ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="nascimento">Data de Nascimento</label>
                        <input name="nascimento" type="date" class="form-control" id="nascimento" placeholder="Digite sua senha" value="<? echo $_SESSION['nascimento'] ?>">
                    </div>
                    <div class="form-group text-left">
                        <label for="Password">Senha</label>
                        <input name="senha" type="password" class="form-control" id="Password" placeholder="Escolha uma senha">
                    </div>
                    <div class="form-group">
                        <div class="form-check  form-check-inline">
                            <? if($_SESSION['sexo'] == 'm'): ?>
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="m"
                                    checked>
                            <? else: ?>
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="m">
                            <? endif; ?>
                                <label class="form-check-label" for="exampleRadios1">
                                    Masculino
                                </label>
                        </div>
                        <div class="form-check  form-check-inline">
                        <? if($_SESSION['sexo'] == 'f'): ?>
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="f"
                                    checked>
                            <? else: ?>
                                <input class="form-check-input" type="radio" name="sexo" id="exampleRadios1" value="f">
                            <? endif; ?>
                            <label class="form-check-label" for="exampleRadios2">
                                Feminino
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Alterar</button>
                </form>
            </div>
        </div>
    </div>
</body>
    <?php include './partials/scripts.php';?>
</html>