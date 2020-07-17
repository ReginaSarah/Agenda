<?php

session_start();

 
if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	header("Location: index.php");
}

?>

<HTML>
    <header>
        <title>Login Agenda</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
        <lind rel="stylesheet" href="css/personalizado.css">
        <link rel="shortcut icon" href="calendar.ico" />      
    </header>
    
    <body>
        <?php
            if (isset($_SESSION['msg'])) 
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        <center>
            <div id="content">
                Não tem uma conta? 
                <a href = "cadastro.php">
                    Cadastre aqui
                </a>

            
                <form  autocomplete="off" method="GET" action="processLogin.php">
                    <fieldset>
                        <legend>Entre</legend>
                        <div class="form-control form-control-lg">
                            <label for="nome">Nome:</label>
                            <input class="campo" type="text" id="nome" name="nome" />
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="email">Email:</label>
                            <input class="campo" type="text" id="email" name="email"/>
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="senha">Senha:</label>
                            <input class="campo" type="password" id="senha" name="senha" />
                        </div>
                        <br/>
                        <button class="btn btn-primary" type = "submit" name="btn btn-primary" id="btn btn-primary"> Entrar </button>
                    </fieldset>
                </form>
            </div>  
        </center>

        

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>   
    </body>

    <footer>
            Entre em contato conosco
    </footer>
</HTML>