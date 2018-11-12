<?php

class EventoDAO {

    private $conexaoDB;
    private $ultimoid;

    public function getLastId(){
        return $this->ultimoid;
    }

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }
    
    public function create($_evento) {
        try {
            $titulo     = $_evento->getTitulo();
            $local      = $_evento->getLocal();
            $endereco   = $_evento->getEndereco();
            $inicio     = $_evento->getInicio();
            $fim        = $_evento->getFim();
            $criador    = $_evento->getCriador();

            $sql = "INSERT INTO eventos (titulo, local, endereco, inicio, fim, criador)
                VALUES ('$titulo', '$local', '$endereco', '$inicio', '$fim', '$criador')";
            
            $this->_conexaoDB->exec($sql);
            $this->ultimoid = $this->_conexaoDB->lastInsertId();
            return $this->ultimoid;
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    } 

    public function getEvento($id) {
        try {
            $sql = "SELECT titulo, endereco, local, DATE_FORMAT(eventos.inicio, '%d/%m/%Y às %H:%ih') as inicio, fim 
            FROM eventos WHERE id = '$id'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getAllEvents() {
        try {
            $sql = "SELECT eventos.id, eventos.titulo, DATE_FORMAT(eventos.inicio, '%d/%m/%Y às %H:%i'), 
            eventos.local, usuario.nome FROM eventos 
            JOIN usuario ON eventos.criador = usuario.id 
            WHERE eventos.situacao = 0";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getAllEventsForUser() {
        try {
            $sql = "SELECT eventos.id, eventos.titulo, DATE_FORMAT(eventos.inicio, '%d/%m/%Y às %H:%i'), 
            eventos.local, usuario.nome, permissao.Usuario_id FROM eventos 
            JOIN usuario ON eventos.criador = usuario.id  
            JOIN permissao ON eventos.id = permissao.Eventos_id 
            WHERE eventos.situacao = 0 AND Usuario_id = $_SESSION[id]";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function getChecksInFull($id) {
        try {
            $sql = "SELECT eventos.id, eventos.titulo, DATE_FORMAT(eventos.inicio, '%d/%m/%Y às %H:%i'), eventos.local, usuario.nome FROM eventos
            JOIN usuario ON eventos.criador = usuario.id
            JOIN participantes WHERE participantes.Usuario_id = '$id' AND eventos.id = participantes.Eventos_id";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }
    }

    public function Checkin($idUsuario, $idEvento){
        try{
            $sql = "INSERT INTO participantes (eventos_id, usuario_id) VALUES ('$idEvento', '$idUsuario')";
            
            $result = $this->_conexaoDB->exec($sql);
            header('Location: ./../../views/checkins.php');
        } catch(PDOException $e) {
            echo "Falha: {$e}";
        }


    }

    public function getParticipante($idUsuario, $idEvento){
        try{
            $sql = "SELECT eventos_id, usuario_id FROM participantes 
            WHERE eventos_id = '$idEvento' AND usuario_id = '$idUsuario'";
            
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if ($rows){
                return $rows;
            } else {
                return false;
            }
        
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function updateE($evento) {
        try {
            session_start();
            $titulo         = $evento->getTitulo();
            $local          = $evento->getLocal();
            $endereco       = $evento->getEndereco();
            $inicio         = $evento->getInicio();
            $fim            = $evento->getFim();

            $sql = "UPDATE eventos
                    SET titulo = '$titulo', local = '$local', 
                    endereco = '$endereco', inicio = '$inicio', fim = '$fim' 
                    WHERE id = $_SESSION[idEventoAlt]";
            $this->_conexaoDB->exec($sql);
            
            $_SESSION['titulo']         = $titulo;
            $_SESSION['local']          = $local;
            $_SESSION['endereco']       = $endereco;
            $_SESSION['inicio']         = $inicio;
            $_SESSION['fim']            = $fim;
            
            header('Location: ./../../views/eventos.php');
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function desativarEvento($evento){
        try {
            session_start();
            $situacao   = $evento->getSituacao();
            
            $sql = "UPDATE eventos
                    SET situacao = '$situacao' WHERE id = $_SESSION[idEventoAlt]";
            $this->_conexaoDB->exec($sql);
        
            header('Location: ./../../views/eventos.php');
            
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        
        } 
        }
    

}
