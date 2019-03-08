<?php
if (!isset($_SESSION)) session_start();
include 'conecta.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sócio Em Campo</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="all,follow">
  <!-- Bootstrap CSS-->
  <link rel="stylesheet" href="login/vendor/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome CSS-->
  <link rel="stylesheet" href="login/vendor/font-awesome/css/font-awesome.min.css">
  <!-- Custom icon font-->
  <link rel="stylesheet" href="login/css/fontastic.css">
  <!-- Google fonts - Roboto -->
  <link rel="stylesheet" href="login/css/fontsgoogle.css">
  <!-- jQuery Circle-->
  <link rel="stylesheet" href="login/css/grasp_mobile_progress_circle-1.0.0.min.css">
  <!-- Custom Scrollbar-->
  <link rel="stylesheet" href="login/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <!-- theme stylesheet-->
  <link rel="stylesheet" href="login/css/style.default.css" id="theme-stylesheet">
  <!-- Custom stylesheet - for your changes-->
  <link rel="stylesheet" href="login/css/custom.css">




  <script src="login/js/mascaracnpjcpf.js"></script>   <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
      </head>
      <body>
        
        <div class="page login-page">
          <div class="container">
            <div class="form-outer text-center  align-items-center">
            <br> <br> <br> <br> <br>
              <div class="form-inner">
              <center>
                <div class="logo text-uppercase"><span>SÓCIO EM  </span><strong class="text-primary">  CAMPO</strong></div>
                <form action="validacao.php" class="loginForm" method="post">
                  <div class="form-group">
                  
                    <label for="login-username" class="label-custom" >CPF/CNPJ</label>
                    <input id="login-username" type="text" name="usuario" required onkeypress='mascaraMutuario(this,cpfCnpj)' onblur='clearTimeout()' required=""  maxlength="18">
                  </div>
                  <div class="form-group">
                    <label for="login-password" class="label-custom">Número da carteirinha</label>
                    <input id="login-password" type="text" name="numCarterinha" required="" maxlength="12">
                  </div>
                  <input type="submit"  id="submit" class="btn btn-primary" value="Entrar">
                </form>
                <?php
                if (isset($_GET['msg'])) {
                  $msg = $_GET['msg'];
                  switch ($msg) {
                    case '1':
                    ?>
                    <div class="alert alert-danger" role="alert" align="center">
                      CPF/CNPJ ou Número da carteirinha inválidos
                    </div>
                    <?php
                    break;
                  }
                }
                ?>  
              </div>
              
            </div>
          </div>
        </div>
       
       </center>
        
        <!-- Javascript files-->
        <script src="login/js/mascaracnpjcpf.js"></script>
        <script src="login/js/jquery-3.2.1.min.js"></script>
        <script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="login/vendor/jquery.cookie/jquery.cookie.js"> </script>
        <script src="login/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
        <script src="login/vendor/jquery-validation/jquery.validate.min.js"></script>
        <script src="login/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
        <script src="login/js/front.js"></script>
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
        <!---->
        <script>
          (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
          e=o.createElement(i);r=o.getElementsByTagName(i)[0];
          e.src='//www.google-analytics.com/analytics.js';
          r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
          ga('create','UA-XXXXX-X');ga('send','pageview');
        </script>

      </body>
      </html>


