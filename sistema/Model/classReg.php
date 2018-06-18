<?php

require_once "database.php";

class Registro{

	private $id_registro;
	private $confirmacao;
	private $horario_conf;
	private $medicamento_id_med;
	

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId_registro($value){
		$this->id_registro = $value;
	}

	function setConfirmacao($value){
		$this->confirmacao = $value;
	}

	function setHorario_conf($value){
		$this->horario_conf = $value;
	}

	function setMedicamento_id_med($value){
		$this->medicamento_id_med = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `registro`(`confirmacao`, `horario_conf`, `medicamento_id_med`) VALUES (:confirmacao, :horario_conf, :medicamento_id_med)");
			$stmt->bindParam(":confirmacao", $this->confirmacao);
			$stmt->bindParam(":horario_conf", $this->horario_conf);
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
			$stmt = $this->conn->prepare("UPDATE `registro` SET `confirmacao` = :confirmacao, `horario_conf` = :horario_conf, `medicamento_id_med` = :medicamento_id_med WHERE `id_registro` = :id_registro");
			$stmt->bindParam(":id_resgistro", $this->id_resgistro);
			$stmt->bindParam(":confirmacao", $this->confirmacao);
			$stmt->bindParam(":horario_conf", $this->horario_conf);
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
			$stmt = $this->conn->prepare("DELETE FROM `registro` WHERE `id_registro` = :id_registro");
			$stmt->bindParam(":id_registro", $this->id_registro);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `registro` WHERE `id_resgistro` = :id_resgistro");
		$stmt->bindParam(":id_resgistro", $this->id_resgistro);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `registro` WHERE 1 ORDER BY `confirmacao`");
		$stmt->execute();
		return $stmt;
	}

?>