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
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="login/js/alertifyjs/css/alertify.css">

    <script src="login/js/jquery-3.2.1.min.js"></script>
    <script src="login/js/alertifyjs/alertify.js"></script>
    <title>CRUD DIF</title>
    <!--fonts--->
    <link rel="stylesheet" href="login/css/family_Roboto_Varela_Round.css">
    <link rel="stylesheet" href="login/css/family_Material_Icons.css">
    <!--fonts--->
    <!--bootstrap--->
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="login/js/jquery-3.4.1.js"></script> 
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <!--bootstrap--->
    <!--datatables--->
    
    <link rel="stylesheet" href="datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="datatable/buttons.bootstrap4.min.css">

    
    <script src="datatable/jquery.dataTables.min.js"></script>
    <script src="datatable/dataTables.bootstrap4.min.js"></script>
    <script src="datatable/dataTables.buttons.min.js"></script>
    <script src="datatable/buttons.bootstrap4.min.js"></script>
    <script src="datatable/jszip.min.js"></script>
    <script src="datatable/pdfmake.min.js"></script>
    <script src="datatable/vfs_fonts.js"></script>
    <script src="datatable/buttons.html5.min.js"></script>
    <script src="datatable/buttons.print.min.js"></script>
    <script src="datatable/buttons.colVis.min.js"></script>
    <!--datatables--->
    <!--icons--->
    <script src="login/js/07baa58181.js" crossorigin="anonymous"></script>
    <!--icons--->

    <script>
        $(document).ready(function() {
            var table = $('#example').DataTable( {
                lengthChange: false,
                buttons: [
                {
                        extend: 'copyHtml5',
                        exportOptions: {
                            columns: [':visible' ]
                        }
                    },
                    {
                        extend: 'excelHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    'colvis']
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
    <script>
        $(function () {
        $('[data-toggle="tooltip"]').tooltip()
        })
    </script> 
    <style  type="text/css">
        #footer{
            margin-top: 1.5em;
            text-align:center;
        }
        #pfooter{
            margin-top: 1.5em;
        }
        .card#masterD{
            margin-top: 1.5em;
        }
        .row#md{
            font-weight: bold;
        }
        #botup{
            margin-left: 2px;
            margin-right: 2px;
        }
    </style>
    <style> /*Es el mismo que el de backupDashboard*/
        .col-form-label{
            font-size: 15px;
        }
        .form-control{
            font-size: 15px;
            opacity: 0.8;
        }
        #cardMain{
            margin-top:2px;
        }
        #fas{
            color: grey;
        }
    </style>
</head>
<body>
  <!-- Navigation -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container navbar navbar-expand-lg navbar-dark bg-dark static-top">
                <h2 style="color:white">Administrar registro de <b>Becarios</b></h2>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a id="botup" href="login/addBecario.php" class="btn btn-success" data-toggle="tooltip" data-placement="bottom" title="Añadir nuevo becario">
                                <i class="fas fa-user-plus"></i>
                                Becario
                            </a>
                        </li>
                        <li class="nav-item active">
                            <a id="botup" href="login/registro.php?#" class="btn btn-info" data-toggle="tooltip" data-placement="bottom" title="Nuevo administrador">
                                <i class="fas fa-users-cog"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a id="botup" href="selectModule.php" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Cambiar de módulo">
                                <i class="fas fa-exchange-alt"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button id="botup" class="btn btn-light" data-toggle="tooltip" data-placement="bottom" title="Administrador actual: <?php echo($data['nombre_admin']." ".$data['apellidos_admin']); ?>">
                                <i class="fas fa-user"></i>
                            </button>
                        </li>
                        <li class="nav-item">
                            <a id="botup" href="login/php/salir.php" class="btn btn-danger" data-toggle="tooltip" data-placement="bottom" title="Salir">
                                Salir
                                <i class="fas fa-sign-out-alt"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        </br>
        <?php
        require_once "accordion.php";
        ?>
        <!--class="file"---->
        <div class="table-wrapper">
            </br>
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Estado</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Sexo</th>
                        <th>Edad</th>
                        <th>Número de teléfono</th>
                        <th>Fecha de registro</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($row = mysqli_fetch_row($result)) {

                     $sqlDocs = "SELECT ruta_ine ,ruta_nacimiento ,ruta_curp,ruta_cv,ruta_estudios,ruta_medico,ruta_penal, ruta_recomendacion,ruta_domicilio,ruta_apoyo, ruta_compromiso,ruta_renuncia FROM becarios_registro WHERE id_becario = '$row[7]'";
                     $resultDocs = mysqli_query($conexion, $sqlDocs);
                     $rowDocs = mysqli_fetch_array($resultDocs, MYSQLI_ASSOC);

                     if($rowDocs['ruta_ine'] != NULL && $rowDocs['ruta_nacimiento'] != NULL && $rowDocs['ruta_curp'] != NULL && $rowDocs['ruta_cv'] != NULL && $rowDocs['ruta_estudios'] != NULL && $rowDocs['ruta_medico'] != NULL && $rowDocs['ruta_penal'] != NULL && $rowDocs['ruta_recomendacion'] != NULL && $rowDocs['ruta_domicilio'] != NULL && $rowDocs['ruta_renuncia'] != NULL){
                        $term = 1;
                     }else{
                         $term = 0;
                     }
                
                    ?>
                    <tr>
                        <?php if($row[0] == 0 or $term == 0){ ?>
                            <td style="background-color:darkorange;color:white">
                                <div id="P" style="text-align:center;">
                                    <?php //echo($row[0]);?><i class="fas fa-clock fa-lg"></i>
                                </div>
                            </td>
                        <?php
                        }if($row[0] == 1 && $term == 1){?>
                            <td style="background-color:darkgreen;color:white">
                                <div id="T" style="text-align:center;">
                                    <?php //echo($row[0]);?>
                                    <i class="fas fa-check fa-lg"></i>
                                </div>
                            </td>
                        <?php } ?>
                        <td><?php echo($row[1]);?></td>
                        <td><?php echo($row[2]);?></td>
                        <td><?php echo($row[3]);?></td>
                        <td><?php echo($row[4]);?></td>
                        <td><?php echo($row[5]);?></td>
                        <td><?php echo($row[6]);?></td>
                        <td style="text-align:center">
                            <a role="button" type="button" class="btn btn-info btn-sm" href="login/profileBecario.php?id=<?php echo($row[7]); ?>" data-toggle="tooltip" data-placement="bottom" title="Editar registro"><i style="color:white" class="fas fa-edit"></i></a>
                            <!--<a href="#" onclick="showId(<?php echo($row[7]); ?>);" id="idSend" type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteEmployeeModal"><i class="fas fa-trash-alt"></i></button>-->
                            <!--<a href="#" onclick="showId(<?php echo($row[7]); ?>);" id="idSend" type="button" class="btn btn-danger btn-sm" ><i class="fas fa-trash-alt"></i></button>-->
                            <a href="login/php/borrarBecario.php?idSend=<?php echo($row[7]); ?>" onclick="return confirmDelete()" id="idSend" type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Eliminar registro" ><i class="fas fa-trash-alt"></i></button>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
            <br>
            <!---->
        </div>
        <?php
                //Footer
                require_once "footer.php";
        ?>
    </div>
    <!-- Delete Modal HTML -->
    <div class="modal fade" id="deleteEmployeeModal" >
        <div class="modal-dialog modal-confirm">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="icon-box">
                        <i class="material-icons">&#xE5CD;</i>
                    </div>				
                    <h4 class="modal-title">¿Estás seguro?</h4>	
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p style="text-align:center;">Al dar click en "Eliminar", el registro ahora lo podrás encontrar en el módulo "Histórico de becarios".</p>
                </div>
                <div style="text-align:center;">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
                    <button onclick="showId2();" role="button" class="btn btn-danger">Eliminar</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>   
  

<script type="text/javascript">

    /*var id='';
    function showId(idSend) {
        id=idSend;
    }*/

    document.oncontextmenu = function(){return false}
    
    $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });


    function confirmDelete(){
        var respuesta = confirm('¿Estás seguro de eliminar? \n \n Al dar click en "Aceptar", el registro lo podrás encontrar en el módulo "Histórico de becarios"');

        if(respuesta == true ){
            return true;
            alertify.success('Éxito')
        }else{
            return false;
        }
    }


    /*


    $(document).ready(function(){
        $('#idSend').click(function(){
            alertify.confirm('¿Estás seguro?',
            'Al dar click en "Ok", el registro ahora lo podrás encontrar en el módulo "Histórico de becarios"',
            function(){
                window.location.href = "login/php/borrarBecario.php?idSend="+id;
                alertify.success('Éxito')
            },
            function(){
                alertify.error('Registro no eliminado')
            });
        });
    })

    function showId2() {
        //alert(id);
        window.location.href = "login/php/borrarBecario.php?idSend="+id;
    }*/
</script>

<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
