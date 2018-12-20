<?php
session_start();
?>

<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>SamuPet - Login</title>
	</head>
	<body>
		<center><h1>Login SamuPet</h1></center>
		<center><h3>Idealização: Deoclécio Lira</h3></center> 
		<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
		?>
		<form method="POST" action="valida.php">
		<fieldset>
			 <legend>Dados de Login</legend>
			 <table cellspacing="10">
			<label>Usuário:</label>
			<input type="text" name="usuario" placeholder="Digite o seu usuário"><br><br>

			
			<label>Senha:</label>
			<input type="password" name="senha" placeholder="Digite a sua senha"><br><br>
			
			<input type="submit" name="btnLogin" value="Acessar">
		</fieldset>
		
		</form>
		<br><br><br>
	</body>
</html>
