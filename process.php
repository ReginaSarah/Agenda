<?php

    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $db = 'web';

    //CONEXAO COM O BANCO DE DADOS
    $connect = mysqli_connect($host, $user, $senha, $db);

    //COLETA DOS DADOS DO FORMULÁRIO
    $nome = $_GET['nome'];
    $senhaUser = sha1(sha1(md5(sha1(md5($_GET['senha'])))));
    $email = $_GET['email'];

    //QUERY PARA DATABASE
    $sql = "INSERT INTO usuario (nome, senha, email) VALUES (' $nome ',' $senhaUser ', '$email ')";
    //$sql = "SELECT * FROM usuario WHERE id = 1";    
    $result = mysqli_query($connect, $sql);

    //$dados = mysqli_fetch_array($result);
    
    echo "Nome: " . $dados['nome'] ; 
    echo "Senha: " . $dados['senha'] ; 
    echo "Email: " . $dados['email'] ;

    header('Location: index.php');

?>