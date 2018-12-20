<?php
session_start();
include_once("conexao.php");
if(!empty($_SESSION['id'])){

}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>

<html lang="pt-br">
	<head>
		<title>SP-Resultado</title>
		<meta name="description" content="Pagina de resultado por CPF">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 		
	</head>
	<body>
		<center><h1>Resultado</h1></center>
	</body>
</html>

<?php

	if(isset($_SESSION['msg'])){
	echo $_SESSION['msg'];
	unset($_SESSION['msg']);
}
//Receber o Numero da Pagina
$pagina_atual = filter_input(INPUT_GET,'pagina',FILTER_SANITIZE_NUMBER_INT);
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1 ;
		
//Setar a Quantidade por Pagina
$qnt_result_pg = 5;
		
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

//INICIO DO CODIDO
	$pesquisar_esp = $_POST['pesquisaresp'];
	$result_esp = "SELECT * FROM usuario WHERE cpf LIKE '%$pesquisar_esp%' LIMIT $inicio, $qnt_result_pg";
	$resultado_especies = mysqli_query($conn, $result_esp);
	
	while($row_esp = mysqli_fetch_array($resultado_especies)){
		echo "Numero de Cadastro: " . $row_esp['ID'] . "<br>";
		echo "Nome do Animal: " . $row_esp['nomedoanimal'] . "<br>";
		echo "Especie: " . $row_esp['especie'] . "<br>";
		echo "Raça: " . $row_esp['raca'] . "<br>";
		echo "Idade: " . $row_esp['idade'] . "<br>";
		echo "Sexo: " . $row_esp['sexo'] . "<br>";
		echo "Porte: " . $row_esp['porte'] . "<br>";
		echo "Peso: " . $row_esp['peso'] . "<br>";
		echo "Nome do Propietario: " . $row_esp['nome'] . "<br>";
		echo "CPF: " . $row_esp['cpf'] . "<br>";
		echo "Rua: " . $row_esp['rua'] . "<br>";
		echo "Numeo: " . $row_esp['numero'] . "<br>";
		echo "Bairro: " . $row_esp['bairro'] . "<br>";
		echo "Cidade: " . $row_esp['cidade'] . "<br>";
		echo "Telefone: " . $row_esp['telefone'] . "<br>";
		echo "Castrado: " . $row_esp['castrado'] . "<br>";
		echo "Vacinado: " . $row_esp['vacinado'] . "<br>";
		echo "Observação: " . $row_esp['obs'] . "<br><hr>";	
	}
	
		//PAGINAÇÃO - SOMAR A QUANRIDADE DE USUARIOS
		$result_pg = "SELECT COUNT(especie) AS num_result FROM usuario";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='pesquisar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='pesquisar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='pesquisar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='pesquisar.php?pagina=$quantidade_pg'>Ultima</a>";
?>