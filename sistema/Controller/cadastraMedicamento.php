<?php 

require_once 'Model/classMed.php';
require_once 'Model/classRes.php';

$medicamento = new Medicamento();
$responsavel = new Responsavel();


	if(isset($_POST['insert'])){
		$medicamento->setNome_med($_POST['nome_med']);
		$medicamento->setHorario($_POST['horario']);
		$medicamento->setFrequencia($_POST['frequencia']);
		$medicamento->setComp_med($_POST['comp_med']);
		$medicamento->setRes_med($_POST['res_med']);
		if($medicamento->insert() == 1){
			$result = "Medicamento inserid_medo com sucesso.";
		}else{
			$error = "Erro ao inserir, tente novamente!";
		}
	}

	if(isset($_POST['edit'])){
		$medicamento->setId_med($_POST['id_med']);
		$medicamento->setNome_med($_POST['nome_med']);
		$medicamento->setHorario($_POST['horario']);
		$medicamento->setFrequencia($_POST['frequencia']);
		$medicamento->setComp_med($_POST['comp_med']);
		$medicamento->setRes_med($_POST['res_med']);
		if($medicamento->edit() == 1){
			$result = "Medicamento editado com sucesso.";
		}else{
			$error = "Erro ao editar, tente novamente!";
		}
	}

	if(isset($_POST['delete'])){
		$medicamento->setId_med($_POST['id_med']);

		if($medicamento->delete($_POST['id_med']) == 1){
			$result = "Medicamento deletado com sucesso.";
		}else{
			$error = "Erro ao deletar, tente novamente!";
		}
	}

	if (isset($_GET['id_med'])) {
		$medicamento->setId_med($_GET['id_med']);
		$row = $medicamento->view();

		if (isset($result)) {
			echo "O medicamento ID(" . $result . ") foi editado<br>";
		}
	}
?>
