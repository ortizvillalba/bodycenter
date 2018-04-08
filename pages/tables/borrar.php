<?php 
include "conexion.php";
$sql = "delete from $_REQUEST[tabla] where Id=$_REQUEST[Id] limit 1";

$resultado = $db->query($sql);

if ($db->query($sql) === TRUE) {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&accion=borrado");
} else {
header ("Location: listar.php?tabla=$_REQUEST[tabla]&error=$db->error");    
}

?>

