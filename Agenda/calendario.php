<?php

	include_once ("conexao.php");
	//include_once ("processLogin.php");
	
	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{	
		unset($_SESSION['nome']);
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:index.php');
	}
	else{
	
		$logado = $_SESSION['login'];

		$result_perfil = "SELECT nome, email, cidade FROM cadastro";
		$resultado_perfil = mysqli_query($conn, $result_perfil);

		while($row_perfil = mysqli_fetch_array($resultado_perfil)){
			if($row_perfil['email'] == $logado){
				$nomeMed = $row_perfil['nome'];
				$cidadeMed = $row_perfil['cidade'];
				
			}
		}

	}
	$result_events = "SELECT id, nome, cod, telefone, cidade, convenio, medico, data_consulta, radiografia FROM consulta";
	$resultado_events = mysqli_query($conn, $result_events);
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		
		<meta charset='utf-8' />
		<title>Agenda Radiografia</title>
		<link href='css/bootstrap.min.css' rel='stylesheet'>
		<link href='css/fullcalendar.min.css' rel='stylesheet' />
		<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
		<link href='css/style.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>

		

		<div class="col-md-10 text-right"> 
			<button type="button" class="btn btn-secondary">
				<a href = "perfil.php">
					Perfil <?php echo $nomeMed ?>
				</a>
			</button>
			<button type="button" class="btn btn-secondary">
				<a href="processLogout.php">
					Sair
				</a>
			</button>
			<?php
                if (isset($_SESSION['msn'])) 
                {
                    echo $_SESSION['msn'];
                    unset($_SESSION['msn']);
				}
				if (isset($_SESSION['m'])) 
                {
                    echo $_SESSION['m'];
                    unset($_SESSION['m']);
                }
            ?>
		</div>

			
		
		
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					eventClick: function(event) {
						$("#apagar_evento").attr("href", "proc-apag-evento.php?id=" + event.id);

						$('#visualizar #id').text(event.id);
						$('#visualizar #id').val(event.id);
						$('#visualizar #nome').text(event.title);
						$('#visualizar #nome').val(event.title);
						$('#visualizar #cod').text(event.cod);
						$('#visualizar #cod').val(event.cod);
						$('#visualizar #telefone').text(event.extendedProps.tel);
						$('#visualizar #telefone').val(event.extendedProps.tel);
						$('#visualizar #cidade').text(event.color);
						$('#visualizar #cidade').val(event.color);
						$('#visualizar #convenio').text(event.conv);
						$('#visualizar #convenio').val(event.conv);
						$('#visualizar #medico').text(event.med);
						$('#visualizar #medico').val(event.med);
						$('#visualizar #data_consulta').text(event.start.format('YYYY/MM/DD HH:mm:ss'));
						$('#visualizar #data_consulta').val(event.start.format('YYYY/MM/DD HH:mm:ss'));
						$('#visualizar #radiografia').text(event.rad);
						$('#visualizar #radiografia').val(event.rad);
						$('#visualizar').modal('show');

						$('.apagar').hide();
						return false;

					},
					
					selectable: true,
					selectHelper: true, //destaca a hora
					select: function(start){
						
						$('#cadastrar #start').val(moment(start).format('YYYY/MM/DD HH:mm:ss'));
						$('#cadastrar #end').val(moment(start).format('YYYY/MM/DD HH:mm:ss'));
						$('#cadastrar').modal('show');
					},
					
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
									id: '<?php echo $row_events['id']; ?>',
									title: '<?php echo $row_events['nome']; ?>',
									color: '<?php echo $row_events['cidade']; ?>',
									start: '<?php echo $row_events['data_consulta']; ?>',
									extendedProps: {
										tel: '<?php echo $row_events['telefone']; ?>'
									},
									conv: '<?php echo $row_events['convenio']; ?>',
									med: '<?php echo $row_events['medico']; ?>',
									cod: '<?php echo $row_events['cod']; ?>',
									rad: '<?php echo $row_events['radiografia'];?>',
								},<?php
							}
						?>
					]
				});
			});		
		</script>

	</head>
	<body>
		<div class="container">
			<div class="page-header">
				<h1>Agenda Radiografia</h1>
			</div>
		
			<div id='calendar'></div>
		</div>

		<div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Dados da Consulta</h4>
					</div>
					<div class="modal-body">
						<div class="visualizar">
							<dl class="dl-horizontal">
								<dt>N° de Identificação:</dt>
								<dd id="id"></dd>
								<dt>Nome:</dt>
								<dd id="nome"></dd>
								<dt>Código:</dt>
								<dd id="cod"></dd>
								<dt>Telefone:</dt>
								<dd id="telefone"></dd>
								<dt>Cidade:</dt>
								<dd id="cidade"></dd>
								<dt>Dentista:</dt>
								<dd id="medico"></dd>
								<dt>Convênio:</dt>
								<dd id="convenio"></dd>
								<dt>Data/Hora:</dt>
								<dd id="data_consulta"></dd>
								<dt>Tipo de Radiografia:</dt>
								<dd id="radiografia"></dd>
							</dl>
							<button id="editar" type="button" class="btn btn-warning btn-canc-edit" data-toggle="modal" data-target="#exampleModalLabel">Editar</button>
							<button type="button" class="btn btn-danger btn-canc-canc">Apagar</button>
						</div>
						
						<div class="apagar">
							<div class="modal-body">
								<p>Tem certeza que deseja excluir esse item?</p>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-danger btn-canc-vis">Não</button>
								<a href="" id="apagar_evento" class="btn btn-success">Sim</a>
							</div>
						</div>

						
						<div class="form">
							<form method="GET" action="proc-edit-evento.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="id" class="control-label">N° de Identificação:</label>
									<input name="id" type="text" class="form-control" id="id" readonly>
								</div>
								<div class="form-group">
									<label for="nome" class="control-label">Nome:</label>
									<input name="nome" type="text" class="form-control" id="nome">
								</div>
								<div class="form-group">
									<label for="cod" class="control-label">Código</label>
									<input name="cod" type="text" class="form-control" id="cod">
								</div>
								<div class="form-group">
									<label for="telefone" class="control-label">Telefone</label>
									<input name="telefone" type="text" minlength="14" maxlength="15" class="form-control" id="telefone" onkeypress="$(this).mask('(00) 00000-0000')">
								</div>
								<div class="form-group">
									<label for="convenio" class="control-label">Convênio</label>
									<input name="convenio" type="text" class="form-control" id="convenio">
								</div>
								<div class="form-group">
									<label for="cidade" class="control-label">Estado/Cidade</label>
									<input name="cidade" type="text" class="form-control" id="cidade" readonly>
								</div>
								<div class="form-group">
									<label for="medico" class="control-label">Dentista</label>
									<input name="medico" type="text" class="form-control" id="medico" readonly>
								</div>
								<div class="form-group">
									<label for="data_consulta" class="control-label">Data</label>
									<input name="data_consulta" type="text" class="form-control" id="data_consulta" placeholder="AAAA/MM/DD HH:mm:ss">
								</div>
								<div class="form-group">
									<label for="radiografia" class="control-label">Tipo de Radiografia</label>
									<textarea name="radiografia" type="text" class="form-control" id="radiografia" ></textarea>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary btn-canc-vis">Cancelar</button>
									<button type="submit" class="btn btn-danger">Alterar</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" data-backdrop="static">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title text-center">Cadastrar Consulta</h4>
					</div>
					<div class="modal-body">
						<form method="GET" action="proc-cad-evento.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="cod" class="control-label">Código</label>
								<input name="cod" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="telefone" class="control-label">Telefone</label>
								<input name="telefone" type="text" minlength="14" maxlength="15" class="form-control" id="telefone" onkeypress="$(this).mask('(00) 00000-0000')">
							</div>
							<div class="form-group">
								<label for="convenio" class="control-label">Convênio</label>
								<input name="convenio" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="<?php $cidadeMed ?>" class="control-label">Estado/Cidade</label>
								<input name="cidade" type="text" class="form-control" id="cidade" placeholder="<?php echo $cidadeMed ?>" readonly>
							</div>
							<div class="form-group">
								<label for="<?php $nomeMed ?>" class="control-label">Dentista</label>
								<input name="medico" type="text" class="form-control" id="medico" placeholder="<?php echo $nomeMed ?>" readonly>
							</div>
							<div class="form-group">
								<label for="data_consulta" class="control-label">Data</label>
								<input name="data_consulta" type="text" class="form-control" id="start" onkeypress="$(this).mask('0000/00/00 00:00:00')">
							</div>
							<div class="form-group">
								<label for="radiografia" class="control-label">Tipo de Radiografia</label>
								<textarea name="radiografia" type="text" class="form-control" id="radiografia"></textarea>
							</div>
							<div class="modal-footer">
								<button type="submit" class="btn btn-success">Cadastrar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		
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
				
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID da Consulta: ' + recipient)
				modal.find('#id').val(recipient)
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
		<script>
			$('.btn-canc-vis').on("click", function() {
				$('.form').hide();
				$('.apagar').hide();
				$('.visualizar').show();
			});
			$('.btn-canc-edit').on("click", function() {
				$('.visualizar').slideToggle();
				$('.apagar').hide();
				$('.form').show();
			});
			$('.btn-canc-canc').on("click", function() {
				$('.visualizar').slideToggle();
				$('.form').hide();
				$('.apagar').show();
			});
		</script>
	</body>
</html>
