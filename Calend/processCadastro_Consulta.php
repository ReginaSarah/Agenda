<?php
	include_once("conexao.php");
	$nome = mysqli_real_escape_string($connect, $_GET['name']);
    $cod = mysqli_real_escape_string($connect, $_GET['cod']);
    $telefone = mysqli_real_escape_string($connect, $_GET['telefone']);
    $convenio = mysqli_real_escape_string($connect, $_GET['convenio']);
    $cidade = mysqli_real_escape_string($connect, $_GET['cidade']);
    $medico = mysqli_real_escape_string($connect, $_GET['medico']);
    $data = mysqli_real_escape_string($connect, $_GET['data_consulta']);
    $hora = mysqli_real_escape_string($connect, $_GET['hora']);
	
	$result_cursos = "INSERT INTO consulta (nome, cod, telefone, convenio, cidade, medico, data_consulta, hora) VALUES ('$nome', '$cod', '$telefone', '$convenio', '$cidade', '$medico', '$data', '$hora')";	
	$resultado_cursos = mysqli_query($conn, $result_cursos);	
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso Cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/index.php'>
				<script type=\"text/javascript\">
					alert(\"Curso não foi cadastrado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>