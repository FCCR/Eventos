<?php
// Incluindo arquivo de conexão
include_once("./../classes/Database.php");
 
$id = (int) $_GET['id'];
 
// Selecionando fotos
$stmt = $pdo->prepare('SELECT conteudo FROM fotos f JOIN fotos_evento fe ON f.id=fe.fotos_id WHERE fe.Eventos_id = :id');
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
 
// Se executado
if ($stmt->execute())
{
    // Alocando foto
    $foto = $stmt->fetchObject();
    
    // Se existir
    if ($foto != null)
    {
        // Definindo tipo do retorno
        header('Content-Type: '. $foto->tipo);
        
        // Retornando conteudo
        echo $foto->conteudo;
    }
}