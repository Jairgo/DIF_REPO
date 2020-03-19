<?php
if(isset($_GET['q'])){
    if($_GET['q']=='1'){
        $sqlWhere = array();
        if(isset($_POST['sqlName']) && $_POST['sqlName']!=''){
            $nombre=$_POST['sqlName'];
            $sqlName = "AND nombre_becario LIKE '%$nombre%'";
            array_push($sqlWhere,$sqlName);
        }
        if(isset($_POST['sqlApellidos']) && $_POST['sqlApellidos'] !=''){
            $apellidos=$_POST['sqlApellidos'];
            $sqlApellidos = "AND apellidos_becario LIKE '%$apellidos%'";
            array_push($sqlWhere,$sqlApellidos);
        }
        if(isset($_POST['sqlTel']) && $_POST['sqlTel'] !=''){
            $tel=$_POST['sqlTel'];
            $sqlTel = "AND telefono_becario LIKE '%$tel%'";
            array_push($sqlWhere,$sqlTel);
        }
        if(isset($_POST['sqlSexo']) && $_POST['sqlSexo'] !='Eliga'){
            $sexo=$_POST['sqlSexo'];
            $sqlSexo = "AND sexo='$sexo'";
            array_push($sqlWhere,$sqlSexo);
        }
        if(isset($_POST['sqlEdad']) && $_POST['sqlEdad'] !=''){
            $edad=$_POST['sqlEdad'];
            $sqlEdad = "AND fecha_nacimiento>='$edad'";
            array_push($sqlWhere,$sqlEdad);
        }
        if(isset($_POST['sqlEmail']) && $_POST['sqlEmail'] !=''){
            $email=$_POST['sqlEmail'];
            $sqlEmail = "AND email_becario LIKE '%$email%'";
            array_push($sqlWhere,$sqlEmail);
        }
        if(isset($_POST['sqlEsco']) && $_POST['sqlEsco'] !='Eliga'){
            $esco=$_POST['sqlEsco'];
            $sqlEsco = "AND escolaridad='$esco'";
            array_push($sqlWhere,$sqlEsco);
        }
        if(isset($_POST['sqlSueldo']) && $_POST['sqlSueldo'] !=0){
            $sueldo=$_POST['sqlSueldo'];
            $sqlSueldo = "AND sueldo_inicial>='$sueldo'";
            array_push($sqlWhere,$sqlSueldo);
        }
        if(isset($_POST['sqlInicio']) && $_POST['sqlInicio'] !=''){
            $inicio=$_POST['sqlInicio'];//[fecha_ingreso] es cuando ellos dicen que inició, [fecha_inicio] es cuando se metió al sistema
            $sqlInicio = "AND fecha_inicio>='$inicio'";
            array_push($sqlWhere,$sqlInicio);
        }
        if(isset($_POST['sqlApoyo']) && $_POST['sqlApoyo'] !='Eliga'){
            $apoyo=$_POST['sqlApoyo'];
            $sqlApoyo = "AND tipo_apoyo='$apoyo'";
            array_push($sqlWhere,$sqlApoyo);
        }
        if(isset($_POST['sqlArea']) && $_POST['sqlArea'] !='Eliga'){
            $area=$_POST['sqlArea'];
            $sqlArea = "AND area_adscripcion='$area'";
            array_push($sqlWhere,$sqlArea);
        }
        if(isset($_POST['sqlDir']) && $_POST['sqlDir'] !='Eliga'){
            $dir=$_POST['sqlDir'];
            $sqlDir = "AND direccion_adscripcion='$dir'";
            array_push($sqlWhere,$sqlDir);
        }
        if(isset($_POST['sqlJefe']) && $_POST['sqlJefe'] !=''){
            $jefe=$_POST['sqlJefe'];
            $sqlJefe = "AND jefe_becario LIKE '%$jefe%'";
            array_push($sqlWhere,$sqlJefe);
        }

        $yaString = implode(",",$sqlWhere);
        $sinComas = str_replace(',',' ',$yaString); 
        //echo($sinComas);
        $sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,sexo, TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,telefono_becario,fecha_inicio,id_becario FROM becarios_registro WHERE estado = '0' $sinComas ORDER by fecha_inicio";
        //echo($sqlBeca);
        $result = mysqli_query($conexion, $sqlBeca);
    }
 }else{
     //no hay busqueda y solo muestra todo
    //$sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,email_becario,telefono_becario,fecha_inicio,id_becario FROM becarios_registro ORDER by fecha_inicio";
    $sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,sexo, TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,telefono_becario,fecha_inicio,id_becario FROM becarios_registro WHERE estado = '0' ORDER by fecha_inicio";
    $result = mysqli_query($conexion, $sqlBeca);
    //TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,
 }
 ?>

<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header" id="headingOne">
            <h2 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Busqueda especializada
                </button>
            </h2>
        </div>

        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="card-body">
                <form action="mainDashboard.php?q=1" method="POST">
                    <div class="row">
                        <div class="col-sm-3">
                            <label for="inputName">Nombre</label>
                            <input name="sqlName" type="text" id="inputName" class="form-control" placeholder="Ingrese nombre" value="<?php if(isset($nombre)) echo($nombre);?>">
                        </div>
                        <div class="col">
                            <label for="inputApellidos">Apellidos</label>
                            <input name="sqlApellidos" type="text" id="inputApellidos" class="form-control" placeholder="Ingrese apellidos" value="<?php if(isset($apellidos)) echo($apellidos);?>">
                        </div>
                        <div class="col">
                            <label for="inputPhone">Teléfono</label>
                            <input name="sqlTel" type="number" id="inputPhone" class="form-control" value="<?php if(isset($tel)) echo($tel);?>" placeholder="Ingrese teléfono">
                        </div>
                        <div class="col">
                            <label for="sexoBecario">Sexo</label>
                            <select id="sexoBecario" name="sqlSexo" class="form-control">
                                <option selected value="Eliga" ><?php if(isset($sexo)){echo($sexo);} else{echo("Eliga ...");}?></option>
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputEdad">Edad</label>
                            <input name="sqlEdad" type="date" id="inputEdad" class="form-control" placeholder="Edad" value="<?php if(isset($edad)) echo($edad);?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputMail">Email</label>
                            <input name="sqlEmail" type="text" id="inputMail" class="form-control" placeholder="Ingrese correo" value="<?php if(isset($email)) echo($email);?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="inputEscolaridad">Escolaridad</label>
                            <select name="sqlEsco" id="inputEscolaridad" class="form-control" placeholder="Ingrese Escolaridad" >
                                <option selected disabled value="Eliga"><?php if(isset($esco)){echo($esco);} else{echo("Eliga ...");}?></option>
                                <option value="Primaria">Primaria</option>
                                <option value="Secundaria">Secundaria</option>
                                <option value="Bachillerato">Bachillerato</option>
                                <option value="Licenciatura">Licenciatura</option>
                                <option value="Maestría">Maestría</option>
                                <option value="Posgrado(s)">Posgrado(s)</option>
                                <option value="Sin escolaridad">Sin escolaridad</option>
                            </select>
                        </div>
                        <div class="col-sm-2">
                            <label for="inputSueldo">Sueldo
                                <span id="fas">
                                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Ingrese el sueldo con el que cuenta el becario"></i>
                                </span>
                            </label>
                            <input name="sqlSueldo" type="number" id="inputSueldo" class="form-control" placeholder="Ingrese sueldo" value="<?php if(isset($sueldo)) echo($sueldo);?>">
                        </div>
                        <div class="col-sm-2">
                            <label for="inputIngreso">Fecha de ingreso
                                <span id="fas">
                                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Ingrese la fecha en la que el becario se inscribió al programa"></i>
                                </span>
                            </label>
                            <input name="sqlInicio" type="date" id="inputIngreso" class="form-control" placeholder="Ingrese fecha" value="<?php if(isset($inicio)) echo($inicio);?>">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputApoyo">Tipo de apoyo</label>
                            <select name="sqlApoyo" id="inputApoyo" class="form-control" >
                                <option selected disabled value="Eliga"><?php if(isset($apoyo)){echo($apoyo);} else{echo("Eliga ...");}?></option>
                                <option value="Normal">Normal</option>
                                <option value="Adicional">Adicional</option>
                                <option value="Social">Social</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputArea">Area
                                <span id="fas">
                                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga el área de adscripción del becario"></i>
                                </span>
                            </label>
                            <select name="sqlArea" id="inputArea" class="form-control">
                                <option selected disabled value="Eliga"><?php if(isset($dir)){echo($dir);} else{echo("*Abrir para nota de programador*");}?></option>
                                <option value="x">Ingrear lista de todos las posibles direcciones</option>
                                <option value="y">Si no, dejar abierto el campo</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputDir">Dirección
                                <span id="fas">
                                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga la dirección de adscripción del becario"></i>
                                </span>
                            </label>
                            <select name="sqlDir" id="inputDir" class="form-control">
                                <option selected disabled value="Eliga"><?php if(isset($area)){echo($area);} else{echo("*Abrir para nota de programador*");}?></option>
                                <option value="xx">Ingresar lista de todos las posibles áreas</option>
                                <option value="yy">Si no, dejar abierto el campo</option>
                            </select>
                        </div>
                        <div class="col">
                            <label for="inputJefe">Jefe inmediato
                                <span id="fas">
                                    <i class="fas fa-info-circle fa-xs" data-toggle="tooltip" data-placement="bottom" title="Eliga el nombre del jefe inmediato perteneciente al becario"></i>
                                </span>
                            </label>
                            <input name="sqlJefe" type="text" id="inputJefe" class="form-control" placeholder="Ingrese Jefe" value="<?php if(isset($jefe)) echo($jefe);?>">
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
                            <a href="mainDashboard.php" class="btn btn-dark"><i class="fas fa-globe-americas fa-sm"></i> Mostrar todo</a>
                        </div>
                    </div>
                <form>
            </div>
        </div>
    </div>
</div>