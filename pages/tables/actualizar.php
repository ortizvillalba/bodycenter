<?php 
include "conexion.php";
$contador=1;
$sql = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";

$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
$update = "update $_REQUEST[tabla] set ";

while($fila = $resultado->fetch_assoc())
{ 
$valor=$_REQUEST[$fila['column_name']];
if ($fila["column_name"]=="Id")
$clave=$_REQUEST[$fila['column_name']];

if ($fila["column_name"]!="Id" && $contador!=$cantidad) 
{
$update = $update . $fila['column_name'] . "='" . $valor . "',";
}
if ($contador==$cantidad)
{
$update = $update . $fila['column_name'] . "='" . $valor . "' where Id='" . $clave . "'";
}

$contador++;
}


if ($db->query($update) === TRUE) {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&accion=actualizado");
//    echo "New record created successfully";
} else {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&error=$db->error");    
}

?>

