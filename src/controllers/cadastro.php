<?php

include_once("./../models/UsuarioDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Usuario.php");

$db = new Database();
$usuario = new Usuario();
$userDAO = new UsuarioDAO($db);

if(!isset($_POST['admin'])) {
    $_POST['admin'] = 0;
}

$usuario->setNome($_POST['nome']);
$usuario->setSobrenome($_POST['sobrenome']);
$usuario->setEmail($_POST['email']);
$usuario->setSenha($_POST['senha']);
$usuario->setNascimento($_POST['nascimento']);
$usuario->setSexo($_POST['sexo']);
$usuario->setAdmin($_POST['admin']);
$usuario->setSituacao(0);

$userDAO->create($usuario);
