<?php

    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $db = "eventos";

    //CONEXAO COM O BANCO DE DADOS
    $connect = mysqli_connect($host, $user, $senha, $db);

    if($connect === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $cidade = $_GET['cidade'];
    $genero = $_GET['genero'];
    $nascimento = $_GET['nascimento'];
    $senhaUser = $_GET['senha'];
    $confirmSenha = $_GET['confirmacaoSenha'];

    //QUERY PARA DATABASE
    $sql = "INSERT INTO cadastro (nome, email, cidade, nascimento, genero, senha, confirmacaoSenha) VALUES ('$nome', '$email', '$cidade', '$nascimento', '$genero', '$senhaUser ', '$confirmSenha')";
    //$sql = "SELECT * FROM usuario WHERE id = 1";    
    $result = mysqli_query($connect, $sql);

    echo "Inserção efetuada, ou não, pode ter dado erro <br/>" . $sql;

    //$dados = mysqli_fetch_array($result);

   // header('Location: index.php');

?>