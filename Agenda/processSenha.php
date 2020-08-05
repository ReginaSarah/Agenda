<?php

    session_start(); 

    include_once("conexao.php");
    
    
    // Recebe os dados do formulário
    $email = $_GET['email'];
    $cpf = mysqli_real_escape_string($conn, $_GET['CPF']);
    $senhaUser = md5($_GET['senha']);
    $confirmacaoSenha = md5($_GET['confirmacaoSenha']);
        
    // Validações de preenchimento e-mail e senha se foi preenchido o e-mail
    if (empty($email) || empty($cpf) || empty($senhaUser) || empty($confirmacaoSenha)){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Campos vazios</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Campo(s) vazio(s)</div>';
        header("Location: esqueciSenha.php");
        exit();
    }
    // CONFIRMAÇÃO DE SENHA
    if($senhaUser != $confirmacaoSenha){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Senhas Diferentes</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Senhas Diferentes</div>';
        header("Location: esqueciSenha.php");
        exit();
    }
    //  Válida os dados do usuário com o banco de dados
    $res = "SELECT * FROM cadastro WHERE email LIKE \"%".$email."%\"";    
    $result = mysqli_query($conn, $res);
    $fields = mysqli_fetch_array($result);

    while($row_perfil = mysqli_fetch_array($result)){
        if($row_perfil['senha'] == $senhaUser){
            $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Esta senha já existe, escolha outro</div>'];
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Esta senha já existe, escolha outra</div>';
            header("Location: esqueciSenha.php");
            exit();
        }
    }

    if(($fields['CPF']) != $cpf){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: CPF inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">CPF ou Email inválido(s)</div>';
        header("Location: esqueciSenha.php");
        exit();   
    }

    $sql = "UPDATE cadastro SET senha = '$senhaUser', confirmacaoSenha = '$confirmacaoSenha' WHERE email LIKE \"%".$email."%\"";
    $result = mysqli_query($conn, $sql);

    
    header('Location: index.php');
?>