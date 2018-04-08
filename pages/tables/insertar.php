<?php 
include "conexion.php";
$contador=1;
$sql = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";

$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
$insert = "insert into $_REQUEST[tabla] (";

while($fila = $resultado->fetch_assoc())
{ 
if ($fila["column_name"]!="Id" && $contador!=$cantidad) 
$insert = $insert . $fila['column_name'] . ",";
if ($contador==$cantidad)
$insert = $insert . $fila['column_name'] . ")";
$contador++;
}

$sql = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado = $db->query($sql);
$contador=1;

$insert=$insert . " values (";

while($fila = $resultado->fetch_assoc())
{  
if ($fila["column_name"]!="Id" && $contador!=$cantidad)
$insert = $insert . "'" . $_REQUEST[$fila['column_name']] . "',";
if ($contador==$cantidad)
$insert = $insert . "'" . $_REQUEST[$fila['column_name']] . "')";
$contador++;
}
//$db->query($insert);
if ($db->query($insert) === TRUE) {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&accion=insertado");
//    echo "New record created successfully";
} else {
header ("Location: crear.php?tabla=$_REQUEST[tabla]&error=$db->error");    
}
?>

