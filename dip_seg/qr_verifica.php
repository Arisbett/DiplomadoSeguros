<?php 
/*ini_set("display_errors", "0");*/
ini_set("display_errors", "0");
error_reporting(E_ALL);
include("include/funciones.php");
//var_export($_POST);
$cextranio = 0;
$permitidos = "0123456789";
foreach ($_GET as $keyy => &$vall) { //echo $keyy.'<br>';
	//if($keyy!="g-recaptcha-response"){
		for ($i=0; $i<strlen($vall); $i++){ 
			if (strpos($permitidos, substr($vall,$i,1))===false){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
			$cextranio = 1;
			break;
			}
		}
	//}	
}


if($cextranio==0){ 
    
	$id_alumno = trim($_GET["ida"]);
    $id_generacion = $_GET["idg"];

    //$datos = select("upper(concat(a.nombre,' ',a.apaterno,' ',a.amaterno)) as nombre, b.Calificacion,DATE_FORMAT(b.fecha_registro,\"%d-%m-%Y\") as fecha,cadena_original","alumno a, calificacionfinal b,ev_satisfaccion c","a.idAlumno=b.idAlumno AND c.idAlumno=a.idAlumno AND c.idGeneracion=$id_generacion AND a.idAlumno=$id_alumno","",""); //var_export($datos);
    $info_usuario = select("upper(c.nombre) as institucion, a.id_alumno,a.id_grupo,a.id_alumno,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno,g.registro_inicio, g.registro_fin, g.fin_ds, cal.promedio",
     "alumno a,grupo c,generaciones g, calificaciones cal", " c.id_grupo=a.id_grupo and a.id_generacion=$id_generacion and a.autorizacion='1' AND a.id_generacion=$id_generacion AND cal.id_alumno=$id_alumno", "");
    $id_alumno=$info_usuario[0]["id_alumno"];
    $id_grupo = $info_usuario[0]["id_grupo"];
    $nombre = $info_usuario[0]["nombre"].' '.$info_usuario[0]["apaterno"].' '.$info_usuario[0]["amaterno"];
    $nombre_grupo = $info_usuario[0]["institucion"];
    $cierre = $info_usuario[0]["fin_ds"]; 
    $curso = "Diplomado en Educación Financiera";
    $accion = "Constancia";

    
    if(count($datos)>0){
$mensaje = '<!DOCTYPE HTML>
<html>
	<body  Cellpadding="0" Cellspacing="0">
	<table width="80%" align="center" border="0" Cellpadding="0" Cellspacing="0">
    <tr bgcolor="#580000"><td><p style="font-family:Montserrat;color:FFFFFF" align="center"><strong><font color="#FFFFFF" face="Montserrat">CONDUSEF <br>DIPLOMADO EN EDUCACI&Oacute;N FINANCIERA</font></strong></p></td></tr>
    <!--<tr bgcolor="#d9d9d9"><td>&nbsp;</td></tr>-->
    <tr><td>
    <p align="center"><img src="imagenes/logoDEF.png" border="1"></p>
    <p><div class="alert alert-success"><stron>Verificado</strong></div></p>
<center><h2><font face="Montserrat">Constancia</font></h2></center>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>Nombre completo: </strong>'.$nombre.'</font></p>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>Curso: </strong>'.$curso.'</font></p>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>Generaci&oacute;n: </strong>'.$id_generacion.'</font></p>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>Calificaci&oacute;n: </strong>'.$calificacion.'</font></p>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>Fecha: </strong>'.$fecha.'</font></p>
<p style="font-family:Montserrat"><font face="Montserrat"><strong>C&oacute;digo: </strong>'.$codigo.'</font></p>
<!--<p style="font-family:Montserrat"><font face="Montserrat"><strong>Direcci&oacute;n de Fomento al Desarrollo de Capacidades Financieras</strong></font></p>--></td></tr>
<tr bgcolor="#d9d9d9"><td>&nbsp;</td></tr><tr bgcolor="#580000"><td>&nbsp;</td></tr></table>
	</body>
</html>';


    } else {
        $mensaje = '<div id="msg" class="alert alert-info">No se encontro informaci&oacute;n</div>';
    }
 
    
}//end extraño
else { $mensaje = '<div id="msg" class="alert alert-info">La solicitud no es correcta</div>'; }
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  class='no-js' lang='es'>
<head>
<!--gob.mx-->
<link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
<link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
<!---->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONDUSEF | Diplomado en Educaci&oacute;n Financiera - RECUPERA ACCESO</title>
<meta http-equiv="X-UA-Compatible" />

<script type="text/javascript" src="js/scripts.js"></script>

</head>

<body>
	<main class="page">
      <div class="container"><br><br>
	<div class="row">	<div class="col-sm-12">&nbsp;</div>	</div>
    <div class="row"><div class="col-sm-10"><?php echo $mensaje; ?></div>
	<div class="form-group">
    <!--<div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        <button class="btn btn-default" type="button" onClick="javascript:window.print()">Imprimir</button>
    </p>
    </div>-->
</div>
        <br><br><br><br>
</div>
</main><!--Termina CONTAINER-->
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->
</body>
</html>


