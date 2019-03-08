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
    <link rel="stylesheet" type="text/css" href="home/css/css.css">

</head>
<body>

 <?php
 include 'menu.php';
 ?>
 <div class="breadcrumb-holder">
  <ul class="breadcrumb">
    <li class="breadcrumb-item  " >Home</a></li>
    <li class="breadcrumb-item active">Ranking</li>
  </ul>
</div>

<section class="forms" >
  <div class="container-fluid" >
    <div class="row" >
      <div class="col" align="center">
       <div class="card">
        <div class="card-body">
          <form  action="ranking.php?palavra" method="get" >
           <div class="form-group" >
            <label >Selecione a competição</label>
            <select class="form-control" name="palavra" id="palavra" >
             <option>Ranking Geral</option>
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
        <div class="form-group ">
          <button type="submit" class="btn btn-success"  >Buscar</button>
        </div>
      </form>
    </div>
  </div>
</div>
</div>
</div>
</section>

<h1></h1>


    <?php 

    $palavra = @$_GET['palavra'];
    $auxpalavra = "Ranking Geral";

    $sql="SELECT  DISTINCT id_Usuario , sum(valorEvento) AS PONTUACAO FROM classificacao WHERE id_CadastroCompeticao LIKE '%$palavra%'  GROUP BY id_Usuario ORDER BY sum(valorEvento) DESC";
    $query = mysqli_query($conexao,$sql) or die(mysqli_error());
    ?>

    <?php
    if($palavra == $auxpalavra) {
      $contador1 =0;
      $sqlgeral =  "SELECT  DISTINCT id_Usuario , sum(valorEvento) AS PONTUACAO FROM classificacao GROUP BY id_Usuario ORDER BY sum(valorEvento) DESC";
      $querygeral = mysqli_query($conexao,$sqlgeral) or die(mysqli_error());
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
                        <th bgcolor="#00c853">Posição</th>
                        <th bgcolor="#00c853"> Nome</th>
                        <th bgcolor="#00c853">Pontuação</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      while($dadosquerygeral = mysqli_fetch_assoc($querygeral) AND $dadosquerygeral[  'id_Usuario']!=0){

                        $idusuario = $dadosquerygeral['id_Usuario'];

                        $sqlusu ="SELECT * FROM usuario where id = '$idusuario'";
                        $queryusu = mysqli_query($conexao,$sqlusu) or die(mysqli_error());
                        $dadosusu = mysqli_fetch_assoc($queryusu);

                        $nomeUsuario = $dadosusu['nome'];

                        $contador1 ++;
                        ?>
                        <tr>
                          <td > <?php  echo $contador1; ?> </td>
                          <td> <?php  echo $nomeUsuario;?> </td>
                          <td><?php  echo $dadosquerygeral['PONTUACAO'] ;?> </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } elseif(mysqli_num_rows($query) !=0){
        $contador = 0;
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
                          <th bgcolor="#00c853">Posição</th>
                          <th bgcolor="#00c853">Nome</th>
                          <th bgcolor="#00c853">Área</th>
                          <th bgcolor="#00c853">Pontuação</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        while($dadosquery = mysqli_fetch_assoc($query) AND $dadosquery['id_Usuario']!=0){
                          $idusuario = $dadosquery['id_Usuario'];

                          $sqlarea ="SELECT * FROM classificacao where id_Usuario = '$idusuario' AND id_CadastroCompeticao = '$palavra' ";
                          $queryarea = mysqli_query($conexao,$sqlarea) or die(mysqli_error());
                          $dadosarea = mysqli_fetch_assoc($queryarea);

                          $area = $dadosarea['area'];

                          $sqlusu ="SELECT * FROM usuario where id = '$idusuario'";
                          $queryusu = mysqli_query($conexao,$sqlusu) or die(mysqli_error());
                          $dadosusu = mysqli_fetch_assoc($queryusu);
                          $nomeUsuario = $dadosusu['nome'];

                          $contador++;

                          ?>
                          <tr>
                            <td> <?php  echo $contador; ?> </td>
                            <td> <?php  echo $nomeUsuario;?> </td>
                            <td> <?php  echo $area;?> </td>
                            <td> <?php  echo $dadosquery['PONTUACAO'] ;?> </td>
                          </tr>
                        <?php  } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } else{ ?>   
       <div class="alert alert-warning alert-dismissible fade show" role="alert" align="center">
        <strong>RANKING INDISPONÍVEL PARA ESTE EVENTO</strong> 
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
  </div>

<h1></h1>

  <!-- Footer -->
  <footer class="page-footer font-small navbar-dark bg-dark" >

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3" style="color: #e8eaf6">© 2018 Copyright:
      <a href="" style="color: #e8eaf6"> Sócio em Campo</a>
    </div>
    <!-- Copyright -->
  </footer>
  <!-- Footer -->


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