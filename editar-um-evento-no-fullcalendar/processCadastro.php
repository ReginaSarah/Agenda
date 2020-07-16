<?php

    include_once("conexao.php");

    $nome = $_GET['nome'];
    $email = $_GET['email'];
    $cidade = $_GET['cidade'];
    $genero = $_GET['genero'];
    $nascimento = $_GET['nascimento'];
    $senhaUser = sha1(sha1(md5(sha1(md5($_GET['senha'])))));
    $confirmSenha = sha1(sha1(md5(sha1(md5($_GET['confirmacaoSenha'])))));

    // SE ALGUM CAMPO ESTIVER VAZIO
    if (empty($nome) || empty($email) || empty($cidade) || empty($genero) || empty($nascimento) || empty($senhaUser) || empty($confirmSenha)){
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

    if(!(filter_var($email, FILTER_VALIDATE_EMAIL))){
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Email Inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Email Inválido</div>';
        header("Location: cadastro.php");
        exit();
    }
    

    //QUERY PARA DATABASE
    $sql = "INSERT INTO cadastro (nome, email, cidade, nascimento, genero, senha, confirmacaoSenha) VALUES ('$nome', '$email', '$cidade', '$nascimento', '$genero', '$senhaUser ', '$confirmSenha')";
    //$sql = "SELECT * FROM usuario WHERE id = 1";    
    $result = mysqli_query($conn, $sql);

    //echo "Inserção efetuada, ou não, pode ter dado erro <br/>" . $sql;

    //$dados = mysqli_fetch_array($result);

    header('Location: index.php');

?>