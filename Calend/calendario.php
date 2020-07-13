<?php

    include_once ("conexao.php");

    $result_eventos = "SELECT * FROM consulta";
    $resultado_eventos = mysqli_query($connect, $result_eventos);

    function montaEventos(){
        global $connect;
        $data = $_GET['data_consulta'];
        $hora = $_GET['hora'];
        $nome = $_GET['nome'];

        $eventos = $connect->prepare("SELECT * FROM consulta");
        $eventos->execute();

        $retorno = array();
        while($row = $eventos->fetch()){
            $retorno[$row->$data] = array(
                'nome' => $row->$nome,
                'hora' => $row->$hora
            );
        }
        return $retorno;
    }
    //CONTAGEM DE DIAS EM CADA MES
    function diasMeses(){
        $retorno = array();

        for($i = 1; $i <= 12; $i++){
            $retorno[$i] = cal_days_in_month(CAL_GREGORIAN, $i, date('Y'));
        }
        return $retorno;
    }

    function semanasMes($ano) {

        $retorno = array();

        for($i=1; $i<=12; $i++){
            $data = new DateTime("$ano-$i-01");
            $dataFimMes = new DateTime($data->format('Y-m-t'));

            $numSemanaInicio = $data->format('W');
            $numSemanaFinal  = $dataFimMes->format('W') + 1;
    
            // Última semana do ano pode ser semana 1
            $retorno[$i] = ($numSemanaFinal < $numSemanaInicio)  
            ? (52 + $numSemanaFinal) - $numSemanaInicio
            : $numSemanaFinal - $numSemanaInicio;
        }
    
        return $retorno;
    }

    function marcarConsulta(){
        
    }

    //FORMAÇÃO DO CALENDARIO
    function CalendarioMes(){
        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );

        $diasSemana = array(
            'Domingo',
            'Segunda',
            'Terça',
            'Quarta',
            'Quinta',
            'Sexta',
            'Sabado'
        );

        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );
        $diasMeses = diasMeses();
        $arrayRetorno = array();

        for($i = 1; $i <= 12; $i++){
            $arrayRetorno[$i] = array();
            for($j = 1; $j <= $diasMeses[$i]; $j++){
                $dayMonth = gregoriantojd($i, $j, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2);
                if($weekMonth == 'Mun') 
                    $weekMonth = 'Mon';
                $arrayRetorno[$i][$j] = $weekMonth;
            }
        }
        
        echo '<a href="#" id="anteriorMes">&laquo; </a><a href = "#" id="proximoMes">&raquo</a>';
        echo'<table border="0" width="100%">';
        foreach($arrayMes as $num => $mes){
            echo '<tbody id="mes_'.$num.'" class="mes">';
            echo'<tr class="mes_title"><td colspan="7">'.$mes.'</td></tr><tr>';
            foreach($diasSemana as $i => $day){
                echo '<td>'.$day.'</td>';
            }
            echo '</tr><tr>';
            echo '</tr><tr>';
            $y = 0;
            foreach($arrayRetorno[$num] as $numero =>$dia){
                $y++;
                if($numero == 1){
                    $qtd = array_search($dia, $daysWeek);
                    for($i=1; $i<=$qtd; $i++){
                        echo '<td></td>';
                        $y+=1;
                    }
                }
                echo '<td>'.$numero.'</td>';
                if($y == 7){
                    $y=0;
                    echo '</tr><tr>';
                }
            }
            echo '</tr></tbody>';
        }
        echo '</table>';
        //print_r($arrayRetorno);
    }

    function CalendarioSemana(){
        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );

        $diasSemana = array(
            'Domingo',
            'Segunda',
            'Terça',
            'Quarta',
            'Quinta',
            'Sexta',
            'Sabado'
        );

        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );
        $semanasMeses = semanasMes(2020);
        $arrayRetorno = array();

        for($i = 1; $i <= 12; $i++){
            $arrayRetorno[$i] = array();
            for($j = 1; $j <= $semanasMeses[$i]; $j++){
                $dayMonth = gregoriantojd($i, $j, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2);
                if($weekMonth == 'Mun') 
                    $weekMonth = 'Mon';
                $arrayRetorno[$i][$j] = $weekMonth;
            }
        }
        
        echo '<a href="#" id="anterior">&laquo; </a><a href = "#" id="proximo">&raquo</a>';
        echo'<table border="0" width="100%">';
        
        foreach($arrayMes as $num => $mes){
            echo '<tbody id="mes_'.$num.'" class="mes">';                        //PARA COMEÇAR NO MES QUE A GNT TÁ
            echo'<tr class="mes_title"><td colspan="7">'.$mes.'</td></tr><tr>';  //IMPRIMIR O NOME DO MES
            foreach($diasSemana as $n => $semana){
                foreach($diasSemana as $i => $day){
                    echo '<td>'.$day.'</td>';                                        //IMPRIMIR O NOME DOS DIAS (DOM, SEG, ...)
                }
                echo '</tr><tr>';                                                    //PULA UMA LINHA PARA O MES 
                $y = 0;
                foreach($arrayRetorno[$num] as $numero =>$dia){
                    $y++;
                    if($numero == 1){
                        $qtd = array_search($dia, $daysWeek);
                        for($i=1; $i<=$qtd; $i++){
                            echo '<td></td>';
                            $y+=1;
                        }
                    }
                    echo '<td>'.$numero.'</td>';
                    if($y == 7){
                        $y=0;
                        echo '</tr><tr>';
                    }
                }
                echo '</tr></tbody>';
            }
            echo '</table>';
            //print_r($arrayRetorno);
            $n++;
        }
    }

    function CalendarioDia(){
        $daysWeek = array(
            'Sun',
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat'
        );

        $diasSemana = array(
            'Domingo',
            'Segunda',
            'Terça',
            'Quarta',
            'Quinta',
            'Sexta',
            'Sabado'
        );

        $arrayMes = array(
            1 => 'Janeiro',
            2 => 'Fevereiro',
            3 => 'Março',
            4 => 'Abril',
            5 => 'Maio',
            6 => 'Junho',
            7 => 'Julho',
            8 => 'Agosto',
            9 => 'Setembro',
            10 => 'Outubro',
            11 => 'Novembro',
            12 => 'Dezembro'
        );
        $diasMeses = diasMeses();
        $arrayRetorno = array();

        for($i = 1; $i <= 12; $i++){
            $arrayRetorno[$i] = array();
            for($j = 1; $j <= $diasMeses[$i]; $j++){
                $dayMonth = gregoriantojd($i, $j, date('Y'));
                $weekMonth = jddayofweek($dayMonth, 2);
                if($weekMonth == 'Mun') 
                    $weekMonth = 'Mon';
                $arrayRetorno[$i][$j] = $weekMonth;
            }
        }
        $y = $weekMonth;
        $num = 0;
        $num++;
        
        echo '<a href="#" id="anteriorDia">&laquo; </a><a href = "#" id="proximoDia">&raquo</a>';
        echo'<table border="0" width="100%">';
        
        $y = 0;
        foreach($arrayRetorno[$num] as $numero => $dia){
            $mes = 1;
            //foreach($diasSemana as $k => $day){
                //echo '<td>'.$day.'</td>';
                //echo '</tr><tr>';
                if($numero == 1){
                    $diaSemana = array_search($dia, $daysWeek);
                    for($i=1; $i<=$diaSemana; $i++){
                        //echo '<td></td>';
                        $y+=1;
                        
                    }
                }
                if($numero == $diasMeses[$mes]){
                    $mes++;
                }
                echo '<td>'.$mes.'</td>';
                if($diaSemana == 7){
                    $diaSemana = 1;
                    //echo '<tr>';
                }
            //}
            echo '<tbody id="dia_'.$dia.'" class="semana">';
            echo'<tr class="semana_title"><td colspan="7">'.$dia.'</td></tr><tr>';
                
            echo '</tr><tr>';

            echo '<id="dia_'.$numero.'" class="dia">';
            echo'<tr class="dia_title"><td colspan="7">'.$numero.'</td></tr><tr>';
            
            echo '</tr></tr></tbody>';
            
            echo '</table>';
        }
        
            /*
        $y = 0;
        $num = 1;

        foreach($arrayRetorno[$num] as $numero =>$dia){
            if($numero == 1){
                $qtd = array_search($dia, $daysWeek);
                /*for($i=1; $i<=$qtd; $i++){
                    //echo '<td></td>';
                    $y+=1;  
                }*/
            /*}
            $y++;
            if($y == 7){
                $y=0;
                //echo '</tr><tr>';
            }
            
            foreach($diasSemana as $i => $qnt){
                foreach($arrayMes as $num => $mes){
                    echo '<tbody id="mes_'.$num.'" class="mes">';
                    echo'<tr class="mes_title"><td colspan="7">'.$mes.'</td></tr><tr>';

                    echo '</tr><tr>';
                        
                }
                echo '<id="semana_'.$qtd.'" class="semana">';
                echo'<tr class="semana_title"><td colspan="7">'.$qtd.'</td></tr><tr>';
                
                echo '</tr><tr>';

                echo '<id="dia_'.$numero.'" class="semana">';
                echo'<tr class="semana_title"><td colspan="7">'.$numero.'</td></tr><tr>';
            }
            echo '</tr></tbody>';
        }
        echo '</table>';
        
        //print_r($arrayRetorno);*/
    }
    


?>
