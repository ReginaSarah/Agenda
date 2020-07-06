

<HTML>
    <header>
        <title>Cadastro Agenda</title>
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

        <div id="menu"> 
        </div>

        <div id="content">
            Já tem uma conta? 
            <a href = "login.php">
                Entre aqui
            </a>
        </div>
        <div>

            <center>
                <form id="formulario" autocomplete="off" method="GET" action="processCadastro.php">
                    <fieldset>
                        <legend>Registre-se</legend>
                        <input class="campo" type="text" id="nome" name="nome" placeholder="Nome"/>
                        <br/>
                        <input class="campo" type="text" id="email" name="email" placeholder="Email"/>
                        <br/>
                        <input class="campo" type="text" id="cidade" name="cidade" placeholder="Cidade - Estado"/>
                        <br/>
                        <input class="campo" type="date" id="nascimento" name="nascimento" placeholder="Nascimento"/>
                        <br/>
                        <input class="campo" type="text" id="genero" name="genero" placeholder="Gênero"/>
                        <br/>
                        <input class="campo" type="password" id="senha" name="senha" placeholder="Senha"/>
                        <br/>
                        <input class="campo" type="password" id="confirmacaoSenha" name="confirmacaoSenha" placeholder="Confirme a Senha"/>
                        <br/>
                    
                        <button class="button" type = "submit"> Cadastrar </button>
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