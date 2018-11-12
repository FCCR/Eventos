<?php
session_start(); 

include_once(__DIR__ . "/../models/EventoDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$eventoDAO = new EventoDAO($db);

$eventos = $eventoDAO->Checkin($_SESSION['id'], $_SESSION['idEvento']);