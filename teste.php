<?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "cadastro";

//Criar a conexao
$con = mysqli_connect($servidor, $usuario, $senha, $dbname);
if ($con->connect_errno) {
    echo "Falha ao conectar ao banco: (" . $con->connect_errno . ") " . $con->connect_error;
}
 
$sql = "SELECT count (ID) FROM usuario WHERE especie=Cachorro";
$total = $r->fetch_object()->total;
echo "Resultado: {$total} linhas";
?>