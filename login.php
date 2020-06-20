<HTML>
    <header>
        <title>Login</title>
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
                <h2>Entrar</h2>
                <form method="GET" action="process2.php">
                    <input type="text" id="email" name="email" placeholder="Email"/>
                    <br/>
                    <input type="password" id="senha" name="senha" placeholder="Senha"/>
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