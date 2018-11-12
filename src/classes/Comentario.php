<?php

class Comentario {

    private $evento_id;
    private $comentario;
    private $usuario_id;

    /* Getters */
    public function getEventoID() {
        return $this->evento_id;
    }

    public function getComentario() {
        return $this->comentario;
    }

    public function getUsuarioID() {
        return $this->usuario_id;
    }


    /* Setters */
    public function setEventoID($id) {
        $this->evento_id = $id;
    }

    public function setComentario($comentario) {
        $this->comentario = $comentario;
    }

    public function setUsuarioID($id) {
        $this->usuario_id = $id;
    }
}