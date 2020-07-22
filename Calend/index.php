<?php

//include "processLogin.php";

//session_start();
 
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	header("Location: index.php");
}
?>

<HTML>
    <header>
        <title>Login Agenda</title>
        <meta charset='UTF-8'/>
        <lind rel="stylesheet" href="css/style2.css">        
    </header>
    
    <body>

        <div id="header">
            Não tem uma conta? 
            <a href = "cadastro.php">
                Cadastre aqui
            </a>
        </div>
        <div id="content">
           

            <center>
                <form id="formulario-entrar" autocomplete="off" method="GET" action="processLogin.php">
                    <fieldset>
                        <legend>Entre</legend>
                        <input class="campo" type="text" id="email" name="email" placeholder="Email"/>
                        <br/>
                        <input class="campo" type="password" id="senha" name="senha" placeholder="Senha"/>
                        <br/>
                        <button class="button" type = "submit" name="btn-login" id="btn-login"> Entrar </button>
                    </fieldset>
                </form>
                
            </center>

        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="js/custom.js"></script>   
    </body>

    <footer>
            entre em contato conosco

    </footer>
</HTML>