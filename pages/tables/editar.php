<?php 
include "conexion.php";
include "menu.php";
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
$sql1 = "select column_name, column_type from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado1 = $db->query($sql1);
$sql2 = "select * from $_REQUEST[tabla] where Id='$_REQUEST[Id]'";
$resultado2 = $db->query($sql2);
print "<h2>Editar: $_REQUEST[tabla]</h2>";
print "<div class=col-md-6><br><form method=post action=actualizar.php><br>";
$fila2 = $resultado2->fetch_assoc();
while($fila1 = $resultado1->fetch_assoc())
{ 
if (strpos($fila1["column_type"], "varchar(") !== false) 
{
$columna=$fila1['column_name'];
print "<label>$fila1[column_name]:</label><input class=form-control type=text name=$fila1[column_name] value='$fila2[$columna]' required><br>";
}
if (strpos($fila1["column_type"], "int(") !== false && $fila1["column_name"]!="Id" && endsWith($fila1["column_name"], '_Id') != "true") 
{
$columna=$fila1['column_name'];
print "<label>$fila1[column_name]:</label><input class=form-control type=number name=$fila1[column_name] value=$fila2[$columna] required><br>";
}
if (strpos($fila1["column_type"], "int(") !== false && $fila1["column_name"]=="Id")
{
$columna=$fila1['column_name'];
print "<input type=hidden name=Id value=$fila2[$columna]>";
}
if (strpos($fila1["column_type"], "date") !== false) 
{
$columna=$fila1['column_name'];
print "<label>$fila1[column_name]:</label><input class=form-control type=date name=$fila1[column_name] value=$fila2[$columna] required><br>";
}
if (strpos($fila1["column_type"], "time") !== false)
{
$columna=$fila1['column_name'];
print "<label>$fila1[column_name]:</label><input class=form-control type=time name=$fila1[column_name] value=$fila2[$columna] required><br>";
}

if (endsWith($fila1["column_name"], '_Id') == "true")
{
$columna=$fila1['column_name'];
$sql3 = "select * from " . substr($fila1["column_name"], 0, -3);
$resultado3 = $db->query($sql3);
print "<label>$fila1[column_name]:</label><br><select class=form-control name=$fila1[column_name]>";

while($fila3 = $resultado3->fetch_assoc())
{
print "<option value=$fila3[Id]";
if ($fila3['Id']==$fila2[$columna])
{
print " selected";
}
print ">$fila3[Id] $fila3[Nombre] "; 
if (isset($fila3['Apellido']))
print $fila3['Apellido'];
if (isset($fila3['Precio']))
{
print "Gs." . $fila3['Precio'];
}
print "</option>";
}
print "</select><br>";
}


}
print "<input type=hidden name=tabla value=$_REQUEST[tabla]><br>";
print "<input type=submit value=Editar class='btn btn-primary'></form></div>";
include "pie.php"
?>

