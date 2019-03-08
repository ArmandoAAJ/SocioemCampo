<?php 
if (!isset($_SESSION)) session_start();
include 'conecta.php';
if (!isset($_SESSION['UsuarioID'])) {
	session_destroy();
	header("Location: login.php"); 
	exit();
};
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8"/>
	<title>SÓCIO EM CAMPO</title>

	<link rel="stylesheet" type="text/css" href="tabelas/css/dataTables.bootstrap4.min.css">

</head>
<body>

	<?php
	include 'menu.php';
	?>

	<div class="breadcrumb-holder">
		<ul class="breadcrumb">
			<li class="breadcrumb-item  " >Home</a></li>
			<li class="breadcrumb-item active">Check In</li>
		</ul>
	</div>

	<h1></h1>

	<?php
               //CONFIRMA 
	if (isset($_GET['msg'])) {

		$msg = $_GET['msg'];

		switch ($msg) {
			case '1':
			?>

			<div class="container-fluid">
				<div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
					<strong>EVENTO INSDISPONÍVEL PARA REALIZAR CHECK IN!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;
			case '2':
			?>

			<div class="container-fluid">
				<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
					<strong>ATENÇÃO, SÓ É PERMITIDO UMA ÁREA PARA CADA COMPETIÇÃO!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>

			<?php
			break;
			case '3':
			?>

			<div class="container-fluid" >
				<div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
					<strong>LAMENTAMOS, NÃO HÁ MAIS ÁREAS VAGAS PARA ESTE EVENTO!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;
			case '4':
			?>

			<div class="container-fluid" >
				<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
					<strong>PARABÉNS, ÁREA RESERVADA COM SUCESSO! CONFIRA SUA ÁREA EM MEUS CHECK INS.</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;
		}
	}
	?>  

	<?php
            //CANCELA
	if (isset($_GET['msg'])) {

		$msg = $_GET['msg'];

		switch ($msg) {
			case '5':
			?>
			<div class="container-fluid" >
				<div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
					<strong>EVENTO INDIPONÍVEL PARA CANCELAR CHECK IN!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;
			case '6':
			?>
			<div class="container-fluid" >
				<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
					<strong>VOCÊ NÃO POSSUE NENHUM CHECK IN NESTA COMPETIÇÃO!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;
			case '7':
			?>
			<div class="container-fluid" >
				<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
					<strong>CHECK IN CANCELADO COM SUCESSO!</strong> 
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
			</div>
			<?php
			break;

		}
	}

	?>

	<section class="forms">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-6">
					<div class="card">
						<div class="card-header d-flex align-items-center" >
							<h2 class="h5 display">Realizar Check In</h2>
						</div>
						<div class="card-body">
							<form  action="confirmacheckin.php" method="POST" >
								<div class="form-group">
									<label >Selecione a competição</label>
									<select class="form-control" name="confirmacheckin" id="confirmacheckin" >
										<?php 
										$sql1 = "SELECT * FROM competicao ORDER BY id DESC LIMIT 5 ";
										$query1 = mysqli_query($conexao,$sql1) or die(mysqli_error());
										while($prod1 = mysqli_fetch_array($query1)) { 
											?>
											<option value= <?php echo $prod1['id']?>><?php echo $prod1['nome'] ?> </option> 
										<?php } ?>
									</select>
								</div>
								<br>
								<div class="form-group">       
									<input type="submit" value="Confirmar" class="btn btn-success">
								</div>
							</form>
						</div>
					</div>
				</div>
			</select>


			<div class="col-lg-6">
				<div class="card">
					<div class="card-header d-flex align-items-center">
						<h2 class="h5 display">Cancelar Check In</h2>
					</div>
					<div class="card-body">
						<form  action="cancelacheckin.php" method="POST" >
							<div class="form-group">
								<label >Selecione a competição</label>
								<select class="form-control" name="cancelacheckin" id="cancelacheckin" >

									<?php 
									$sql1 = "SELECT * FROM competicao ORDER BY id DESC LIMIT 5 ";
									$query1 = mysqli_query($conexao,$sql1) or die(mysqli_error());
									while($prod1 = mysqli_fetch_array($query1)) { 
										?>
										<option value= <?php echo $prod1['id']?>><?php echo $prod1['nome'] ?> </option> 
									<?php } ?>
								</select>
								<br>
							</div>
							<div class="form-group">       
								<input type="submit" value="Confirmar" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>   

<h1></h1>

<div class="breadcrumb-holder">
	<ul class="breadcrumb">
		<li class="breadcrumb-item  " >Check In</a></li>
		<li class="breadcrumb-item active">Meus Check In</li>
	</ul>
</div>

<h1></h1>

<?php

$UsuarioID = $_SESSION['UsuarioID'];

$sql = "SELECT * FROM checkin where id_Usuario = '$UsuarioID' order by id DESC ";
$query = mysqli_query($conexao,$sql) or die(mysqli_error());

$i=0;

?>

<div class="container-fluid">
	<div class="card-deck">
		<div class="card border-success">
			<div class="card-body">
				<div class="container-fluid">
					<div class="table-responsive">
						<table id="example" class="table table-striped table-bordered">
							<thead>
								<tr>
									<th bgcolor="#00c853" >#</th>
									<th bgcolor="#00c853" >Competição</th>
									<th bgcolor="#00c853" >Área</th>
								</tr>
							</thead>
							<tbody>
								<?php     while($dados = mysqli_fetch_array($query)) {  
									$i++;

									$auxiliar = $dados['id_cadastroCompeticao'];

									$sqlcomp = "SELECT * FROM competicao where id = '$auxiliar' ";
									$querycomp = mysqli_query($conexao,$sqlcomp) or die(mysqli_error());

									while($dadoscomp = mysqli_fetch_array($querycomp)) {
										?>
										<tr>
											<td> <?php  echo $i ;?> </td>
											<td> <?php  echo $dadoscomp['nome'];?>             </td>
											<td> <?php  echo $dados['area'] ;?>             </td>

										</tr>
									<?php  }} ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<h1></h1>

	<footer class="page-footer font-small navbar-dark bg-dark">


		<div class="footer-copyright text-center py-3" style="color: #e8eaf6">© 2018 Copyright:
			<a href="" style="color: #e8eaf6"> Sócio em Campo</a>
		</div>

	</footer>



	<script src="tabelas/js/jquery.dataTables.min.js"></script> 
	<script src="tabelas/js/dataTables.bootstrap4.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#example').DataTable({
				"language": {
					"lengthMenu": "Mostrando _MENU_ registros por página",
					"zeroRecords": "Nenhum registro encontrado",
					"info": "",
					"infoEmpty": "Nenhum registro disponível",
					"sSearch":"Busca",
					"oPaginate": {
						"sNext": "Próximo",
						"sPrevious": "Anterior",
						"sFirst": "Primeiro",
						"sLast": "Último"
					},
					"infoFiltered": "(filtrado de _MAX_ registros no total)"
				}
			});
		});
	</script>

</body>
</html>