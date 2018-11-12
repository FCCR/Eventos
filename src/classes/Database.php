<?php

class Database extends PDO {
    private $string_connect = "mysql:host=127.0.0.1;dbname=eventos_fccr";
    private $username = "root";
    private $pass = "root";
    private $options = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    private $conexao;

    public function __construct() {
        try {
            $this->conexao = parent::__construct($this->string_connect, $this->username, $this->pass, $this->options);
            return $this->conexao;
        } catch(PDOException $e) {
            echo "<b>EVENTOS FCCR:</b> Não foi possível realizar conexão <br> Falha: " . $e->getMessage();
        }
    }

    public function getConnection() {
        return $this->conexao;
    }

    public function __destruct() {
        $this->conexao = null;
    }


}