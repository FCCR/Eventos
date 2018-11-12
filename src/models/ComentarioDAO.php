<?php

class ComentarioDAO {

    private $conexaoDB;

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }

    public function create($_comentario) {
        try {
            $eventoID   = $_comentario->getEventoID();
            $comentario = $_comentario->getComentario();
            $usuarioID  = $_comentario->getUsuarioID();

            $sql = "INSERT INTO comentario (eventos_id, usuario_id, comentario)
                VALUES ($eventoID, $usuarioID, '$comentario')";
            $this->_conexaoDB->exec($sql);
            header('Location: ./../../views/evento.php?id=' . $eventoID . '?sucesso=true');
        } catch (PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getComentarioByEvento($id) {
        try {
            $sql = "SELECT eventos_id, comentario, usuario_id, usuario.nome, usuario.sexo, contador FROM comentario
            JOIN usuario ON comentario.usuario_id = usuario.id WHERE eventos_id = '$id' ORDER BY contador DESC";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }
}
