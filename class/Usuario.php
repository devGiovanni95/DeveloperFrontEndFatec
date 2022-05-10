<?php

include_once 'Conectar.php';
include_once 'Controles.php';

class Usuario {

    private $id;
    private $email;
    private $senha;
    private $con;

    function getId() {
        return $this->id;
    }

    function getEmail() {
        return $this->email;
    }

    function getSenha() {
        return $this->senha;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setSenha($senha) {
        $this->senha = $senha;
    }

    function consultar() {
        try {
            $this->con = new Conectar();
            if ($this->email != "" || $this->email != NULL) {
                $sql = "SELECT * FROM usuario where email = ? AND senha = ?";
                $ligacao = $this->con->prepare($sql);
                $ligacao->bindValue(1, $this->email, PDO::PARAM_STR);
                $ligacao->bindValue(2, sha1($this->senha), PDO::PARAM_STR);
            }

            if ($ligacao->execute() == 1) {
                return $ligacao->fetchColumn();
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function consultarAll() {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM usuario ORDER BY email";
            $ligacao = $this->con->prepare($sql);
            if ($ligacao->execute() == 1) {
                return $ligacao->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function excluir() {
        try {
            $this->con = new Conectar();
            $sql = "DELETE FROM usuario WHERE id = ?";
            $ligacao = $this->con->prepare($sql);
            $ligacao->bindValue(1, $this->getId(), PDO::PARAM_INT);
            if ($ligacao->execute() == 1) {
                return "Excluído com sucesso.";
            } else {
                return "Erro ao excluir.";
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function salvar() {
        try {
            $this->con = new Conectar();

            if ($this->getId() == NULL) {
                $sql = "INSERT INTO usuario VALUES (null, ?, ?)";
                $ligacao = $this->con->prepare($sql);
                $ligacao->bindValue(1, $this->email, PDO::PARAM_STR);
                $ligacao->bindValue(2, sha1($this->senha), PDO::PARAM_STR);
            } else {
                $sql = "UPDATE usuario SET email = ?, senha = ? WHERE id = ?";
                $ligacao = $this->con->prepare($sql);
                $ligacao->bindValue(1, $this->email, PDO::PARAM_STR);
                $ligacao->bindValue(2, $this->senha, PDO::PARAM_STR);
                $ligacao->bindValue(3, $this->id, PDO::PARAM_INT);
            }
            if ($ligacao->execute() == 1) {
                return "Cadastrado com sucesso.";
            } else {
                return "Erro ao cadastrar.";
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

    function consultarPorID($id) {
        try {
            $this->con = new Conectar();
            $sql = "SELECT * FROM usuario WHERE id = ?";
            $executar = $this->con->prepare($sql);
            $executar->bindValue(1, $id);

            if ($executar->execute() == 1) {
                return $executar->fetchAll();
            } else {
                return false;
            }
        } catch (PDOException $exc) {
            echo $exc->getMessage();
        }
    }

}
