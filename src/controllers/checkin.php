<?php
  if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

include_once(__DIR__ . "/../models/EventoDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$eventoDAO = new EventoDAO($db);

$eventos = $eventoDAO->getChecksInFull($_SESSION['id']);