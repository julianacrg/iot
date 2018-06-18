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
		<title>HOME</title>
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
			            <a class="navbar-brand" href="index.php"><img class="img-responsive" width=50 height=50 src="images/logo.jpg"> </a>
			          </div>
			          <div class="collapse navbar-collapse pull-right" id="myNavbar">
			 				<ul class="nav">
  						<li class="active"><a href="index.php" >Inicio</a></li>
 						 <li><a href="#lista" >Medicamentos</a></li>
						  <li><a href="cadastro.php"  >Cadastro</a></li>
						</ul>			        
			          </div><!-- colapse -->					        
			      </nav></br></br></br>    			    
			    <!-- FIM DO MENU -->
			</header>
			<div class="row"> 
				<div role="main">					
					
				</div><!-- main -->					
		</div><!-- Conteiner fluid -->

				<!-- inicio destaques --></br></br>	
				<section id="sectiondestaques">
				<div class="container">
					<h2><b>Perfil</b></h2></br>
					<div class="row">
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
   				<div class="hovereffect">
      				  <img class="img-circle"  width=270 height=250 src="images/sra.jpg" alt="">
            	<div class="overlay">
               		 <h2>Dona Maria</h2>
					<p> 
					<a href="#">Veja mais</a>
					</p> 

	            </div>
		    	</div>
				</div>
					<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
   					 <div class="hovereffect">
      				  <img class="img-responsive" src="images/.png" alt="">
            		<div class="overlay">
               		 <h2>Genericos</h2>
					<p> 
					<a href="#">Veja mais</a>
				</p> 

            </div>
   		 </div>
		</div>
				<div class="col-lg-8 col-md-4 col-sm-6 col-xs-12">
   					 <div class="hovereffect">
      				  <img class="img-responsive" src="images/saiba.png" alt="">
            		<div class="overlay">
               		 <h2>Notas </h2>
					<p> 
					<a href="#">Veja mais</a>
					</p> 
         	  		 </div>
   			 		</div>
				</div>
			<!-- Row -->	
			</div>	
			</div><!-- conteiner -->	</br></br>	
			
			</section><!-- Destaques -->

			<div class="container">


		<h2><b>Lista de Medicamentos</b></h2>    
		    <a name="lista"></a>
		    <hr />

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

		    <div class="agenda">
		        <div class="table-responsive">
		            <table class="table table-condensed table-bordered">
		                <thead>
		                    <tr>
		                    	<th>Remédio</th>
		                        <th>Horário</th>
		                        <th>Frequencia</th>
		                        <th>Nome do Responsavel</th>
		                        <th>Compartimento</th>
		                    </tr>
		                </thead>
		                <tbody>
		                    <!-- Single event in a single day -->

			                    <?php
							$stmt = $medicamento->index();
							while($row = $stmt->fetch(PDO::FETCH_OBJ)){
								?>
		                      <tr>
		                      	<td class="agenda-events">
		                            <div class="agenda-event">
		                                <input type="text" name="nome_med" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $row->nome_med; ?>" required>
		                            </div>
		                        </td>
		                         <td class="agenda-events">
		                            <div class="agenda-event">
		                                <input type="text" name="horario" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $row->horario; ?>" required>
		                            </div>
		                        </td>
		                        <td class="agenda-events">
		                            <div class="agenda-event">
		                                <input type="text" name="frequencia" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $row->frequencia; ?>" required>
		                            </div>
		                        </td>

		                        <?php
				                $stmtResponsavel = $responsavel->index();
				                while ($rowResponsavel = $stmtResponsavel->fetch(PDO::FETCH_OBJ)) {
				                  if ($rowResponsavel->id_res == $row->res_med) {
				                  ?>

		                        <td class="agenda-events" >
		                            <div class="agenda-event">
		                                <input type="text" name="responsavel" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $rowResponsavel->nome_res; ?>" required>
		                            </div>
		                        </td>
		                        <?php } }  ?>

		                        <td class="agenda-time">
		                            <input type="text" name="compartimento" class="form-text" id_med="medicamento" placeholder="" value="<?php echo $row->comp_med; ?>" required>
		                        </td>
		                    </tr>
		                   <?php } ?>
		                </tbody>
		            </table>
		        </div>
		    </div>
		</div>


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