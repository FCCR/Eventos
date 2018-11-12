<?php
session_start();

include_once(__DIR__ . "/../models/EventoDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$eventoDAO = new EventoDAO($db);

$infoevento = $eventoDAO->getEvento($_GET['id']);
$_SESSION['idEventoAlt'] = $_GET['id'];