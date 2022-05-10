<?php 

//para conversar com as classes
include_once'Conectar.php';
include_once'Controles.php';

class Imagem {

	private $id;
	private $nome;
	private $data_publicacao;
	private $id_categoria;
	private $nome_temp;
	private $con;//conexao
	private $ct;//controles
	private $caminho = "../img/categoria/";

		function getId(){
		return $this->id;
	}

		function getNome(){
		return $this->nome;
	}

		function getData_publicacao(){
		return $this->data_publicacao;
	}

		function getId_categoria(){
		return $this->id_categoria;
	}

			function getNome_temp(){
		return $this->nome_temp;
	}

		function setId($id){
		return $this->id = $id;
	}

		function setNome($nome){
		return $this->nome = $nome;
	}

		function setData_publicacao($data_publicacao){
		return $this->data_publicacao = $data_publicacao;
	}

		function setId_categoria($id_categoria){
		return $this->id_categoria = $id_categoria;
	}

		function setNome_temp($nome_temp){
		return $this->nome_temp = nome_temp;
	}


		function salvar(){
		try {
			$this->con = new Conectar();	
			$sql = "INSERT INTO imagem VALUES (null,?,?,?)";
			$executar = $this->con->prepare($sql);

			$executar->bindValue(1,$this->nome,PDO::PARAM_STR); 
			$executar->bindValue(2, date('Y-m-d'),PDO::PARAM_STR); 
			$executar->bindValue(3,$this->id_categoria,PDO::PARAM_INT); 

			return $executar->execute() == 1 ? TRUE : FALSE; 
			} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}

	function enviarArquivo(){
		$this->ct = new Controles();
		return $this->ct->enviarArquivo($this->nome_temp,)this->caminho . $this ->nome, "Imagem de Categoria");
	}

}