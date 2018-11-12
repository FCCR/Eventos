<?php

include_once(__DIR__ . "./../models/UsuarioDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Usuario.php");

$db = new Database();
$usuario = new Usuario();
$userDAO = new UsuarioDAO($db);

$usuario->setSituacao($_POST['situacao']);

$userDAO->deletarUsuario($usuario);