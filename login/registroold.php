<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registro</title>
	<?php require_once "scripts.php"; ?>
	<script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div class="panel panel-heading" style="text-align:center;"><b>Registro de administrador de nomina<b></div>
				<div class="panel panel-body">
					<form id="frmRegistro">
						<label>Nombre</label>
						<input type="text" class="form-control input-sm" id="nombre" name="">
						<label>Apellido</label>
						<input type="text" class="form-control input-sm" id="apellidos" name="">
						<label>Correo electrónico</label>
						<input type="email" class="form-control input-sm" id="email" name="">
						<label>Usuario</label>
						<input type="text" class="form-control input-sm" id="usuario" name="">
						<label>Contraseña</label>
						<input type="password" class="form-control input-sm" id="contraseña" name="">
						<p></p>
						<div style="text-align:center;">
							<b><button type="button" class="btn btn-success" id="registrarNuevo">Registrar</button>
							<a role="button" href="../mainDashboard.php" class="btn btn-info"><i class="fas fa-arrow-circle-left"></i> Regresar</a></b><br>
							<small>Al dar click en Registrar confirma que el usuario registrado está de acuerdo y manejará la información de manera confidencial</small>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#registrarNuevo').click(function(){

			if($('#nombre').val()==""){
				alertify.alert("Debes agregar el nombre");
				return false;
			}else if($('#apellidos').val()==""){
				alertify.alert("Debes agregar los apellidos");
				return false;
			}else if($('#email').val()==""){
				alertify.alert("Debes agregar el correo electrónico");
				return false;
			}else if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#contraseña').val()==""){
				alertify.alert("Debes agregar la contraseña");
				return false;
			}

			cadena="nombre=" + $('#nombre').val() +
					"&apellidos=" + $('#apellidos').val() +
					"&email=" + $('#email').val() + 
					"&usuario=" + $('#usuario').val() + 
					"&contraseña=" + $('#contraseña').val();

					$.ajax({
						type:"POST",
						url:"php/registro.php",
						data:cadena,
						success:function(r){
							if(r==2){
								alertify.alert("Este correo electronico ya está registrado, intente con uno diferente");
							}
							if(r==3){
								alertify.alert("Este nombre de usuario ya está registrado, intente con uno diferente");
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
	header("location:login/index.php?#");
	}
 ?>
