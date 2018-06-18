<?php

require_once 'Controller/cadastraMedicamento.php';

?>

<!DOCTYPE html>
<html>
	<!--Cabeçalho da pagina
	Aqui inclui a importação de arquivos externos-->
	<head >
		<link rel="shortcut icon" href="/images/favicon.png" type="image/x-icon"/>
		<link href="images/favcon.png" rel="icon"/>
		<a name="top"></a>
		<title>Cadastro de medicamento</title>
		<meta charset="utf-8">
  		<meta name="viewport" content="width=device-width, initial-scale=1">
  		<link rel="stylesheet" href="css/bootstrap.css">
  		<link rel="stylesheet" href="css/lightbox.css">
  		<link href="http://s3.amazonaws.com/codecademy-content/courses/ltp/css/shift.css" rel="stylesheet">   
  		<link rel="stylesheet" href="css/style.css" >
  		
  		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  		<script src="js/lightbox.min.js"></script>
  		<script src="js/jquery.js"></script>
  		<script src="js/bootstrap.js"></script>
  		<script type="text/javascript" src="js/functions.js" lenguage="javascript"></script>
	</head>
		
	<!--Corpo da pagina-->
	<body>
		<div class="container-fluid">
			<header class="row">
				<!-- MENU -->			    
			      <nav class="navbar navbar-default navbar-fixed-top">			        
			          <div class="navbar-header">
			          	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>                        
						</button>						
			            <a class="navbar-brand" href="index.html"><img class="img-responsive" width=50 height=50 src="images/logo.jpg"> </a>
			          </div>
			          <div class="collapse navbar-collapse pull-right" id="myNavbar">
			 				<ul class="nav">
  						<li class="active"><a href="index.html" >Inicio</a></li>
 						 <li><a href="index.html" >Medicamentos</a></li>
						  <li><a href="cadastro.html"  >Cadastro</a></li>
						
 						 

						</ul>			        
			          </div><!-- colapse -->					        
			      </nav></br></br></br>    			    
			    <!-- FIM DO MENU -->
			</header>
			<div class="row"> 
				<div role="main">					
						
				</div><!-- main -->					
		</div><!-- Conteiner fluid -->
		</br></br></br></br>	

		<section id="cadastro">
				<div class="row">
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
							<form class="form-horizontal" ame="medicamento" method="post" action="cadastro.php">
<fieldset>

<!-- Form Name -->
<legend>Cadastro de Medicamentos</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="name">Nome do medicamento</label>  
  <div class="col-md-4">
  <input id="name" name="nome_med" type="text" placeholder="Nome do Medicamento" class="form-control input-md" required="">
</div>

<!-- Appended Input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hora">Primeiro horário</label>
  <div class="col-md-4">
    <div class="input-group">
      <input id="hora" name="horario" class="form-control" placeholder="12:00" type="text" required="">
  </div>
</div>

<!-- Appended Input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="hora">Frequencia</label>
  <div class="col-md-4">
    <div class="input-group">
      <input id="hora" name="frequencia" class="form-control" placeholder="08:00" type="text" required="">
  </div>
  <p>A cada quanto tempo o medicamento deve ser ingerido</p>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="comp]_med">Compartimento</label>
  <div class="col-md-4">
    <select id="recp" name="comp_med" class="form-control">
      <option value="0">Selecione</option>
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="res">Responsavel</label>  
  <div class="col-md-4">
  <select id="select" name="res" class="form-control" required>
                        <option value=""> Selecione</option>
                        <?php
                        $stmt = $responsavel->index();
                        while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <option id="<?php echo $row->id_res; ?>" value="<?php echo $row->id_res; ?>"> <?php echo $row->nome_res; ?>
                        </option>
                        <?php
                        }
                        ?>
                      </select> 
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="cad"></label>
  <div class="col-md-8">
    <input type="submit" name="insert" class="btn btn-success btn-sm" value="Cadastrar"/>
    <!-- <button type" id="cad" name="insert" class="btn btn-success">Cadastrar</button> -->
    <button id="cancel" name="cancel" class="btn btn-danger">Cancelar</button>
  </div>
</div>

</fieldset>
</form>

				</div>
		</section>

		</br></br></br></br>	
			<section id="sectionrodape" style="background-color:rgba(0,0,0,0.9)" >
			<div id="footer" >
				<div class="container" >
					</br>
					<div id="credit" class="row">	
					<p class="muted credit" > Copyright © 2018  &nbsp;-&nbsp; Desenvolvido por: 
						<a href"#">Caio Rodrigues, Juliana Gomes, Carlos Junior & Marlon Martins</a>
					</p>
					</div><!--credit -->
				</div> <!-- Conteiner -->
   			</div> <!-- Footer -->
   		</section> <!-- Rodapé -->
		</div>
	</body>
</html>		