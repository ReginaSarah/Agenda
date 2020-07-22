<?php
	include_once("conexao.php");
	include("processLogout.php");
	
	$id = $_GET['id'];
	$result_perfil = "DELETE FROM cadastro WHERE id = '$id'";
	$resultado_perfil = mysqli_query($conn, $result_perfil);	
	
	
	header("Location: index.php");
?>