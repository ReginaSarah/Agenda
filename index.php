<HTML>
    <header>
        <title>Titulo</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </header>

    <script>
        var boasVindas;
        var nomeVisitante;

        //nomeVisitante = prompt("Digite seu nome de princesa:");
        //boasVindas = " Welcome, bitch " + nomeVisitante;

        //alert(boasVindas);

        function enviar(){
            var content = document.getElementById('content');
            var email = document.getElementById('email').value;
            var senha = document.getElementById('senha').value;

            content.append("Email:" + email + "   Senha:" + senha);
            alert(email + senha); 
        }
    </script>
    
    <body>

        <div id="header" class="header">
            <center>
                <h1>Dicas Matrimoniais</h1>
            </center>
        </div>

        <div id="menu"> 
            <button class="button">
                <a href = "http://www.google.com">
                    Home
                </a>
            </button>
            <button class="button">Cadastro</button>
            <button class="button" >Contato</button>

        </div>

        <div id="content">
            <p></p>
            <br/>
            <p>Pulando linha</p>
            <center>
            <?php
            if($_SESSION['logged']){
                echo"<h1> Bem vindo".$_SESSION['name'] . ".</h1>"
            }
            else{
                echo "Voce não é bem vindo";
            }
            ?>
                <h2>Formulário de Cadastro</h2>
                <form method="GET" action="process.php">
                    <input type="text" id="nome" name="nome" placeholder="Nome"/>
                    <br/>
                    <input type="password" id="senha" name="senha" placeholder="Senha"/>
                    <br/>
                    <input type="text" id="email" name="email" placeholder="Email"/>
                    <br/>
                    <button class="button" type = "submit"> Enviar </button>
                </form>
                
            </center>

        </div>

        <div id="footer">

        </div>
    </body>

    <footer>

    </footer>
</HTML>