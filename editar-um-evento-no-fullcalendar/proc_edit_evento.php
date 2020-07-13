<?php
	session_start();

	//Incluir conexao com BD
	include_once("conexao.php");
    $id = mysqli_real_escape_string($conn, $_GET['id']);
	$nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $cod = mysqli_real_escape_string($conn, $_GET['cod']);
    $telefone = mysqli_real_escape_string($conn, $_GET['telefone']);
    $convenio = mysqli_real_escape_string($conn, $_GET['convenio']);
    $cidade = mysqli_real_escape_string($conn, $_GET['cidade']);
    $medico = mysqli_real_escape_string($conn, $_GET['medico']);
    $data = mysqli_real_escape_string($conn, $_GET['data_consulta']);
	
	$result_eventos = "UPDATE consulta SET nome='$nome', cod = '$cod', telefone = '$telefone', convenio = '$convenio', cidade = '$cidade', medico = '$medico', data_consulta = '$data' WHERE id = '$id'";	
	$resultado_eventos = mysqli_query($conn, $result_eventos);

	header("index.php");
	
?>