<?php
session_start();
include_once("conexao.php");
if(!empty($_SESSION['id'])){

}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<!--Inicio da Pagina-->

	<head>
		<title>Numero de Registros</title>
		<meta name="description" content="Pagina com numero de registros detalhados">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 		
	</head>
	<body>
		<center><h1>Quantidade de Cadastros</h1></center>
		<center><h3>Listagem Completa</h3></center>
	
<fieldset>
	<legend>Cão ou Gato</legend>
		<table cellspacing="10">
			<tr>
				<td>
<?php

	//VALOR POR DOG
	$result_count = "SELECT count(ID) AS total FROM usuario WHERE especie = 'Cachorro'";
	$resultado_count = mysqli_query($conn, $result_count);
	$values_count = mysqli_fetch_assoc($resultado_count);
	$num_rows = $values_count{'total'};

	//VALOR POR GATO
	$result_count2 = "SELECT count(ID) AS total FROM usuario WHERE especie = 'Gato'";
	$resultado_count2 = mysqli_query($conn, $result_count2);
	$values_count2 = mysqli_fetch_assoc($resultado_count2);
	$num_rows2 = $values_count2{'total'};
	
		//IMPRESSÃO DO CODIGO
		echo "Cachorro: " . $num_rows . "<br>";
		echo "Gato: " . $num_rows2 . "<br>";
?>
				</td>
			</tr>
		</table>
</fieldset>

	</body>
</html>
