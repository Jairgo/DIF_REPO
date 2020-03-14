<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<?php require_once "scripts.php"; ?>
	
</head>
<body style="background-color: gray">
<br><br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="panel panel-primary">
				<div style="text-align:center;" class="panel panel-heading"><b>Iniciar sesion en sistema de nómina<b></div>
				<div class="panel panel-body">
					<div style="text-align: center;">
						<img src="img/logo_dif.png" style="max-width: 100%; height: auto;">
					</div>
					<p></p>
					<label>Usuario</label>
					<input placeholder="Nombre de usuario" type="text" id="usuario" class="form-control input-sm" name="">
					<label>Contraseña</label>
					<input placeholder="Contraseña" type="password" id="contraseña" class="form-control input-sm" name="">
					<p></p>
					<button type="submit" class="btn btn-success" id="entrarSistema">Entrar</button>
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
		$('#entrarSistema').click(function(){
			if($('#usuario').val()==""){
				alertify.alert("Debes agregar el usuario");
				return false;
			}else if($('#contraseña').val()==""){
				alertify.alert("Debes agregar la contraseña");
				return false;
			}

			cadena="usuario=" + $('#usuario').val() + 
					"&contraseña=" + $('#contraseña').val();

					$.ajax({
						type:"POST",
						url:"php/login.php",
						data:cadena,
						success:function(r){
							if(r==1){
								//alertify.alert("siii");
								window.location="../selectModule.php";
							}if(r==1){
								//alertify.alert("siii");
								alertify.error("Algo falló");
							}
							else{
								alertify.alert("Usuario y/o contraseña incorreccto(s)");
							}
						}
					});
		});	
	});
</script>