<?php

    session_start();

    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $db = "web";

    //CONEXAO COM O BANCO DE DADOS
    $connect = mysqli_connect($host, $user, $senha, $db);

    //COLETA DOS DADOS DO FORMULÁRIO
    $email = $_GET['email'];
    $senhaUser = $_GET['senha'];
    
    //QUERY PARA DATABASE

    //$sql = "INSERT INTO usuario (nome, senha, email) VALUES (' $nome ', ' $senhaUser ', '$email ')";
    $sql = "SELECT * FROM usuario WHERE email LIKE \"%".$email."%\"";    
    $result = mysqli_query($connect, $sql);

    $fields = mysqli_fetch_array($result);
    
    echo $fields['nome'] . $fields['senha'];

/*
    if($fields['email'] == $_GET['email']){
        if($fields['senha'] == $senhaUser){
            echo "Deu bom";
        }
        else{
            echo "Senha invalida";
        }
    }
    else{
        echo "Email Invalido";
    }
    */
    if($result->num_rows > 0){
        echo "Deu bom!";
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $fields['nome'];
    }
    else{
        echo "Seu login não existe, tente outro...";
    }
    //header('Location: index.php');*/
?>