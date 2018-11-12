<?php

class Imagem {

    private $nome;
    private $conteudo;
    private $fotos_id;
    private $Eventos_id;
    private $Usuario_id;

    /* Getters */
    public function getNome() {
        return $this->nome;
    }

    public function getConteudo() {
        return $this->conteudo;
    }

    public function getfotosID() {
        return $this->fotos_id;
    }

    public function getEventos_id() {
        return $this->Eventos_id;
    }

    public function getUsuarioID() {
        return $this->Usuario_id;
    }


    /* Setters */
    public function setNome($id) {
        $this->nome = $id;
    }

    public function setConteudo($id) {
        $this->conteudo = $id;
    }

    public function setfotosID($id) {
        $this->fotos_id = $id;
    }

    public function setEventos_id($Eventos_id) {
        $this->Eventos_id = $Eventos_id;
    }

    public function setUsuarioID($id) {
        $this->Usuario_id = $id;
    }

}