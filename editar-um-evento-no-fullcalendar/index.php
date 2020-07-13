<?php
//session_start();
include_once ("conexao.php");
//include_once ("processLogin.php");

/*if(!isset ($_SESSION['logged']) == true)
{
  unset($_SESSION['logged']);
  header('login.php');
}

$login = $_SESSION['logged'];*/

$result_events = "SELECT id, nome, cod, telefone, data_consulta FROM consulta";
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
		<link href='css/personalizado.css' rel='stylesheet' />
		<script src='js/jquery.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
		<script src='js/moment.min.js'></script>
		<script src='js/fullcalendar.min.js'></script>
		<script src='locale/pt-br.js'></script>
		<button type="button" class="btn btn-info">
			<a href = "perfil.php">
                Perfil
            </a>
		</button>
		
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
						
						$('#visualizar #nome').text(event.title);
						$('#visualizar #nome').val(event.title);
						$('#visualizar #id').text(event.id);
						$('#visualizar #id').val(event.id);
						
						$('#visualizar #data_consulta').text(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar #data_consulta').val(event.start.format('DD/MM/YYYY HH:mm:ss'));
						$('#visualizar').modal('show');

						$idEsp = $_GET['id']; 
						return false;

					},
					
					selectable: true,
					selectHelper: true, //destaca a hora
					select: function(start){
						$('#cadastrar #start').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar #end').val(moment(start).format('DD/MM/YYYY HH:mm:ss'));
						$('#cadastrar').modal('show');
					},
					
					events: [
						<?php
							while($row_events = mysqli_fetch_array($resultado_events)){
								?>
								{
									id: '<?php echo $row_events['id']; ?>',
									title: '<?php echo $row_events['nome']; ?>',
									color: '<?php echo $row_events['cod']; ?>',
									end: '<?php echo $row_events['telefone']; ?>',
									start: '<?php echo $row_events['data_consulta']; ?>',

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
			<?php
			if(isset($_SESSION['logged'])){
				echo $_SESSION['logged'];
				unset($_SESSION['logged']);
			}
			?>
		
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
								<dt>Nome</dt>
								<dd id="nome"></dd>
								<dt>id</dt>
								<dd id="id"></dd>
								<dt>Telefone</dt>
								<dd id="telefone"></dd>
								<dt>Convênio</dt>
								<dd id="convenio"></dd>
								<dt>Cidade</dt>
								<dd id="cidade"></dd>
								<dt>Médico</dt>
								<dd id="medico"></dd>
								<dt>Data</dt>
								<dd id="data_consulta"></dd>
							</dl>
							<button class="btn btn-canc-vis btn-warning">Editar</button>
							<a href="proc-apag-evento.php?id=<?php$idEsp?> "><button type="button" class="btn btn-xs btn-danger">Apagar</button></a>
						</div>
						<div class="form">
							<form method="GET" action="proc-edit-evento.php" enctype="multipart/form-data">
								<div class="form-group">
									<label for="recipient-name" class="control-label">Nome:</label>
									<input name="nome" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-cod" class="control-label">Código</label>
									<input name="cod" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-telefone" class="control-label">Telefone</label>
									<input name="telefone" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-convenio" class="control-label">Convênio</label>
									<input name="convenio" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-cidade" class="control-label">Estado/Cidade</label>
									<input name="cidade" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-medico" class="control-label">Indicação</label>
									<input name="medico" type="text" class="form-control" id="recipient-name">
								</div>
								<div class="form-group">
									<label for="recipient-data_consulta" class="control-label">Data</label>
									<input name="data_consulta" type="DateTime-Local" class="form-control" id="recipient-name">
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
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
						<form method="GET" action="proc_cad_evento.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-cod" class="control-label">Código</label>
								<input name="cod" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-telefone" class="control-label">Telefone</label>
								<input name="telefone" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-convenio" class="control-label">Convênio</label>
								<input name="convenio" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-cidade" class="control-label">Estado/Cidade</label>
								<input name="cidade" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-medico" class="control-label">Indicação</label>
								<input name="medico" type="text" class="form-control">
							</div>
							<div class="form-group">
								<label for="recipient-data_consulta" class="control-label">Data</label>
								<input name="data_consulta" type="text" class="form-control" id="start">
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
				$('.form').slideToggle();
				$('.visualizar').slideToggle();
			});
			$('.btn-canc-edit').on("click", function() {
				$('.visualizar').slideToggle();
				$('.form').slideToggle();
			});
		</script>
	</body>
</html>
