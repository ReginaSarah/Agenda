<?php
    include ("calendario.php");
    include_once ("conexao.php");

    //$nome = mysqli_real_escape_string($connect, $_GET['name']);
    //$cod = mysqli_real_escape_string($connect, $_GET['cod']);
    //$telefone = mysqli_real_escape_string($connect, $_GET['telefone']);
    //$convenio = mysqli_real_escape_string($connect, $_GET['convenio']);
    //$cidade = mysqli_real_escape_string($connect, $_GET['cidade']);
    //$medico = mysqli_real_escape_string($connect, $_GET['medico']);
    //$data = mysqli_real_escape_string($connect, $_GET['data_consulta']);
    //$hora = mysqli_real_escape_string($connect, $_GET['hora']);
    /*$info = array(
        'tabela' => 'eventos',
        'data' => 'data_consulta',
        'nome' => 'nome',
        'hora' => 'hora'
    );
    echo '<prev>';
    //print_r(montaEventos($info));
    die;*/
?>  

<html lang="pt-BR">
    <head>
        <meta charset="utf-8">

        <title>Agenda</title>
        
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        
        
        <script type="text/javascript" src="js/jquery-1.9.1.js"></script>
        <script type="text/javascript" src="js/functions.js"></script>
    
    </head>

    <body>
    <!--
        <script>
            $(document).ready(function(e) {
                $('.btn_modal').click(function(e) {
                    e.preventDefault();
                    $('#modal').fadeIn(500);
                });
                $('.fechar').click(function(e) {
                    $('#modal').fadeOut(500);
                    e.preventDefault();
                });
            });
        </script>

        <input type="button" value="Cadastrar Consulta" class="btn_modal"/>
        <div id="modal">
            <div class="modal-box">
                <div class="modal-header">
                    <h4 class="modal-title tex-center" id="myModalLabel">Cadastrar Consulta</h4>
                </div>
                <div class="modal-body">
                    <form method="GET" action="conexao.php" enctype="multipart/form-data">
                        <input name="name" type="text" class="form-control" placeholder="Nome">
                        <input name="cod" type="text" class="form-control" placeholder="Código">
                        <input name="telefone" type="text" class="form-control" placeholder="Telefone">
                        <input name="convenio" type="text" class="form-control" placeholder="Convênio">
                        <input name="cidade" type="text" class="form-control" placeholder="Cidade">
                        <input name="medico" type="text" class="form-control" placeholder="Médico">
                        <input name="data_consulta" type="date-local" class="form-control" placeholder="Data">
                        <input name="hora" type="time-local" class="form-control" placeholder="Hora">
                     
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Cadastrar</button>
                </div>
                <div class="fechar">X</div>
            </div>
        </div>

        <input type="button" value="Visualizar Consulta" class="btn_modal" />
        <div id="modal">
            <div class="modal-box">
                <div class="modal-header">
                    <h4 class="modal-title tex-center" id="myModalLabel">Visualizar Consulta</h4>
                </div>
                <div class="modal-body">
                    <?php 
                    /*     
                        while($row_eventos = mysqli_fetch_assoc($resultado_eventos)){ 
                    ?>
                            <tr>
                                <td><?php echo 'Nome: ' .$row_eventos['nome'] ?></br></td>
                                <td><?php echo 'Código: ' .$row_eventos['cod'] ?></br></td>
                                <td><?php echo 'Telefone: ' .$row_eventos['telefone'] ?></br></td>
                                <td><?php echo 'Convênio: ' .$row_eventos['convenio'] ?></br></td>
                                <td><?php echo 'Cidade: ' .$row_eventos['cidade'] ?></br></td>
                                <td><?php echo 'Indicação: ' .$row_eventos['medico'] ?></br></td>
                                <td><?php echo 'Data/Hora: ' .$row_eventos['data_consulta'] ?></br></td>
                            </tr>
                    
                    <?php } */?>
                </div>
                <div class="fechar">X</div>
            </div>
        </div>
-->
        <div class="calendario">
            <?php
                echo '<prev>';
                CalendarioDia(); 
            ?>
        </div>

        <script src="js/bootstrap.min.js"></script>

    </body>
</html>