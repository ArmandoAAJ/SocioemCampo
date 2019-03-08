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
<htm lang="pt-br">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta charset="UTF-8"/>
    <title>MENU</title>

    <link rel="stylesheet" href="menu/css/bootstrap.min.css">

  </head>
  <body >

   <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <div>
       <a class="navbar-brand">
        <img src="http://www.socioemcampo.com.br/imagens/18175450_1749204208439620_264675814_o.png" width="125" height="50"  alt="">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="checkin.php">CHECK IN</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href="ranking.php?palavra=Ranking+Geral">RANKING</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link disabled" href="contato.php">CONTATO</a>
        </li>
      </ul>
      <ul class="navbar-nav ">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="" id="dropdown07" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <?php echo $_SESSION[ 'UsuarioNome' ];?></a>
          <div class="dropdown-menu" aria-labelledby="dropdown07">
            <a class="dropdown-item disabled" href="#">Meus Dados</a>
            <a class="dropdown-item" href="sair.php">Sair</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</div>

<script src="menu/js/jquery-3.3.1.slim.min.js"></script>
<script src="menu/js/popper.min.js"></script>
<script src="menu/js/bootstrap.min.js"></script>
<script src=" https://colorlib.com/preview/theme/wordsmith/js/main.js"></script>

</body>
</html>

