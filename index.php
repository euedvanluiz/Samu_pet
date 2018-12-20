<?php
session_start();
if(!empty($_SESSION['id'])){

}else{
	$_SESSION['msg'] = "Área restrita";
	header("Location: login.php");	
}
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<title>SamuPet-Beta1</title>
		<meta name="description" content="Formulario de Cadastro">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 		
	</head>
	<body>
		<center><h1>Cadastro SamuPet</h1></center>
		<center><h3>Digite os Dados</h3></center> 
		<center>
		<?php
		if(isset($_SESSION['msg']))
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		?>
		</center>
		  
		<form method="POST" action="processa.php">
			<!-- DADOS PESSOAIS-->
			<fieldset>
			 <legend>Dados do Animal</legend>
			 <table cellspacing="10">
			  <tr>
			   <td>
				<label for="nomedoanimal">Nome do Animal: </label>
			   </td>
			   <td align="left">
				<input type="text" name="nomedoanimal" size="40">
			   </td>
				<td>
				<label for="especie">Espécie:</label>
			   </td>
			   <td align="left">
				<select name="especie"> 
				<option value="Cachorro">Cachorro</option> 
				<option value="Gato">Gato</option> 
			   </select>
			   </td>
			  </tr>
			  <tr>
			   <td>
				<label for="raca">Raça: </label>
			   </td>
			   <td align="left">
				<input type="text" name="raca" size="40" maxlength="20"> 
			   </td>
			  </tr>
			  <tr>
			   <td>
				<label for="pelagem">Pelagem: </label>
			   </td>
			   <td align="left">
				<input type="text" name="pelagem" size="40"> 
			   </td>
			   <td>
				<label for="idade">Idade: </label>
			   </td>
			   <td align="left">
				<input type="text" name="idade" size="40"> 
			   </td>
			   <tr>
				<td>
				<label for="sexo">Sexo:</label>
			   </td>
			   <td align="left">
				<select name="sexo"> 
				<option value="Masculino">Masculino</option> 
				<option value="Feminino">Feminino</option> 
			   </select>
			   </td>
			   </tr>
			   <tr>
			   <td>
				<label for="porte">Porte:</label>
			   </td>
			   <td align="left">
				<select name="porte"> 
				<option value="Pequeno">Pequeno</option> 
				<option value="Medio">Medio</option>
				<option value="Grande">Grande</option> 
			   </select>
			   </td>
			  </tr>
			  <tr>
			   <td>
				<label for="peso">Peso: </label>
			   </td>
			   <td align="left">
				<input type="text" name="peso" size="40" maxlength="20"> 
			   </td>
			  </tr>
			  <tr>
			  </tr>
			 </table>
			</fieldset>
			<br />
			
			<!-- Dados do Propietario -->
			
			<fieldset>
			 <legend>Dados do Propietario</legend>
			 <table cellspacing="10">

			 <tr>
			   <td>
				<label for="nome">Nome: </label>
			   </td>
			   <td align="left">
				<input type="text" name="nome" size="40">
			   </td>
			  </tr>
			   <tr>
			   <td>
				<label for="cpf">CPF: </label>
			   </td>
			   <td align="left">
				<input type="text" name="cpf" size="40">
			   </td>
			  </tr>
			  <tr>
			   <td>
				<label for="rua">Rua:</label>
			   </td>
			   <td align="left">
				<input type="text" name="rua">
			   </td>
			   <td>
				<label for="numero">Numero:</label>
			   </td>
			   <td align="left">
				<input type="text" name="numero" size="4">
			   </td>
			  </tr>
			  
			  <tr>
			   <td>
				<label for="bairro">Bairro: </label>
			   </td>
			   <td align="left">
				<input type="text" name="bairro">
			   <td>
				<label for="cidade">Cidade: </label>
			   </td>
			   <td align="left">
				<select name="cidade"> 
				<option value="Ipojuca">Ipojuca</option> 
			   </select>
			   </td>
			  </tr>
			  
			  <tr>
			   <td>
				<label for="telefone">Telefone: </label>
			   </td>
			   <td align="left">
				<input type="text" name="telefone">
			   </td>
			  </tr>
			  
			  <tr>
				<td>
				<label for="castrado">Castrado?:</label>
			   </td>
			   <td align="left">
				<select name="castrado"> 
				<option value="Sim">Sim</option> 
				<option value="Nao">Não</option> 
			   </select>
			   </td>
			   <td>
				<label for="vacinado">Vacinado?:</label>
			   </td>
			   <td align="left">
				<select name="vacinado"> 
				<option value="Sim">Sim</option> 
				<option value="Nao">Não</option> 
			   </select>
			   </td>
			   </tr>
			   
			  <tr>
			   <td>
				<label for="obs">Observação: </label>
			   </td>
			   <td align="left">
				<textarea name="obs" rows="4" cols="40" placeholder="Digite o sua Observação..."></textarea> 
			   </td>
			  </tr>
			  
			 </table>
			</fieldset>
			<br />
			<input type="submit" value="Efetuar Cadastro" name="enviar">
			<input type="reset" value="Limpar">
		</form>
	</body>
</html>