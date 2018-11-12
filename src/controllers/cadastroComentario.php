<?php
session_start();

include_once("./../models/ComentarioDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Comentario.php");

$db = new Database();
$comentario = new Comentario();
$comentarioDAO = new ComentarioDAO($db);

$comentario->setEventoID($_POST['id']);
$comentario->setComentario($_POST['comentario']);
$comentario->setUsuarioID($_SESSION['id']);

$comentarioDAO->create($comentario);
