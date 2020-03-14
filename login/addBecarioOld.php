<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">
	
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/alertifyjs/alertify.js"></script>
	<script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>

<style>
    input.file{
        opacity:0.8;
	}
	label{
		font-weight: normal;
		font-weight: lighter;
	}
</style>
</head>
<body style="background-color: gray">
<br>
<div class="container">
	<div class="card ">
		<div class="card card-header bg-success" style="text-align:center;color:white"><b>Registro de nuevo becario<b></div>
			<div class="card-body">
				<form id="frmRegistro">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Nombre</label>
							<input placeholder="Nombre(s)" type="text" class="form-control input-sm" id="nombreBecario" name="">
						</div>
						<div class="form-group col-md-6">
							<label>Apellidos</label>
							<input placeholder="Ambos apellidos" type="text" class="form-control input-sm" id="apellidosBecario" name="">
						</div>
						<div class="form-group col-md-6">
							<label>Número de telefono</label>
							<input placeholder="Número a 10 digitos" type="number" class="form-control input-sm" id="telefonoBecario" name="">
						</div>
						<div class="form-group col-md-6">
							<label>Correo electrónico</label>
							<input placeholder="ejemplo@ejemplo.com" type="email" class="form-control input-sm" id="emailBecario" name="">
						</div>
						<div class="form-group col-md-6">
							<label>RFC</label>
							<input placeholder="Dato a 13 caracteres" type="text" class="form-control input-sm" id="rfcBecario" name="">
						</div>
						<div class="form-group col-md-6">
							<label>Tipo de Apoyo</label>
							<select class="custom-select" id="apoyoBecario">
								<option selected>Tipo de apoyo solicitado</option>
								<option value="Normal">Normal</option>
								<option value="Adicional">Adicional</option>
								<option value="Social">Social</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<label for="fileIne">Identificación oficial</label><br>
							<input id="fileIne" name="fileIne" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileActa">Acta de nacimiento</label><br>
							<input id="fileActa" name="fileActa" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileCurp">Documento curp</label><br>
							<input id="fileCurp" name="fileCurp" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileCv">Curriculum vitae</label><br>
							<input id="fileCv" name="fileCv" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileEstudios">Comprobante de estudios</label><br>
							<input id="fileEstudios" name="fileEstudios" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileMedico">Certificado médico general</label><br>
							<input id="fileMedico" name="fileMedico" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileDomicilio">Comprobante de domicilio</label><br>
							<input id="fileDomicilio" name="fileDomicilio" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="fileRecomendacion">Cartas de recomendación</label><br>
							<input id="fileRecomendacion" name="fileRecomendacion" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<label for="filePenal">Constancia de antecedentes <b>NO</b> penales</label><br>
							<input id="filePenal" name="filePenal" type="file" class="file" data-browse-on-zone-click="true">
						</div>
						<div class="form-group col-md-6">
							<div class="custom-control custom-switch">
								<input type="checkbox" class="custom-control-input" id="auxiliarSw" name="auxiliarSw">
								<label class="custom-control-label" for="auxiliarSw">Será auxiliar</label>
							</div>						
						</div>
						<div class="form-group col-md-12">
							<label for="comentarios">Comentarios para este candidato</label>
							<textarea placeholder="De ser necesario ingrese un breve comentario referente a este becario" class="form-control" id="comentarios" rows="4"></textarea>						
						</div>
					</div>
					<div style="text-align:center;">
						<b><button type="button" class="btn btn-success" id="registrarNuevo">Registrar</button>
						<a role="button" href="../mainDashboard.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> Regresar</a></b><br>
						<small>Todos los datos aquí registrados son de uso confidencial.</small>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</body>
<br>
</html>

<script type="text/javascript">
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
			}else if($('#apoyoBecario').val()==""){
				alertify.alert("Debes agregar un RFC");
				return false;
			}

			cadena="nombreBecario=" + $('#nombreBecario').val() +
					"&apellidosBecario=" + $('#apellidosBecario').val() +
					"&telefonoBecario=" + $('#telefonoBecario').val() + 
					"&emailBecario=" + $('#emailBecario').val() +
					"&rfcBecario=" + $('#rfcBecario').val() +
					"&apoyoBecario=" + $('#apoyoBecario').val() +
					"&fileIne=" + $('#fileIne').val() +
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
							if(r==1){
								$('#frmRegistro')[0].reset();
								alertify.success("Agregado con éxito");
							}else{
								alertify.error("Falló al agregar");
							}
						}
					});
		});
	});
</script>
<?php
} else {
	header("location:login/");
	}
 ?>
