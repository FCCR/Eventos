<?php

include_once(__DIR__ . "./../models/UsuarioDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Usuario.php");

$db      = new Database();
$userDAO = new UsuarioDAO($db);

$userDAO->isUser($_POST['email'], $_POST['nome']);


