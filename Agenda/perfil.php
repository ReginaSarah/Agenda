<?php
	include_once("conexao.php");
	//include_once("processLogin.php");
	//$login = $HTTP_SESSION_VARS['email'];

	session_start();
	if((!isset ($_SESSION['login']) == true) and (!isset ($_SESSION['senha']) == true))
	{	
		unset($_SESSION['nome']);
		unset($_SESSION['login']);
		unset($_SESSION['senha']);
		header('location:login.php');
	}
	$logado = $_SESSION['login'];

	$result_perfil = "SELECT * FROM cadastro";
	$resultado_perfil = mysqli_query($conn, $result_perfil);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Perfil</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		
	</head>
	<body>

		<div class="container theme-showcase" role="main">
			<div class="page-header">
				<h1>Perfil Pessoal</h1>
			</div>
			<div class="pull-right">
				<button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#myModalcad">
					<a href = "calendario.php"> Voltar a Agenda </a>
				</button>
			</div>
						
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Cadastros</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
							<?php while($row_perfil = mysqli_fetch_assoc($resultado_perfil)){ ?>
								<tr>
									<td><?php echo $row_perfil['id']; ?></td>
									<td><?php echo $row_perfil['nome']; ?></td>
									<td>
										<button type="button" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#myModal<?php echo $row_perfil['id']; ?>">Visualizar</button>
										<?php if($row_perfil['email'] == $logado){ ?>
											<button type="button" class="btn btn-xs btn-warning" data-toggle="modal" data-target="#exampleModal" data-whatever="<?php echo $row_perfil['id']; ?>" data-whatevernome="<?php echo $row_perfil['nome']; ?>"  
											data-whateveremail="<?php echo $row_perfil['email']; ?>" data-whatevertelefone="<?php echo $row_perfil['telefone']; ?>" data-whatevergenero="<?php echo $row_perfil['genero']; ?>"
											data-whatevercidade="<?php echo $row_perfil['cidade']; ?>" data-whatevernascimento="<?php echo $row_perfil['nascimento']; ?>" data-whateversenha="<?php echo $row_perfil['senha']; ?>"
											data-whateverconfirmacaoSenha="<?php echo $row_perfil['confirmacaoSenha']; ?>">Editar</button>
											
											<button type="button" class="btn btn-xs btn-danger btn-canc-vis" data-toggle="modal" data-target="#apagar">Apagar</button>

											<!-- Inicio APAGAR -->
											<div class="modal fade" id="apagar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
												<div class="modal-dialog">
													<div class="modal-content">
														<div class="apagar">
															<div class="modal-body">
																<p>Tem certeza que deseja excluir esse item?</p>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-xs btn-danger" data-dismiss="modal">Não</button>
																<a href="proc-apag-perfil.php?id=<?php echo $row_perfil['id'];?>"><button type="submit" class="btn btn-xs btn-success">Sim</button></a>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- Inicio APAGAR -->
										<?php } ?>
									</td>
								</tr>
								<!-- Inicio VISUALIZAR -->
								<div class="modal fade" id="myModal<?php echo $row_perfil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
									<div class="modal-dialog" role="document">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
												<h4 class="modal-title text-center" id="myModalLabel"><?php echo $row_perfil['nome']; ?></h4>
											</div>
											<div class="modal-body">
												<dt>Nome:</dt><p><?php echo $row_perfil['nome']; ?></p>
												<dt>Email:</dt><p><?php echo $row_perfil['email']; ?></p>
												<dt>Telefone:</dt><p><?php echo $row_perfil['telefone']; ?></p>
												<dt>Cidade/Estado:</dt><p><?php echo $row_perfil['cidade']; ?></p>
												<dt>Nascimento:</dt><p><?php echo $row_perfil['nascimento']; ?></p>
												<dt>Gênero:</dt><p><?php echo $row_perfil['genero']; ?></p>
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
						<form method="GET" action="proc-edit-perfil.php" enctype="multipart/form-data">
							<div class="form-group">
								<label for="recipient-name" class="control-label">Nome:</label>
								<input name="nome" type="text" class="form-control" id="recipient-name">
							</div>
							<div class="form-group">
								<label for="recipient-email" class="control-label">Email:</label>
								<input name="email" type="text" class="form-control" id="recipient-email"></input>
							</div>
							<div class="form-group">
								<label for="recipient-telefone" class="control-label">Telefone:</label>
								<input name="telefone" type="text" class="form-control" id="recipient-telefone" minlength="14" maxlength="15" onkeypress="$(this).mask('(00) 00000-0000')"></input>
							</div>
							<div class="form-group">
								<label for="recipient-genero" class="control-label">Gênero:</label>
								<input name="genero" type="text" class="form-control" id="recipient-genero"></input>
							</div>
							<div class="form-group">
								<label for="recipient-cidade" class="control-label">Estado/Cidade:</label>
								<input name="cidade"  type="text" class="form-control" id="recipient-cidade"></input>
							</div>
							<div class="form-group">
								<label for="recipient-nascimento" class="control-label">Nascimento:</label>
								<input name="nascimento"  type="Date" class="form-control" id="recipient-nascimento"></input>
							</div>
							<div class="form-group">
								<label for="recipient-senha" class="control-label">Senha:</label>
								<input name="senha"  type="password" class="form-control" id="recipient-senha"></input>
							</div>
							<div class="form-group">
								<label for="recipient-confirmacaoSenha" class="control-label">Confirmação de Senha:</label>
								<input name="confirmacaoSenha"  type="password" class="form-control" id="recipient-confirmacaoSenha"></input>
							</div>
							<input name="id" type="hidden" id="id">
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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
		<script type="text/javascript">
			$('#exampleModal').on('show.bs.modal', function (event) {
				var button = $(event.relatedTarget) // Button that triggered the modal
				var recipient = button.data('whatever') // Extract info from data-* attributes
				var recipientnome = button.data('whatevernome')
				var recipientemail = button.data('whateveremail')
				var recipienttelefone = button.data('whatevertelefone')
				var recipientnascimento = button.data('whatevernascimento')
				var recipientcidade = button.data('whatevercidade')
				var recipientgenero = button.data('whatevergenero')
				var recipientsenha = button.data('whateversenha')
				var recipientconfirmacaoSenha = button.data('whateverconfirmacaoSenha')
				
				
				// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
				// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
				var modal = $(this)
				modal.find('.modal-title').text('ID do Cadastro: ' + recipient)
				modal.find('#id').val(recipient)
				modal.find('#recipient-name').val(recipientnome)
				modal.find('#recipient-email').val(recipientemail)
				modal.find('#recipient-telefone').val(recipienttelefone)
				modal.find('#recipient-nascimento').val(recipientnascimento)
				modal.find('#recipient-cidade').val(recipientcidade)
				modal.find('#recipient-genero').val(recipientgenero)
				modal.find('#recipient-senha').val(recipientsenha)
				modal.find('#recipient-confirmacaoSenha').val(recipientconfirmacaoSenha)
			})
		</script>
		<script>
			$('.apagar').hide();
			$('.btn-canc-vis').on("click", function() {
				$('.apagar').show();
			});
		</script>
	</body>
</html>