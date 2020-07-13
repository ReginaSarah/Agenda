<?php

    include_once("conexao.php");

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $cidade = $_GET['cidade'];
    $genero = $_GET['genero'];
    $nascimento = $_GET['nascimento'];
    $senhaUser = sha1(sha1(md5(sha1(md5($_GET['senha'])))));
    $confirmSenha = sha1(sha1(md5(sha1(md5($_GET['confirmacaoSenha'])))));

    //QUERY PARA DATABASE
    $sql = "INSERT INTO cadastro (nome, email, cidade, nascimento, genero, senha, confirmacaoSenha) VALUES ('$nome', '$email', '$cidade', '$nascimento', '$genero', '$senhaUser ', '$confirmSenha')";
    //$sql = "SELECT * FROM usuario WHERE id = 1";    
    $result = mysqli_query($connect, $sql);

    echo "Inserção efetuada, ou não, pode ter dado erro <br/>" . $sql;

    //$dados = mysqli_fetch_array($result);

   // header('Location: index.php');

?>