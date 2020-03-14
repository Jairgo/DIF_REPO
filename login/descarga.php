<?php 
	session_start();

	if(isset($_SESSION['user'])){
	
 require_once "php/conexion.php";
 
 $conexion=conexion();

} else {
    header("location:index.php?#");
}

header("Content-Type: application/octet-stream"); 
  
$file = "_5_ACTA_LALAL.pdf"; 
  
header("Content-Disposition: attachment; filename=" . urlencode($file));    
header("Content-Type: application/download"); 
header("Content-Description: File Transfer");             
header("Content-Length: " . filesize($file)); 
  
flush(); // This doesn't really matter. 
  
$fp = fopen($file, "r"); 
while (!feof($fp)) { 
    echo fread($fp, 65536); 
    flush(); // This is essential for large downloads 
}  
  
fclose($fp);  


/*
header("Content-disposition: attachment; filename=filesUp/_5_ACTA_LALAL.pdf");
header("Content-type: application/pdf");
readfile("_5_ACTA_LALAL.pdf");

$id_becario =$_GET['id'];

//header("location:profileBecario.php?id=".$id_becario);*/

 ?>
