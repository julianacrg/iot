<?php

require_once "database.php";

class Medicamento{

	private $id_med;
	private $nome_med;
	private $dosagem;
	private $horario;
	private $frequencia;
	private $tempo;

	public function __construct() {
		$database = new Database();
		$dbSet = $database->dbSet();
		$this->conn = $dbSet;
	}

	function setId_med($value){
		$this->id_med = $value;
	}

	function setNome_med($value){
		$this->nome_med = $value;
	}

	function setDosagem($value){
		$this->dosagem = $value;
	}

	function setHorario($value){
		$this->horario = $value;
	}

	function setFrequencia($value){
		$this->frequencia = $value;
	}

	function setTempo($value){
		$this->tempo = $value;
	}


	public function insert(){
		try{
			$stmt = $this->conn->prepare("INSERT INTO `medicamento`(`nome_med`, `dosagem`, `horario`,`frequencia`,`tempo`) VALUES (:nome_med, :dosagem, :horario, :frequencia, :tempo)");
			$stmt->bindParam(":nome_med", $this->nome_med);
			$stmt->bindParam(":dosagem", $this->dosagem);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":frequencia", $this->frequencia);
			$stmt->bindParam(":tempo", $this->tempo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function edit(){
		try{
			$stmt = $this->conn->prepare("UPDATE `medicamento` SET `nome_med` = :nome_med, `dosagem` = :dosagem, `horario` = :horario, `frequencia` = :frequencia, `tempo` = :tempo WHERE `id_med` = :id_med");
			$stmt->bindParam(":id_med", $this->id_med);
			$stmt->bindParam(":nome_med", $this->nome_med);
			$stmt->bindParam(":dosagem", $this->dosagem);
			$stmt->bindParam(":horario", $this->horario);
			$stmt->bindParam(":frequencia", $this->frequencia);
			$stmt->bindParam(":tempo", $this->tempo);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}
	
	public function delete(){
		try{
			$stmt = $this->conn->prepare("DELETE FROM `medicamento` WHERE `id_med` = :id_med");
			$stmt->bindParam(":id_med", $this->id_med);
			$stmt->execute();
			return 1;
		}catch(PDOException $e){
			echo $e->getMessage();
			return 0;
		}
	}

	public function view(){
		$stmt = $this->conn->prepare("SELECT * FROM `medicamento` WHERE `id_med` = :id_med");
		$stmt->bindParam(":id_med", $this->id_med);
		$stmt->execute();
		$row = $stmt->fetch(PDO::FETCH_OBJ);
		return $row;
	}

	public function index(){
		$stmt = $this->conn->prepare("SELECT * FROM `medicamento` WHERE 1 ORDER BY `nome_med`");
		$stmt->execute();
		return $stmt;
	}

	//A função abaixo conta a quantidade de cadastros na tabela
    public function contador(){
        $query = "SELECT count(*) FROM `medicamento` WHERE 1";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchColumn();
    }
}
?>