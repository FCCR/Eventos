<?php

include_once(__DIR__ . "/../models/UsuarioDAO.php");
include_once(__DIR__ . "/../classes/Database.php");


$db = new Database();
$userDAO = new UsuarioDAO($db);

$users = $userDAO->getAllUsers();
