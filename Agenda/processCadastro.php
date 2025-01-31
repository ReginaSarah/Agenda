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
    //VERIFICA SE JÁ NAO EXISTE O MESMO EMAIL NO BANCO DE DADOS
    $result_perfil = "SELECT email, senha FROM cadastro";
    $resultado_perfil = mysqli_query($conn, $result_perfil);

    while($row_perfil = mysqli_fetch_array($resultado_perfil)){
        if($row_perfil['email'] == $email){
            $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Este email já existe, escolha outro</div>'];
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Este email já existe, escolha outro</div>';
            header("Location: cadastro.php");
            exit();
        }else if($row_perfil['senha'] == $senhaUser){
            $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: Esta senha já existe, escolha outro</div>'];
            $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">Esta senha já existe, escolha outro</div>';
            header("Location: cadastro.php");
            exit();
        }
    }

   function valida_cpf( $cpf = false ) {
       // Exemplo de CPF: 025.462.884-23
       
       /**
        * Multiplica dígitos vezes posições 
        *
        * @param string $digitos Os digitos desejados
        * @param int $posicoes A posição que vai iniciar a regressão
        * @param int $soma_digitos A soma das multiplicações entre posições e dígitos
        * @return int Os dígitos enviados concatenados com o último dígito
        *
        */
       if ( ! function_exists('calc_digitos_posicoes') ) {
           function calc_digitos_posicoes( $digitos, $posicoes = 10, $soma_digitos = 0 ) {
               // Faz a soma dos dígitos com a posição
               // Ex. para 10 posições: 
               //   0    2    5    4    6    2    8    8   4
               // x10   x9   x8   x7   x6   x5   x4   x3  x2
               //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
               for ( $i = 0; $i < strlen( $digitos ); $i++  ) {
                   $soma_digitos = $soma_digitos + ( $digitos[$i] * $posicoes );
                   $posicoes--;
               }
        
               // Captura o resto da divisão entre $soma_digitos dividido por 11
               // Ex.: 196 % 11 = 9
               $soma_digitos = $soma_digitos % 11;
        
               // Verifica se $soma_digitos é menor que 2
               if ( $soma_digitos < 2 ) {
                   // $soma_digitos agora será zero
                   $soma_digitos = 0;
               } else {
                   // Se for maior que 2, o resultado é 11 menos $soma_digitos
                   // Ex.: 11 - 9 = 2
                   // Nosso dígito procurado é 2
                   $soma_digitos = 11 - $soma_digitos;
               }
        
               // Concatena mais um dígito aos primeiro nove dígitos
               // Ex.: 025462884 + 2 = 0254628842
               $cpf = $digitos . $soma_digitos;
               
               // Retorna
               return $cpf;
           }
       }
       
       // Verifica se o CPF foi enviado
       if ( ! $cpf ) {
           return false;
       }
    
       // Remove tudo que não é número do CPF
       // Ex.: 025.462.884-23 = 02546288423
       $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
    
       // Verifica se o CPF tem 11 caracteres
       // Ex.: 02546288423 = 11 números
       if ( strlen( $cpf ) != 11 ) {
           return false;
       }   
    
       // Captura os 9 primeiros dígitos do CPF
       // Ex.: 02546288423 = 025462884
       $digitos = substr($cpf, 0, 9);
       
       // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
       $novo_cpf = calc_digitos_posicoes( $digitos );
       
       // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
       $novo_cpf = calc_digitos_posicoes( $novo_cpf, 11 );
       
       // Verifica se o novo CPF gerado é idêntico ao CPF enviado
       if ( $novo_cpf === $cpf ) {
           // CPF válido
           return true;
       } else {
           // CPF inválido
           return false;
       }
   }
   if ( !valida_cpf( $cpf ) ) {
        $retorna = ['sit' => false, 'msg' => '<div class="alert alert-danger" role="alert">Erro: CPF inválido</div>'];
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">CPF inválido</div>';
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