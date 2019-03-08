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

//recebe dados do usuario;
$UsuarioID = $_SESSION['UsuarioID'];
$CompeticaoSelecionada = $_POST['confirmacheckin'];

// seleciona a competição escolhida pelo usuario
$sql = "SELECT * FROM competicao where (id = '$CompeticaoSelecionada')";
$query = mysqli_query($conexao,$sql) or die(mysqli_error());
$dados = mysqli_fetch_assoc($query);

//verifica se há um checkin para esta competição e este usuario
$sqlcheckin = "SELECT * FROM checkin where (id_Usuario = '$UsuarioID' AND id_cadastroCompeticao = '$CompeticaoSelecionada')";
$querycheckin = mysqli_query($conexao,$sqlcheckin) or die(mysqli_error());


//verifica se há areas disponiveis para está competição
$sqlcontador = "SELECT id_area FROM checkin where (id_cadastroCompeticao = '$CompeticaoSelecionada' )";
$querycontador = mysqli_query($conexao,$sqlcontador) or die(mysqli_error());




if($date < $dados['datahorainicio'] OR $date > $dados['datahorafim'])  {

	header("Location:checkin.php?msg=1"); 
	die;

}elseif (mysqli_num_rows($querycheckin) == TRUE) {
	header("Location:checkin.php?msg=2"); 
	die;
}elseif (mysqli_num_rows($querycontador) == 13) {
	header("Location:checkin.php?msg=3"); 
	die;
}else{

	$area = rand(1,13);

//busca se a area sorteada ja esta sendo usada
	$sqlteste = "SELECT id_area from checkin  where(id_cadastroCompeticao = '$CompeticaoSelecionada' AND id_area = '$area')";
	$queryteste = mysqli_query($conexao,$sqlteste) or die(mysqli_error());

//busca uma nova area para novo usuario
	while($dadosteste = mysqli_fetch_assoc($queryteste) == TRUE) {
		$area = rand(1,15);
		$sqlteste = "SELECT id_area from checkin  where(id_cadastroCompeticao = '$CompeticaoSelecionada' AND id_area = '$area')";
		$queryteste = mysqli_query($conexao,$sqlteste) or die(mysqli_error());
	};
	
	$sqlbuscaarea = "SELECT areas FROM areas where(id = '$area')";
	$querybuscaarea = mysqli_query($conexao,$sqlbuscaarea) or die(mysqli_error());
	$dadosbuscaarea = mysqli_fetch_assoc($querybuscaarea);
	$areasorteada = $dadosbuscaarea['areas'];


	$sqlinsertck = "INSERT INTO checkin (id_Usuario, id_cadastroCompeticao, area, id_area) VALUES";
	$sqlinsertck .= "('$UsuarioID','$CompeticaoSelecionada','$areasorteada','$area')";
	$conexao->query($sqlinsertck) ;

	$sqlregistros = "INSERT INTO checkin_registros (id_Usuario, id_Cadastro_Competicao, id_Area, efetua_Checkin, cancela_Checkin, data) VALUES";
	$sqlregistros .= "('$UsuarioID','$CompeticaoSelecionada','$area','SIM', '-','$dateregistros')";
	$conexao->query($sqlregistros);
	
	header("Location:checkin.php?msg=4"); 

};

?>