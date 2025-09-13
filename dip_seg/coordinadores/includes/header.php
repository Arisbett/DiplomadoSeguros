<?php
ini_set("display_errors", "0");

header("X-XSS-Protection: 1");
header('X-Frame-Options: DENY');
header('X-Frame-Options: SAMEORIGIN');
//header("Cache-Control: no-store, no-cache, must-revalidate");
//header("Pragma: no-cache");
header( 'X-Content-Type-Options: nosniff' );
session_start();


ini_set('default_charset','utf8');

include("includes/seguridad.php");

$id_coordinador = $_SESSION["id_coordinador"];
$nombre = $_SESSION["nombre"];
$id_tipo_coordinador = $_SESSION["tipo_coordinador"];
$id_grupo = $_SESSION["id_grupo"];
$nombre_grupo = $_SESSION["nombre_grupo"];
$fecha1_registro = $_SESSION["fecha1_registro"];
$fecha2_registro = $_SESSION["fecha2_registro"];
$id_generacion = $_SESSION["id_generacion"];
$id_super_admin = $_SESSION["id_super_admin"];
$id_tabla_generacion = $_SESSION["id_tabla_generacion"];
//var_export($_SESSION);
?>
<!DOCTYPE html>
<head>
 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!--<meta http-equiv="expires" content="0" >
    <meta http-equiv="cache-control" content="no-cache">-->
    <meta content="text/html; charset=UTF-8; X-Content-Type-Options=nosniff" http-equiv="Content-Type" />
	<title> :::: CONDUSEF | ADMINISTRADOR COORDINADORES - DIPLOMADO :::: </title>

     <!--gob.mx-->
     <link href="https://<?php echo $_SERVER['HTTP_HOST']; ?>/pur-cic/favicon.ico" rel="shortcut icon">
     <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
     

     <!-- Respond.js soporte de media queries para Internet Explorer 8 -->
    <!-- ie8.js EventTarget para cada nodo en Internet Explorer 8 -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/ie8/0.2.2/ie8.js"></script>
    <![endif]-->

	<script language="JavaScript1.2" src="js/scripts.js"></script>
</head>


<body>

<main class="page">

<nav class="navbar navbar-inverse sub-navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#subenlaces">
        <span class="sr-only">Interruptor de Navegaci&oacute;n</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="https://www.condusef.gob.mx/">CONDUSEF</a>
    </div>
    <div class="collapse navbar-collapse" id="subenlaces">
      <ul class="nav navbar-nav navbar-right">
      <?php if($id_grupo>0){ ?><li><a href="lista-alumnos.php">Alumnos</a></li><?php } ?>
      <?php if($id_grupo>0){ ?><li><a href="reporte.php">Reporte</a></li><?php } ?>
      <?php if($id_grupo>0){ ?><li><a href="reporte_aprobados.php">Reporte Aprobados</a></li><?php } ?>
      <?php if($id_grupo>0){ ?><li><a href="reporte_cantidad_estado.php">Reporte Entidad</a></li><?php } ?>
        <?php if($id_grupo>0){?>
        <!--<li><a href="firma_documentos.php">e-Firma</a> </li>
        <li><a href="carga_plantilla.php">Solicitud con Plantilla</a> </li>
        <li  class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Solicitud</a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="registro_datos_if.php">Individual</a></li>
                <li><a href="carga_plantilla.php">Plantilla</a></li>
            </ul>
        </li>-->
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container top-buffer-submenu">
<div class="row">
          <div class="col-sm-6">

          </div>
          
          <div class="col-sm-6 pull-right">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><span class="icon-user" aria-hidden="true"></span> <?php echo ('<b>'.$nombre.'</b><br>'.$nombre_grupo); ?></span>
                  <a href="salir.php"><button type="button" class="btn btn-link pull-right">Salir</button></a>
                </li>
              </ul>
            </div>
          </div>
</div>
</div>
      <div class="container"><br><br>

