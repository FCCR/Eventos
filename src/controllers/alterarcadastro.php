<?php

include_once("./../models/UsuarioDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Usuario.php");

$db = new Database();
$usuario = new Usuario();
$userDAO = new UsuarioDAO($db);

$usuario->setNome($_POST['nome']);
$usuario->setSobrenome($_POST['sobrenome']);
$usuario->setEmail($_POST['email']);
$usuario->setSenha($_POST['senha']);
$usuario->setNascimento($_POST['nascimento']);
$usuario->setSexo($_POST['sexo']);


$userDAO->update($usuario);
