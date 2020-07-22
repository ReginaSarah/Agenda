<?php
    
    session_start(); 

    include_once("conexao.php");

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $cpf = $_GET['CPF'];
    $cidade = $_GET['cidade'];
    $genero = $_GET['genero'];
    $telefone = $_GET['telefone'];
    $nascimento = $_GET['nascimento'];
    $senhaUser = md5($_GET['senha']);
    $confirmSenha = md5($_GET['confirmacaoSenha']);

    // SE ALGUM CAMPO ESTIVER VAZIO
    if (empty($nome) || empty($email) || empty($cidade) || empty($genero) || empty($nascimento) || empty($senhaUser) || empty($confirmSenha || empty($telefone))){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Campo(s) vazio(s)</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Campo(s) vazio(s)</div>';
        header("Location: cadastro.php");
        exit();
    }
    // CONFIRMAÇÃO DE SENHA
    if($senhaUser != $confirmSenha){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Senhas Diferentes</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Senhas Diferentes</div>';
        header("Location: cadastro.php");
        exit();
    }
    //VALIDA O EMAIL
    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Email Inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email Inválido</div>';
        header("Location: cadastro.php");
        exit();
    }
    
    $_SESSION['logged'] = true;
    $_SESSION['nome'] = $nome;
    $_SESSION['login'] = $email;
    $_SESSION['senha'] = $senhaUser;
    $sql = "INSERT INTO cadastro (nome, email, CPF, cidade, telefone, nascimento, genero, senha, confirmacaoSenha) VALUES ('$nome', '$email', '$cpf', '$cidade', '$telefone', '$nascimento', '$genero', '$senhaUser ', '$confirmSenha')";
    $result = mysqli_query($conn, $sql);


    header('Location: calendario.php');

?>