<?php 
	session_start();

	if(isset($_SESSION['user'])){
 ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de administrador</title>

	
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">

	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/alertifyjs/alertify.js"></script>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
   


	<link href="style.css" rel="stylesheet" id="style-css">

    <script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>


</head>
<body class="body-back">
  <div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Registro de administrador en sistema</h3>
                    <form id="frmRegistro">
                        <div class="form-group">
                            <p><b>Nombre:</b><p>
                            <input type="text" class="form-control" placeholder="Inserte nombre(s)" id="nombre" value="" />
                        </div>
                        <div class="form-group">
                            <p><b>Apellidos:</b><p>
                            <input type="text" class="form-control" placeholder="Inserte apellidos" id="apellidos" value="" />
                        </div>
                        <div class="form-group">
                            <p><b>Correo electrónico:</b><p>
                            <input type="email" class="form-control" placeholder="Inserte correo" id="email" value="" />
                        </div>
                        <div class="form-group">
                            <p><b>Usuario:</b><p>
                            <input type="text" class="form-control" placeholder="Inserte usuario" id="usuario" value="" />
                        </div>
                        <div class="form-group">
                            <p><b>Contraseña:</b><p>
                            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="contraseña" value="" />
                        </div>
						<div class="form-group">
							<!--<input type="submit" class="btnSubmit" id="registrarNuevo" value="Registrar" />-->
							<button type="submit" class="btnSubmit" id="registrarNuevo" value="Registrar" style="color:white"><i class="fas fa-plus-circle"></i> Registrar</button>
							<a href="javascript:history.back()" type="input" class="btnSubmit2" value="Return"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
						</div>
						<br><small>Al hacer click en Registrar confirma que el usuario registrado está de acuerdo y manejará la información de forma confidencial.</small>
                    </form>
                </div>
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
			}else if(tiene_arroba($('#email').val())!=1){
				alertify.alert("El correo electrónico no es válido");
				return false;
			}
			else if(tiene_punto($('#email').val()) !=1){
				alertify.alert("El correo electrónico no es válido");
				return false;
			}
			else if($('#usuario').val()==""){
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

	var numeros="@";

	function tiene_arroba(texto){
		for(i=0; i<texto.length; i++){
			if (numeros.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}
	var numerosp=".";
	function tiene_punto(texto){
		for(i=0; i<texto.length; i++){
			if (numerosp.indexOf(texto.charAt(i),0)!=-1){
				return 1;
			}
		}
		return 0;
	}
</script>
<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
