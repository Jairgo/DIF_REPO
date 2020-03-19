<?php 
	session_start();
	//Contador 1: 27 o más
	//contador 2: 10 exactamente
	require_once "conexion.php";
	$conexion=conexion();
		/*---------------DATOS OBLIGATORIOS-----------------*/
		/* */ $nombreBeca=$_POST['nombreBecario'];		 /* */
		/* */ $apellidosBeca=$_POST['apellidosBecario']; /* */
		/* */ $emailBeca=$_POST['emailBecario'];		 /* */
		/* */ $telBeca=$_POST['telefonoBecario'];		 /* */
		/* */ $rfcBeca=$_POST['rfcBecario'];			 /* */ 
		/* */ $edadBeca=$_POST['edadBecario'];			 /* */
		/* */ $sexoBeca=$_POST['sexoBecario'];			 /* */
		/* */ $agregador=$_SESSION['user'];				 /* */
		/* */ $completo=7;								 /* */
		/*^^^^^^^^^^^^^^^DATOS OBLIGATORIOS^^^^^^^^^^^^^^^^^*/
	/*---------------DATOS POSIBLES NULOS----------------------------------------------*/
			/* */ if (isset($_POST['civilBecario']) && $_POST['civilBecario']!='null') {								/* */
				$civilBeca=$_POST['civilBecario'];										
				$completo+=1;
			}else{
				$civilBeca='';
			}
		/* */ if (isset($_POST['escolaridadBecario']) && $_POST['escolaridadBecario']!='null') {								/* */
				$escolaridadBeca=$_POST['escolaridadBecario'];							
				$completo+=1;
			}else{
				$escolaridadBeca='';
			}																			
		/* */ if (isset($_POST['apoyoBecario']) && $_POST['apoyoBecario']!='null') {										/* */
				$apoyoBeca=$_POST['apoyoBecario'];										
				$completo+=1;
			}else{
				$apoyoBeca='';
			}																			
		/* */ if (isset($_POST['adscripDirBecario']) && $_POST['adscripDirBecario']!='null') {									/* */
				$adscripDirBeca=$_POST['adscripDirBecario'];						
				$completo+=1;
			}else{
				$adscripDirBeca='';
			}																		
		/* */if (isset($_POST['adscripAreaBecario']) && $_POST['adscripAreaBecario']!='null') {									/* */
				$adscripAreaBeca=$_POST['adscripAreaBecario'];						
				$completo+=1;
			}else{
				$adscripAreaBeca='';
			}																			
		/* */ if (isset($_POST['hijosBecario']) && $_POST['hijosBecario']!=0) {										/* */
				$hijosBeca=$_POST['hijosBecario'];									
				$completo+=1;	
			}else{
				$hijosBeca='';
			}																	
		/* */if (isset($_POST['discapacidadBecario'])) {							
				$discapacidadBeca=$_POST['discapacidadBecario'];
				$completo+=1;						
			}																	
		/* */if (isset($_POST['enfermedadBecario'])) {								
				$enfermedadBeca=$_POST['enfermedadBecario'];						
				$completo+=1;
			}																	
		/* */if (isset($_POST['alergiaBecario'])) {								
				$alergiaBeca=$_POST['alergiaBecario'];								
				$completo+=1;
			}																		
		/* */if (isset($_POST['nombreFamEmergencia'])) {							
				$nombreFamEmer=$_POST['nombreFamEmergencia'];					
				$completo+=1;
			}																		
		/* */if (isset($_POST['numFamEmergencia'])) {								
				$numFamEmer=$_POST['numFamEmergencia'];									
				$completo+=1;
			}																			
		/* */ if (isset($_POST['sueldoIniBecario']) && $_POST['sueldoIniBecario']!=0) {									/* */
				$sueldoIniBeca=$_POST['sueldoIniBecario'];							
				$completo+=1;
			}else{
				$sueldoIniBeca='';
			}																			
		/* */ if (isset($_POST['fechaIngBecario']) && $_POST['fechaIngBecario']!='') {									/* */
				$fechaIngBeca=$_POST['fechaIngBecario'];							
			}else{
				$fechaIngBeca='';
			}
		/* */ if (isset($_POST['jefeBecario']) && $_POST['jefeBecario']!='') {										/* */
				$jefeBeca=$_POST['jefeBecario'];									
				$completo+=1;
			}else{
				$jefeBeca='';
			}																			
		/* */ if (isset($_POST['funcionBecario'])) {									
				$funcionBeca=$_POST['funcionBecario'];								
				$completo+=1;
			}																		
		/* */ if (isset($_POST['horarioBecario'])) {								
				$horarioBeca=$_POST['horarioBecario'];								
				$completo+=1;
			}																		
		/* */ if (isset($_POST['numTarjetaBecario']) && $_POST['numTarjetaBecario']!=0) {									/* */
				$numTarjetaBeca=$_POST['numTarjetaBecario'];							
				$completo+=1;
		/* */ }else{
				$numTarjetaBeca='';
			}																	
		/* */ if (isset($_POST['direccionBecario'])) {								
				$direccionBeca=$_POST['direccionBecario'];						
				$completo+=1;
			}																		
		/* */ if (isset($_POST['municipioBecario']) && $_POST['municipioBecario']!='null') {									/* */
				$municipioBeca=$_POST['municipioBecario'];								
				$completo+=1;
		/* */ }else{
				$municipioBeca='';
			}																		
		/* */ if (isset($_POST['coloniaBecario'])) {								
				$coloniaBeca=$_POST['coloniaBecario'];								
				$completo+=1;
			}																		
		/* */ if (isset($_POST['zipBecario']) && $_POST['zipBecario']!=0) {										/* */
				$zipBeca=$_POST['zipBecario'];										
				$completo+=1;
			}else{
				$zipBeca='';
			}																		
		/* */ if (isset($_POST['ineClaveBecario'])) {								
				$ineClaveBeca=$_POST['ineClaveBecario'];							
				$completo+=1;
			}else{
				$ineClaveBeca='';
			}	
		/* */ if (isset($_POST['curpClaveBecario'])) {								
				$curpClaveBeca=$_POST['curpClaveBecario'];								
				$completo+=1;
			}else{
				$curpClaveBeca='';																
			}																																	
		/* */ if (isset($_POST['claveEstudiosBecario'])) {								
				$claveEstudiosBeca=$_POST['claveEstudiosBecario'];						
				$completo+=1;
			}else{																	
				$claveEstudiosBeca='';													
			}																			
	/*^^^^^^^^^^^^^^^^^^^^^^^^^^DATOS POSIBLES NULOS^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
	/*--------------------------RUTA DE ARCHIVOS----------------------------------------*/
		/* */if (isset($_POST['fileIne'])) {								
			
		/* */}	

	/*^^^^^^^^^^^^^^^^^^^^^^^^^^RUTA DE ARCHIVOS^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/
	/*--------------------------COMPROBACION DE REPETIDOS-------------------------------*/
		$sqlmail="SELECT email_becario FROM becarios_registro WHERE email_becario='$emailBeca'";
		$resultadomail=mysqli_query($conexion,$sqlmail);

		$sqlrfc="SELECT rfc_becario FROM becarios_registro WHERE rfc_becario='$rfcBeca'";
		$resultadorfc=mysqli_query($conexion,$sqlrfc);

		$sqltel="SELECT telefono_becario FROM becarios_registro WHERE telefono_becario='$telBeca'";
		$resultadotel=mysqli_query($conexion,$sqltel);

		$entra = 0;

		if(mysqli_num_rows($resultadotel) > 0 && $entra == 0){
			echo 4;//telefono repetido
			$entra =1;
		}
		if(mysqli_num_rows($resultadomail) > 0 && $entra == 0){
			echo 2;//email repetido
			$entra =1;
		}if(mysqli_num_rows($resultadorfc) > 0 && $entra == 0){
			echo 3;//rfc repetido
			$entra =1;
		}

		if($ineClaveBeca!=''){
			$sqline="SELECT ine FROM becarios_registro WHERE ine='$ineClaveBeca'";
			$resultadoine=mysqli_query($conexion,$sqline);

			if(mysqli_num_rows($resultadoine) > 0 && $entra == 0){
				echo 5;//ine repetido
				$entra =1;
			}
		}

		if($curpClaveBeca!=''){
			$sqlcurp="SELECT becario_curp FROM becarios_registro WHERE becario_curp='$curpClaveBeca'";
			$resultadocurp=mysqli_query($conexion,$sqlcurp);

			if(mysqli_num_rows($resultadocurp) > 0 && $entra == 0){
				echo 5;//ine repetido
				$entra =1;
			}
		}

		if($claveEstudiosBeca!=''){
			$sqlest="SELECT identificador_estudios FROM becarios_registro WHERE identificador_estudios='$claveEstudiosBeca'";
			$resultadoestudios=mysqli_query($conexion,$sqlest);

			if(mysqli_num_rows($resultadoestudios) > 0 && $entra == 0){
				echo 7;//estudios repetido
				$entra =1;
			}
		}
	/*^^^^^^^^^^^^^^^^^^^^^^^^^^COMPROBACION DE REPETIDOS^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^*/

	if ($entra == 0){
		$entra = 0;
		//$completo+=10;
		if($completo >= 27){
			$completo=1;
		}else{
			$completo=0;
		}
		$sql="INSERT into becarios_registro (nombre_becario,apellidos_becario,email_becario,telefono_becario,rfc_becario,fecha_nacimiento,sexo,fecha_inicio,fecha_maxima,auxiliar,agregado_por,estado_civil,escolaridad,tipo_apoyo,direccion_adscripcion,area_adscripcion,num_hijos,discapacidad,enfermedad,alergias,nombre_familiares,num_familiares,sueldo_inicial,fecha_ingreso,jefe_becario,funcion_becario,horario,num_tarjeta,direccion,municipio,colonia,codigo_postal,ine,becario_curp,identificador_estudios)
		values ('$nombreBeca','$apellidosBeca','$emailBeca','$telBeca','$rfcBeca','$edadBeca','$sexoBeca',NOW(), DATE_ADD(NOW(), INTERVAL 10 DAY),$completo,'$agregador','$civilBeca','$escolaridadBeca','$apoyoBeca','$adscripDirBeca','$adscripAreaBeca','$hijosBeca','$discapacidadBeca','$enfermedadBeca','$alergiaBeca','$nombreFamEmer','$numFamEmer','$sueldoIniBeca','$fechaIngBeca','$jefeBeca','$funcionBeca','$horarioBeca','$numTarjetaBeca','$direccionBeca','$municipioBeca','$coloniaBeca','$zipBeca','$ineClaveBeca','$curpClaveBeca','$claveEstudiosBeca')";

		echo $result=mysqli_query($conexion,$sql);
		unset($completo);
	}
 ?>