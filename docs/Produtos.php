<?php

require_once 'Crud.php';

class Produtos extends Crud{
	
	protected $table = 'produto';
	private $nome;
	private $descricao;
	private $valor;

	public function setNome($nome){
		$this->nome = $nome;
	}

	public function getNome(){
		return $this->nome;
	}

	public function setDescricao($descricao){
		$this->descricao = $descricao;
	}

	public function setValor($valor){
		$this->valor = $valor;
	}

	public function insert(){

		$sql  = "INSERT INTO $this->table (nome, descricao, valor) VALUES (:nome, :descricao, :valor)";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':descricao', $this->descricao);
		$stmt->bindParam(':valor', $this->valor);
		return $stmt->execute(); 

	}

	public function update($id){

		$sql  = "UPDATE $this->table SET nome = :nome, descricao = :descricao, valor = :valor WHERE id = :id";
		$stmt = DB::prepare($sql);
		$stmt->bindParam(':nome', $this->nome);
		$stmt->bindParam(':descricao', $this->descricao);		
		$stmt->bindParam(':valor', $this->valor);
		$stmt->bindParam(':id', $id);
		return $stmt->execute();

	}

}