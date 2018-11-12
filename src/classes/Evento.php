<?php

class Evento {

    private $titulo;
    private $local;
    private $endereco;
    private $inicio;
    private $fim;
    private $criador;
    private $situacao;

    /* Getters */
    public function getTitulo() {
        return $this->titulo;
    }

    public function getLocal() {
        return $this->local;
    }

    public function getEndereco() {
        return $this->endereco;
    }

    public function getInicio() {
        return $this->inicio;
    }

    public function getFim() {
        return $this->fim;
    }

    public function getCriador() {
        return $this->criador;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    /* Setters */
    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    public function setLocal($local) {
        $this->local = $local;
    }

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setInicio($inicio) {
        $this->inicio = $inicio;
    }

    public function setFim($fim) {
        $this->fim = $fim;
    }

    public function setCriador($criador) {
        $this->criador = $criador;
    }

    public function setSituacao($situacao) {
        return $this->situacao = $situacao;
    }
}