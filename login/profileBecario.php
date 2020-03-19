<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
 <?php	
 require_once "php/conexion.php";
 
 $conexion=conexion();

 $id_becario =$_GET['id'];

 $sqlBeca = "SELECT *, TIMESTAMPDIFF(DAY, (SELECT fecha_inicio FROM becarios_registro WHERE id_becario = '$id_becario'),NOW()) AS resta, TIMESTAMPDIFF(DAY, NOW(),(SELECT fecha_maxima FROM becarios_registro WHERE id_becario = '$id_becario')) AS resta2, TIMESTAMPDIFF(YEAR, (SELECT fecha_nacimiento FROM becarios_registro WHERE id_becario = '$id_becario'), NOW()) AS restaEdad FROM becarios_registro WHERE id_becario = '$id_becario'";
 $result = mysqli_query($conexion, $sqlBeca);
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

 $sqlDocs = "SELECT ruta_ine ,ruta_nacimiento ,ruta_curp,ruta_cv,ruta_estudios,ruta_medico,ruta_penal, ruta_recomendacion,ruta_domicilio,ruta_apoyo, ruta_compromiso,ruta_renuncia FROM becarios_registro WHERE id_becario = '$id_becario'";
 $resultDocs = mysqli_query($conexion, $sqlDocs);
 $rowDocs = mysqli_fetch_array($resultDocs, MYSQLI_ASSOC);

 if($rowDocs['ruta_ine'] != NULL && $rowDocs['ruta_nacimiento'] != NULL && $rowDocs['ruta_curp'] != NULL && $rowDocs['ruta_cv'] != NULL && $rowDocs['ruta_estudios'] != NULL && $rowDocs['ruta_medico'] != NULL && $rowDocs['ruta_penal'] != NULL && $rowDocs['ruta_recomendacion'] != NULL && $rowDocs['ruta_domicilio'] != NULL && $rowDocs['ruta_renuncia'] != NULL){
    $term = 1;
 }else{
     $term = 0;
 }

 ?>

<!DOCTYPE html>
<html>
<head>
<title>Perfil de becarios [<?php echo($row['nombre_becario'])?>]</title>
<!---<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">---->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">
	
    
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/alertifyjs/alertify.js"></script>
    <style>
        .upload-btn-wrappera {
            position: relative;
            overflow: hidden;
            display: inline-block;
        }

        .btna {
            border: 2px solid gray;
            color: gray;
            background-color: white;
            padding: 2px 5px;
            border-radius: 4px;
            font-size: 15px;
            font-weight: bold;
        }

        .upload-btn-wrappera input[type=file] {
            font-size: 100px;
            position: absolute;
            left: 0;
            top: 0;
            opacity: 0;
       }

       .form-group .col-md-4 .upload-btn-wrappera{
           text-align:center;
       }
    </style>
    <script>
    //alert('<?php echo($row['jefe_becario']); ?>');
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
        body {
            font-family: 'Varela Round', sans-serif;
            background-color:#E8E8E8;
        }
        .container{
            background-color:white;
        }  
    </style>
</head>
<body>
<div class="container">
    <?php
        //Navigation -->
        require_once "../nav3.php";
        //require_once "buttons.php";
    ?>
    <div class="row my-2">
        <div class="col-lg-8 order-lg-2">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a href="" data-target="#profile" data-toggle="tab" class="nav-link active">Perfil</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#messages" data-toggle="tab" class="nav-link">Mensajes</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#edit" data-toggle="tab" class="nav-link">Información</a>
                </li>
                <li class="nav-item">
                    <a href="" data-target="#down" data-toggle="tab" class="nav-link">Descargas</a>
                </li>
            </ul>
            <div class="tab-content py-4">
                <div class="tab-pane active" id="profile">
                    <h5 class="mb-3"><?php echo($row['nombre_becario']." " .$row['apellidos_becario']); ?></h5>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab-pane">
                                <form id="frmModificacion">
                                    <!-----collapse group--->
                                    <div class="accordion" id="accordionDatos">
                                        <div class="card">
                                            <div class="card-header" id="headingDatosBasicos">
                                                <h2 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseDatosBasicos" aria-expanded="true" aria-controls="collapseDatosBasicos">
                                                    Datos básicos
                                                    </button>
                                                </h2>
                                            </div>
                                            <div id="collapseDatosBasicos" class="collapse show" aria-labelledby="headingDatosBasicos" data-parent="#accordionDatos">
                                                <div class="card-body">
                                                    <!-----poner aquí---->
                                                    <input type="hidden" id="idBecario" value="<?php echo($row['id_becario']); ?>">
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Nombre</label>
                                                        <div class="col-lg-9">
                                                            <input id="nombreBecario" class="form-control" type="text" value="<?php echo($row['nombre_becario']); ?>" placeholder="Nombre">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Apellidos</label>
                                                        <div class="col-lg-9">
                                                            <input id="apellidosBecario" class="form-control" type="text" value="<?php echo($row['apellidos_becario']); ?>" placeholder="Apellidos">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Correo</label>
                                                        <div class="col-lg-9">
                                                            <input id="emailBecario" class="form-control" type="email" value="<?php echo($row['email_becario']); ?>" placeholder="email@gmail.com">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Telefono</label>
                                                        <div class="col-lg-9">
                                                            <input id="telefonoBecario" class="form-control" type="number" value="<?php echo($row['telefono_becario']); ?>" placeholder="Número a 10 digitos">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Edad</label>
                                                        <div class="col-lg-3">
                                                            <input class="form-control" type="text"value="<?php echo($row['restaEdad']); ?>" placeholder="insertar" disabled>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <label>Cambiar:</label>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input placeholder="Ingrese fecha" type="date" class="form-control" id="edadBecario" value="<?php echo($row['fecha_nacimiento']); ?>" name="">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Sexo</label>
                                                        <div class="col-lg-9">
                                                            <select id="sexoBecario" class="form-control">
                                                                <option selected value="<?php echo($row['sexo']); ?>" ><?php echo($row['sexo']); ?></option>
                                                                <option value="Femenino">Femenino</option>
                                                                <option value="Masculino">Masculino</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">RFC</label>
                                                        <div class="col-lg-9">
                                                            <input maxlength="13" id="rfcBecario" class="form-control" type="text" value="<?php echo($row['rfc_becario']); ?>" placeholder="Dato a 13 caracteres">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Numero de tarjeta</label>
                                                        <div class="col-lg-9">
                                                            <input maxlength="16" id="numTarjetaBecario" class="form-control" type="number" value="<?php echo($row['num_tarjeta']); ?>" placeholder="insertar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Sueldo inicial</label>
                                                        <div class="col-lg-9">
                                                            <input id="sueldoIniBecario" class="form-control" type="number" value="<?php echo($row['sueldo_inicial']); ?>" placeholder="Ingresar sueldo">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Fecha ingreso</label>
                                                        <div class="col-lg-3">
                                                            <input class="form-control" type="text" value="<?php echo($row['fecha_ingreso']); ?>" placeholder="insertar" disabled>
                                                        </div>
                                                        <div class="col-lg-2">
                                                            <label>Cambiar: </label>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <input placeholder="Ingrese fecha" type="date" class="form-control" id="fechaIngBecario" value="<?php echo($row['fecha_ingreso']); ?>" name="">
                                                        </div>
                                                    </div>
                                                    <!-----poner aquí---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingInfoPersonal">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseInfoPersonal" aria-expanded="false" aria-controls="collapseInfoPersonal">
                                                Información personal
                                                </button>
                                            </h2>
                                            </div>
                                            <div id="collapseInfoPersonal" class="collapse" aria-labelledby="headingInfoPersonal" data-parent="#accordionDatos">
                                                <div class="card-body">
                                                    <!-----poner aquí---->
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Estado civil</label>
                                                        <div class="col-lg-9">
                                                            <select id="civilBecario" class="form-control">
                                                                <option selected value="<?php echo($row['estado_civil']); ?>"><?php if($row['estado_civil'] == ''){echo("Insertar estado civil");} else{echo($row['estado_civil']); }?></option>
                                                                <option value="Soltero/a">Soltero/a</option>
                                                                <option value="Noviazgo">Noviazgo</option>
                                                                <option value="Comprometido/a">Comprometido/a</option>
                                                                <option value="Casado/a">Casado/a</option>
                                                                <option value="Unión libre">Unión libre</option>
                                                                <option value="Divorciado">Divorciado/a</option>
                                                                <option value="Viudo/a">Viudo/a</option>
                                                            </select>
                                                        </div>
                                                    </div> 
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Escolaridad</label>
                                                        <div class="col-lg-9">
                                                            <select id="escolaridadBecario" class="form-control">
                                                                <option selected value="<?php echo($row['escolaridad']); ?>"><?php if($row['escolaridad'] == ''){echo("Insertar escolaridad");} else{echo($row['escolaridad']); }?></option>
                                                                <option value="Primaria">Primaria</option>
                                                                <option value="Secundaria">Secundaria</option>
                                                                <option value="Bachillerato">Bachillerato</option>
                                                                <option value="Licenciatura">Licenciatura</option>
                                                                <option value="Maestría">Maestría</option>
                                                                <option value="Posgrado(s)">Posgrado(s)</option>
                                                                <option value="Sin escolaridad">Sin escolaridad</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Hijos</label>
                                                        <div class="col-lg-9">
                                                            <input id="hijosBecario" class="form-control" type="number" value="<?php echo($row['num_hijos']); ?>" placeholder="No tiene">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Discapacidad</label>
                                                        <div class="col-lg-9">
                                                            <input id="discapacidadBecario" class="form-control" type="text" value="<?php echo($row['discapacidad']); ?>" placeholder="Sin discapacidad">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Enfermedad</label>
                                                        <div class="col-lg-9">
                                                            <input id="enfermedadBecario" class="form-control" type="text" value="<?php echo($row['enfermedad']); ?>" placeholder="Sin enfermedad">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Alergias</label>
                                                        <div class="col-lg-9">
                                                            <input id="alergiasBecario" class="form-control" type="text" value="<?php echo($row['alergias']); ?>" placeholder="Sin alergias">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Nombre familiar</label>
                                                        <div class="col-lg-9">
                                                            <input id="nombreFamBecario" class="form-control" type="text" value="<?php echo($row['nombre_familiares']); ?>" placeholder="Nombre familiar">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Número familiar</label>
                                                        <div class="col-lg-9">
                                                            <input id="numFamBecario" class="form-control" type="number" value="<?php echo($row['num_familiares']); ?>" placeholder="Telefono familiar">
                                                        </div>
                                                    </div>




                                                    <!-----poner aquí---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingDireccion">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseDireccion" aria-expanded="false" aria-controls="collapseDireccion">
                                                Dirección
                                                </button>
                                            </h2>
                                            </div>
                                            <div id="collapseDireccion" class="collapse" aria-labelledby="headingDireccion" data-parent="#accordionDatos">
                                                <div class="card-body">
                                                    <!-----poner aquí---->
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Calle y número</label>
                                                        <div class="col-lg-9">
                                                            <input id="direccionBecario" class="form-control" type="text" value="<?php echo($row['direccion']); ?>" placeholder="Insertar dirección">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Municipio</label>
                                                        <div class="col-lg-9">
                                                            <select id="municipioBecario" class="form-control">
                                                                <option selected value="<?php echo($row['municipio']); ?>" ><?php echo($row['municipio']); ?></option>
                                                                <option value="Abejones">Abejones</option> 
                                                                <option value="Acatlan de Perez Figueroa">Acatlan de Perez Figueroa</option> 
                                                                <option value="Asuncion Cacalotepec">Asuncion Cacalotepec</option> 
                                                                <option value="Asuncion Cuyotepeji">Asuncion Cuyotepeji</option> 
                                                                <option value="Asuncion Ixtaltepec">Asuncion Ixtaltepec</option> 
                                                                <option value="Asuncion Nochixtlan">Asuncion Nochixtlan</option> 
                                                                <option value="Asuncion Ocotlan">Asuncion Ocotlan</option> 
                                                                <option value="Asuncion Tlacolulita">Asuncion Tlacolulita</option> 
                                                                <option value="Ayotzintepec">Ayotzintepec</option> 
                                                                <option value="El Barrio de la Soledad">El Barrio de la Soledad</option> 
                                                                <option value="Calihuala">Calihuala</option> 
                                                                <option value="Candelaria Loxicha">Candelaria Loxicha</option> 
                                                                <option value="Cienega de Zimatlan">Cienega de Zimatlan</option> 
                                                                <option value="Ciudad Ixtepec">Ciudad Ixtepec</option> 
                                                                <option value="Coatecas Altas">Coatecas Altas</option> 
                                                                <option value="Coicoyan de las Flores">Coicoyan de las Flores</option> 
                                                                <option value="La Compa">La Compa</option> 
                                                                <option value="Concepcion Buenavista">Concepcion Buenavista</option> 
                                                                <option value="Concepcion Papalo">Concepcion Papalo</option> 
                                                                <option value="Constancia del Rosario">Constancia del Rosario</option> 
                                                                <option value="Cosolapa">Cosolapa</option> 
                                                                <option value="Cosoltepec">Cosoltepec</option> 
                                                                <option value="Cuilapam de Guerrero">Cuilapam de Guerrero</option> 
                                                                <option value="Cuyamecalco Villa de Zaragoza">Cuyamecalco Villa de Zaragoza</option> 
                                                                <option value="Chahuites">Chahuites</option> 
                                                                <option value="Chalcatongo de Hidalgo">Chalcatongo de Hidalgo</option> 
                                                                <option value="Chiquihuitlan de Benito Juarez">Chiquihuitlan de Benito Juarez</option> 
                                                                <option value="Heroica Ciudad de Ejutla de Crespo">Heroica Ciudad de Ejutla de Crespo</option> 
                                                                <option value="Eloxochitlan de Flores Magon">Eloxochitlan de Flores Magon</option> 
                                                                <option value="El Espinal">El Espinal</option> 
                                                                <option value="Tamazulapam del Espiritu Santo">Tamazulapam del Espiritu Santo</option> 
                                                                <option value="Fresnillo de Trujano">Fresnillo de Trujano</option> 
                                                                <option value="Guadalupe Etla">Guadalupe Etla</option> 
                                                                <option value="Guadalupe de Ramirez">Guadalupe de Ramirez</option> 
                                                                <option value="Guelatao de Juarez">Guelatao de Juarez</option> 
                                                                <option value="Guevea de Humboldt">Guevea de Humboldt</option> 
                                                                <option value="Mesones Hidalgo">Mesones Hidalgo</option> 
                                                                <option value="Villa Hidalgo">Villa Hidalgo</option> 
                                                                <option value="Heroica Ciudad de Huajuapan de Leon">Heroica Ciudad de Huajuapan de Leon</option> 
                                                                <option value="Huautepec">Huautepec</option> 
                                                                <option value="Huautla de Jimenez">Huautla de Jimenez</option> 
                                                                <option value="Ixtlan de Juarez">Ixtlan de Juarez</option> 
                                                                <option value="Heroica Ciudad de Juchitan de Zaragoza">Heroica Ciudad de Juchitan de Zaragoza</option> 
                                                                <option value="Loma Bonita">Loma Bonita</option> 
                                                                <option value="Magdalena Apasco">Magdalena Apasco</option> 
                                                                <option value="Magdalena Jaltepec">Magdalena Jaltepec</option> 
                                                                <option value="Santa Magdalena Jicotlan">Santa Magdalena Jicotlan</option> 
                                                                <option value="Magdalena Mixtepec">Magdalena Mixtepec</option> 
                                                                <option value="Magdalena Ocotlan">Magdalena Ocotlan</option> 
                                                                <option value="Magdalena Pe">Magdalena Pe</option> 
                                                                <option value="Magdalena Teitipac">Magdalena Teitipac</option> 
                                                                <option value="Magdalena Tequisistlan">Magdalena Tequisistlan</option> 
                                                                <option value="Magdalena Tlacotepec">Magdalena Tlacotepec</option> 
                                                                <option value="Magdalena Zahuatlan">Magdalena Zahuatlan</option> 
                                                                <option value="Mariscala de Juarez">Mariscala de Juarez</option> 
                                                                <option value="Martires de Tacubaya">Martires de Tacubaya</option> 
                                                                <option value="Matias Romero Avenda">Matias Romero Avenda</option> 
                                                                <option value="Mazatlan Villa de Flores">Mazatlan Villa de Flores</option> 
                                                                <option value="Miahuatlan de Porfirio Diaz">Miahuatlan de Porfirio Diaz</option> 
                                                                <option value="Mixistlan de la Reforma">Mixistlan de la Reforma</option> 
                                                                <option value="Monjas">Monjas</option> 
                                                                <option value="Natividad">Natividad</option> 
                                                                <option value="Nazareno Etla">Nazareno Etla</option> 
                                                                <option value="Nejapa de Madero">Nejapa de Madero</option> 
                                                                <option value="Ixpantepec Nieves">Ixpantepec Nieves</option> 
                                                                <option value="Santiago Niltepec">Santiago Niltepec</option> 
                                                                <option value="Oaxaca de Juarez">Oaxaca de Juarez</option> 
                                                                <option value="Ocotlan de Morelos">Ocotlan de Morelos</option> 
                                                                <option value="La Pe">La Pe</option> 
                                                                <option value="Pinotepa de Don Luis">Pinotepa de Don Luis</option> 
                                                                <option value="Pluma Hidalgo">Pluma Hidalgo</option> 
                                                                <option value="San Jose del Progreso">San Jose del Progreso</option> 
                                                                <option value="Putla Villa de Guerrero">Putla Villa de Guerrero</option> 
                                                                <option value="Santa Catarina Quioquitani">Santa Catarina Quioquitani</option> 
                                                                <option value="Reforma de Pineda">Reforma de Pineda</option> 
                                                                <option value="La Reforma">La Reforma</option> 
                                                                <option value="Reyes Etla">Reyes Etla</option> 
                                                                <option value="Rojas de Cuauhtemoc">Rojas de Cuauhtemoc</option> 
                                                                <option value="Salina Cruz">Salina Cruz</option> 
                                                                <option value="San Agustin Amatengo">San Agustin Amatengo</option> 
                                                                <option value="San Agustin Atenango">San Agustin Atenango</option> 
                                                                <option value="San Agustin Chayuco">San Agustin Chayuco</option> 
                                                                <option value="San Agustin de las Juntas">San Agustin de las Juntas</option> 
                                                                <option value="San Agustin Etla">San Agustin Etla</option> 
                                                                <option value="San Agustin Loxicha">San Agustin Loxicha</option> 
                                                                <option value="San Agustin Tlacotepec">San Agustin Tlacotepec</option> 
                                                                <option value="San Agustin Yatareni">San Agustin Yatareni</option> 
                                                                <option value="San Andres Cabecera Nueva">San Andres Cabecera Nueva</option> 
                                                                <option value="San Andres Dinicuiti">San Andres Dinicuiti</option> 
                                                                <option value="San Andres Huaxpaltepec">San Andres Huaxpaltepec</option> 
                                                                <option value="San Andres Huayapam">San Andres Huayapam</option> 
                                                                <option value="San Andres Ixtlahuaca">San Andres Ixtlahuaca</option> 
                                                                <option value="San Andres Lagunas">San Andres Lagunas</option> 
                                                                <option value="San Andres Nuxi">San Andres Nuxi</option> 
                                                                <option value="San Andres Paxtlan">San Andres Paxtlan</option> 
                                                                <option value="San Andres Sinaxtla">San Andres Sinaxtla</option> 
                                                                <option value="San Andres Solaga">San Andres Solaga</option> 
                                                                <option value="San Andres Teotilalpam">San Andres Teotilalpam</option> 
                                                                <option value="San Andres Tepetlapa">San Andres Tepetlapa</option> 
                                                                <option value="San Andres Yaa">San Andres Yaa</option> 
                                                                <option value="San Andres Zabache">San Andres Zabache</option> 
                                                                <option value="San Andres Zautla">San Andres Zautla</option> 
                                                                <option value="San Antonino Castillo Velasco">San Antonino Castillo Velasco</option> 
                                                                <option value="San Antonino el Alto">San Antonino el Alto</option> 
                                                                <option value="San Antonino Monte Verde">San Antonino Monte Verde</option> 
                                                                <option value="San Antonio Acutla">San Antonio Acutla</option> 
                                                                <option value="San Antonio de la Cal">San Antonio de la Cal</option> 
                                                                <option value="San Antonio Huitepec">San Antonio Huitepec</option> 
                                                                <option value="San Antonio Nanahuatipam">San Antonio Nanahuatipam</option> 
                                                                <option value="San Antonio Sinicahua">San Antonio Sinicahua</option> 
                                                                <option value="San Antonio Tepetlapa">San Antonio Tepetlapa</option> 
                                                                <option value="San Baltazar Chichicapam">San Baltazar Chichicapam</option> 
                                                                <option value="San Baltazar Loxicha">San Baltazar Loxicha</option> 
                                                                <option value="San Baltazar Yatzachi el Bajo">San Baltazar Yatzachi el Bajo</option> 
                                                                <option value="San Bartolo Coyotepec">San Bartolo Coyotepec</option> 
                                                                <option value="San Bartolome Ayautla">San Bartolome Ayautla</option> 
                                                                <option value="San Bartolome Loxicha">San Bartolome Loxicha</option> 
                                                                <option value="San Bartolome Quialana">San Bartolome Quialana</option> 
                                                                <option value="San Bartolome Yucua">San Bartolome Yucua</option> 
                                                                <option value="San Bartolome Zoogocho">San Bartolome Zoogocho</option> 
                                                                <option value="San Bartolo Soyaltepec">San Bartolo Soyaltepec</option> 
                                                                <option value="San Bartolo Yautepec">San Bartolo Yautepec</option> 
                                                                <option value="San Bernardo Mixtepec">San Bernardo Mixtepec</option> 
                                                                <option value="San Blas Atempa">San Blas Atempa</option> 
                                                                <option value="San Carlos Yautepec">San Carlos Yautepec</option> 
                                                                <option value="San Cristobal Amatlan">San Cristobal Amatlan</option> 
                                                                <option value="San Cristobal Amoltepec">San Cristobal Amoltepec</option> 
                                                                <option value="San Cristobal Lachirioag">San Cristobal Lachirioag</option> 
                                                                <option value="San Cristobal Suchixtlahuaca">San Cristobal Suchixtlahuaca</option> 
                                                                <option value="San Dionisio del Mar">San Dionisio del Mar</option> 
                                                                <option value="San Dionisio Ocotepec">San Dionisio Ocotepec</option> 
                                                                <option value="San Dionisio Ocotlan">San Dionisio Ocotlan</option> 
                                                                <option value="San Esteban Atatlahuca">San Esteban Atatlahuca</option> 
                                                                <option value="San Felipe Jalapa de Diaz">San Felipe Jalapa de Diaz</option> 
                                                                <option value="San Felipe Tejalapam">San Felipe Tejalapam</option> 
                                                                <option value="San Felipe Usila">San Felipe Usila</option> 
                                                                <option value="San Francisco Cahuacua">San Francisco Cahuacua</option> 
                                                                <option value="San Francisco Cajonos">San Francisco Cajonos</option> 
                                                                <option value="San Francisco Chapulapa">San Francisco Chapulapa</option> 
                                                                <option value="San Francisco Chindua">San Francisco Chindua</option> 
                                                                <option value="San Francisco del Mar">San Francisco del Mar</option> 
                                                                <option value="San Francisco Huehuetlan">San Francisco Huehuetlan</option> 
                                                                <option value="San Francisco Ixhuatan">San Francisco Ixhuatan</option> 
                                                                <option value="San Francisco Jaltepetongo">San Francisco Jaltepetongo</option> 
                                                                <option value="San Francisco Lachigolo">San Francisco Lachigolo</option> 
                                                                <option value="San Francisco Logueche">San Francisco Logueche</option> 
                                                                <option value="San Francisco Nuxa">San Francisco Nuxa</option> 
                                                                <option value="San Francisco Ozolotepec">San Francisco Ozolotepec</option> 
                                                                <option value="San Francisco Sola">San Francisco Sola</option> 
                                                                <option value="San Francisco Telixtlahuaca">San Francisco Telixtlahuaca</option> 
                                                                <option value="San Francisco Teopan">San Francisco Teopan</option> 
                                                                <option value="San Francisco Tlapancingo">San Francisco Tlapancingo</option> 
                                                                <option value="San Gabriel Mixtepec">San Gabriel Mixtepec</option> 
                                                                <option value="San Ildefonso Amatlan">San Ildefonso Amatlan</option> 
                                                                <option value="San Ildefonso Sola">San Ildefonso Sola</option> 
                                                                <option value="San Ildefonso Villa Alta">San Ildefonso Villa Alta</option> 
                                                                <option value="San Jacinto Amilpas">San Jacinto Amilpas</option> 
                                                                <option value="San Jacinto Tlacotepec">San Jacinto Tlacotepec</option> 
                                                                <option value="San Jeronimo Coatlan">San Jeronimo Coatlan</option> 
                                                                <option value="San Jeronimo Silacayoapilla">San Jeronimo Silacayoapilla</option> 
                                                                <option value="San Jeronimo Sosola">San Jeronimo Sosola</option> 
                                                                <option value="San Jeronimo Taviche">San Jeronimo Taviche</option> 
                                                                <option value="San Jeronimo Tecoatl">San Jeronimo Tecoatl</option> 
                                                                <option value="San Jorge Nuchita">San Jorge Nuchita</option> 
                                                                <option value="San Jose Ayuquila">San Jose Ayuquila</option> 
                                                                <option value="San Jose Chiltepec">San Jose Chiltepec</option> 
                                                                <option value="San Jose del Pe">San Jose del Pe</option> 
                                                                <option value="San Jose Estancia Grande">San Jose Estancia Grande</option> 
                                                                <option value="San Jose Independencia">San Jose Independencia</option> 
                                                                <option value="San Jose Lachiguiri">San Jose Lachiguiri</option> 
                                                                <option value="San Jose Tenango">San Jose Tenango</option> 
                                                                <option value="San Juan Achiutla">San Juan Achiutla</option> 
                                                                <option value="San Juan Atepec">San Juan Atepec</option> 
                                                                <option value="Animas Trujano">Animas Trujano</option> 
                                                                <option value="San Juan Bautista Atatlahuca">San Juan Bautista Atatlahuca</option> 
                                                                <option value="San Juan Bautista Coixtlahuaca">San Juan Bautista Coixtlahuaca</option> 
                                                                <option value="San Juan Bautista Cuicatlan">San Juan Bautista Cuicatlan</option> 
                                                                <option value="San Juan Bautista Guelache">San Juan Bautista Guelache</option> 
                                                                <option value="San Juan Bautista Jayacatlan">San Juan Bautista Jayacatlan</option> 
                                                                <option value="San Juan Bautista Lo de Soto">San Juan Bautista Lo de Soto</option> 
                                                                <option value="San Juan Bautista Suchitepec">San Juan Bautista Suchitepec</option> 
                                                                <option value="San Juan Bautista Tlacoatzintepec">San Juan Bautista Tlacoatzintepec</option> 
                                                                <option value="San Juan Bautista Tlachichilco">San Juan Bautista Tlachichilco</option> 
                                                                <option value="San Juan Bautista Tuxtepec">San Juan Bautista Tuxtepec</option> 
                                                                <option value="San Juan Cacahuatepec">San Juan Cacahuatepec</option> 
                                                                <option value="San Juan Cieneguilla">San Juan Cieneguilla</option> 
                                                                <option value="San Juan Coatzospam">San Juan Coatzospam</option> 
                                                                <option value="San Juan Colorado">San Juan Colorado</option> 
                                                                <option value="San Juan Comaltepec">San Juan Comaltepec</option> 
                                                                <option value="San Juan Cotzocon">San Juan Cotzocon</option> 
                                                                <option value="San Juan Chicomezuchil">San Juan Chicomezuchil</option> 
                                                                <option value="San Juan Chilateca">San Juan Chilateca</option> 
                                                                <option value="San Juan del Estado">San Juan del Estado</option> 
                                                                <option value="San Juan del Rio">San Juan del Rio</option> 
                                                                <option value="San Juan Diuxi">San Juan Diuxi</option> 
                                                                <option value="San Juan Evangelista Analco">San Juan Evangelista Analco</option> 
                                                                <option value="San Juan Guelavia">San Juan Guelavia</option> 
                                                                <option value="San Juan Guichicovi">San Juan Guichicovi</option> 
                                                                <option value="San Juan Ihualtepec">San Juan Ihualtepec</option> 
                                                                <option value="San Juan Juquila Mixes">San Juan Juquila Mixes</option> 
                                                                <option value="San Juan Juquila Vijanos">San Juan Juquila Vijanos</option> 
                                                                <option value="San Juan Lachao">San Juan Lachao</option> 
                                                                <option value="San Juan Lachigalla">San Juan Lachigalla</option> 
                                                                <option value="San Juan Lajarcia">San Juan Lajarcia</option> 
                                                                <option value="San Juan Lalana">San Juan Lalana</option> 
                                                                <option value="San Juan de los Cues">San Juan de los Cues</option> 
                                                                <option value="San Juan Mazatlan">San Juan Mazatlan</option> 
                                                                <option value="San Juan Mixtepec -Dto. 08 -">San Juan Mixtepec -Dto. 08 -</option> 
                                                                <option value="San Juan Mixtepec -Dto. 26 -">San Juan Mixtepec -Dto. 26 -</option> 
                                                                <option value="San Juan ">San Juan </option> 
                                                                <option value="San Juan Ozolotepec">San Juan Ozolotepec</option> 
                                                                <option value="San Juan Petlapa">San Juan Petlapa</option> 
                                                                <option value="San Juan Quiahije">San Juan Quiahije</option> 
                                                                <option value="San Juan Quiotepec">San Juan Quiotepec</option> 
                                                                <option value="San Juan Sayultepec">San Juan Sayultepec</option> 
                                                                <option value="San Juan Tabaa">San Juan Tabaa</option> 
                                                                <option value="San Juan Tamazola">San Juan Tamazola</option> 
                                                                <option value="San Juan Teita">San Juan Teita</option> 
                                                                <option value="San Juan Teitipac">San Juan Teitipac</option> 
                                                                <option value="San Juan Tepeuxila">San Juan Tepeuxila</option> 
                                                                <option value="San Juan Teposcolula">San Juan Teposcolula</option> 
                                                                <option value="San Juan Yaee">San Juan Yaee</option> 
                                                                <option value="San Juan Yatzona">San Juan Yatzona</option> 
                                                                <option value="San Juan Yucuita">San Juan Yucuita</option> 
                                                                <option value="San Lorenzo">San Lorenzo</option> 
                                                                <option value="San Lorenzo Albarradas">San Lorenzo Albarradas</option> 
                                                                <option value="San Lorenzo Cacaotepec">San Lorenzo Cacaotepec</option> 
                                                                <option value="San Lorenzo Cuaunecuiltitla">San Lorenzo Cuaunecuiltitla</option> 
                                                                <option value="San Lorenzo Texmelucan">San Lorenzo Texmelucan</option> 
                                                                <option value="San Lorenzo Victoria">San Lorenzo Victoria</option> 
                                                                <option value="San Lucas Camotlan">San Lucas Camotlan</option> 
                                                                <option value="San Lucas Ojitlan">San Lucas Ojitlan</option> 
                                                                <option value="San Lucas Quiavini">San Lucas Quiavini</option> 
                                                                <option value="San Lucas Zoquiapam">San Lucas Zoquiapam</option> 
                                                                <option value="San Luis Amatlan">San Luis Amatlan</option> 
                                                                <option value="San Marcial Ozolotepec">San Marcial Ozolotepec</option> 
                                                                <option value="San Marcos Arteaga">San Marcos Arteaga</option> 
                                                                <option value="San Martin de los Cansecos">San Martin de los Cansecos</option> 
                                                                <option value="San Martin Huamelulpam">San Martin Huamelulpam</option> 
                                                                <option value="San Martin Itunyoso">San Martin Itunyoso</option> 
                                                                <option value="San Martin Lachila">San Martin Lachila</option> 
                                                                <option value="San Martin Peras">San Martin Peras</option> 
                                                                <option value="San Martin Tilcajete">San Martin Tilcajete</option> 
                                                                <option value="San Martin Toxpalan">San Martin Toxpalan</option> 
                                                                <option value="San Martin Zacatepec">San Martin Zacatepec</option> 
                                                                <option value="San Mateo Cajonos">San Mateo Cajonos</option> 
                                                                <option value="Capulalpam de Mendez">Capulalpam de Mendez</option> 
                                                                <option value="San Mateo del Mar">San Mateo del Mar</option> 
                                                                <option value="San Mateo Yoloxochitlan">San Mateo Yoloxochitlan</option> 
                                                                <option value="San Mateo Etlatongo">San Mateo Etlatongo</option> 
                                                                <option value="San Mateo Nejapam">San Mateo Nejapam</option> 
                                                                <option value="San Mateo Pe">San Mateo Pe</option> 
                                                                <option value="San Mateo Pi">San Mateo Pi</option> 
                                                                <option value="San Mateo Rio Hondo">San Mateo Rio Hondo</option> 
                                                                <option value="San Mateo Sindihui">San Mateo Sindihui</option> 
                                                                <option value="San Mateo Tlapiltepec">San Mateo Tlapiltepec</option> 
                                                                <option value="San Melchor Betaza">San Melchor Betaza</option> 
                                                                <option value="San Miguel Achiutla">San Miguel Achiutla</option> 
                                                                <option value="San Miguel Ahuehuetitlan">San Miguel Ahuehuetitlan</option> 
                                                                <option value="San Miguel Aloapam">San Miguel Aloapam</option> 
                                                                <option value="San Miguel Amatitlan">San Miguel Amatitlan</option> 
                                                                <option value="San Miguel Amatlan">San Miguel Amatlan</option> 
                                                                <option value="San Miguel Coatlan">San Miguel Coatlan</option> 
                                                                <option value="San Miguel Chicahua">San Miguel Chicahua</option> 
                                                                <option value="San Miguel Chimalapa">San Miguel Chimalapa</option> 
                                                                <option value="San Miguel del Puerto">San Miguel del Puerto</option> 
                                                                <option value="San Miguel del Rio">San Miguel del Rio</option> 
                                                                <option value="San Miguel Ejutla">San Miguel Ejutla</option> 
                                                                <option value="San Miguel el Grande">San Miguel el Grande</option> 
                                                                <option value="San Miguel Huautla">San Miguel Huautla</option> 
                                                                <option value="San Miguel Mixtepec">San Miguel Mixtepec</option> 
                                                                <option value="San Miguel Panixtlahuaca">San Miguel Panixtlahuaca</option> 
                                                                <option value="San Miguel Peras">San Miguel Peras</option> 
                                                                <option value="San Miguel Piedras">San Miguel Piedras</option> 
                                                                <option value="San Miguel Quetzaltepec">San Miguel Quetzaltepec</option> 
                                                                <option value="San Miguel Santa Flor">San Miguel Santa Flor</option> 
                                                                <option value="Villa Sola de Vega">Villa Sola de Vega</option> 
                                                                <option value="San Miguel Soyaltepec">San Miguel Soyaltepec</option> 
                                                                <option value="San Miguel Suchixtepec">San Miguel Suchixtepec</option> 
                                                                <option value="Villa Talea de Castro">Villa Talea de Castro</option> 
                                                                <option value="San Miguel Tecomatlan">San Miguel Tecomatlan</option> 
                                                                <option value="San Miguel Tenango">San Miguel Tenango</option> 
                                                                <option value="San Miguel Tequixtepec">San Miguel Tequixtepec</option> 
                                                                <option value="San Miguel Tilquiapam">San Miguel Tilquiapam</option> 
                                                                <option value="San Miguel Tlacamama">San Miguel Tlacamama</option> 
                                                                <option value="San Miguel Tlacotepec">San Miguel Tlacotepec</option> 
                                                                <option value="San Miguel Tulancingo">San Miguel Tulancingo</option> 
                                                                <option value="San Miguel Yotao">San Miguel Yotao</option> 
                                                                <option value="San Nicolas">San Nicolas</option> 
                                                                <option value="San Nicolas Hidalgo">San Nicolas Hidalgo</option> 
                                                                <option value="San Pablo Coatlan">San Pablo Coatlan</option> 
                                                                <option value="San Pablo Cuatro Venados">San Pablo Cuatro Venados</option> 
                                                                <option value="San Pablo Etla">San Pablo Etla</option> 
                                                                <option value="San Pablo Huitzo">San Pablo Huitzo</option> 
                                                                <option value="San Pablo Huixtepec">San Pablo Huixtepec</option> 
                                                                <option value="San Pablo Macuiltianguis">San Pablo Macuiltianguis</option> 
                                                                <option value="San Pablo Tijaltepec">San Pablo Tijaltepec</option> 
                                                                <option value="San Pablo Villa de Mitla">San Pablo Villa de Mitla</option> 
                                                                <option value="San Pablo Yaganiza">San Pablo Yaganiza</option> 
                                                                <option value="San Pedro Amuzgos">San Pedro Amuzgos</option> 
                                                                <option value="San Pedro Apostol">San Pedro Apostol</option> 
                                                                <option value="San Pedro Atoyac">San Pedro Atoyac</option> 
                                                                <option value="San Pedro Cajonos">San Pedro Cajonos</option> 
                                                                <option value="San Pedro Coxcaltepec Cantaros">San Pedro Coxcaltepec Cantaros</option> 
                                                                <option value="San Pedro Comitancillo">San Pedro Comitancillo</option> 
                                                                <option value="San Pedro el Alto">San Pedro el Alto</option> 
                                                                <option value="San Pedro Huamelula">San Pedro Huamelula</option> 
                                                                <option value="San Pedro Huilotepec">San Pedro Huilotepec</option> 
                                                                <option value="San Pedro Ixcatlan">San Pedro Ixcatlan</option> 
                                                                <option value="San Pedro Ixtlahuaca">San Pedro Ixtlahuaca</option> 
                                                                <option value="San Pedro Jaltepetongo">San Pedro Jaltepetongo</option> 
                                                                <option value="San Pedro Jicayan">San Pedro Jicayan</option> 
                                                                <option value="San Pedro Jocotipac">San Pedro Jocotipac</option> 
                                                                <option value="San Pedro Juchatengo">San Pedro Juchatengo</option> 
                                                                <option value="San Pedro Martir">San Pedro Martir</option> 
                                                                <option value="San Pedro Martir Quiechapa">San Pedro Martir Quiechapa</option> 
                                                                <option value="San Pedro Martir Yucuxaco">San Pedro Martir Yucuxaco</option> 
                                                                <option value="San Pedro Mixtepec -Dto. 22 -">San Pedro Mixtepec -Dto. 22 -</option> 
                                                                <option value="San Pedro Mixtepec -Dto. 26 -">San Pedro Mixtepec -Dto. 26 -</option> 
                                                                <option value="San Pedro Molinos">San Pedro Molinos</option> 
                                                                <option value="San Pedro Nopala">San Pedro Nopala</option> 
                                                                <option value="San Pedro Ocopetatillo">San Pedro Ocopetatillo</option> 
                                                                <option value="San Pedro Ocotepec">San Pedro Ocotepec</option> 
                                                                <option value="San Pedro Pochutla">San Pedro Pochutla</option> 
                                                                <option value="San Pedro Quiatoni">San Pedro Quiatoni</option> 
                                                                <option value="San Pedro Sochiapam">San Pedro Sochiapam</option> 
                                                                <option value="San Pedro Tapanatepec">San Pedro Tapanatepec</option> 
                                                                <option value="San Pedro Taviche">San Pedro Taviche</option> 
                                                                <option value="San Pedro Teozacoalco">San Pedro Teozacoalco</option> 
                                                                <option value="San Pedro Teutila">San Pedro Teutila</option> 
                                                                <option value="San Pedro Tidaa">San Pedro Tidaa</option> 
                                                                <option value="San Pedro Topiltepec">San Pedro Topiltepec</option> 
                                                                <option value="San Pedro Totolapam">San Pedro Totolapam</option> 
                                                                <option value="Villa de Tututepec de Melchor Ocampo">Villa de Tututepec de Melchor Ocampo</option> 
                                                                <option value="San Pedro Yaneri">San Pedro Yaneri</option> 
                                                                <option value="San Pedro Yolox">San Pedro Yolox</option> 
                                                                <option value="San Pedro y San Pablo Ayutla">San Pedro y San Pablo Ayutla</option> 
                                                                <option value="Villa de Etla">Villa de Etla</option> 
                                                                <option value="San Pedro y San Pablo Teposcolula">San Pedro y San Pablo Teposcolula</option> 
                                                                <option value="San Pedro y San Pablo Tequixtepec">San Pedro y San Pablo Tequixtepec</option> 
                                                                <option value="San Pedro Yucunama">San Pedro Yucunama</option> 
                                                                <option value="San Raymundo Jalpan">San Raymundo Jalpan</option> 
                                                                <option value="San Sebastian Abasolo">San Sebastian Abasolo</option> 
                                                                <option value="San Sebastian Coatlan">San Sebastian Coatlan</option> 
                                                                <option value="San Sebastian Ixcapa">San Sebastian Ixcapa</option> 
                                                                <option value="San Sebastian Nicananduta">San Sebastian Nicananduta</option> 
                                                                <option value="San Sebastian Rio Hondo">San Sebastian Rio Hondo</option> 
                                                                <option value="San Sebastian Tecomaxtlahuaca">San Sebastian Tecomaxtlahuaca</option> 
                                                                <option value="San Sebastian Teitipac">San Sebastian Teitipac</option> 
                                                                <option value="San Sebastian Tutla">San Sebastian Tutla</option> 
                                                                <option value="San Simon Almolongas">San Simon Almolongas</option> 
                                                                <option value="San Simon Zahuatlan">San Simon Zahuatlan</option> 
                                                                <option value="Santa Ana">Santa Ana</option> 
                                                                <option value="Santa Ana Ateixtlahuaca">Santa Ana Ateixtlahuaca</option> 
                                                                <option value="Santa Ana Cuauhtemoc">Santa Ana Cuauhtemoc</option> 
                                                                <option value="Santa Ana del Valle">Santa Ana del Valle</option> 
                                                                <option value="Santa Ana Tavela">Santa Ana Tavela</option> 
                                                                <option value="Santa Ana Tlapacoyan">Santa Ana Tlapacoyan</option> 
                                                                <option value="Santa Ana Yareni">Santa Ana Yareni</option> 
                                                                <option value="Santa Ana Zegache">Santa Ana Zegache</option> 
                                                                <option value="Santa Catalina Quieri">Santa Catalina Quieri</option> 
                                                                <option value="Santa Catarina Cuixtla">Santa Catarina Cuixtla</option> 
                                                                <option value="Santa Catarina Ixtepeji">Santa Catarina Ixtepeji</option> 
                                                                <option value="Santa Catarina Juquila">Santa Catarina Juquila</option> 
                                                                <option value="Santa Catarina Lachatao">Santa Catarina Lachatao</option> 
                                                                <option value="Santa Catarina Loxicha">Santa Catarina Loxicha</option> 
                                                                <option value="Santa Catarina Mechoacan">Santa Catarina Mechoacan</option> 
                                                                <option value="Santa Catarina Minas">Santa Catarina Minas</option> 
                                                                <option value="Santa Catarina Quiane">Santa Catarina Quiane</option> 
                                                                <option value="Santa Catarina Tayata">Santa Catarina Tayata</option> 
                                                                <option value="Santa Catarina Ticua">Santa Catarina Ticua</option> 
                                                                <option value="Santa Catarina Yosonotu">Santa Catarina Yosonotu</option> 
                                                                <option value="Santa Catarina Zapoquila">Santa Catarina Zapoquila</option> 
                                                                <option value="Santa Cruz Acatepec">Santa Cruz Acatepec</option> 
                                                                <option value="Santa Cruz Amilpas">Santa Cruz Amilpas</option> 
                                                                <option value="Santa Cruz de Bravo">Santa Cruz de Bravo</option> 
                                                                <option value="Santa Cruz Itundujia">Santa Cruz Itundujia</option> 
                                                                <option value="Santa Cruz Mixtepec">Santa Cruz Mixtepec</option> 
                                                                <option value="Santa Cruz Nundaco">Santa Cruz Nundaco</option> 
                                                                <option value="Santa Cruz Papalutla">Santa Cruz Papalutla</option> 
                                                                <option value="Santa Cruz Tacache de Mina">Santa Cruz Tacache de Mina</option> 
                                                                <option value="Santa Cruz Tacahua">Santa Cruz Tacahua</option> 
                                                                <option value="Santa Cruz Tayata">Santa Cruz Tayata</option> 
                                                                <option value="Santa Cruz Xitla">Santa Cruz Xitla</option> 
                                                                <option value="Santa Cruz Xoxocotlan">Santa Cruz Xoxocotlan</option> 
                                                                <option value="Santa Cruz Zenzontepec">Santa Cruz Zenzontepec</option> 
                                                                <option value="Santa Gertrudis">Santa Gertrudis</option> 
                                                                <option value="Santa Ines del Monte">Santa Ines del Monte</option> 
                                                                <option value="Santa Ines Yatzeche">Santa Ines Yatzeche</option> 
                                                                <option value="Santa Lucia del Camino">Santa Lucia del Camino</option> 
                                                                <option value="Santa Lucia Miahuatlan">Santa Lucia Miahuatlan</option> 
                                                                <option value="Santa Lucia Monteverde">Santa Lucia Monteverde</option> 
                                                                <option value="Santa Lucia Ocotlan">Santa Lucia Ocotlan</option> 
                                                                <option value="Santa Maria Alotepec">Santa Maria Alotepec</option> 
                                                                <option value="Santa Maria Apazco">Santa Maria Apazco</option> 
                                                                <option value="Santa Maria la Asuncion">Santa Maria la Asuncion</option> 
                                                                <option value="Heroica Ciudad de Tlaxiaco">Heroica Ciudad de Tlaxiaco</option> 
                                                                <option value="Ayoquezco de Aldama">Ayoquezco de Aldama</option> 
                                                                <option value="Santa Maria Atzompa">Santa Maria Atzompa</option> 
                                                                <option value="Santa Maria Camotlan">Santa Maria Camotlan</option> 
                                                                <option value="Santa Maria Colotepec">Santa Maria Colotepec</option> 
                                                                <option value="Santa Maria Cortijo">Santa Maria Cortijo</option> 
                                                                <option value="Santa Maria Coyotepec">Santa Maria Coyotepec</option> 
                                                                <option value="Santa Maria Chachoapam">Santa Maria Chachoapam</option> 
                                                                <option value="Villa de Chilapa de Diaz">Villa de Chilapa de Diaz</option> 
                                                                <option value="Santa Maria Chilchotla">Santa Maria Chilchotla</option> 
                                                                <option value="Santa Maria Chimalapa">Santa Maria Chimalapa</option> 
                                                                <option value="Santa Maria del Rosario">Santa Maria del Rosario</option> 
                                                                <option value="Santa Maria del Tule">Santa Maria del Tule</option> 
                                                                <option value="Santa Maria Ecatepec">Santa Maria Ecatepec</option> 
                                                                <option value="Santa Maria Guelace">Santa Maria Guelace</option> 
                                                                <option value="Santa Maria Guienagati">Santa Maria Guienagati</option> 
                                                                <option value="Santa Maria Huatulco">Santa Maria Huatulco</option> 
                                                                <option value="Santa Maria Huazolotitlan">Santa Maria Huazolotitlan</option> 
                                                                <option value="Santa Maria Ipalapa">Santa Maria Ipalapa</option> 
                                                                <option value="Santa Maria Ixcatlan">Santa Maria Ixcatlan</option> 
                                                                <option value="Santa Maria Jacatepec">Santa Maria Jacatepec</option> 
                                                                <option value="Santa Maria Jalapa del Marques">Santa Maria Jalapa del Marques</option> 
                                                                <option value="Santa Maria Jaltianguis">Santa Maria Jaltianguis</option> 
                                                                <option value="Santa Maria Lachixio">Santa Maria Lachixio</option> 
                                                                <option value="Santa Maria Mixtequilla">Santa Maria Mixtequilla</option> 
                                                                <option value="Santa Maria Nativitas">Santa Maria Nativitas</option> 
                                                                <option value="Santa Maria Nduayaco">Santa Maria Nduayaco</option> 
                                                                <option value="Santa Maria Ozolotepec">Santa Maria Ozolotepec</option> 
                                                                <option value="Santa Maria Papalo">Santa Maria Papalo</option> 
                                                                <option value="Santa Maria Pe">Santa Maria Pe</option> 
                                                                <option value="Santa Maria Petapa">Santa Maria Petapa</option> 
                                                                <option value="Santa Maria Quiegolani">Santa Maria Quiegolani</option> 
                                                                <option value="Santa Maria Sola">Santa Maria Sola</option> 
                                                                <option value="Santa Maria Tataltepec">Santa Maria Tataltepec</option> 
                                                                <option value="Santa Maria Tecomavaca">Santa Maria Tecomavaca</option> 
                                                                <option value="Santa Maria Temaxcalapa">Santa Maria Temaxcalapa</option> 
                                                                <option value="Santa Maria Temaxcaltepec">Santa Maria Temaxcaltepec</option> 
                                                                <option value="Santa Maria Teopoxco">Santa Maria Teopoxco</option> 
                                                                <option value="Santa Maria Tepantlali">Santa Maria Tepantlali</option> 
                                                                <option value="Santa Maria Texcatitlan">Santa Maria Texcatitlan</option> 
                                                                <option value="Santa Maria Tlahuitoltepec">Santa Maria Tlahuitoltepec</option> 
                                                                <option value="Santa Maria Tlalixtac">Santa Maria Tlalixtac</option> 
                                                                <option value="Santa Maria Tonameca">Santa Maria Tonameca</option> 
                                                                <option value="Santa Maria Totolapilla">Santa Maria Totolapilla</option> 
                                                                <option value="Santa Maria Xadani">Santa Maria Xadani</option> 
                                                                <option value="Santa Maria Yalina">Santa Maria Yalina</option> 
                                                                <option value="Santa Maria Yavesia">Santa Maria Yavesia</option> 
                                                                <option value="Santa Maria Yolotepec">Santa Maria Yolotepec</option> 
                                                                <option value="Santa Maria Yosoyua">Santa Maria Yosoyua</option> 
                                                                <option value="Santa Maria Yucuhiti">Santa Maria Yucuhiti</option> 
                                                                <option value="Santa Maria Zacatepec">Santa Maria Zacatepec</option> 
                                                                <option value="Santa Maria Zaniza">Santa Maria Zaniza</option> 
                                                                <option value="Santa Maria Zoquitlan">Santa Maria Zoquitlan</option> 
                                                                <option value="Santiago Amoltepec">Santiago Amoltepec</option> 
                                                                <option value="Santiago Apoala">Santiago Apoala</option> 
                                                                <option value="Santiago Apostol">Santiago Apostol</option> 
                                                                <option value="Santiago Astata">Santiago Astata</option> 
                                                                <option value="Santiago Atitlan">Santiago Atitlan</option> 
                                                                <option value="Santiago Ayuquililla">Santiago Ayuquililla</option> 
                                                                <option value="Santiago Cacaloxtepec">Santiago Cacaloxtepec</option> 
                                                                <option value="Santiago Camotlan">Santiago Camotlan</option> 
                                                                <option value="Santiago Comaltepec">Santiago Comaltepec</option> 
                                                                <option value="Santiago Chazumba">Santiago Chazumba</option> 
                                                                <option value="Santiago Choapam">Santiago Choapam</option> 
                                                                <option value="Santiago del Rio">Santiago del Rio</option> 
                                                                <option value="Santiago Huajolotitlan">Santiago Huajolotitlan</option> 
                                                                <option value="Santiago Huauclilla">Santiago Huauclilla</option> 
                                                                <option value="Santiago Ihuitlan Plumas">Santiago Ihuitlan Plumas</option> 
                                                                <option value="Santiago Ixcuintepec">Santiago Ixcuintepec</option> 
                                                                <option value="Santiago Ixtayutla">Santiago Ixtayutla</option> 
                                                                <option value="Santiago Jamiltepec">Santiago Jamiltepec</option> 
                                                                <option value="Santiago Jocotepec">Santiago Jocotepec</option> 
                                                                <option value="Santiago Juxtlahuaca">Santiago Juxtlahuaca</option> 
                                                                <option value="Santiago Lachiguiri">Santiago Lachiguiri</option> 
                                                                <option value="Santiago Lalopa">Santiago Lalopa</option> 
                                                                <option value="Santiago Laollaga">Santiago Laollaga</option> 
                                                                <option value="Santiago Laxopa">Santiago Laxopa</option> 
                                                                <option value="Santiago Llano Grande">Santiago Llano Grande</option> 
                                                                <option value="Santiago Matatlan">Santiago Matatlan</option> 
                                                                <option value="Santiago Miltepec">Santiago Miltepec</option> 
                                                                <option value="Santiago Minas">Santiago Minas</option> 
                                                                <option value="Santiago Nacaltepec">Santiago Nacaltepec</option> 
                                                                <option value="Santiago Nejapilla">Santiago Nejapilla</option> 
                                                                <option value="Santiago Nundiche">Santiago Nundiche</option> 
                                                                <option value="Santiago Nuyoo">Santiago Nuyoo</option> 
                                                                <option value="Santiago Pinotepa Nacional">Santiago Pinotepa Nacional</option> 
                                                                <option value="Santiago Suchilquitongo">Santiago Suchilquitongo</option> 
                                                                <option value="Santiago Tamazola">Santiago Tamazola</option> 
                                                                <option value="Santiago Tapextla">Santiago Tapextla</option> 
                                                                <option value="Villa Tejupam de la Union">Villa Tejupam de la Union</option> 
                                                                <option value="Santiago Tenango">Santiago Tenango</option> 
                                                                <option value="Santiago Tepetlapa">Santiago Tepetlapa</option> 
                                                                <option value="Santiago Tetepec">Santiago Tetepec</option> 
                                                                <option value="Santiago Texcalcingo">Santiago Texcalcingo</option> 
                                                                <option value="Santiago Textitlan">Santiago Textitlan</option> 
                                                                <option value="Santiago Tilantongo">Santiago Tilantongo</option> 
                                                                <option value="Santiago Tillo">Santiago Tillo</option> 
                                                                <option value="Santiago Tlazoyaltepec">Santiago Tlazoyaltepec</option> 
                                                                <option value="Santiago Xanica">Santiago Xanica</option> 
                                                                <option value="Santiago Xiacui">Santiago Xiacui</option> 
                                                                <option value="Santiago Yaitepec">Santiago Yaitepec</option> 
                                                                <option value="Santiago Yaveo">Santiago Yaveo</option> 
                                                                <option value="Santiago Yolomecatl">Santiago Yolomecatl</option> 
                                                                <option value="Santiago Yosondua">Santiago Yosondua</option> 
                                                                <option value="Santiago Yucuyachi">Santiago Yucuyachi</option> 
                                                                <option value="Santiago Zacatepec">Santiago Zacatepec</option> 
                                                                <option value="Santiago Zoochila">Santiago Zoochila</option> 
                                                                <option value="Nuevo Zoquiapam">Nuevo Zoquiapam</option> 
                                                                <option value="Santo Domingo Ingenio">Santo Domingo Ingenio</option> 
                                                                <option value="Santo Domingo Albarradas">Santo Domingo Albarradas</option> 
                                                                <option value="Santo Domingo Armenta">Santo Domingo Armenta</option> 
                                                                <option value="Santo Domingo Chihuitan">Santo Domingo Chihuitan</option> 
                                                                <option value="Santo Domingo de Morelos">Santo Domingo de Morelos</option> 
                                                                <option value="Santo Domingo Ixcatlan">Santo Domingo Ixcatlan</option> 
                                                                <option value="Santo Domingo Nuxaa">Santo Domingo Nuxaa</option> 
                                                                <option value="Santo Domingo Ozolotepec">Santo Domingo Ozolotepec</option> 
                                                                <option value="Santo Domingo Petapa">Santo Domingo Petapa</option> 
                                                                <option value="Santo Domingo Roayaga">Santo Domingo Roayaga</option> 
                                                                <option value="Santo Domingo Tehuantepec">Santo Domingo Tehuantepec</option> 
                                                                <option value="Santo Domingo Teojomulco">Santo Domingo Teojomulco</option> 
                                                                <option value="Santo Domingo Tepuxtepec">Santo Domingo Tepuxtepec</option> 
                                                                <option value="Santo Domingo Tlatayapam">Santo Domingo Tlatayapam</option> 
                                                                <option value="Santo Domingo Tomaltepec">Santo Domingo Tomaltepec</option> 
                                                                <option value="Santo Domingo Tonala">Santo Domingo Tonala</option> 
                                                                <option value="Santo Domingo Tonaltepec">Santo Domingo Tonaltepec</option> 
                                                                <option value="Santo Domingo Xagacia">Santo Domingo Xagacia</option> 
                                                                <option value="Santo Domingo Yanhuitlan">Santo Domingo Yanhuitlan</option> 
                                                                <option value="Santo Domingo Yodohino">Santo Domingo Yodohino</option> 
                                                                <option value="Santo Domingo Zanatepec">Santo Domingo Zanatepec</option> 
                                                                <option value="Santos Reyes Nopala">Santos Reyes Nopala</option> 
                                                                <option value="Santos Reyes Papalo">Santos Reyes Papalo</option> 
                                                                <option value="Santos Reyes Tepejillo">Santos Reyes Tepejillo</option> 
                                                                <option value="Santos Reyes Yucuna">Santos Reyes Yucuna</option> 
                                                                <option value="Santo Tomas Jalieza">Santo Tomas Jalieza</option> 
                                                                <option value="Santo Tomas Mazaltepec">Santo Tomas Mazaltepec</option> 
                                                                <option value="Santo Tomas Ocotepec">Santo Tomas Ocotepec</option> 
                                                                <option value="Santo Tomas Tamazulapan">Santo Tomas Tamazulapan</option> 
                                                                <option value="San Vicente Coatlan">San Vicente Coatlan</option> 
                                                                <option value="San Vicente Lachixio">San Vicente Lachixio</option> 
                                                                <option value="San Vicente Nu">San Vicente Nu</option> 
                                                                <option value="Silacayoapam">Silacayoapam</option> 
                                                                <option value="Sitio de Xitlapehua">Sitio de Xitlapehua</option> 
                                                                <option value="Soledad Etla">Soledad Etla</option> 
                                                                <option value="Villa de Tamazulapam del Progreso">Villa de Tamazulapam del Progreso</option> 
                                                                <option value="Tanetze de Zaragoza">Tanetze de Zaragoza</option> 
                                                                <option value="Taniche">Taniche</option> 
                                                                <option value="Tataltepec de Valdes">Tataltepec de Valdes</option> 
                                                                <option value="Teococuilco de Marcos Perez">Teococuilco de Marcos Perez</option> 
                                                                <option value="Teotitlan de Flores Magon">Teotitlan de Flores Magon</option> 
                                                                <option value="Teotitlan del Valle">Teotitlan del Valle</option> 
                                                                <option value="Teotongo">Teotongo</option> 
                                                                <option value="Tepelmeme Villa de Morelos">Tepelmeme Villa de Morelos</option> 
                                                                <option value="Heroica Villa Tezoatlan de Segura y Luna, Cuna de la Independenc">Heroica Villa Tezoatlan de Segura y Luna, Cuna de la Independenc</option> 
                                                                <option value="San Jeronimo Tlacochahuaya">San Jeronimo Tlacochahuaya</option> 
                                                                <option value="Tlacolula de Matamoros">Tlacolula de Matamoros</option> 
                                                                <option value="Tlacotepec Plumas">Tlacotepec Plumas</option> 
                                                                <option value="Tlalixtac de Cabrera">Tlalixtac de Cabrera</option> 
                                                                <option value="Totontepec Villa de Morelos">Totontepec Villa de Morelos</option> 
                                                                <option value="Trinidad Zaachila">Trinidad Zaachila</option> 
                                                                <option value="La Trinidad Vista Hermosa">La Trinidad Vista Hermosa</option> 
                                                                <option value="Union Hidalgo">Union Hidalgo</option> 
                                                                <option value="Valerio Trujano">Valerio Trujano</option> 
                                                                <option value="San Juan Bautista Valle Nacional">San Juan Bautista Valle Nacional</option> 
                                                                <option value="Villa Diaz Ordaz">Villa Diaz Ordaz</option> 
                                                                <option value="Yaxe">Yaxe</option> 
                                                                <option value="Magdalena Yodocono de Porfirio Diaz">Magdalena Yodocono de Porfirio Diaz</option> 
                                                                <option value="Yogana">Yogana</option> 
                                                                <option value="Yutanduchi de Guerrero">Yutanduchi de Guerrero</option> 
                                                                <option value="Villa de Zaachila">Villa de Zaachila</option> 
                                                                <option value="San Mateo Yucutindo">San Mateo Yucutindo</option> 
                                                                <option value="Zapotitlan Lagunas">Zapotitlan Lagunas</option> 
                                                                <option value="Zapotitlan Palmas">Zapotitlan Palmas</option> 
                                                                <option value="Santa Ines de Zaragoza">Santa Ines de Zaragoza</option> 
                                                                <option value="Zimatlan de Alvarez">Zimatlan de Alvarez</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Colonia</label>
                                                        <div class="col-lg-9">
                                                            <input id="coloniaBecario" class="form-control" type="text" value="<?php echo($row['colonia']); ?>" placeholder="Insertar colonia">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Código postal</label>
                                                        <div class="col-lg-9">
                                                            <input id="codigoPosBecario" class="form-control" type="number" value="<?php echo($row['codigo_postal']); ?>" placeholder="Insertar código postal">
                                                        </div>
                                                    </div>

                                                    <!-----poner aquí---->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header" id="headingInfoAdicional">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseInfoAdicional" aria-expanded="false" aria-controls="collapseInfoAdicional">
                                                Información adicional
                                                </button>
                                            </h2>
                                            </div>
                                            <div id="collapseInfoAdicional" class="collapse" aria-labelledby="headingInfoAdicional" data-parent="#accordionDatos">
                                                <div class="card-body">
                                                    <!-----poner aquí---->
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Tipo de apoyo</label>
                                                        <div class="col-lg-9">
                                                            <select id="apoyoBecario" class="form-control">
                                                                <option selected value="<?php echo($row['tipo_apoyo']); ?>"><?php if($row['tipo_apoyo'] ==''){echo("Insertar tipo de apoyo");} else{echo($row['tipo_apoyo']);} ?></option>
                                                                <option value="Normal">Normal</option>
                                                                <option value="Adicional">Adicional</option>
                                                                <option value="Social">Social</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Dirección de adscripción</label>
                                                        <div class="col-lg-9">
                                                            <input id="dirAdscripBecario" class="form-control" type="text" value="<?php echo($row['direccion_adscripcion']); ?>" placeholder="Asignar dirección">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Área de adscripción</label>
                                                        <div class="col-lg-9">
                                                            <input id="areaAdscripBecario" class="form-control" type="text" value="<?php echo($row['area_adscripcion']); ?>" placeholder="Asignar area">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Jefe inmediato</label>
                                                        <div class="col-lg-9">
                                                            <input id="jefeImeBecario" class="form-control" type="text" value="<?php echo($row['jefe_becario']); ?>" placeholder="Asignar jefe">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Función que realiza</label>
                                                        <div class="col-lg-9">
                                                            <input id="funcionBecario" class="form-control" type="text" value="<?php echo($row['funcion_becario']); ?>" placeholder="Asignar función">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-lg-3 col-form-label form-control-label">Horario de actividades</label>
                                                        <div class="col-lg-9">
                                                            <input id="horarioBecario" class="form-control" type="text" value="<?php echo($row['horario']); ?>" placeholder="Asignar horario">
                                                        </div>
                                                    </div>
                                                    <!-----poner aquí---->
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                        <!-----collapse group--->

                                    <div class="form-group"><br>
                                        <label for="comentarios"><b>Agregar o editar comentarios</b></label>
                                        <textarea value="<?php echo($row['comentarios_becario']); ?>" placeholder="Inserte comentarios adicionales de ser necesarios" class="form-control" id="comentarios" rows="3"><?php echo($row['comentarios_becario']); ?></textarea>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label form-control-label"></label>
                                        <div class="col-lg-9">
                                            <input type="reset" class="btn btn-secondary" value="Cancelar">
                                            <button type="button" class="btn btn-primary" id="saveChanges">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/row-->
                </div>
                <div class="tab-pane" id="messages">
                    <?php
                    if($row['auxiliar'] == 0 or $term == 0){?>
                        <div class="alert alert-warning alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> El usuario <strong><?php echo($row['nombre_becario']." " .$row['apellidos_becario']); ?></strong> no ha completado su registro.
                        </div>
                    <?php } ?>
                    <!------>
                    <?php 
                    if($row['auxiliar'] == 1 && $term == 1){?>
                        <div class="alert alert-success alert-dismissable">
                            <a class="panel-close close" data-dismiss="alert">×</a> El usuario <strong><?php echo($row['nombre_becario']." " .$row['apellidos_becario']); ?></strong> completó su registro exitosamente.
                        </div>
                    <?php } ?>
                    <!------>
                    <table class="table table-hover table-striped">
                        <tbody>   
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Faltan <?php echo($row['resta2']); ?> Dias</span> Fecha limite de entrega de documentos
                                </td>
                            </tr>  
                            <!------>
                            <?php
                            if($rowDocs['ruta_ine'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">INE</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_nacimiento'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Acta de nacimiento</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_curp'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Curp</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_cv'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Curriculum vitae</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_estudios'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Comprobante de estudios</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_medico'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Certificado medico</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_penal'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Comprobante de antecedentes no penales</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_recomendacion'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Cartas de recomendación</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_domicilio'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Comprobante de domicilio</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <!------>
                            <?php
                            //if($rowDocs['ruta_apoyo'] == NULL){?>
                                <!--<tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Apoyo</span> Falta por entregar documento:
                                    </td>
                                </tr>-->
                            <?php //} ?>
                            <!------>
                            <!------>
                            <?php
                            //if($rowDocs['ruta_compromiso'] == NULL){?>
                                <!--<tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Carta compromiso</span> Falta por entregar documento:
                                    </td>
                                </tr>-->
                            <?php //} ?>
                            <!------>
                            <!------>
                            <?php
                            if($rowDocs['ruta_renuncia'] == NULL){?>
                                <tr>
                                    <td>
                                        <span class="float-right font-weight-bold">Documento de renuncia firmado</span> Falta por entregar documento:
                                    </td>
                                </tr>
                            <?php } ?>
                            <!------>
                            <tr>
                                <td>
                                   <span class="float-right font-weight-bold">Hace <?php echo($row['resta']); ?> Dias</span> Usuario inició su proceso de registro
                                </td>
                            </tr>
                        </tbody> 
                    </table>
                </div>
                <div class="tab-pane" id="edit">
                    <form class="login-form-1" method="POST" action="upload.php" enctype="multipart/form-data">
                        <div class="form-group row">
                            <div class="form-group">
                                <input type="hidden" name="selectUsuario" value="<?php echo ($id_becario);?>">
                                <input type="hidden" name="bandera" value="<?php echo ('4');?>">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Identificación oficial:</label>
                                <input maxlength="18" value="<?php echo($row['ine']); ?>" placeholder="Clave Ine" type="text" class="form-control input-sm" name="claveIne" autofocus>
                            </div>
                            <div class="form-group col-md-4 upload-btn-wrappera">
                                <label for="fileIne"><b>Elige Archivo</b></label><br>
                                <button id="fileIne" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileIne" />
                            </div>
                            <div class="form-group col-md-2">
                                <label><b>Acciones</b></label><br>
                                <a href="<?php echo($row['ruta_ine']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_ine']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                            <div class="form-group col-md-12">
                                <label>Clave curp:</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input maxlength="18" value="<?php echo($row['becario_curp']); ?>" placeholder="Clave curp" type="text" class="form-control input-sm" name="claveCurp">
                            </div>
                            <div class="form-group col-md-4 upload-btn-wrappera">
                                <button id="fileCurp" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileCurp" />
                            </div>
                            <div class="form-group col-md-2">
                                <a href="<?php echo($row['ruta_curp']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_curp']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                            <div class="form-group col-md-12">
                            <label>Comprobante de estudios:</label>
                            </div>
                            <div class="form-group col-md-6">
                                <input value="<?php echo($row['identificador_estudios']); ?>" placeholder="Clave de estudios" type="text" class="form-control input-sm" name="claveEstudios">
                            </div>
                            <div class="form-group col-md-4 upload-btn-wrappera">
                                <button id="fileEstudios" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileEstudios" />
                            </div>
                            <div class="form-group col-md-2">
                                <a href="<?php echo($row['ruta_estudios']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_estudios']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Acta de nacimiento:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileActa" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileActa" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_nacimiento']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_nacimiento']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Curriculum vitae:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileCv" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileCv" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_cv']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_cv']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Certificado médico general:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileMedico" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileMedico" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_medico']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_medico']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Comprobante de domicilio:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileDomicilio" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileDomicilio" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_domicilio']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_domicilio']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Constancia de antecendentes NO penales:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="filePenal" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="filePenal" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_penal']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_penal']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Cartas de recomendación:</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileRecomendacion" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileRecomendacion" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_recomendacion']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_recomendacion']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-6 col-form-label form-control-label">Carta compromiso (renuncia firmada):</label>
                            <div class="col-lg-4 upload-btn-wrappera">
                                <button id="fileRenuncia" class="btna">Elegir archivo pdf</button>
                                <input type="file" name="fileRenuncia" />
                            </div>
                            <div class="col-lg-2">
                                <a href="<?php echo($row['ruta_renuncia']); ?>" target="_blank" role="button" type="button" class="btn" style="color:white; background-color: #0062cc;"><i class="fas fa-eye"></i></a>
                                <a href="<?php echo($row['ruta_renuncia']); ?>" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label form-control-label"></label>
                            <div class="col-lg-9">
                                <input type="reset" class="btn btn-secondary" value="Cancelar">
                                <button type="submit" class="btn btn-primary" value="Guardar cambios">Guardar cambios</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
                <div class="tab-pane" id="down">
                    <div class="row">
                        <div class="col">
                            <label>Descargar carta de renuncia:</label>
                        </div>
                        <div class="col">
                            <a href="../uploads/Carta_Renuncia_Dif.pdf" download class="btn btn-secondary" style="color:white"><i class="fas fa-download"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="col-lg-4 order-lg-1 text-center">
            <a role="button" type="button" class="btn btn-info" href="../mainDashboard.php"><i class="fas fa-arrow-circle-left"></i> Regresar</a>  
            </br></br>
            <img style="width:200px; height:180px;" src="../uploads/imgProfile/<?php if(isset($row['ruta_imagen'])) {echo($row['ruta_imagen']);} else{ echo('avatar.png');} ?>" class="mx-auto img-fluid img-circle d-block" alt="avatar"><!--../uploads/imgProfile/bg-1.jpg--->
            <h6 class="mt-2"><?php echo($row['nombre_becario']." ".$row['apellidos_becario']); ?></h6>

            <form class="form" action="php/imageBecario.php" method="POST" enctype="multipart/form-data">
                <div class="form-group upload-btn-wrappera">
                    <button id="file" class="btna">Elegir foto de perfil</button>
                    <input type="file" accept="image/*" name="fileImage" />
                </div>
                <div class="form-group">
                    <input type="hidden" name="idBeca" value="<?php echo ($id_becario);?>">
                    <button type="submit" name="submit" class="btn btn-warning">Cambiar</button>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Comentarios existentes</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="15" placeholder="Ingrese comentarios en la parte derecha" disabled><?php echo($row['comentarios_becario']); ?></textarea>
                </div>
            </form>
            <hr>
            
        </div>
    </div>
    <?php
        //Footer
        require_once "../footer2.php";
    ?>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#saveChanges').click(function(){

            cadena="idBecario=" + $('#idBecario').val() +
                    "&nombreBecario=" + $('#nombreBecario').val() +
					"&apellidosBecario=" + $('#apellidosBecario').val() +
                    "&emailBecario=" + $('#emailBecario').val() +
					"&telefonoBecario=" + $('#telefonoBecario').val() +
                    "&edadBecario=" + $('#edadBecario').val() +
                    "&sexoBecario=" + $('#sexoBecario').val() +
					"&rfcBecario=" + $('#rfcBecario').val() +
                    "&numTarjetaBecario=" + $('#numTarjetaBecario').val() +
                    "&sueldoIniBecario=" + $('#sueldoIniBecario').val() +
                    "&fechaIngBecario=" + $('#fechaIngBecario').val() +
                    "&civilBecario=" + $('#civilBecario').val() +
                    "&escolaridadBecario=" + $('#escolaridadBecario').val() +
                    "&hijosBecario=" + $('#hijosBecario').val() +
                    "&discapacidadBecario=" + $('#discapacidadBecario').val() +
                    "&enfermedadBecario=" + $('#enfermedadBecario').val() +
                    "&alergiasBecario=" + $('#alergiasBecario').val() +
                    "&nombreFamBecario=" + $('#nombreFamBecario').val() +
                    "&numFamBecario=" + $('#numFamBecario').val() +
                    "&direccionBecario=" + $('#direccionBecario').val() +
                    "&municipioBecario=" + $('#municipioBecario').val() +
                    "&coloniaBecario=" + $('#coloniaBecario').val() +
                    "&codigoPosBecario=" + $('#codigoPosBecario').val() +
                    "&dirAdscripBecario=" + $('#dirAdscripBecario').val() +
                    "&areaAdscripBecario=" + $('#areaAdscripBecario').val() +
                    "&jefeImeBecario=" + $('#jefeImeBecario').val() +
                    "&funcionBecario=" + $('#funcionBecario').val() +
                    "&horarioBecario=" + $('#horarioBecario').val() +
                    "&apoyoBecario=" + $('#apoyoBecario').val() +
					"&comentarios=" + $('#comentarios').val();

					$.ajax({
						type:"POST",
						url:"php/updateBecario.php",
						data:cadena,
						success:function(r){
							if(r>0){
                                //$('#frmModificacion')[0].reset();
                                location.reload(true);
                                alertify.success("Modificado con éxito");
                                
							}else{
								alertify.error("Error al modificar");
							}
						}
					});
		});
    });
</script>
<?php
} else {
	header("location:index.php?#");
	}
 ?>
