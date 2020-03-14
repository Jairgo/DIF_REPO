<?php 
	session_start();

	if(isset($_SESSION['user'])){
		header("location:../selectModule.php");
	}else {
 ?>
<!DOCTYPE html>
<html>
<head>


	<link rel="stylesheet" type="text/css" href="js/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" type="text/css" href="js/alertifyjs/css/alertify.css">

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/alertifyjs/alertify.js"></script>


    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


    <link href="style.css" rel="stylesheet" id="style-css">
	<script src="https://kit.fontawesome.com/07baa58181.js" crossorigin="anonymous"></script>

</head>
<body class="body-back">
  <div class="container login-container">
            <div class="row justify-content-md-center">
                <div class="col-md-6 login-form-1">
                    <h3>Iniciar sesión en sistema DIF</h3><br>
					<div style="text-align: center;">
						<img src="img/logo_dif.png" style="max-width: 65%; height: auto; text-align:center">
					</div>
                    <form>
                        <div class="form-group">
                            <p><b>Usuario:</b><p>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" id="usuario" value="" autofocus />
                        </div>
                        <div class="form-group">
                            <p><b>Contraseña:</b><p>
                            <input type="password" class="form-control" placeholder="Escriba su contraseña" id="contraseña" value="" />
                        </div>
                        <div class="form-group">
							<button type="submit" class="btnSubmit" id="entrarSistema" value="Entrar"><i class="fas fa-sign-in-alt"></i> Ingresar</button>
                            <!--<input type="submit" class="btnSubmit" id="entrarSistema" value="Entrar" />--->
                        </div>
                    </form>
                </div>
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
							}
							else if(r==0){
								//alertify.alert("siii");
								alertify.alert("Usuario y/o contraseña incorreccto(s)");
							}
							else{
								alertify.error("Error al ingresar: "+r);
							}
						}
					});
		});	
	});
</script>
<?php
	}
?>
