<?php 
session_start(); 
if (empty($_SESSION['Usuario'])) 
{
header ("Location: ../examples/acceso.php");
exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Body Center Gym</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="inicio.php?tabla=Tablero" class="logo">
     <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>B</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Body</b>Center</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="logo.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php print $_SESSION['Usuario']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="logo.png" class="img-circle" alt="User Image">

                <p>
                 <?php print $_SESSION['Usuario']; ?> 
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="listar.php?tabla=Usuarios" class="btn btn-default btn-flat">Usuarios</a>
                </div>
                <div class="pull-right">
                  <a href="../examples/acceso.php" class="btn btn-default btn-flat">Salir</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="logo.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php print $_SESSION['Usuario'];?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MENU DE NAVEGACION</li>
<li class="treeview <?php if($_REQUEST['tabla']=='Tablero') print " active";?>">
          <a href="inicio.php?tabla=Tablero">
            <i class="fa fa-dashboard"></i>
            <span>Tablero</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right"></span>
            </span>
          </a>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Clientes') print " active";?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Clientes</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Clientes"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Clientes"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Cursos') print " active";?>">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Cursos</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Cursos"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Cursos"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Inscripciones') print " active";?>">
          <a href="#">
            <i class="fa fa-check"></i>
            <span>Inscripciones</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Inscripciones"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Inscripciones"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Instructores') print " active";?>">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Instructores</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Instructores"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Instructores"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Cobros') print " active";?>">
          <a href="#">
            <i class="fa fa-money"></i>
            <span>Cobros</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Cobros"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Cobros"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Marcaciones') print " active";?>">
          <a href="#">
            <i class="fa fa-clock-o"></i>
            <span>Marcaciones</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Marcaciones"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Marcaciones"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Roles') print " active";?>">
          <a href="#">
            <i class="fa fa-refresh"></i>
            <span>Roles</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Roles"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Roles"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>
<li class="treeview <?php if($_REQUEST['tabla']=='Usuarios') print " active";?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Usuarios</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">+</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="crear.php?tabla=Usuarios"><i class="fa fa-plus-square"></i> Agregar</a></li>
            <li><a href="listar.php?tabla=Usuarios"><i class="fa fa-list-ul"></i> Listar</a></li>
          </ul>
        </li>

        <li><a href="documento.pdf"><i class="fa fa-book"></i> <span>Documentación</span></a></li>
        <li class="header">FIN DEL MENU</li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Body Center Gym 
        <small>Sistema para el Centro de Entrenamiento</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="inicio.php?tabla=Tablero"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Modulos</a></li>
        <li class="active"><?php print $_REQUEST['tabla'];?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
