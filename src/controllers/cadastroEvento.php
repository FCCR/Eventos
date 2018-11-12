<?php
session_start();

include_once("./../models/EventoDAO.php");
include_once("./../classes/Database.php");
include_once("./../classes/Evento.php");

$db = new Database();
$evento = new Evento();
$eventoDAO = new EventoDAO($db);

$evento->setTitulo($_POST['titulo']);
$evento->setLocal($_POST['local']);
$evento->setEndereco($_POST['endereco']);
$evento->setInicio($_POST['inicio']);
$evento->setFim($_POST['fim']);
$evento->setCriador($_SESSION['id']);

$eventoDAO->create($evento);

$lastid = $eventoDAO->getLastId();

foreach ($_POST['user'] as $valor) {
  $sql = "INSERT INTO permissao (Eventos_id, Usuario_id) VALUES ('$lastid', '$valor')";
  $eventoDAO->_conexaoDB->exec($sql);
  }

header('Location: ./../../views/eventos.php');

