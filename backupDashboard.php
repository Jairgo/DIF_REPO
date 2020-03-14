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
            <div class="card" id="masterD">
                <div class="card-header">
                    Búsqueda especializada de usuarios no activos
                </div>
                <div class="card-body">
                    <!--<p>Ingrese solamente los datos que desee</p>-->
                    <form>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="inputName">Nombre</label>
                                <input type="text" id="inputName" class="form-control" placeholder="Ingrese nombre">
                            </div>
                            <div class="col">
                                <label for="inputApellidos">Apellidos</label>
                                <input type="text" id="inputApellidos" class="form-control" placeholder="Ingrese apellidos">
                            </div>
                            <div class="col">
                                <label for="inputPhone">Teléfono</label>
                                <input type="number" id="inputPhone" class="form-control" placeholder="Ingrese teléfono">
                            </div>
                            <div class="col-sm-1">
                                <label for="inputSexo">Sexo</label>
                                <input type="text" id="inputSexo" class="form-control" placeholder="Eliga">
                            </div>
                            <div class="col-sm-1">
                                <label for="inputEdad">Edad</label>
                                <input type="number" id="inputEdad" class="form-control" placeholder="Edad">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <label for="inputMail">Email</label>
                                <input type="text" id="inputMail" class="form-control" placeholder="Ingrese correo">
                            </div>
                            <div class="col">
                                <label for="inputEscolaridad">Escolaridad</label>
                                <input type="text" id="inputEscolaridad" class="form-control" placeholder="Ingrese Escolaridad">
                            </div>
                            <div class="col-sm-2">
                                <label for="inputSueldo">Sueldo
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Ingrese el sueldo con el que el becario terminó su servicio"></i>
                                    </span>
                                </label>
                                <input type="number" id="inputSueldo" class="form-control" placeholder="Ingrese sueldo">
                            </div>
                            <div class="col-sm-2">
                                <label for="inputIngreso">Fecha de ingreso
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Ingrese la fecha en la que el becario se inscribió al programa"></i>
                                    </span>
                                </label>
                                <input type="date" id="inputIngreso" class="form-control" placeholder="Ingrese fecha">
                            </div>
                            <div class="col-sm-2">
                                <label for="inputBaja">Fecha de baja
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Ingrese la fecha en la que el becario se dio de baja del sistema"></i>
                                    </span>
                                </label>
                                <input type="date" id="inputBaja" class="form-control" placeholder="Ingrese fecha">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <label for="inputApoyo">Tipo de apoyo</label>
                                <input type="text" id="inputApoyo" class="form-control" placeholder="Ingrese apoyo">
                            </div>
                            <div class="col">
                                <label for="inputArea">Area
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga el área de adscripción del becario"></i>
                                    </span>
                                </label>
                                <input type="text" id="inputArea" class="form-control" placeholder="Ingrese area">
                            </div>
                            <div class="col">
                                <label for="inputDir">Dirección
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga la dirección de adscripción del becario"></i>
                                    </span>
                                </label>
                                <input type="text" id="inputDir" class="form-control" placeholder="Ingrese dirección">
                            </div>
                            <div class="col">
                                <label for="inputJefe">Jefe inmediato
                                    <span id="fas">
                                        <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga el nombre del jefe inmediato perteneciente al becario"></i>
                                    </span>
                                </label>
                                <input type="text" id="inputJefe" class="form-control" placeholder="Ingrese Jefe">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <label type="hidden"></label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success"><i class="fas fa-search fa-sm"></i> Buscar</button>
                                <button type="submit" class="btn btn-dark"><i class="fas fa-globe-americas fa-sm"></i> Mostrar todo</button>
                            </div>
                        </div>
                    <form>
                </div>
            </div>
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
                                <td style="text-align:center;background-color:darkorange;color:white">
                                    <small style="color:darkorange;opacity: 0;">A</small>
                                    <?php //echo($row[0]);?><i class="fas fa-clock fa-lg"></i>
                                    <small style="color:darkorange;opacity: 0;">A</small>
                                </td>
                            <?php
                            }else{?>
                                <td style="text-align:center;background-color:darkgreen;color:white">
                                    <small style="color:darkgreen;opacity: 0;">B</small>
                                    <?php //echo($row[0]);?><i class="fas fa-check fa-lg"></i>
                                    <small style="color:darkgreen;opacity: 0;">B</small>
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
