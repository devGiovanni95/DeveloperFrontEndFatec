
<?php

include_once 'Conectar.php';

/**
 * 
 */
class Categoria{
	
	private $id;
	private $descricao;
	private $conn;

	function getId(){
		return $this->id;
	}

	function getDescricao(){
		return $this->descricao;
	}

	function setId($id) : void{
		$this->id = $id;
	}

	function setDescricao($descricao) : void{
		$this->descricao = $descricao;
	}

	function listar(){
		try {
			$this->conn = new Conectar();	
			$sql = "SELECT * FROM categoria";
			$executar = $this->conn->prepare($sql);

			if($executar->execute() == 1){
				return $executar->fetchAll();/*Retorno de consulta*/
			}else{
				return false;
			}		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

//mecher aki
function consultarPorID($id){
		try {
			$this->conn = new Conectar();	
			$sql = "SELECT * FROM categoria WHERE id = ?";
			$executar = $this->conn->prepare($sql);
			$executar->bindValue(1, $id);

			if($executar->execute() == 1){
				return $executar->fetchAll();
			}else{
				return false;
			}		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function excluir(){
		try {
			$this->conn = new Conectar();	
			$sql = "DELETE FROM categoria WHERE id = ?";
			$executar = $this->conn->prepare($sql);
			$executar->bindValue(1,$this->id,PDO::PARAM_INT); 

			if($executar->execute() == 1){
				return "Deletado com sucesso";
			}else{
				return "Erro ao excluir";
			}		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function salvar(){
		try {
			$this->conn = new Conectar();	
			$sql = "INSERT INTO categoria VALUES (null,?)";
			$executar = $this->conn->prepare($sql);
			$executar->bindValue(1,$this->descricao,PDO::PARAM_STR); 

			if($executar->execute() == 1){
				return "Cadastrado com sucesso";
			}else{
				return "Erro ao cadastrar";
			}		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

		function editar(){
		try {
			$this->conn = new Conectar();	
			$sql = "UPDATE categoria SET descricao = ? WHERE id = ?";

			$executar = $this->conn->prepare($sql);
			
			$executar->bindValue(1,$this->descricao,PDO::PARAM_STR); 
			$executar->bindValue(2,$this->id,PDO::PARAM_INT); 

			if($executar->execute() == 1){
				return "Atualizado com sucesso";
			}else{
				return "Erro ao atualizar";
			}		
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}



}