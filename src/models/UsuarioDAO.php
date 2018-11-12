<?php


class UsuarioDAO {

    private $conexaoDB;

    public function __construct($db) {
        $this->_conexaoDB = $db;
    }

    public function create($_usuario) {
        try {
            $nome       = $_usuario->getNome();
            $sobrenome  = $_usuario->getSobrenome();
            $email      = $_usuario->getEmail();
            $senha      = $_usuario->getSenha();
            $nascimento = $_usuario->getNascimento();
            $sexo       = $_usuario->getSexo();
            $admin      = $_usuario->getAdmin();
            $situacao   = $_usuario->getSituacao();

            $sql = "INSERT INTO usuario (nome, sobrenome, email, senha, nascimento, sexo, admin_site, situacao)
                VALUES ('$nome', '$sobrenome', '$email', '$senha', '$nascimento', '$sexo','$admin', '$situacao')";
            $this->_conexaoDB->exec($sql);
            header('Location: ./../../views/users.php');
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function login($email, $senha) {
        try {
            $sql = "SELECT nome, sobrenome, email, sexo, nascimento, id, admin_site FROM usuario
            WHERE email = '$email' AND senha = '$senha' AND situacao = 0";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows[0]) {
                session_start();
                $_SESSION['nome']           = $rows[0][nome];
                $_SESSION['sobrenome']      = $rows[0][sobrenome];
                $_SESSION['sexo']           = $rows[0][sexo];
                $_SESSION['email']          = $rows[0][email];
                $_SESSION['admin']          = $rows[0][admin_site];
                $_SESSION['nascimento']     = $rows[0][nascimento];
                $_SESSION['id']             = $rows[0][id];
                $_SESSION['logged']         = true;
                header('Location: ./../../views/home.php'); 
            } else {
                $_SESSION['success'] = false;
                header('Location: ./../../views/failedlogin.php');
            }
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function getAllUsers() {
        try {
            $sql = "SELECT id, nome, sobrenome, admin_site, email FROM usuario WHERE situacao = 0";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();
            if($rows) {
                return $rows;
            } 
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }

    public function update($_usuario) {
        try {
            session_start();
            $nome       = $_usuario->getNome();
            $sobrenome  = $_usuario->getSobrenome();
            $email      = $_usuario->getEmail();
            $senha      = $_usuario->getSenha();
            $nascimento = $_usuario->getNascimento();
            $sexo       = $_usuario->getSexo();

            $sql = "UPDATE usuario
                    SET nome = '$nome', sobrenome = '$sobrenome', 
                    email = '$email', senha = '$senha', nascimento = '$nascimento', 
                    sexo = '$sexo' WHERE id = $_SESSION[id]";
            $this->_conexaoDB->exec($sql);
            
            $_SESSION['nome']       = $nome;
            $_SESSION['sobrenome']  = $sobrenome;
            $_SESSION['email']      = $email;
            $_SESSION['senha']      = $senha;
            $_SESSION['nascimento'] = $nascimento;
            $_SESSION['sexo']       = $sexo;
            
            header('Location: ./../../views/home.php');
        } catch(PDOException $e) {
            echo "Falha: {$e->getMessage()}";
        }
    }
    
    public function getUserToAlt($id) {
        try {
            $sql = "SELECT nome, sobrenome, email, senha, nascimento, sexo, admin_site
                    FROM usuario WHERE id = '$id'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if($rows) {
                return $rows;
            } 

        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }
    }

    public function isUser($email, $nome) {
        try {
            $sql = "SELECT nome, sobrenome, email, senha
                    FROM usuario WHERE email = '$email' AND nome = '$nome'";
            $result = $this->_conexaoDB->query($sql);
            $rows = $result->fetchAll();

            if($rows[0]) {
                session_start();
                $_SESSION['nome']           = $rows[0][nome];
                $_SESSION['sobrenome']      = $rows[0][sobrenome];
                $_SESSION['email']          = $rows[0][email];
                $_SESSION['senha']          = $rows[0][senha];
                header('Location: ../../mailer.php'); 
            } else {
                echo "<script>alert ('Ops, a gente não achou ninguem com esses dados, tem certeza que tá tudo certo?');</script>";
                echo "<script>javascript:history.back()</script>";
            }

        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }
    }
            
    public function updateUserAdmin($usuario) {
        try {
            session_start();
            $nome       = $usuario->getNome();
            $sobrenome  = $usuario->getSobrenome();
            $email      = $usuario->getEmail();
            $senha      = $usuario->getSenha();
            $nascimento = $usuario->getNascimento();
            $sexo       = $usuario->getSexo();
            $admin      = $usuario->getAdmin();
            
            $sql = "UPDATE usuario
                    SET nome = '$nome', sobrenome = '$sobrenome', 
                    email = '$email', senha = '$senha', nascimento = '$nascimento', 
                    sexo = '$sexo', admin_site = '$admin' WHERE id = '$_SESSION[idAlt]'";
            $this->_conexaoDB->exec($sql);
                        
            header('Location: ./../../views/users.php');
            } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
                    }
                } 
    
    public function contadorEventos(){
        try {
            $sql = "SELECT COUNT(*) as contador FROM permissao 
                    JOIN eventos ON permissao.Eventos_id = eventos.id 
                    WHERE permissao.Usuario_id = '$_SESSION[id]' AND eventos.situacao = 0";
            $result = $this->_conexaoDB->query($sql);
            $numero = $result->fetch();

            $contagem = $numero['contador'];

            return $contagem;
        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }
        
    }

    public function contadorCheckin(){
        try {
            $sql = "SELECT COUNT(*) as contador FROM participantes WHERE Usuario_id = '$_SESSION[id]'";
            $result = $this->_conexaoDB->query($sql);
            $numero = $result->fetch();

            $contagem = $numero['contador'];

            return $contagem;

        } catch(PDOException $e){
                echo "Falha: {$e->getMessage()}";
        }
    }

    public function contadorComentario(){
        try {
            $sql = "SELECT COUNT(DISTINCT Eventos_id) as contador FROM comentario WHERE Usuario_id = '$_SESSION[id]'";
            $result = $this->_conexaoDB->query($sql);
            $numero = $result->fetch();

            $contagem = $numero['contador'];

            return $contagem;

        } catch(PDOException $e) {
                echo "Falha: {$e->getMessage()}";
        }

    }

    public function deletarUsuario($usuario){
        try {
            session_start();
            $situacao = $usuario->getSituacao();

            $sql = "UPDATE usuario SET situacao = '$situacao' WHERE id = '$_SESSION[idAlt]'";
            $result = $this->_conexaoDB->exec($sql);

            if($result){
                header('Location: ./../../views/users.php');
            } else {
                echo "Falha no processamento do banco de dados.";
            }
        } catch(PDOException $e){
                echo "Falha: {$e->getMessage()}";
        }
    }


}


