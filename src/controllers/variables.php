<?php

$man = "Bem vindo, ";
$woman = "Bem vinda, ";

$name = $_SESSION['nome'];
$lastname = $_SESSION['sobrenome'];


$frases= array(
  'Espero que o seu dia esteja sendo bom :)',
  'Como está indo o seu dia?',
  'Tenha um ótimo dia.'
);

$aleatorio = rand(0, count($frases) -1);