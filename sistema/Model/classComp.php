<?php

require_once "database.php";

class Compartimento{

	private $id_compart;
	private $quantidade;
	private $num_compart;
	private $medicamento_id_med;
	

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId_compart($value){
		$this->id_compart = $value;
	}

	function setQuantidade($value){
		$this->quantidade = $value;
	}

	function setNum_compart($value){
		$this->num_compart = $value;
	}

	function setMedicamento_id_med($value){
		$this->medicamento_id_med = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `compartimento`(`quantidade`, `num_compart`, `medicamento_id_med`) VALUES (:quantidade, :num_compart, :medicamento_id_med)");
			$stmt->bindParam(":quantidade", $this->quantidade);
			$stmt->bindParam(":num_compart", $this->num_compart);
			$stmt->bindParam(":medicamento_id_med", $this->medicamento_id_med);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `compartimento` SET `quantidade` = :quantidade, `num_compart` = :num_compart, `medicamento_id_med` = :medicamento_id_med WHERE `id_compart` = :id_compart");
			$stmt->bindParam(":id_compart", $this->id_compart);
			$stmt->bindParam(":quantidade", $this->quantidade);
			$stmt->bindParam(":num_compart", $this->num_compart);
			$stmt->bindParam(":medicamento_id_med", $this->medicamento_id_med);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `compartimento` WHERE `id_compart` = :id_compart");
			$stmt->bindParam(":id_compart", $this->id_compart);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `compartimento` WHERE `id_compart` = :id_compart");
		$stmt->bindParam(":id_compart", $this->id_compart);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `compartimento` WHERE 1 ORDER BY `num_compart`");
		$stmt->execute();
		return $stmt;
	}

?>