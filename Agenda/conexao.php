<?php

    $host = 'localhost';
    $user = 'root';
    $senha = '';
    $db = 'eventos';

    //CONEXAO COM O BANCO DE DADOS
    $connect = mysqli_connect($host, $user, $senha, $db);

    $data = array();
    //QUERY PARA DATABASE
    $sql = "SELECT * FROM consulta";    
    $statement = $connect->prepare($sql);
    $statement->execute();

    $result = $statement -> mysqli_stmt::fetchAll();

    foreach($state as $row){
        $data[] = array(
            'id' => $row['id'],
            'nome' => $row['nome'],
            'cod'=> $row['cod'],
            'telefone' => $row['telefone'],
            'convenio' => $row['convenio'],
            'cidade' => $row['cidade'],
            'medico' => $row['medico'],
            'data_consulta' => $row['data_consulta']
        );
    }

    echo json_encode($data);
    

?>