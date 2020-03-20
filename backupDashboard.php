<?php 
    session_start();
	if(isset($_SESSION['user'])){
 ?>
 <?php	
 require_once "login/php/conexion.php";
 $conexion=conexion();
 require_once "head.php";
 require_once "queryDash.php";
 
 

 ?>
 <style>
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
     input{
        font-weigth
     }
     #fas{
        color: grey;
     }
 </style>
    <body id="back">
        <div class="container">
            <?php
                //Navigation -->
                require_once "nav2.php";
                //require_once "buttons.php";
            ?>
            <!--Content-->
            <?php 
                require_once "accordionBack.php";
            ?>
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
                    <?php while ($row = mysqli_fetch_row($result)) {?>
                        <tr>
                            <?php if($row[0] == 0){ ?>
                                <td style="background-color:darkorange;color:white">
                                    <div id="P" style="text-align:center;">
                                        <?php //echo($row[0]);?><i class="fas fa-clock fa-lg"></i>
                                    </div>
                                </td>
                            <?php
                            }else{?>
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
                                <a href="login/php/recuperarBecario.php?idSend=<?php echo($row[7]); ?>" onclick="return confirmDelete()" id="idSend" type="button" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Recuperar registro" ><i class="fas fa-trash-restore-alt"></i></i></button>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
                <br>
                <!---->
            </div>
            <?php
                //require_once "buttons.php";
            ?>
            <!--Content-->
            <?php
                //Footer
                require_once "footer.php";
            ?>
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
        var respuesta = confirm('¿Estás seguro de recuperar? \n \n Al dar click en "Aceptar", el registro lo podrás encontrar en el módulo "Registro de becarios"');

        if(respuesta == true ){
            return true;
            alertify.success('Éxito')
        }else{
            return false;
        }
    }
</script>
<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
