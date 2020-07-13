<?php
    include_once("conexao.php");
    include("index.php");
	
	$id = $idEsp;
	
	$result_eventos = "DELETE FROM consulta WHERE id = '$idEsp'";
    $resultado_eventos = mysqli_query($conn, $result_eventos);	
    
    header("index.php");
?>
