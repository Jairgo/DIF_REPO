<?php 


	session_start();
	require_once "conexion.php";

	$conexion=conexion();

		$usuario=$_POST['usuario'];
		$pass=$_POST['contraseña'];
		//$pass=sha1($pass);
		$create_datetime = date("Y-m-d H:i:s");

		$sql="SELECT * from administradores where usuario='$usuario'";
		$result=mysqli_query($conexion,$sql);

		if(mysqli_num_rows($result) > 0 ){
			$row= mysqli_fetch_array($result, MYSQLI_BOTH);
			$contra=$row["contra_admin"];
			//$contra1=password_verify($pass,$contra);
			$isCorrect = password_verify($pass, $contra);
			/*if($contra==$pass){*/
			if ($isCorrect) {
				$_SESSION['user']=$usuario;
				$sqlLogin="UPDATE administradores SET ultimo_login = NOW() WHERE usuario='$usuario'";
				$result=mysqli_query($conexion,$sqlLogin);
				if($result){
					echo 1; //entra a sistema
				}else{
					echo 2; //hubo un error al entrar
				}
			}
			else{
				echo 0;
			}
		}else{
			echo 0;
		}	
 ?>