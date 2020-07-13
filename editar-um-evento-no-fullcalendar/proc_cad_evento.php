<?php
	session_start();

	//Incluir conexao com BD
	include_once("conexao.php");

	$nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $cod = mysqli_real_escape_string($conn, $_GET['cod']);
    $telefone = mysqli_real_escape_string($conn, $_GET['telefone']);
    $convenio = mysqli_real_escape_string($conn, $_GET['convenio']);
    $cidade = mysqli_real_escape_string($conn, $_GET['cidade']);
    $medico = mysqli_real_escape_string($conn, $_GET['medico']);
    $data = mysqli_real_escape_string($conn, $_GET['data_consulta']);
	
	$result_eventos = "INSERT INTO consulta (nome, cod, telefone, convenio, cidade, medico, data_consulta) VALUES ('$nome', '$cod', '$telefone', '$convenio', '$cidade', '$medico', '$data', '$hora')";	
	$resultado_eventos = mysqli_query($conn, $result_eventos);	

	header("index.php");
	
?>
