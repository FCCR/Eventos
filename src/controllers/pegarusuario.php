<?php

include_once(__DIR__ . "./../models/UsuarioDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Usuario.php");

$db = new Database();
$usuario = new Usuario();
$useraDAO = new UsuarioDAO($db);

$infouser = $useraDAO->getUserToAlt($_GET['id']);
$_SESSION['idAlt'] = $_GET['id'];

