<?php 
	session_start();
	
	require_once "conexion.php";
	$conexion=conexion();

        $idSend=$_GET['idSend'];
		echo($idSend);
		
		//$sqlDelete="DELETE FROM becarios_registro WHERE id_becario='$idSend'";
		$sqlDelete="UPDATE becarios_registro SET estado='1' WHERE id_becario='$idSend'";
		$resultadoDelete=mysqli_query($conexion,$sqlDelete);


		if($resultadoDelete){
			echo 1; //eliminación correcta
		}else{
            echo 2; //falló la eliminación
        }
        header ("Location: ../../mainDashboard.php");
 ?>