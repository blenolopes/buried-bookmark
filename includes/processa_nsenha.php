<?php
include("admin_session.php");
include("secure.php");

$nsenha  = $_POST['nova_senha'];
$usuario = $_SESSION['usuario'];

$banco = "bookmark";
$sql   = "UPDATE tb_usuarios SET senha = '" . sha1($nsenha) . "' WHERE email = '" . $usuario . "'";

$conexao = mysql_connect($host_db, $user_db, $pass_db);
if(!$conexao) {
	echo "ERRO: N�o foi poss�vel conectar: " . mysql_error();
	exit();
}
	
$db = mysql_select_db($banco, $conexao);
if(!$db) {
	echo "ERRO: N�o foi possivel conectar: " . mysql_error();
	exit();
}

$query = mysql_query($sql, $conexao);
if(!$query) {
	echo "ERRO: N�o foi possivel conectar: " . mysql_error();
	exit();
}

header("Location: ../inicio.php?modulo=adminsenhasok");

?>