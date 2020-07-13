<?php
	$servidor = "localhost";
	$usuario = "root";
	$senha = "";
	$dbname = "eventos";
	
	//Criar a conexao
	$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

	if($conn === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }