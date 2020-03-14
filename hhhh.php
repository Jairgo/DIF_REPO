<?php 
    session_start();
    
	if(isset($_SESSION['user'])){
 ?>
 <?php	
 require_once "login/php/conexion.php";
 $conexion=conexion();

 //$sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,email_becario,telefono_becario,fecha_inicio,id_becario FROM becarios_registro ORDER by fecha_inicio";
 $sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,sexo, TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,telefono_becario,fecha_inicio,id_becario FROM becarios_registro ORDER by fecha_inicio";
 $result = mysqli_query($conexion, $sqlBeca);
//TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,
 $actualUser=$_SESSION['user'];

 $sqlUser = "SELECT nombre_admin,apellidos_admin FROM administradores WHERE usuario = '$actualUser'";
 $resultUser = mysqli_query($conexion, $sqlUser);
 $data = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/alertify.css">

    <script src="login/js/jquery-3.2.1.min.js"></script>
    <script src="login/js/alertifyjs/alertify.js"></script>
    <title>Histórico DIF</title>
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
    <!--datatables--->
        <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.bootstrap4.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="datatable/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.bootstrap4.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.colVis.min.js"></script>-->
        <!--datatables--->
    <!--icons--->
    <script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>
    <!--icons--->

    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );
    
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
    </script>
    <!---->
    <style type="text/css">

        .form-control{
            opacity:1;
        }
        input{
            opacity:0.8;
        }
        label{
            font-weight: bold;
        }
        body {
            font-family: 'Varela Round', sans-serif;
            background-color:#E8E8E8;
        }
        .container{
            background-color:white;
        }

        .modal-confirm {		
            color: #636363;
            width: 400px;
        }
        .modal-confirm .modal-content {
            padding: 20px;
            border-radius: 5px;
            border: none;
            text-align: center;
            font-size: 14px;
        }
        .modal-confirm .modal-header {
            border-bottom: none;   
            position: relative;
        }
        .modal-confirm h4 {
            text-align: center;
            font-size: 26px;
            margin: 30px 0 -10px;
        }
        .modal-confirm .close {
            position: absolute;
            top: -5px;
            right: -2px;
        }
        .modal-confirm .modal-body {
            color: #999;
        }
        .modal-confirm .modal-footer {
            border: none;
            text-align: center;		
            border-radius: 5px;
            font-size: 13px;
            padding: 10px 15px 25px;
        }
        .modal-confirm .modal-footer a {
            color: #999;
        }		
        .modal-confirm .icon-box {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            border-radius: 50%;
            z-index: 9;
            text-align: center;
            border: 3px solid #f15e5e;
        }
        .modal-confirm .icon-box i {
            color: #f15e5e;
            font-size: 46px;
            display: inline-block;
            margin-top: 13px;
        }
        .modal-confirm .btn {
            color: #fff;
            border-radius: 4px;
            background: #60c7c1;
            text-decoration: none;
            transition: all 0.4s;
            line-height: normal;
            min-width: 120px;
            border: none;
            min-height: 40px;
            border-radius: 3px;
            margin: 0 5px;
            outline: none !important;
        }
        .modal-confirm .btn-info {
            background: #c1c1c1;
        }
        .modal-confirm .btn-info:hover, .modal-confirm .btn-info:focus {
            background: #a8a8a8;
        }
        .modal-confirm .btn-danger {
            background: #f15e5e;
        }
        .modal-confirm .btn-danger:hover, .modal-confirm .btn-danger:focus {
            background: #ee3535;
        }
        .trigger-btn {
            display: inline-block;
            margin: 100px auto;
        }
    </style>
    <style  type="text/css">
        #footer{
            margin-top: 1.5em;
            text-align:center;
        }
        #pfooter{
            margin-top: 1.5em;
        }
    </style>
    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</head>
<body>
  <!-- Navigation -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container navbar navbar-expand-lg navbar-dark bg-dark static-top">
                <h2 style="color:white">Administrar histórico de <b>Becarios</b></h2>
                
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a href="login/addBecario.php" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Añadir nuevo becario">
                            <i class="fas fa-user-plus"></i>
                            Becario
                        </a>
                        <a href="login/php/salir.php" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Salir">
                            Salir
                            <i class="fas fa-sign-out-alt"></i>
                        </a>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
        </br>
        <div class="row">
            <div class="col-sm" style="text-align:right">
                <a href="login/registro.php?#" class="btn btn-info btn-lg" data-toggle="tooltip" data-placement="bottom" title="Nuevo administrador">
                    <i class="fas fa-users-cog"></i>
                </a>
                <a href="selectModule.php" class="btn btn-primary btn-lg" data-toggle="tooltip" data-placement="bottom" title="Cambiar de módulo">
                    <i class="fas fa-exchange-alt"></i>
                </a>
                <button class="btn btn-light btn-lg" data-toggle="tooltip" data-placement="bottom" title="Administrador actual: <?php echo($data['nombre_admin']." ".$data['apellidos_admin']); ?>">
                    <i class="fas fa-user"></i>
                </button>
            </div>
        </div>
        <!--Content-->

        <!--Content-->
        <!-- Footer -->
        <div id="footer">
            <footer class="py-2 bg-dark center" >
                <img src="login/img/logo_oaxaca.png" alt="Logo footer" width="300" height="100">
                <div id="pfooter">
                    <p class="m-0 text-center text-white">Gestión de empleados para el sistema DIF Oaxaca - 2020</p>
                <div>
            </footer>
        </div>
    </div>
</body>
</html>   



<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
