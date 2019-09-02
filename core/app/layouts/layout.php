<!--
Este es el layout principal, a partir de este layout o plantilla se muestran el resto de "vistas"
-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>.: Lb-min - Xanot   :.</title>
    <link href="res/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" href="res/font-awesome/css/font-awesome.min.css">
    <link href="res/css/sb-admin-2.css" rel="stylesheet">
    <script src="res/js/jquery.min.js"></script>
    <script src="res/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="res/css/jquery.dataTables.css" >

    <script src="res/js/jquery.dataTables.js"></script>


  </head>

  <body>
<nav class="navbar navbar-default">
  <div class="container">
    
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="./"><b>Sistema de generacion de archivos para el micro-framework LbMinV2</b></a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="./"><i class='glyphicon glyphicon-home'></i> INICIO</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class='glyphicon glyphicon-th-large'></i> MAS <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./?view=login">Login</a></li>

            <li><a href="./?view=help">Ayuda</a></li>
          </ul>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_SESSION["user_id"])):?>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="glyphicon glyphicon-user"></i> <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="./?view=home">Mi inicio</a></li>

            <li><a href="./?view=users&o=all">Usuarios</a></li>
            <li class="divider"></li>
            <li><a href="./?action=access&o=logout">Salir</a></li>
          </ul>
        </li>
        <?php endif; ?>
      </ul>

    </div>
  
  </div> <?//cierre containter?>

</nav>


 <!--<div class="container">
  <div class="row">
<div class="col-md-12">
      <div class="sidebar-nav">
      <div class="well" style="width:300px; padding: 13px 5;">
      <ul class="nav nav-list"> 
        <li class="nav-header">Admin Menu</li>        
        <li><a href="index"><i class="icon-home"></i> Dashboard</a></li>
            <li><a href="#"><i class="icon-envelope"></i> Messages <span class="badge badge-info">4</span></a></li>
            <li><a href="#"><i class="icon-comment"></i> Comments <span class="badge badge-info">10</span></a></li>
        <li class="active"><a href="#"><i class="icon-user"></i> Members</a></li>
            <li class="divider"></li>
        <li><a href="#"><i class="icon-comment"></i> Settings</a></li>
        <li><a href="#"><i class="icon-share"></i> Logout</a></li>
      </ul>
    </div>
  </div>
  </div>
  </div>
  </div>-->

<?php 
  View::load("index");
?>


<div class="container">
<div class="row">
<div class="col-md-12">
<br>
<hr>
<p class="text-muted text-center">Powered by <a href="http://evilnapsis.com/" target="_blank">Evilnapsis</a> &copy; 2017</p>
</div>
</div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#tblDefaultId').DataTable();
} );
</script>
  </body>
</html>

