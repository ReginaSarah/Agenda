<HTML>
    <header>
        <title>Login Agenda</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </header>
    
    <body>

        <script type="text/javascript" src="https://code.jquery.com/jquery-1.4.3.min.js"></script>
        <script type="text/javascript">
            $('input').click(function(){
                $.ajax({
                    url: 'processLogin.php',
                    success: function(data) {
                        alert(data);
                    },
                    email: function(){
                        alert("Email Inválido");
                    },
                    senha: function(){
                        alert("Senha Inválida");
                    }
                });
            });
        </script>

        <div id="content">
            Não tem uma conta? 
            <a href = "cadastro.php">
                Cadastre aqui
            </a>

            <?php
                session_start();
                if(isset($_SESSION['logged']) == true){
                    echo"<h1> Bem vindo ". $_SESSION['name'] . ".</h1>";
                }
            ?>

            <center>
                <form id="formulario-entrar" autocomplete="off" method="GET" action="processLogin.php">
                    <fieldset>
                        <legend>Entre</legend>
                        <input class="campo" type="text" id="email" name="email" placeholder="Email"/>
                        <br/>
                        <input class="campo" type="password" id="senha" name="senha" placeholder="Senha"/>
                        <br/>
                        <button class="button" type = "submit"> Enviar </button>
                    </fieldset>
                </form>
                
            </center>

        </div>

        <div id="footer">

        </div>
    </body>

    <footer>

    </footer>
</HTML>