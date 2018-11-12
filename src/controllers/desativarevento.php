<?php
session_start();

include_once(__DIR__ . "./../models/EventoDAO.php");
include_once(__DIR__ . "./../classes/Database.php");
include_once(__DIR__ . "./../classes/Evento.php");

$db = new Database();
$evento = new Evento();
$eventoDAO = new EventoDAO($db);

$evento->setSituacao($_POST['situacao']);

$eventoDAO->desativarEvento($evento);