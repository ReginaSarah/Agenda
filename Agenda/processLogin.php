<?php

    session_start(); 

    include_once("conexao.php");
    
    
    // Recebe os dados do formulário
    $email = (isset($_GET['email'])) ? $_GET['email'] : '' ;
    $senhaUser = md5($_GET['senha']);
    $nome = (isset($_GET['nome'])) ? $_GET['nome'] : '' ;

    $id = "SELECT id FROM cadastro WHERE email LIKE \"%".$email."%\"";
        
    // Validações de preenchimento e-mail e senha se foi preenchido o e-mail
    if (empty($email)){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Preencha o campo de e-mail</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Preencha seu email</div>';
        header("Location: index.php");
        exit();
    }
    
    if (empty($senhaUser)){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Preencha o campo de senha</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Preencha sua senha</div>';
        header("Location: index.php");
        exit();
    }

    // VALIDA O EMAIL
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Emaiido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email Inválido</div>';
        header("Location: index.php");
        exit();
    }
    
    //  Válida os dados do usuário com o banco de dados
    $sql = "SELECT * FROM cadastro WHERE email LIKE \"%".$email."%\"";    
    $result = mysqli_query($conn, $sql);
    $fields = mysqli_fetch_array($result);

    if(($fields['email']) == $email){
        if($fields['confirmacaoSenha'] == $senhaUser){
            $_SESSION['logged'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senhaUser;
            header('Location: calendario.php');
        }
        else{
            $_SESSION['logged'] = false;
            unset($_SESSION['nome']);
            unset ($_SESSION['login']);
            unset ($_SESSION['senha']);
            $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Senha Inválida</div>'];
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Senha Inválida</div>';
            header("Location: index.php");
        }
    }
    else{
        $_SESSION['logged'] = false;
        unset($_SESSION['nome']);
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Email Inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email Inválido</div>';
        header('Location: index.php');
    }    
?>