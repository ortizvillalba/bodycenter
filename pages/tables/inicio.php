<?php 
include "menu.php";
include "conexion.php";
?>
 <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
<?php
$sql = "select Id from Clientes";
$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
print "<h3>$cantidad</h3>";
?>
              <p>Clientes Activos</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <a href="crear.php?tabla=Clientes" class="small-box-footer">Agregar Nuevo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
 <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
<?php
$sql = "select Id from Cobros";
$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
print "<h3>$cantidad</h3>";
?>
<p>Cobros Realizados</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
            <a href="crear.php?tabla=Cobros" class="small-box-footer">Agregar Nuevo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
<?php         
$sql = "select Id from Inscripciones";
$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
print "<h3>$cantidad</h3>";
?>
              <p>Personas Inscriptas</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="crear.php?tabla=Inscripciones" class="small-box-footer">Agregar Nuevo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
<?php         
$sql = "select Id from Cursos";
$resultado = $db->query($sql);
$cantidad = $resultado->num_rows;
print "<h3>$cantidad</h3>";
?>
              <p>Cursos Habilitados</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="crear.php?tabla=Cursos" class="small-box-footer">Agregar Nuevo <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
<?php
$sql="select Cursos.Id as Id, Cursos.Nombre as Nombre, count(Cursos.Nombre) as Cantidad from Inscripciones,Cursos where Inscripciones.Cursos_Id=Cursos.Id group by Cursos.Nombre,Cursos.Id order by Cantidad desc";
$resultado = $db->query($sql);
?>
<hr><h3 class="box-title">Cursos con más Inscripciones</h3>
</div>
         <div class="box-body">
         <table id="example1" class="table table-bordered table-striped">
         <thead>
         <tr><th>Id</th><th>Nombre del Curso</th><th>Número de Inscripciones</th>
		</tr>
                </thead>
                <tbody>
<?php
while($fila = $resultado->fetch_assoc())
{
print  "<tr><td>$fila[Id]</td><td>$fila[Nombre]</td><td>$fila[Cantidad]</td></tr>";
}
print "</table>";
include "pie.php";
?>

