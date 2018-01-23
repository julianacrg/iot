<?php 

require_once 'php/classMed.php';

$medicamento = new Medicamento();

	if(isset($_POST['insert'])){
		$medicamento->setNome_med($_POST['nome_med']);
		$medicamento->setDosagem($_POST['dosagem']);
		$medicamento->setHorario($_POST['horario']);
		$medicamento->setFrequencia($_POST['frequencia']);
		$medicamento->setTempo($_POST['tempo']);
		if($medicamento->insert() == 1){
			$result = "Medicamento inserid_medo com sucesso.";
		}else{
			$error = "Erro ao inserir, tente novamente!";
		}
	}

	if(isset($_POST['edit'])){
		$medicamento->setId_med($_POST['id_med']);
		$medicamento->setNome_med($_POST['nome_med']);
		$medicamento->setDosagem($_POST['dosagem']);
		$medicamento->setHorario($_POST['horario']);
		$medicamento->setFrequencia($_POST['frequencia']);
		$medicamento->setTempo($_POST['tempo']);
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

<div class="container" style="margin-left: 15px;">
			<div class="row section-separator">
				<h3 id_med="h3_medicamentos" class="section-heading">Medicamentos</h3>
				<div class="row" id_med="row_medicamentos">
					<?php
					if (isset($result)) {
						?>
						<div class="alert alert-success">
							<?php echo $result; ?>
						</div>
						<?php
					}else if(isset($error)){
						?>
						<div class="alert alert-danger">
							<?php echo $error; ?>
						</div>
						<?php
					}
					?>
					<form id_med="medicamento" name="medicamento" method="post" action="medicamentos.php">
						<div class="form-group">
							<input type="text" name="nome_med" id_med="nome_med" class="form-text" placeholder="Nome" required>
							<br><br><input type="text" name="dosagem" id_med="dosagem" class="form-text" placeholder="Dosagem" required>
							<br><br><input type="text" name="horario" id_med="horario" class="form-text" placeholder="Horario" required>
							<br><br><input type="text" name="frequencia" id_med="frequencia" class="form-text" placeholder="Frequencia" required>
							<br><br><input type="text" name="tempo" id_med="tempo" class="form-text" placeholder="Tempo" required>
							<br><br><button type="submit" name="insert" class="btn btn-secondary btn-sm" style="margin-top: -10px; margin-left: 30px;">Adicionar Medicamento</button>
						</div>
					</form>
					<table id_med="table_medicamentos" border="1">
						<tr border"1" bgcolor="#2e4868" bgcolor="">
							<td id_med="td_medicamentos">
								<p id_med="p_medicamentos" style="margin-top: 9px;">Medicamentos</p>
							</td>
							<td id_med="td_medicamentos">
								<p id_med="p_medicamentos" style="margin-top: 9px;">Ações</p>
							</td>
						</tr>
						<?php
						$stmt = $medicamento->index();
						while($row = $stmt->fetch(PDO::FETCH_OBJ)){
							?>
							<tr border="1">
								<form id_med="medicamento" name="medicamento" method="post" action="medicamentos.php" onsubmit="return confirm('Confirmar ação?')">
									<td id_med="td_medicamentos">
										<div class="form-group">
											<br><input type="text" name="nome_med" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $row->nome_med; ?>" required>
										</div>
									</td>
									<td id_med="td_medicamentos">
										<input type="hid_medden" name="id_med" value="<?php echo $row->id_med; ?>" required>
										<button type="submit" name="edit" class="btn btn-success btn-sm" style="background-color: #47a447; margin-top: 10px;">Editar</button>
										<button type="submit" name="delete" class="btn btn-danger btn-sm" style="margin-top: 10px;">Excluir</button>
										<!--<button type="button" id_med="excluir" class="btn btn-secondary btn-sm" onclick="confirma(<?php echo $row->id_med ?>)">Excluir</button>-->

										<!--<div onclick="confirma(<?php echo $row->id_med ?>)"><input type="button" class="btn btn-danger btn-sm" id_med="excluir" value="Excluir"> </div>-->
									</td>
								</form>
							</tr>
							<?php
						}
						?>
					</table>
				</div>
			</div>
		</div>