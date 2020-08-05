<?php
	
	//Incluir conexao com BD
    include_once("conexao.php");
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $cod = mysqli_real_escape_string($conn, $_GET['cod']);
    $telefone = mysqli_real_escape_string($conn, $_GET['telefone']);
    $convenio = mysqli_real_escape_string($conn, $_GET['convenio']);
    $cidade = mysqli_real_escape_string($conn, $_GET['cidade']);
    $medico = mysqli_real_escape_string($conn, $_GET['medico']);
    $data = mysqli_real_escape_string($conn, $_GET['data_consulta']);
    $rad = mysqli_real_escape_string($conn, $_GET['radiografia']);

    $result_tempo = "SELECT data_consulta FROM consulta";
	$resultado_tempo = mysqli_query($conn, $result_tempo);

	while($row_tempo = mysqli_fetch_array($resultado_tempo)){
		if($row_tempo['data_consulta'] == $data){
			$retorna = ['sit' => false, 'm' => '<div class="alert alert-danger" role="alert">Horas iguais</div>'];
			$_SESSION['m'] = '<div class="alert alert-danger" role="alert">Existe agendamento neste horário</div>';
			header("Location: calendario.php");
			exit();
		}
	}
	
	$result_eventos = "UPDATE consulta SET nome='$nome', cod = '$cod', telefone = '$telefone', convenio = '$convenio', cidade = '$cidade', medico = '$medico', data_consulta = '$data', radiografia = '$rad' WHERE id LIKE $id";	
	$resultado_eventos = mysqli_query($conn, $result_eventos);

	header("Location: calendario.php");
	
?>