<?php
    include ("calendario.php");
    include_once ("conexao.php");

    //$nome = mysqli_real_escape_string($connect, $_GET['name']);
    //$cod = mysqli_real_escape_string($connect, $_GET['cod']);
    //$telefone = mysqli_real_escape_string($connect, $_GET['telefone']);
    //$convenio = mysqli_real_escape_string($connect, $_GET['convenio']);
    //$cidade = mysqli_real_escape_string($connect, $_GET['cidade']);
    //$medico = mysqli_real_escape_string($connect, $_GET['medico']);
    //$data = mysqli_real_escape_string($connect, $_GET['data_consulta']);
    //$hora = mysqli_real_escape_string($connect, $_GET['hora']);

?>  

<html lang="pt-BR">
<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Modal</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
	<body>
		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Listar Cursos</h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">Cadastrar</button>
			</div>
			<!-- Inicio Modal -->
			<div class="modal fade" id="myModalcad" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title text-center" id="myModalLabel">Cadastrar Curso</h4>
						</div>
						<div class="modal-body">
							<form method="POST" action="http://localhost/teste/processa_cad.php" enctype="multipart/form-data">
								<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-cod" class="control-label">Código</label>
								<textarea name="cod" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-telefone" class="control-label">Telefone</label>
								<textarea name="telefone" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-convenio" class="control-label">Convênio</label>
								<textarea name="convenio" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-cidade" class="control-label">Estado/Cidade</label>
								<textarea name="cidade" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-medico" class="control-label">Indicação</label>
								<textarea name="medico" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-data_consulta" class="control-label">Data</label>
								<textarea name="data_consulta" class="form-control"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-hora" class="control-label">Horário</label>
								<textarea name="hora" class="form-control"></textarea>
							</div>
								<div class="modal-footer">
									<button type="submit" class="btn btn-success">Cadastrar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- Fim Modal -->
			
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Agendamento de Clientes</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($rows_cursos = mysqli_fetch_assoc($resultado_eventos)){ ?>
								<tr>
									<td><?php echo $rows_cursos['id']; ?></td>
									<td><?php echo $rows_cursos['nome']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $rows_cursos['id']; ?>">Visualizar</button>
										
										<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $rows_cursos['id']; ?>" data-whatevernome="<?php echo $rows_cursos['nome']; ?>"  
										data-whatevercod="<?php echo $rows_cursos['cod']; ?>" data-whatevertelefone="<?php echo $rows_cursos['telefone']; ?>" data-whateverconvenio="<?php echo $rows_cursos['convenio']; ?>"
										data-whatevercidade="<?php echo $rows_cursos['cidade']; ?>" data-whatevermedico="<?php echo $rows_cursos['medico']; ?>" data-whateverdata_consulta="<?php echo $rows_cursos['data_consulta']; ?>"
										data-whateverhora="<?php echo $rows_cursos['hora']; ?>">Editar</button>
										
										<a href="processa_apagar.php?id=<?php echo $rows_cursos['id']; ?>"><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
									</td>
								</tr>
								<!-- Inicio VISUALIZAR -->
								<div class="modal fade" id="myModal<?php echo $rows_cursos['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $rows_cursos['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<p><?php echo $rows_cursos['nome']; ?></p>
												<p><?php echo $rows_cursos['cod']; ?></p>
												<p><?php echo $rows_cursos['telefone']; ?></p>
												<p><?php echo $rows_cursos['convenio']; ?></p>
												<p><?php echo $rows_cursos['cidade']; ?></p>
												<p><?php echo $rows_cursos['medico']; ?></p>
												<p><?php echo $rows_cursos['data_consulta']; ?></p>
												<p><?php echo $rows_cursos['hora']; ?></p>
											</div>
										</div>
									</div>
								</div>
								<!-- Fim VISUALIZAR -->
							<?php } ?>
						</tbody>
					 </table>
				</div>
			</div>		
		</div>
		
		
		<!-- Inicio EDITAR -->
		<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="exampleModalLabel">Cursos</h4>
					</div>
					<div class="modal-body">
						<form method="POST" action="http://localhost/teste/processa.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-cod" class="control-label">Código</label>
								<textarea name="cod" class="form-control" id="recipient-cod"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-telefone" class="control-label">Telefone</label>
								<textarea name="telefone" class="form-control" id="recipient-telefone"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-convenio" class="control-label">Convênio</label>
								<textarea name="convenio" class="form-control" id="recipient-convenio"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-cidade" class="control-label">Estado/Cidade</label>
								<textarea name="cidade" class="form-control" id="recipient-cidade"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-medico" class="control-label">Indicação</label>
								<textarea name="medico" class="form-control" id="recipient-medico"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-data_consulta" class="control-label">Data</label>
								<textarea name="data_consulta" class="form-control" id="recipient-data_consulta"></textarea>
							</div>
							<div class="form-group">
								<label for="recipient-hora" class="control-label">Horário</label>
								<textarea name="hora" class="form-control" id="recipient-hora"></textarea>
							</div>
							<input name="id" type="hidden" id="id_curso">
							<div class="modal-footer">
								<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
								<button type="submit" class="btn btn-danger">Alterar</button>
							</div>
						</form>
					</div>			  
				</div>
			</div>
		</div>
		
		<!-- Fim EDITAR -->
		
		

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientcod = button.data('whatevercod')
				var recipienttelefone = button.data('whatevertelefone')
				var recipientconvenio = button.data('whateverconvenio')
				var recipientcidade = button.data('whatevercidade')
				var recipientmedico = button.data('whatevermedico')
				var recipientdataconsulta = button.data('whateverdata_consulta')
				var recipienthora = button.data('whateverhora')
				
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Curso: ' + recipient)
				modal.find('#id_curso').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-cod').val(recipientcod)
				modal.find('#recipient-telefone').val(recipienttelefone)
				modal.find('#recipient-convenio').val(recipientconvenio)
				modal.find('#recipient-cidade').val(recipientcidade)
				modal.find('#recipient-medico').val(recipientmedico)
				modal.find('#recipient-data_consulta').val(recipientdataconsulta)
				modal.find('#recipient-hora').val(recipienthora)
			})
		</script>
        
    </body>
</html>