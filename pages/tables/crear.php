<?php 
include "conexion.php";
include "menu.php";
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
$sql = "select column_name, column_type from information_schema.columns where table_name='$_REQUEST[tabla]'";

$resultado = $db->query($sql);
if (isset($_REQUEST['error']))
print "<div class='alert alert-danger'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Error:!</strong> $_REQUEST[error]</div>";
$fecha=date("Y-m-d");
print "<h4 align=left>Agregar: $_REQUEST[tabla]</h4>";
print "<div class=col-md-6><br><form action=insertar.php>";
while($fila = $resultado->fetch_assoc())
{ 
if (strpos($fila["column_type"], "varchar(") !== false && $fila["column_name"]!="Sexo") 
print "<label>$fila[column_name]:</label><input class=form-control type=text name=$fila[column_name] required><br>";
if (strpos($fila["column_type"], "int(") !== false && $fila["column_name"]!="Id" && endsWith($fila["column_name"], '_Id') != "true") 
print "<label>$fila[column_name]:</label><input class=form-control type=number name=$fila[column_name] required><br>";
if (strpos($fila["column_type"], "date") !== false) 
print "<label>$fila[column_name]:</label><input class=form-control type=date name=$fila[column_name] value=$fecha required><br>";
if (strpos($fila["column_type"], "time") !== false)
print "<label>$fila[column_name]:</label><input class=form-control type=time name=$fila[column_name] required><br>";
if ($fila["column_name"] == "Sexo") 
print "<label>$fila[column_name]:</label><br><select class=form-control name=$fila[column_name]><option value=Masculino>Masculino</option><option value=Femenino>Femenino</option></select><br>";
if (endsWith($fila["column_name"], '_Id') == "true")
{
$sql2 = "select * from " . substr($fila["column_name"], 0, -3);
$resultado2 = $db->query($sql2);
print "<label>$fila[column_name]:</label><br><select class=form-control name=$fila[column_name]>";

while($fila2 = $resultado2->fetch_assoc())
{
print "<option value=$fila2[Id]>$fila2[Id] $fila2[Nombre] ";
if (isset($fila2['Apellido']))
print $fila2['Apellido'];
if (isset($fila2['Precio']))
{
print "Gs." . $fila2['Precio'];
}
print "</option>";
}
print "</select><br>";
}
}
print "<input type=hidden name=tabla value=$_REQUEST[tabla]><br>";
print "<input type=submit value=Agregar class='btn btn-primary'></form></div>";
include "pie.php"
?>

