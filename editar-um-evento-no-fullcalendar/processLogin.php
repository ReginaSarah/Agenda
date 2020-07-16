<?php
/*
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
    
    
    if($result->num_rows > 0){
        echo "Deu bom!";
        $_SESSION['logged'] = true;
        $_SESSION['name'] = $fields['nome'];
    }
    else{
        echo "Seu login não existe, tente outro...";
    }*/
    
?>

<?php

    session_start(); 

    include_once("conexao.php");

    $_SESSION['logged'] = false;
    
    
    // Recebe os dados do formulário
    $email = (isset($_GET['email'])) ? $_GET['email'] : '' ;
    $senhaUser =(isset($_GET['senha'])) ? $_GET['senha'] : '' ;
    $id = "SELECT id FROM cadastro WHERE email LIKE \"%".$email."%\"";
    $nome = (isset($_GET['nome'])) ? $_GET['nome'] : '' ;
    
    
    // Validações de preenchimento e-mail e senha se foi preenchido o e-mail
    if (empty($email)){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Preencha o campo de e-mail</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Preencha seu email</div>';
        header("Location: login.php");
        exit();
    }
    
    if (empty($senhaUser)){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Preencha o campo de senha</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Preencha sua senha</div>';
        header("Location: login.php");
        exit();
    }
    
    
    
    //  Válida os dados do usuário com o banco de dados
    $sql = "SELECT * FROM cadastro WHERE email LIKE \"%".$email."%\"";    
    $result = mysqli_query($conn, $sql);

    $fields = mysqli_fetch_array($result);

    if(isset($fields['email']) === $email){
        if(isset($fields['senha']) === $senhaUser){
            $_SESSION['logged'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senhaUser;
            $retorna = ['sit' => true, 'msg' => '<div class="alert alert-success" role="alert">Erro: Deu ruim hein</div>'];
            $_SESSION['msg'] = '<div class="alert alert-success" role="alert">Deu bom aqui!</div>';
            header('Location: index.php');
        }
        else{
            //$retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Senha Inválida</div>'];
            //$_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Senha Inválida</div>';
            $_SESSION['logged'] = false;
            unset($_SESSION['nome']);
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            header("Location: login.php");
        }
    }
    else{
        $_SESSION['logged'] = false;
        unset($_SESSION['nome']);
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Email Inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email Inválido</div>';
        header('Location: login.php');
    }    

?>