<?php
ini_set("display_errors", "1");

header("X-XSS-Protection: 1");
header('X-Frame-Options: DENY');
header('X-Frame-Options: SAMEORIGIN');
//header("Cache-Control: no-store, no-cache, must-revalidate");
//header("Pragma: no-cache");
header( 'X-Content-Type-Options: nosniff' );
session_start();



ini_set('default_charset','utf8');



$idAlumno = $_SESSION["idAlumno"];
$nombre = $_SESSION["nombre"];
$id_grupo = $_SESSION["id_grupo"];
$nombre_grupo = $_SESSION["nombre_grupo"];
$fecha_inicio = $_SESSION["fecha_inicio"]; 
$fecha_fin = $_SESSION["fecha_fin"];
$id_generacion = $_SESSION["id_generacion"];



ini_set('default_charset','utf8');


?>
<!DOCTYPE html>
<html lang="es">
<style type="text/css" media="print">
	@media print {
		#parte1 {display:none;}
}
</style>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Diplomado</title>
    <!-- CSS -->
    <link href="/favicon.ico" rel="shortcut icon">
    <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
    <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
  
</head>


<body>

<main class="page">

<?php

require("menu-d.php"); 
include("seguridad.php");
?>

<div class="container top-buffer-submenu">
<div id="parte1">
<div class="row">
          <div class="col-sm-6">

          </div>
          <br>
          <div class="col-sm-6 pull-right">
            <div class="user-credencials">
              <ul class="list-unstyled">
                <li>
                  <span class="user-credencials__name"><span class="icon-user" aria-hidden="true"></span> <?php echo ('<b>'.$nombre.'</b><br>'.$nombre_grupo)?></span>
                  <a href="cerrar_sesion.php"><button type="button" class="btn btn-link pull-right">Salir</button></a>
                </li>
              </ul>
            </div>
          </div>
</div>
        </div><!--fin parte1-->
</div>
      <div class="container"><div id="parte1"><br><br></div>

