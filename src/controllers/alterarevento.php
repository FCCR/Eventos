<?php
session_start();

include_once(__DIR__ . "./../models/EventoDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Evento.php");

$db = new Database();
$evento = new Evento();
$eventoDAO = new EventoDAO($db);

$evento->setTitulo($_POST['titulo']);
$evento->setLocal($_POST['local']);
$evento->setEndereco($_POST['endereco']);
$evento->setInicio($_POST['inicio']);
$evento->setFim($_POST['fim']);

$eventoDAO->updateE($evento);