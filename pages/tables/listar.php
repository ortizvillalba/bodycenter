<?php 
include "menu.php";
function endsWith($haystack, $needle) {
    // search forward starting from end minus needle length characters
    return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
}
if (isset($_REQUEST['accion']))
{
if ($_REQUEST['accion']=="actualizado")
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Actualizado!</strong></div>";
if ($_REQUEST['accion']=="insertado")
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Insertado!</strong></div>";
if ($_REQUEST['accion']=="borrado")
print "<div class='alert alert-success'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Registro Borrado!</strong></div>";
}
if (isset($_REQUEST['error']))
print "<div class='alert alert-danger'><a href=# class=close data-dismiss=alert aria-label=close>&times;</a>
<strong>Error:!</strong> $_REQUEST[error]</div>";
?>
              <h3 class="box-title">Listado: <?php print $_REQUEST['tabla'];?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                <?php 
include "conexion.php";
$sql1 = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado1 = $db->query($sql1);

$sql2 = "select * from $_REQUEST[tabla]";
$resultado2 = $db->query($sql2);
$cantidad2 = $resultado2->num_rows;
while($fila1 = $resultado1->fetch_assoc())
{
print "<th>$fila1[column_name]</th>";
}
print "<th>Acción</th>";
?>
		</tr>
                </thead>
                <tbody>
<?php 
$sql1 = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado1 = $db->query($sql1);

$sql2 = "select * from $_REQUEST[tabla]";
$resultado2 = $db->query($sql2);
while($fila2 = $resultado2->fetch_assoc())
{
print "<tr>";
while($fila1 = $resultado1->fetch_assoc())
{
if (endsWith($fila1["column_name"], '_Id') != "true")
{
print "<td>" . $fila2[$fila1['column_name']] . "</td>";
}
else
{
$identificador=$fila2[$fila1['column_name']];
$sql3 = "select * from " . substr($fila1["column_name"], 0, -3) . " where Id='" . $identificador . "'";
$resultado3 = $db->query($sql3);
$fila3 = $resultado3->fetch_assoc();
print "<td>" . $fila3['Id'] . " " . $fila3['Nombre'] . " ";
if (isset($fila3['Apellido']))
print $fila3['Apellido'];
if (isset($fila3['Precio']))
{
print "Gs." . $fila3['Precio'];
}
print "</td>";
}
}
$resultado1 = $db->query($sql1);
print "<td><a href=editar.php?tabla=$_REQUEST[tabla]&Id=$fila2[Id] class='btn btn-primary'>Editar</a><a href=borrar.php?tabla=$_REQUEST[tabla]&Id=$fila2[Id] class='btn btn-danger'>Borrar</a></td></tr> ";
}
?>
		</tbody>
                <tfoot>
                <tr>
                               <?php
$sql1 = "select column_name from information_schema.columns where table_name='$_REQUEST[tabla]'";
$resultado1 = $db->query($sql1);
$sql2 = "select * from $_REQUEST[tabla]";
$resultado2 = $db->query($sql2);
$cantidad2 = $resultado2->num_rows;
while($fila1 = $resultado1->fetch_assoc())
{
print "<th>$fila1[column_name]</th>";
}
print "<th>Acción</th>";
?>

		 </tr>
                </tfoot>
              </table>
<button onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</button>
<?php
include "pie.php";
?>

