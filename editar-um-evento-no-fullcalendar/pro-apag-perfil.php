<?php
	include_once("conexao.php");
	
	$id = $_GET['id'];
	
	$result_perfil = "DELETE FROM cadastro WHERE id = '$id'";
	$resultado_perfil = mysqli_query($conn, $result_perfil);	

	header("Location: perfil.php");
?>

<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Cadastro Apagado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/Aula/perfil.php'>
				<script type=\"text/javascript\">
					alert(\"Cadastro Não Foi Apagado com Sucesso.\");
				</script>
			";	
		}?>
	</body>
</html>

<?php $conn->close(); ?>