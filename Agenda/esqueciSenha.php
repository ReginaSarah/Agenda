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
            Lembrou da senha?
            <a href = "index.php">
                Entre aqui
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
            <form id="formulario" autocomplete="off" method="GET" action="processSenha.php">
                <h6><br/>Nova Senha</h6>
                <div class="form-control">
                    <label for="email">Email:</label>
                    <input class="campo" type="text" id="email" name="email"/>
                </div>
                <div class="form-control">
                    <label for="CPF">Digite seu CPF:</label>
                    <input class="campo" type="text" id="CPF" name="CPF" minlength="14" maxlength="14" onkeypress="$(this).mask('000.000.000-00')"/>
                </div>
                <div class="form-control ">
                    <label for="senha">Nova senha:</label>
                    <input class="campo" type="password" id="senha" name="senha" />
                </div>
                <div class="form-control">
                    <label for="confirmacaoSenha">Confirme senha:</label>
                    <input class="campo" type="password" id="confirmacaoSenha" name="confirmacaoSenha" />
                </div>
                <br/>
                <button class="btn btn-primary" type = "submit" name="btn btn-primary" id="btn btn-primary"> Enviar </button>            
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>   
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