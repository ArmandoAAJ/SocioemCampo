<?php 
if (!isset($_SESSION)) session_start();
include 'conecta.php';
if (!isset($_SESSION['UsuarioID'])) {
  session_destroy();
  header("Location: login.php"); 
  exit();
};


date_default_timezone_set('America/Sao_Paulo');
$date = date('Y-m-d H:i');
$dateregistros = date('Y-m-d H:i:s');

$UsuarioID = $_SESSION['UsuarioID'];
$CompeticaoSelecionada = $_POST['cancelacheckin'];


$sql = "SELECT * FROM competicao where (id = '$CompeticaoSelecionada')";
$query = mysqli_query($conexao,$sql) or die(mysqli_error());
$dados = mysqli_fetch_assoc($query);

$sqlcheckin = "SELECT * FROM checkin where (id_Usuario = '$UsuarioID' AND id_cadastroCompeticao = '$CompeticaoSelecionada')";
$querycheckin = mysqli_query($conexao,$sqlcheckin) or die(mysqli_error());

while($dadoscheckin = mysqli_fetch_array($querycheckin))
{
  $areasorteada = $dadoscheckin[ 'area'];
  $idareasorteada = $dadoscheckin[ 'id_area' ];
}


if($date < $dados['datahorainicio'] OR $date > $dados['datahorafim'])  {

header("Location:checkin.php?msg=5"); 
die;
}
elseif (mysqli_num_rows($querycheckin) == FALSE)
{
 header("Location:checkin.php?msg=6"); 
 die;
}
else
{

  $sqlregistros = "INSERT INTO checkin_registros (id_Usuario, id_Cadastro_Competicao, id_Area, efetua_Checkin, cancela_Checkin, data) VALUES";
  $sqlregistros .= "('$UsuarioID','$CompeticaoSelecionada','$idareasorteada','-', 'SIM','$dateregistros')";
  $conexao->query($sqlregistros);

  mysqli_query($conexao,"DELETE FROM checkin WHERE id_Usuario = $UsuarioID AND id_cadastroCompeticao = '$CompeticaoSelecionada'");

  header("Location:checkin.php?msg=7"); 
  die;


}

?>



