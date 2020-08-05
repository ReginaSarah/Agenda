<?php

session_start();

 
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	header("Location: calendario.php");
}

?>

<HTML>
    <header>
        <title>Login Agenda</title>
        <meta charset='UTF-8'/>
        
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
    </header>
    
    <body>

        <div id="header">
            <h1> Agenda Radiografia </h1>
            Não tem uma conta? 
            <a href = "cadastro.php">
                Cadastre aqui
            </a>

            <?php
                if (isset($_SESSION['msg'])) 
                {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                }
            ?>
        </div>
        
        
        <div id="content">
            <form id="formulario" autocomplete="off" method="GET" action="processLogin.php">
                <h4><br/>Entre</h4>
                <div class="form-control form-control-lg">
                    <label for="email">Email:</label>
                    <input class="campo" type="text" id="email" name="email"/>
                </div>
                <div class="form-control form-control-lg">
                    <label for="senha">Senha:</label>
                    <input class="campo" type="password" id="senha" name="senha" />
                </div>
                
                <a href = "esqueciSenha.php">
                    Esqueci minha senha :(
                </a>
                <br/><br/>
                <button class="btn btn-primary" type = "submit" name="btn btn-primary" id="btn btn-primary"> Entrar </button>            
            </form>
            <br/><br/><br/><br/>
            <br/><br/><br/><br/><br/>   
            <br/><br/><br/><br/><br/>        
            
            <div>&nbsp;</div>

            <div>
                <dd><font size="-1">Shopping 33 Torre 1 Sala 505, bairro Vila Santa Cecília, Volta Redonda (RJ)</font></dd>
                <dd><font size="-1">(21) 3333-3333</font></dd>
            </div>
        </div>
        
        
     
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script>
            $('input').click(function(){
                $.ajax({
                    url:'contato.html',
                    success:funtion(data){
                        $('div').html(data);
                    },
                    beforeSend: function(){
                        $('div').hide(html);
                    },
                });
            });
        </script> 
    </body>
</HTML>