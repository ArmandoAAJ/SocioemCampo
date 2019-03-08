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
	<title>Home</title>
</style>
</head>
<body >

	<?php
	include 'menu.php';
	?>

	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
		<ol class="carousel-indicators">
			<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
			<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img class="d-block w-100" src="home/img/proximojogo.jpg" alt="First slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="home/img/proximojogo.jpg" alt="Second slide">
			</div>
			<div class="carousel-item">
				<img class="d-block w-100" src="home/img/proximojogo.jpg" alt="Third slide">
			</div>
		</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>

	<H1></H1>

	<div>
		<div class="card bg-success text-white">
			<div class="card-body" align="center" style="font-size: 150% ">CRITÉRIOS DE PONTUAÇÕES</div>
		</div>
	</div>

	<H1></H1>

	<div class="container-fluid">
		<div class="card-deck">
			<div class="card border-success">
				<div class="card-header bg-transparent border-success">PONTOS POSITIVOS</div>
				<div class="card-body">
					<h5 class="card-title">GOLS</h5>
					<p class="card-text">Gol do campo de defesa: +10 pontos.</p>
					<p class="card-text">Gol da area do circulo central: +8 pontos.</p>
					<p class="card-text">Gol olimpico: +6 pontos.</p>
					<p class="card-text">Gol da intermediaria de ataque: +5.</p>
					<p class="card-text">Gol dentro da grande area: +4 pontos.</p>
					<p class="card-text">Gol dentro da pequena area: +3 pontos.</p>
					<p class="card-text">Gol de falta: +2 pontos.</p>
					<p class="card-text">Gol de penalti: +1 ponto.</p>
				</div>
			</div>
			<div class="card border-danger">
				<div class="card-header bg-transparent border-danger">PONTOS NEGATIVOS</div>
				<div class="card-body">
					<h5 class="card-title">CARTÕES</h5>
					<p class="card-text">Cartão Amarelo: -1 ponto.</p>
					<p class="card-text">Cartão Vermelho: -2 pontos.</p>
					<h5 class="card-title">GOL</h5>
					<p class="card-text">Gol contra: -5 pontos.</p>
				</div>
			</div>
		</div>
	</div>

	<h1></h1>
	<!-- Footer -->
	<footer class="page-footer font-small navbar-dark bg-dark">

		<!-- Copyright -->
		<div class="footer-copyright text-center py-3" style="color: #e8eaf6">© 2018 Copyright:
			<a href="" style="color: #e8eaf6"> Sócio em Campo</a>
		</div>
		<!-- Copyright -->

	</footer>
	<!-- Footer -->

</body>
</html>
