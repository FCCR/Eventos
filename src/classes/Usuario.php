<?php

class Usuario {

    private $nome;
    private $sobrenome;
    private $email;
    private $senha;
    private $nascimento;
    private $sexo;
    private $admin;
    private $situacao;

    /* Getters */
    public function getNome() {
        return $this->nome;
    }

    public function getSobrenome() {
        return $this->sobrenome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNascimento() {
        return $this->nascimento;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getAdmin() {
        return $this->admin;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    /* Setters */
    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setSobrenome($sobrenome) {
        $this->sobrenome = $sobrenome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNascimento($nascimento) {
        $this->nascimento = $nascimento;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setAdmin($admin) {
        $this->admin = $admin;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
    }

    /* Methods */

}