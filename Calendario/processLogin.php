<?php

    session_start();
    //$_SESSION['logged'] = false;

    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $db = "eventos";

    //CONEXAO COM O BANCO DE DADOS
    $connect = mysqli_connect($host, $user, $senha, $db);

    if($connect === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    //COLETA DOS DADOS DO FORMULÁRIO
    $email = $_GET['email'];
    $senhaUser = $_GET['senha'];
    
    //QUERY PARA DATABASE
    $sql = "SELECT * FROM cadastro WHERE senha LIKE \"%".$senhaUser."%\"";    
    $result = mysqli_query($connect, $sql);

    $fields = mysqli_fetch_array($result);
    
    //echo $fields['nome'] . $fields['senha'] ;

    if(isset($fields['email']) == $email){
        if($fields['senha'] == $senhaUser){
            header('Location: index.php');
        }
        else{
            //senha();
            header('Location: login.php');
        }
    }
    else{
        //email();
        header('Location: login.php');
    }
    /*
    
    if($result->num_rows > 0){
        echo "Deu bom!";
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $fields['nome'];
    }
    else{
        echo "Seu login não existe, tente outro...";
    }*/
    
?>