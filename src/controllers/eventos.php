<?php

include_once(__DIR__ . "/../models/EventoDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$eventoDAO = new EventoDAO($db);

$eventos = $eventoDAO->getAllEventsForUser();
$allEvents = $eventoDAO->getAllEvents();
