<?php
	
	//Incluir conexao com BD
    include_once("conexao.php");
    
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = mysqli_real_escape_string($conn, $_GET['nome']);
    $email = mysqli_real_escape_string($conn, $_GET['email']);
    $telefone = mysqli_real_escape_string($conn, $_GET['telefone']);
    $cidade = mysqli_real_escape_string($conn, $_GET['cidade']);
    $nascimento = mysqli_real_escape_string($conn, $_GET['nascimento']);
    $genero = mysqli_real_escape_string($conn, $_GET['genero']);
    $senha = mysqli_real_escape_string($conn, md5($_GET['senha']));
    $confirmSenha = mysqli_real_escape_string($conn, md5($_GET['confirmacaoSenha']));
	
	$result_perfil = "UPDATE cadastro SET nome = '$nome', email = '$email', telefone = '$telefone', cidade = '$cidade', nascimento = '$nascimento', genero = '$genero', senha = '$senha', confirmacaoSenha = '$confirmSenha' WHERE id LIKE $id";	
    $resultado_perfil = mysqli_query($conn, $result_perfil);
    


	header("Location: perfil.php");
	
?>