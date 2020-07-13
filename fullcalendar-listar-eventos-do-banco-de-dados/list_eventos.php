<?php
/*
 * @author Cesar Szpak - Celke - cesar@celke.com.br
 * @pagina desenvolvida usando FullCalendar,
 * o código é aberto e o uso é free,
 * porém lembre-se de conceder os créditos ao desenvolvedor.
 */

include 'conexao.php';

$query_events = "SELECT id, nome, data_consulta FROM consulta";
$resultado_events = $conn->prepare($query_events);
$resultado_events->execute();

$eventos = [];

while($row_events = $resultado_events->fetch(PDO::FETCH_ASSOC)){
    $id = $row_events['id'];
    $nome = $row_events['nome'];
    $data = $row_events['data_consulta'];
    
    $eventos[] = [
        'id' => $id, 
        'title' => $nome, 
        'start' => $data, 
        ];
}

echo json_encode($eventos);