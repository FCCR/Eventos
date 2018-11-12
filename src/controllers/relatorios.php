<?php

include_once(__DIR__ . "./../models/UsuarioDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Usuario.php");

$db = new Database();
$usuario = new Usuario();
$usuarioDAO = new UsuarioDAO($db);

$cont = $usuarioDAO->contadorEventos();
$cont2 = $usuarioDAO->contadorCheckin();
$cont3 = $usuarioDAO->contadorComentario();

