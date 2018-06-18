<?php

require_once "database.php";

class Responsavel{

	private $id_res;
	private $nome_res;
	private $telefone;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `responsavel` WHERE 1 ORDER BY `nome_res`");
		$stmt->execute();
		return $stmt;
	}
}


?>