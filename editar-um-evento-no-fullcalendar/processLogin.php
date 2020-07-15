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
    
    
    //1 - Verifica se a origem da requisição é do mesmo domínio da aplicação
    if (isset($_SERVER['HTTP_REFERER']) && ($_SERVER['HTTP_REFERER'] != "http://localhost/editar-um-evento-no-fullcalendar/login.php" )){
        $retorno = array('codigo' => '0', 'mensagem' => 'Origem da requisição não autorizada!');
        echo json_encode($retorno);
        exit();
    }
    
    
    
    // Recebe os dados do formulário
    $email = $_GET['email'];
    $senhaUser = $_GET['senha'];

    //$senhaUser = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_SPECIAL_CHARS);
    //$confereSenhaUser = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_MAGIC_QUOTES);

    $id = "SELECT id FROM cadastro WHERE email LIKE \"%".$email."%\"";
    $nome = (isset($_GET['nome'])) ? $_GET['nome'] : '' ;
    
    
    // 2 - Validações de preenchimento e-mail e senha se foi preenchido o e-mail
    if (empty($email)){
        $retorno = array('codigo' => '0', 'mensagem' => 'Preencha seu e-mail!');
        echo json_encode($retorno);
        exit();
    }
    
    if (empty($senhaUser)){
        $retorno = array('codigo' => '0', 'mensagem' => 'Preencha sua senha!');
        echo json_encode($retorno);
        exit();
    }
    
    
    // 3 - Verifica se o formato do e-mail é válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $retorno = array('codigo' => '0', 'mensagem' => 'Formato de e-mail inválido!');
        echo json_encode($retorno);
        exit();
    }
    
    
    // 4 - Válida os dados do usuário com o banco de dados
    $sql = "SELECT * FROM cadastro WHERE email LIKE \"%".$email."%\"";    
    $result = mysqli_query($conn, $sql);

    $fields = mysqli_fetch_array($result);

    if(isset($fields['email']) == $email){
        if(isset($fields['senha']) == $senhaUser){
            $_SESSION['logged'] = true;
            $_SESSION['nome'] = $nome;
            $_SESSION['login'] = $email;
            $_SESSION['senha'] = $senhaUser;
            header('Location: index.php');
        }
        else{
            $retorno = array('codigo' => '0', 'mensagem' => 'Senha Invalida!');
            echo json_encode($retorno);
            $_SESSION['logged'] = false;
            //header("Location: login.php");
        }
    }
    else{
        $_SESSION['logged'] = false;
        unset($_SESSION['nome']);
        unset ($_SESSION['login']);
        unset ($_SESSION['senha']);
        //header('Location: login.php');
    }    
    
    
    
    // Se logado envia código 1, senão retorna mensagem de erro para o login
    if ($_SESSION['logged'] == true){
        $retorno = array('codigo' => 1, 'mensagem' => 'Logado com sucesso!');
        //echo json_encode($retorno);
        exit();
    }
    else{
        $retorno = array('codigo' => '0', 'mensagem' => 'Você não está logado, faça o login para continuar.');
        echo json_encode($retorno);
        exit();
    }
?>