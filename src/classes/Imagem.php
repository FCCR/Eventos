<?php

class Imagem {

    private $nome;
    private $conteudo;
    private $arquivo;
    private $tamanho;
    private $tipo;
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

    public function getArquivo() {
        return $this->arquivo;
    }

    public function getTamanho() {
        return $this->tamanho;
    }

    public function getTipo() {
        return $this->tipo;
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
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setConteudo($conteudo) {
        $this->conteudo = $conteudo;
    }

    public function setArquivo($arquivo) {
        $this->arquivo = $arquivo;
    }

    public function setTamanho($tamanho) {
        $this->tamanho = $tamanho;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
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