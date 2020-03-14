<?php 
    require_once "php/conexion.php";
    $conexion=conexion();
    $query = "SELECT id_becario, nombre_becario, apellidos_becario FROM becarios_registro";
    $result = mysqli_query($conexion, $query);

echo '<option value="0">Seleccionar perro</option>';
while (($fila = mysql_fetch_array($result)) != NULL) {
    echo '<option value="'.$fila["id_becario"].'">'.$fila["nombre_becario"].'</option>';
}
// Liberar resultados
mysql_free_result($result);
 