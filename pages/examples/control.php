<?php
include "../tables/conexion.php";
$sql = "select * from Usuarios where Usuario='$_REQUEST[Usuario]' and Clave='$_REQUEST[Clave]'";
//print $sql;
$resultado = $db->query($sql);
if ($resultado->num_rows > 0)
{
session_start();
$_SESSION["Usuario"]=$_REQUEST['Usuario'];
header('Location: ../tables/inicio.php?tabla=Tablero');
}
else
{
header('Location: acceso.php?error=1');
}
?>

