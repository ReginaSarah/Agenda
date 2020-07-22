<?php
    session_start();
    if(isset($_SESSION['logged']) &&  $_SESSION['logged'] == true){
	    header("Location: index.php");
}
?>

<HTML>
    <header>
        <title>Cadastro Agenda</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" href="style2.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
        
    </header>
    
    <body>

        <div id="header">

            <h1> Agenda Radiografia </h1>
                    Já tem uma conta? 
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
    
                
            
                <form id="formulario-cad" autocomplete="off" method="GET" action="processCadastro.php">
                    <fieldset>
                        <h5><br/>Registre-se</h5>
                        
                        <div class="form-control">
                            <label for="nome">Nome:</label>
                            <input class="campo" type="text" id="nome" name="nome" placeholder="Nome"/>
                        </div>

                        <div class="form-control ">
                            <label for="email">Email:</label>
                            <input class="campo" type="text" id="email" name="email" placeholder="Email"/>
                        </div>
                        <div class="form-control ">
                            <label for="CPF">CPF:</label>
                            <input class="campo" type="text" id="CPF" name="CPF" placeholder="CPF" minlength="14" maxlength="14" onkeypress="$(this).mask('000.000.000-00')"/>
                        </div>
                        <div class="form-control ">
                            <label for="cidade">Cidade/Estado:</label>
                            <input class="campo" type="text" id="cidade" name="cidade" placeholder="Cidade - Estado"/>
                        </div>
                        <div class="form-control ">
                            <label for="telefone">Telefone:</label>
                            <input class="campo" type="text" id="telefone" name="telefone" placeholder="Telefone" minlength="15" maxlength="15" onkeypress="$(this).mask('(00) 00000-0000')" />
                        </div>
                        <div class="form-control ">
                            <label for="nascimento">Nascimento:</label>
                            <input class="campo" type="date" id="nascimento" name="nascimento" placeholder="Nascimento"/>
                        </div>
                        <div class="form-control ">
                            <label for="genero">Gênero:</label>
                            <input class="campo" type="text" id="genero" name="genero" placeholder="Fem/Mas/Pref. n declarar"/>
                        </div>
                        <div class="form-control ">
                            <label for="senha">Senha:</label>
                            <input class="campo" type="password" minlength="6" maxlength="16" id="senha" name="senha" placeholder="Senha (Mín 6 caracteres)"/>
                        </div>
                        <div class="form-control ">
                            <label for="confirmacaoSenha">Confirme sua Senha:</label>
                            <input class="campo" type="password" minlength="6" maxlength="16" id="confirmacaoSenha" name="confirmacaoSenha" placeholder="Confirme a Senha (Mín 6 caracteres)"/>
                        </div>
                        <br/>
                        <button class="btn btn-primary" type = "submit"> Cadastrar </button>
                    </fieldset>
                </form> 
            

        </div>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>   
        
    </body>

</HTML>