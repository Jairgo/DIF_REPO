<?php 
	session_start();
	
	require_once "conexion.php";
	$conexion=conexion();


		$nombreBeca=$_POST['nombreBecario'];
		$apellidosBeca=$_POST['apellidosBecario'];
		$emailBeca=$_POST['emailBecario'];
		$telBeca=$_POST['telefonoBecario'];
		$edadBeca=$_POST['edadBecario'];
		$sexoBeca=$_POST['sexoBecario'];
		$rfcBeca=$_POST['rfcBecario'];
		$tarjBeca=$_POST['numTarjetaBecario'];
		$siniBeca=$_POST['sueldoIniBecario'];
		$finiBeca=$_POST['fechaIngBecario'];
		$civBeca=$_POST['civilBecario'];
		$escoBeca=$_POST['escolaridadBecario'];
		$hijosBeca=$_POST['hijosBecario'];
		$discBeca=$_POST['discapacidadBecario'];
		$enfermBeca=$_POST['enfermedadBecario'];
		$alergBeca=$_POST['alergiasBecario'];
		$nomfBeca=$_POST['nombreFamBecario'];
		$numfBeca=$_POST['numFamBecario'];
		$dirBeca=$_POST['direccionBecario'];
		$muniBeca=$_POST['municipioBecario'];
		$colBeca=$_POST['coloniaBecario'];
		$cpBeca=$_POST['codigoPosBecario'];
		$diraBeca=$_POST['dirAdscripBecario'];
		$areaBeca=$_POST['areaAdscripBecario'];
		$jefeiBeca=$_POST['jefeImeBecario'];
		$funBeca=$_POST['funcionBecario'];
		$horaBeca=$_POST['horarioBecario'];
        $apoyoBeca=$_POST['apoyoBecario'];
        $comentBeca=$_POST['comentarios'];
		$receptor=$_POST['idBecario'];

		$sqlupdt="UPDATE becarios_registro SET nombre_becario='$nombreBeca', 
		apellidos_becario='$apellidosBeca', email_becario='$emailBeca', telefono_becario='$telBeca', 
		fecha_nacimiento='$edadBeca', sexo='$sexoBeca', rfc_becario='$rfcBeca', tipo_apoyo='$apoyoBeca', 
		num_tarjeta='$tarjBeca', sueldo_inicial='$siniBeca', fecha_ingreso='$finiBeca', 
		estado_civil='$civBeca', escolaridad='$escoBeca', num_hijos='$hijosBeca',
		discapacidad='$discBeca', enfermedad='$enfermBeca', alergias='$alergBeca',
		nombre_familiares='$nomfBeca', 	num_familiares='$numfBeca', direccion='$dirBeca',
		municipio='$muniBeca', colonia='$colBeca', codigo_postal='$cpBeca',
		direccion_adscripcion='$diraBeca', area_adscripcion='$areaBeca', jefe_becario='$jefeiBeca',
		funcion_becario='$funBeca', horario='$horaBeca', comentarios_becario='$comentBeca' 
		WHERE id_becario='$receptor'";
		$resultadoupdt=mysqli_query($conexion,$sqlupdt);


		if($resultadoupdt){
			echo 1;
		}else{
			echo mysqli_error($resultadoupdt);
		}
 ?>