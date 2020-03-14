<?php
$conexion=conexion();

//$sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,email_becario,telefono_becario,fecha_inicio,id_becario FROM becarios_registro ORDER by fecha_inicio";
$sqlBeca = "SELECT auxiliar,nombre_becario,apellidos_becario,sexo, TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,telefono_becario,fecha_inicio,id_becario,estado FROM becarios_registro WHERE estado = '1' ORDER by fecha_inicio";
$result = mysqli_query($conexion, $sqlBeca);
//TIMESTAMPDIFF(YEAR, fecha_nacimiento,NOW()) AS restaEdad,
$actualUser=$_SESSION['user'];

$sqlUser = "SELECT nombre_admin,apellidos_admin FROM administradores WHERE usuario = '$actualUser'";
$resultUser = mysqli_query($conexion, $sqlUser);
$data = mysqli_fetch_array($resultUser, MYSQLI_ASSOC);