<?php 
	session_start();

	if(isset($_SESSION['user'])){
?>
 <?php	
 require_once "login/php/conexion.php";
 $conexion=conexion();


 $actualUser=$_SESSION['user'];

 $sqlUser = "SELECT nombre_admin,apellidos_admin FROM administradores WHERE usuario = '$actualUser'";
 $resultUser = mysqli_query($conexion, $sqlUser);
 $data = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
<!--icons--->
<script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>
<!--icons--->
<!--fonts--->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--fonts--->
<!--bootstrap--->
<!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<!--bootstrap--->
</head>
<title>Selección de módulo</title>
<body style="background-color:#f5f5f5">  

<div class="container">
        <div>
            <h3>Bienvenido <b><?php echo($data['nombre_admin']);?></b> <?php echo(" ".$data['apellidos_admin']);?></h3>
            <h1><b>Seleccione el módulo en el que desee trabajar</b></h1>
        </div>
        <br><br><br><br>
  <div class="row justify-content-md-center">
    <div class="col">
        <a href="mainDashboard.php" class="btn btn-squared-default btn-primary">
            <i class="fas fa-users fa-7x"></i>
            <br />
            <br />
            <b>Registro de becarios</b>
        </a>
    </div>
    <div class="col">
        <a href="nominaDashboard.php" class="btn btn-squared-default btn-success">
        <i class="fas fa-server fa-7x"></i>
            <br />
            <br />
            <b>Gestión de becarios</b>
        </a>
    </div>
    <div class="col">
        <a href="backupDashboard.php" class="btn btn-squared-default btn-dark">
        <i class="fas fa-history fa-7x"></i>
            <br>
            <br>
            <b>Histórico de becarios</b>
        </a>
    </div>
  </div>
  <br><br>
  <div>
    <a href="login/php/salir.php" class="btn btn-danger">Salir <i class="fas fa-sign-out-alt"></i></a>
  </div>
</div>


<style>
    .btn-squared-default
    {
        width: 300px !important;
        height: 300px !important;
        font-size: 25px;
    }

    .btn-squared-default:hover
    {
        border: 3px solid white;
        font-weight: 800;
    }

    .container{
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
        min-height: 100vh;
    }

</style>


</body>
</html>

<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
