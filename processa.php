<?php
session_start();
include_once("conexao.php");

$nomedoanimal = filter_input(INPUT_POST, 'nomedoanimal', FILTER_SANITIZE_STRING);
$especie = filter_input(INPUT_POST, 'especie', FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST, 'raca', FILTER_SANITIZE_STRING);
$pelagem = filter_input(INPUT_POST, 'pelagem', FILTER_SANITIZE_STRING);
$idade = filter_input(INPUT_POST, 'idade', FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST, 'sexo', FILTER_SANITIZE_STRING);
$porte = filter_input(INPUT_POST, 'porte', FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST, 'peso', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
$castrado = filter_input(INPUT_POST, 'castrado', FILTER_SANITIZE_STRING);
$vacinado = filter_input(INPUT_POST, 'vacinado', FILTER_SANITIZE_STRING);
$obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);


//echo "Nome do Animal: $nomedoanimal <br>";
//echo "Especie: $especie <br>";
//echo "Raça: $raca <br>";
//echo "Pelagem: $pelagem <br>";
//echo "Idade: $idade <br>";
//echo "Sexo: $sexo <br>";
//echo "Porte: $porte <br>";
//echo "Peso: $peso <br>";
//echo "Nome: $nome <br>";
//echo "CPF: $cpf <br>";
//echo "Rua: $rua <br>";
//echo "Numero: $numero <br>";
//echo "Bairro: $bairro <br>";
//echo "Cidade: $cidade <br>";
//echo "Telefone: $telefone <br>";
//echo "Castrado: $castrado <br>";
//echo "Vacinado: $vacinado <br>";
//echo "Observação: $obs <br>";

$result_usuario = "INSERT INTO usuario (nomedoanimal, especie, raca, pelagem, idade, sexo, porte, peso, nome, cpf, rua, numero, bairro, cidade, telefone, castrado, vacinado, obs) VALUES ('$nomedoanimal', '$especie', '$raca', '$pelagem', '$idade', '$sexo', '$porte', '$peso', '$nome', '$cpf', '$rua', '$numero', '$bairro', '$cidade', '$telefone', '$castrado', '$vacinado', '$obs')";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Animal Cadastrado com Sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi possivel cadastrar animal</p>";
	header("location: index.php");
}
