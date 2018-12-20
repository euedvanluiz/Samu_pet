<?php
session_start();
if(!empty($_SESSION['id'])){
	echo "Olá ".$_SESSION['nome'].", Bem vindo <br>";
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Área restrita</p>";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>SP-Inicio</title>
		<meta name="description" content="Formulario de Cadastro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 		
	</head>
	<body>
		<center><h1>Programa SamuPet</h1></center>
		<center><h3>Idealização: Deoclécio Lira</h3></center> 
		
		<center><input name="Cadastro" type="button" onClick="window.open('index.php')" value="Cadastro">
		
		<input name="Listagem" type="button" onClick="window.open('listar.php')" value="Listagem">
		
		<input name="Contagem" type="button" onClick="window.open('count.php')" value="Contagem">
		
		<input name="Busca" type="button" onClick="window.open('form.php')" value="Busca"></center><br>
		
		<center><input name="Sair" type="button" onClick="window.open('sair.php')" value="Sair"></center>
		

	</body>
</html>