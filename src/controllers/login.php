<?php

include_once("./../models/UsuarioDAO.php");
include_once("./../classes/Database.php");

$db = new Database();
$userDAO = new UsuarioDAO($db);


// Chamar função para validar usuário
$userDAO->login($_POST['email'], $_POST['senha']);
