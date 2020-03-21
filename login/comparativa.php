<?php
//la variable $c cuenta los campos que esten vacios, y si tienes mas de 4 campos vacios, entonces no ha terminado su registro
$c=4;
if($row['num_tarjeta'] == 0){
    $c++;
}
if($row['sueldo_inicial'] == 0){
    $c++;
}
if($row['fecha_ingreso'] == 0000-00-00){
    $c++;
}
if($row['estado_civil'] == ''){
    $c++;
}
if($row['escolaridad'] == ''){
    $c++;
}
if($row['nombre_familiares'] == ''){
    $c++;
}
if($row['num_familiares'] == ''){
    $c++;
}
if($row['direccion'] == ''){
    $c++;
}
if($row['municipio'] == ''){
    $c++;
}
if($row['colonia'] == ''){
    $c++;
}
if($row['codigo_postal'] == 0){
    $c++;
}
if($row['tipo_apoyo'] == ''){
    $c++;
}
if($row['direccion_adscripcion'] == ''){
    $c++;
}
if($row['area_adscripcion'] == ''){
    $c++;
}
if($row['jefe_becario'] == '' or $row['jefe_becario'] == NULL){
    $c++;
}
if($row['funcion_becario'] == ''){
    $c++;
}
if($row['horario'] == ''){
    $c++;
}
$idUsuario =$row['id_becario'];
if($c==4){
    $q = "UPDATE becarios_registro SET auxiliar = 1
    WHERE id_becario = $idUsuario";

    $query = mysqli_query($conexion,$q); 
}