<HTML>
    <header>
        <title>Cadastro Agenda</title>
        <meta charset='UTF-8'/>
        <link rel="stylesheet" href="css/personalizado.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">  
    </header>
    
    <body>

        
    <?php
            if (isset($_SESSION['msg'])) 
            {
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>

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
                        <div class="form-control form-control-lg">
                            <label for="nome">Nome:</label>
                            <input class="campo" type="text" id="nome" name="nome" placeholder="Nome"/>
                        </div>

                        <div class="form-control form-control-lg">
                            <label for="email">Email:</label>
                            <input class="campo" type="text" id="email" name="email" placeholder="Email"/>
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="cidade">Cidade/Estado:</label>
                            <input class="campo" type="text" id="cidade" name="cidade" placeholder="Cidade - Estado"/>
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="nascimento">Nascimento:</label>
                            <input class="campo" type="date" id="nascimento" name="nascimento" placeholder="Nascimento"/>
                        </div>
                        <div class="form-control form-control-lg">
                            <label class="my-1 mr-2" for="genero">Gênero:</label>
                            <select >
                                <option selected value="Fem">Feminino</option>
                                <option value="Mas">Masculino</option>
                                <option value="NA">Prefiro não declarar</option>
                            </select>
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="senha">Senha:</label>
                            <input class="campo" type="password" id="senha" name="senha" placeholder="Senha"/>
                        </div>
                        <div class="form-control form-control-lg">
                            <label for="confirmacaoSenha">Confirme sua Senha:</label>
                            <input class="campo" type="password" id="confirmacaoSenha" name="confirmacaoSenha" placeholder="Confirme a Senha"/>
                        </div>
                    
                        <button class="btn btn-primary" type = "submit"> Cadastrar </button>
                    </fieldset>
                </form> 
            </center>

        </div>

        <div id="footer">
            Entre em contato conosco
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="js/custom.js"></script>   
        
    </body>

    <footer>

    </footer>
</HTML>