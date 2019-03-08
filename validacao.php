<?php 
if (!isset($_SESSION)) session_start();
include 'conecta.php';


$usuario = $_POST['usuario'];
$senha = $_POST['numCarterinha'];

$retornocpfcnpjlimpo = limpaCPF_CNPJ($usuario);
$usuario = $retornocpfcnpjlimpo;

// Validação do usuário/senha digitados

$sql = "SELECT * FROM usuario WHERE (usuario = '$usuario') AND (numCarterinha = '$senha') ";
$query = mysqli_query($conexao,$sql);

$resultado = mysqli_fetch_assoc($query);	

$_SESSION['UsuarioID'] = $resultado['id']; 
$_SESSION['UsuarioNome'] = $resultado['nome']; 
$_SESSION['UsuarioEmail'] = $resultado['email']; 
$_SESSION['UsuarioNivel'] = $resultado['nivel']; 
date_default_timezone_set('America/Sao_Paulo');
$_SESSION["ultimoAcesso"] = date("Y-n-j H:i:s"); 

if (mysqli_num_rows($query) != 1) {

session_destroy();
header("Location:Login.php?msg=1");	

}elseif($_SESSION['UsuarioNivel'] == 1){

$sqlt = "INSERT INTO user(id_usuario,data)VALUES ('".$_SESSION["UsuarioID"]."','".$_SESSION["ultimoAcesso"]."')";
$conexao->query($sqlt);

header("Location: index.php");

}else{

header("Location: homeadministrador.php");
};

function limpaCPF_CNPJ($valor){
$valor = trim($valor);
$valor = str_replace(".", "", $valor);
$valor = str_replace(",", "", $valor);
$valor = str_replace("-", "", $valor);
$valor = str_replace("/", "", $valor);
return $valor;
};

?>