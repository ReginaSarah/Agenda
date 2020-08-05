<?php
	session_start();

	//Incluir conexao com BD
	include_once("conexao.php");

	$nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $cod = mysqli_real_escape_string($conn, $_GET['cod']);
    $telefone = mysqli_real_escape_string($conn, $_GET['telefone']);
    $convenio = mysqli_real_escape_string($conn, $_GET['convenio']);
	$data = mysqli_real_escape_string($conn, $_GET['data_consulta']);
	$rad = mysqli_real_escape_string($conn, $_GET['radiografia']);

	$logado = $_SESSION['login'];

		$result_perfil = "SELECT nome, email, cidade FROM cadastro";
		$resultado_perfil = mysqli_query($conn, $result_perfil);

		while($row_perfil = mysqli_fetch_array($resultado_perfil)){
			if($row_perfil['email'] == $logado){
				$medico = $row_perfil['nome'];
				$cidade = $row_perfil['cidade'];
				
			}
		}
	

	$result_tempo = "SELECT data_consulta FROM consulta";
	$resultado_tempo = mysqli_query($conn, $result_tempo);

	while($row_tempo = mysqli_fetch_array($resultado_tempo)){
		if($row_tempo['data_consulta'] == $data){
			$retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Horas iguais</div>'];
			$_SESSION['msn'] = '<div class="alert alert-danger" role="alert"><center>Existe agendamento neste horário<\center></div>';
			header("Location: calendario.php");
			exit();
		}
	}


	$result_eventos = "INSERT INTO consulta (nome, cod, telefone, convenio, cidade, medico, data_consulta, radiografia) VALUES ('$nome', '$cod', '$telefone', '$convenio', '$cidade', '$medico', '$data', '$rad')";	
	$resultado_eventos = mysqli_query($conn, $result_eventos);	

	header("Location: calendario.php");
	
?>
