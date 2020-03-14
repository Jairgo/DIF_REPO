<?php 
	session_start();

	if(isset($_SESSION['user'])){
?>
<?php 
    require_once "conexion.php";
    $conexion=conexion();

	$idBecario = (int)$_POST['idBeca'];
	
	if(isset($_FILES['fileImage']) && $_FILES['fileImage']['name'] !=  ''){

        $nombreFile=$_FILES['fileImage']['name'];
        $explode = explode('.', $nombreFile);
        $extension=array_pop($explode);
        $desde=$_FILES['fileImage']['tmp_name'];
    
        $nombreFile = $idBecario.'_PROFILE_'.'.'.$extension;
        $ruta='../../uploads/imgProfile'.'/'.$nombreFile;
        move_uploaded_file($desde, $ruta);

        $q = "UPDATE becarios_registro SET ruta_imagen = '$nombreFile'
        WHERE id_becario = $idBecario";

        $query = mysqli_query($conexion,$q);                     
		echo (mysqli_error($conexion)); 
		
		header("location:../profileBecario.php?id=".$idBecario);
    }else{
      header("location:../profileBecario.php?id=".$idBecario);
    }

?>
<?php
} else {
	header("location:login/index.php?#");
	}
 ?>
