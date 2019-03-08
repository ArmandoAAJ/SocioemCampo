<?php 
error_reporting(E_ALL ^ E_DEPRECATED);
$conexao = mysqli_connect('localhost', 'root', '', 'socio');

mysqli_set_charset($conexao, 'utf8');

if ($conexao->connect_error) {
	
	die("Falha na conexão"). $conexao->connect_error;
};
?>
