<?php

$nome      = $_SESSION['nome'];
$sobrenome = $_SESSION['sobrenome'];
$email     = $_SESSION['email'];
$senha     = $_SESSION['senha'];

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lembrete de senha para <? echo $nome ?></title>
</head>

<body>
    <p>Olá <? echo $nome ?>!</p>
    <p>A sua senha é <? echo $senha ?></p>
</body>

</html>