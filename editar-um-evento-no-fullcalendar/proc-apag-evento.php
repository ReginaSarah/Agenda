<?php
	include_once("conexao.php");
	
    $idEvent = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    
	//if (!empty($id)) {
        //QUERY apagar no banco de dados o evento
        $query_event = "DELETE FROM consulta WHERE id LIKE $idEvent";
        $resultado_apagar = mysqli_query($conn, $query_event);
       /* $delete_event = $conn->prepare($query_event);
        
        $delete_event->bindParam("id", $idEvent);
        
        //Executar a QUERY para apagar o evento
        $delete_event->execute();

    //}*/
    header("index.php");
?>
