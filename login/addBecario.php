<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
  <?php	
 require_once "php/conexion.php";
 $conexion=conexion();

 $sqlNombre = "SELECT id_becario, nombre_becario, apellidos_becario FROM becarios_registro";
 $result = mysqli_query($conexion, $sqlNombre);

 if(isset($_GET['return'])){
	$error=$_GET['return'];
	if($error==1){
	?><script> alert("Debe elegir un becario");</script>
	<?php
	}
 }
 ?>
<!doctype html>
<html lang="es">
  <head>
  	<title>Registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/alertifyjs/alertify.js"></script>
	<script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>


	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

	<link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
	<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>

	<style>
		.login-container{
			margin-top: 5%;
			margin-bottom: 5%;
		}
		.login-form-1{
			padding: 5%;
			box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0), 0 1px 2px 0 rgba(0, 0, 0, 0);
			background-color:white;
			font-size: large;
		}
		.login-form-1 h3{
			text-align: center;
			color: #333;
		}
		.login-form-2{
			padding: 5%;
			background: #0062cc;
			box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
		}
		.login-form-2 h3{
			text-align: center;
			color: #fff;
		}
		.login-container form{
			padding: 1%;
		}
		.btnSubmit
		{
			width: 50%;
			border-radius: 1rem;
			padding: 1.5%;
			border: none;
			cursor: pointer;
			font-size: large;
		}
		.login-form-1 .btnSubmit{
			font-weight: 600;
			color: #fff;
			background-color: #0062cc;
			font-size: large;
		}
		.login-form-2 .btnSubmit{
			font-weight: 600;
			color: #0062cc;
			background-color: #fff;
		}
		.login-form-2 .ForgetPwd{
			color: #fff;
			font-weight: 600;
			text-decoration: none;
		}
		.login-form-1 .ForgetPwd{
			color: #0062cc;
			font-weight: 600;
			text-decoration: none;
		}
		.loader {
			position:relative;
			margin:0 auto;
			clear:left;
			height:auto;
			z-index: 0;
			text-align:center;/* Add This*/
			background-color:#0062cc;
			padding:1%;
			margin-top:-4%;
			color:white;
		}
		.loaderDown {
			position:relative;
			margin:0 auto;
			clear:left;
			height:auto;
			z-index: 0;
			text-align:center;/* Add This*/
			background-color:white;

		}
		body{
			background-color: #f5f5f5;
		}

		.btnSubmit2{
			width: 50%;
			border-radius: 1rem;
			padding: 1.5%;
			border: none;
			cursor: pointer;

			font-weight: 600;
			color: #0062cc;
			background-color:#f5f5f5;
			/*font-size: large;*/
		}

		.form-control{
			font-size: large;
		}

		form{
			padding-left:25%;
		}

		label{
			font-weight:bold;
		}
		.fa-asterisk{
			color: #FB8888;
		}
	</style>
  </head>
<body >
	<div class="container login-container" id="inicio">
		<div class="col-md-12 loader">
			<h3>Registro de nuevo becario</h3>
		</div>
		<form id="frmRegistro" class="login-form-1" >
			<div class="form-row">
				<!----contenido--->
				<div class="form-group col-md-4">
					<label>Nombre <i class="fas fa-asterisk fa-xs"></i></label>
					<input placeholder="Nombre(s)" type="text" class="form-control input-sm" id="nombreBecario" name="" autofocus>
				</div>
				<div class="form-group col-md-4">
					<label>Apellidos <i class="fas fa-asterisk fa-xs"></i></label>
					<input placeholder="Ambos apellidos" type="text" class="form-control input-sm" id="apellidosBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label>Número de telefono <i class="fas fa-asterisk fa-xs"></i></label>
					<input placeholder="Número a 10 digitos" type="number" class="form-control input-sm" id="telefonoBecario" name="" required>
				</div>
				<div class="form-group col-md-4">
					<label>Correo electrónico <i class="fas fa-asterisk fa-xs"></i></label>
					<input placeholder="ejemplo@ejemplo.com" type="email" class="form-control input-sm" id="emailBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label>RFC <i class="fas fa-asterisk fa-xs"></i></label>
					<input maxlength="13" placeholder="Dato a 13 caracteres" type="text" class="form-control input-sm" id="rfcBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label for="edadBecario">Fecha de nacimiento <i class="fas fa-asterisk fa-xs"></i></label>
					<input placeholder="Ingrese fecha" type="date" class="form-control" id="edadBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label for="sexoBecario">Sexo <i class="fas fa-asterisk fa-xs"></i></label>
					<select id="sexoBecario" class="form-control">
						<option selected value="Eliga" >Eliga...</option>
						<option value="Femenino">Femenino</option>
						<option value="Masculino">Masculino</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="civilBecario">Estado civil</label>
					<select id="civilBecario" class="form-control">
						<option selected disabled value=" ">Eliga...</option>
						<option value="Soltero/a">Soltero/a</option>
						<option value="Noviazgo">Noviazgo</option>
						<option value="Comprometido/a">Comprometido/a</option>
						<option value="Casado/a">Casado/a</option>
						<option value="Unión libre">Unión libre</option>
						<option value="Divorciado">Divorciado/a</option>
						<option value="Viudo/a">Viudo/a</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="escolaridadBecario">Escolaridad</label>
					<select id="escolaridadBecario" class="form-control">
						<option selected disabled>Eliga...</option>
						<option value="Primaria">Primaria</option>
						<option value="Secundaria">Secundaria</option>
						<option value="Bachillerato">Bachillerato</option>
						<option value="Licenciatura">Licenciatura</option>
						<option value="Maestría">Maestría</option>
						<option value="Posgrado(s)">Posgrado(s)</option>
						<option value="Sin escolaridad">Sin escolaridad</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="apoyoBecario">Tipo de apoyo solicitado</label>
					<select id="apoyoBecario" class="form-control">
						<option selected disabled>Eliga ...</option>
						<option value="Normal">Normal</option>
						<option value="Adicional">Adicional</option>
						<option value="Social">Social</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="adscripDirBecario">Dirección de adscripción</label>
					<select id="adscripDirBecario" class="form-control">
						<option selected disabled>*Abrir para nota de programador*</option>
						<option value="x">Ingrear lista de todos las posibles direcciones</option>
						<option value="y">Si no, dejar abierto el campo</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="adscripAreaBecario">Área de adscripción</label>
					<select id="adscripAreaBecario" class="form-control">
						<option selected disabled>*Abrir para nota de programador*</option>
						<option value="xx">Ingresar lista de todos las posibles áreas</option>
						<option value="yy">Si no, dejar abierto el campo</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="hijosBecario">¿Tiene hijos?</label>
					<input placeholder="De ser así, ingrese cuántos" type="number" class="form-control input-sm" id="hijosBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label for="discapacidadBecario">¿Padece de alguna discapacidad?</label>
					<input placeholder="De ser así, especifique" type="text" class="form-control" id="discapacidadBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="enfermedadBecario">¿Padece de alguna enfermedad?</label>
					<input placeholder="De ser así, especifique" type="text" class="form-control" id="enfermedadBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="alergiaBecario">¿Tiene alguna alergia?</label>
					<input placeholder="De ser así, especifique" type="text" class="form-control input-sm" id="alergiaBecario" name="">
				</div>
				<div class="form-group col-md-4">
					<label for="nombreFamEmergencia">Nombre de familiar</label>
					<input placeholder="Para casos de emergencia" type="text" class="form-control" id="nombreFamEmergencia">
				</div>
				<div class="form-group col-md-4">
					<label for="numFamEmergencia">Numero de familiar</label>
					<input placeholder="Para casos de emergencia" type="number" class="form-control" id="numFamEmergencia">
				</div>
				<div class="form-group col-md-4">
					<label for="sueldoIniBecario">Sueldo inicial</label>
					<input placeholder="Ingresa el monto con el que ingresa" type="number" class="form-control" id="sueldoIniBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="fechaIngBecario">Fecha de ingreso, NO registro</label>
					<input type="date" class="form-control" id="fechaIngBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="jefeBecario">Jefe inmediato</label>
					<select id="jefeBecario" class="form-control">
						<option selected disabled>*Abrir para nota de programador*</option>
						<option value="xxx">Ingresar lista de todos las posibles áreas</option>
						<option value="yyy">Si no, dejar abierto el campo</option>
					</select>
				</div>
				<div class="form-group col-md-4">
					<label for="funcionBecario">Función que realiza</label>
					<input placeholder="Ingresar la responsabilidad" type="text" class="form-control" id="funcionBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="horarioBecario">Horario de actividades</label>
					<input placeholder="Ingrese horario en formato: 09am-18pm" type="text" class="form-control" id="horarioBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="numTarjetaBecario">Número de Tarjeta</label>
					<input placeholder="Ingrese numero de tarjeta" type="number" class="form-control" id="numTarjetaBecario">
				</div>
				<div class="form-group col-md-8">
					<label for="direccionBecario">Dirección</label>
					<input type="text" class="form-control" id="direccionBecario" placeholder="12 Calle Amapolas entre av Centenario y calzada Juárez">
				</div>
				<div class="form-group col-md-4">
					<label for="municipioBecario">Municipio</label>
					<select id="municipioBecario" class="form-control">
						<option selected disabled value="">Eliga...</option>
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
				<div class="form-group col-md-4">
					<label for="coloniaBecario">Colonia</label>
					<input placeholder="Ingrese la colonia" type="text" class="form-control" id="coloniaBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="zipBecario">Código postal</label>
					<input placeholder="Ingrese código postal" type="number" class="form-control" id="zipBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="inputHide"></label>
					<input placeholder="No me puedes ver xD" type="hidden" class="form-control" id="inputHide">
				</div>
				<!------>
				<div class="form-group col-md-4">
					<label for="ineClaveBecario">Clave elector</label>
					<input maxlength="18" placeholder="Ingrese clave elector" type="text" class="form-control" id="ineClaveBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="curpClaveBecario">Clave Curp</label>
					<input maxlength="18" placeholder="Ingrese clave curp" type="text" class="form-control" id="curpClaveBecario">
				</div>
				<div class="form-group col-md-4">
					<label for="claveEstudiosBecario">Identificador estudios</label>
					<input placeholder="Ingrese clave de estudios" type="text" class="form-control" id="claveEstudiosBecario">
				</div>
				<div class="form-group col-md-12">
					<label for="comentarios">Comentarios para este candidato</label>
					<textarea placeholder="De ser necesario ingrese un breve comentario referente a este becario" class="form-control" id="comentarios" rows="4"></textarea>
				</div>

				<div class="form-group col-md-12 loaderDown">
					<div class="form-group">
						<!--<a type="submit" class="btnSubmit" id="registrarNuevo" value="Registrar" style="color:white"><i class="fas fa-plus-circle"></i> Registrar</a>-->
						<a href="#selectUsuario" type="button" class="btnSubmit" id="registrarNuevo" style="color:white"><i class="fas fa-plus-circle"></i> Registrar</a>
						<a href="../mainDashboard.php" type="input" class="btnSubmit2" value="Return"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
					</div>
				</div>
				<!----contenido--->
			</div>
		</form>
		<form class="login-form-1" method="POST" action="upload.php" enctype="multipart/form-data">
			<div class="form-row">
				<div class="form-group col-md-3 loaderDown ">
				</div>
				<div class="hola form-group col-md-6 loaderDown ">
					<br><h4>Eliga un usuario antes de continuar</h4>
					<select required class="form-control js-example-basic-single" id="selectUsuario" name="selectUsuario">
						<option value="0" >Buscar ...</option>
						<?php
							$sqlNombre = "SELECT id_becario, nombre_becario, apellidos_becario FROM becarios_registro";
							$result = mysqli_query($conexion, $sqlNombre);
						?>
						<?php while ($row = mysqli_fetch_row($result)) {?>
						<option value="<?php echo($row[0]);?>"><?php echo($row[1].' '.$row[2]); ?></option>
						<?php }?>
					</select>
					<br>
				</div>
				<div class="form-group col-md-3 loaderDown ">
				</div>
				<!------>
				<div class="form-group col-md-6"><br>
					<label for="fileIne">Ine PDF</label>
					<input type="file" class="form-control" id="fileIne?id=" data-browse-on-zone-click="true" name="fileIne"> 
				</div>
				<div class="form-group col-md-6"><br>
					<label for="fileCurp">Curp PDF</label>
					<input type="file" class="form-control" id="fileCurp" data-browse-on-zone-click="true" name="fileCurp">
				</div>
				<div class="form-group col-md-6">
					<label for="fileEstudios">Comprobante de estudios PDF</label>
					<input type="file" class="form-control" id="fileEstudios" data-browse-on-zone-click="true" name="fileEstudios">
				</div>
				<div class="form-group col-md-6">
					<label for="fileActa">Acta de nacimiento PDF</label>
					<input type="file" class="form-control" id="fileActa" data-browse-on-zone-click="true" name="fileActa">
				</div>
				<div class="form-group col-md-6">
					<label for="fileCv">Curriculum vitae PDF</label>
					<input type="file" class="form-control" id="fileCv" data-browse-on-zone-click="true" name="fileCv">
				</div>
				<div class="form-group col-md-6">
					<label for="fileMedico">Certificado médico general PDF</label>
					<input type="file" class="form-control" id="fileMedico" data-browse-on-zone-click="true" name="fileMedico">
				</div>
				<div class="form-group col-md-6">
					<label for="fileDomicilio">Comprobante de domicilio PDF</label>
					<input type="file" class="form-control" id="fileDomicilio" data-browse-on-zone-click="true" name="fileDomicilio">
				</div>
				<div class="form-group col-md-6">
					<label for="filePenal">Constancia de antecedentes NO penales PDF</label>
					<input type="file" class="form-control" id="filePenal" data-browse-on-zone-click="true" name="filePenal">
				</div>
				<div class="form-group col-md-6">
					<label for="fileRecomendacion">Cartas de recomendación PDF</label>
					<input type="file" class="form-control" id="fileRecomendacion" data-browse-on-zone-click="true" name="fileRecomendacion">
				</div>
				<div class="form-group col-md-6">
					<label for="fileRenuncia">Documento de renuncia PDF</label>
					<input type="file" class="form-control" id="fileRenuncia" data-browse-on-zone-click="true" name="fileRenuncia">
				</div>
				<div class="form-group col-md-6 loaderDown ">
					<div class="form-group"><br>
						<!--<a type="submit" class="btnSubmit" id="registrarNuevo" value="Registrar" style="color:white"><i class="fas fa-plus-circle"></i> Registrar</a>-->
						<button class="btnSubmit" id="registrarNuevoFiles" style="color:white"><i class="fas fa-file-upload"></i> Subir archivos</button>
						<a href="../mainDashboard.php" type="input" class="btnSubmit2" value="Return"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
						<br><small>Todos los datos aquí registrados son de uso confidencial.</small>
					</div>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

<script type="text/javascript">

	// In your Javascript (external .js resource or <script> tag)
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});

	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombreBecario').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellidosBecario').val()==""){
				alertify.alert("Debes agregar los apellidos");
				return false;
			}else if($('#telefonoBecario').val()==""){
				alertify.alert("Debes agregar un numero de telefono");
				return false;
			}else if($('#emailBecario').val()==""){
				alertify.alert("Debes agregar un correo electronico");
				return false;
			}else if($('#rfcBecario').val()==""){
				alertify.alert("Debes agregar un RFC");
				return false;
			}else if($('#edadBecario').val()==""){
				alertify.alert("Debes agregar una fecha de nacimiento");
				return false;
			}else if($('#sexoBecario').val()=='Eliga'){
				alertify.alert("Debes elegir un sexo");
				return false;
			}
			//alert($('#fileIne').val());
			

			cadena="nombreBecario=" + $('#nombreBecario').val() +
					"&apellidosBecario=" + $('#apellidosBecario').val() +
					"&telefonoBecario=" + $('#telefonoBecario').val() + 
					"&emailBecario=" + $('#emailBecario').val() +
					"&rfcBecario=" + $('#rfcBecario').val() +
					"&edadBecario=" + $('#edadBecario').val() +
					"&sexoBecario=" + $('#sexoBecario').val() +
					"&civilBecario=" + $('#civilBecario').val() +
					"&escolaridadBecario=" + $('#escolaridadBecario').val() +
					"&apoyoBecario=" + $('#apoyoBecario').val() +
					"&adscripDirBecario=" + $('#adscripDirBecario').val() +
					"&adscripAreaBecario=" + $('#adscripAreaBecario').val() +
					"&hijosBecario=" + $('#hijosBecario').val() +
					"&discapacidadBecario=" + $('#discapacidadBecario').val() +
					"&enfermedadBecario=" + $('#enfermedadBecario').val() +
					"&alergiaBecario=" + $('#alergiaBecario').val() +
					"&nombreFamEmergencia=" + $('#nombreFamEmergencia').val() +
					"&numFamEmergencia=" + $('#numFamEmergencia').val() +
					"&sueldoIniBecario=" + $('#sueldoIniBecario').val() +
					"&fechaIngBecario=" + $('#fechaIngBecario').val() +
					"&jefeBecario=" + $('#jefeBecario').val() +
					"&funcionBecario=" + $('#funcionBecario').val() +
					"&horarioBecario=" + $('#horarioBecario').val() +
					"&numTarjetaBecario=" + $('#numTarjetaBecario').val() +
					"&direccionBecario=" + $('#direccionBecario').val() +
					"&municipioBecario=" + $('#municipioBecario').val() +
					"&coloniaBecario=" + $('#coloniaBecario').val() +
					"&zipBecario=" + $('#zipBecario').val() +
					"&ineClaveBecario=" + $('#ineClaveBecario').val() +
					"&curpClaveBecario=" + $('#curpClaveBecario').val() +
					"&claveEstudiosBecario=" + $('#claveEstudiosBecario').val() +
					"&fileIne=" + $('#fileIne').val() + /////
					"&fileActa=" + $('#fileActa').val() +
					"&fileCurp=" + $('#fileCurp').val() +
					"&fileCv=" + $('#fileCv').val() +
					"&fileEstudios=" + $('#fileEstudios').val() +
					"&fileMedico=" + $('#fileMedico').val() +
					"&fileDomicilio=" + $('#fileDomicilio').val() +
					"&fileRecomendacion=" + $('#fileRecomendacion').val() +
					"&filePenal=" + $('#filePenal').val() +
					"&auxiliarSw=" + $('#auxiliarSw').val() +
					"&comentarios=" + $('#comentarios').val();

					$.ajax({
						type:"POST",
						url:"php/registroBecario.php",
						data:cadena,
						success:function(r){
							if(r==4){
								alertify.alert("Este número de teléfono ya está registrado, intente con uno diferente");
							}
							if(r==2){
								alertify.alert("Este correo electronico ya está registrado, intente con uno diferente");
							}
							if(r==3){
								alertify.alert("Este RFC ya está registrado, intente con uno diferente");
							}
							if(r==5){
								alertify.alert("Esta clave elector ya está registrada, intente con una diferente");
							}
							if(r==6){
								alertify.alert("Esta clave curp ya está registrada, intente con una diferente");
							}
							if(r==7){
								alertify.alert("Esta clave de estudios ya está registrada, intente con una diferente");
							}
							if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con éxito");
								window.setInterval("reFresh()",1000);
							}
							else{
								
								alertify.error(r);
							}
						}
					});
		});
	});

	function reFresh() {
		//location.reload(true);
		window.location="addBecario.php";
	}



	$(document).ready(function() {
		$('a[href^="#"]').click(function() {
			var destino = $(this.hash);
			if (destino.length == 0) {
			destino = $('a[name="' + this.hash.substr(1) + '"]');
			}
			if (destino.length == 0) {
			destino = $('html');
			}
			$('html, body').animate({ scrollTop: destino.offset().top }, 500);
			return false;
		});
	});


</script>
<?php
} else {
	header("location:login/");
	}
 ?>

