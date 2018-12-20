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
	<head>
		<title>SP-Listagem</title>
		<meta name="description" content="Pagina de Listagem">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 		
	</head>
	<body>
		<center><h1>Lista de Cadastros</h1></center>
		<center><h3>Listagem Completa</h3></center>
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
		
		$result_usuarios = "SELECT * FROM usuario LIMIT $inicio, $qnt_result_pg ";
		$resultado_usuario = mysqli_query($conn, $result_usuarios);
		while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
			echo "Numero de Cadastro: " . $row_usuario['ID'] . "<br>";
			echo "Nome do Animal: " . $row_usuario['nomedoanimal'] . "<br>";
			echo "Especie: " . $row_usuario['especie'] . "<br>";
			echo "Raça: " . $row_usuario['raca'] . "<br>";
			echo "Idade: " . $row_usuario['idade'] . "<br>";
			echo "Sexo: " . $row_usuario['sexo'] . "<br>";
			echo "Porte: " . $row_usuario['porte'] . "<br>";
			echo "Peso: " . $row_usuario['peso'] . "<br>";
			echo "Nome do Propietario: " . $row_usuario['nome'] . "<br>";
			echo "Rua: " . $row_usuario['rua'] . "<br>";
			echo "Numero: " . $row_usuario['numero'] . "<br>";
			echo "CPF: " . $row_usuario['cpf'] . "<br>";
			echo "Bairro: " . $row_usuario['bairro'] . "<br>";
			echo "Cidade: " . $row_usuario['cidade'] . "<br>";
			echo "Telefone: " . $row_usuario['telefone'] . "<br>";
			echo "Castrado: " . $row_usuario['castrado'] . "<br>";
			echo "Vacinado: " . $row_usuario['vacinado'] . "<br>";
			echo "Observação: " . $row_usuario['obs'] . "<br><hr>";	
		}
		
		//PAGINAÇÃO - SOMAR A QUANRIDADE DE USUARIOS
		$result_pg = "SELECT COUNT(ID) AS num_result FROM usuario";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
		echo "<a href='listar.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='listar.php?pagina=$quantidade_pg'>Ultima</a>";
		
		?>		
	</body>
</html>