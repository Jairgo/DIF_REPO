<?php 

	require_once "conexion.php";
	$conexion=conexion();

		$nombre=$_POST['nombre'];
		$apellidos=$_POST['apellidos'];
		$email=$_POST['email'];
		$usuario=$_POST['usuario'];
		$password=$_POST['contraseña'];
		//$password=sha1($_POST['contraseña']);

		$sqlmail="SELECT email_admin FROM administradores WHERE email_admin='$email'";
		$resultadomail=mysqli_query($conexion,$sqlmail);

		$sqluser="SELECT usuario FROM administradores WHERE usuario='$usuario'";
		$resultadouser=mysqli_query($conexion,$sqluser);

		if(mysqli_num_rows($resultadomail) > 0){
			echo 2; //correo ya registrado 
		}else{
			if(mysqli_num_rows($resultadouser) > 0){
				echo 3; //usuario ya registrado
			}else{
				//$password=password_hash($password,PASSWORD_DEFAULT);
				$hashed = password_hash($password, PASSWORD_DEFAULT);
				$sql="INSERT into administradores (nombre_admin,apellidos_admin,email_admin,usuario,contra_admin)
				values ('$nombre','$apellidos','$email','$usuario','$hashed')";
				echo $result=mysqli_query($conexion,$sql);
			}
		}
 ?>