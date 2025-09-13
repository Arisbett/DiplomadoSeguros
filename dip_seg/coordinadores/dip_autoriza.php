
<?php
ini_set("display_errors", "1");
include("includes/funciones.php");
include("includes/funciones_generales.php");
include("includes/autoriza_masiva.php");


$cextranio = 0;
$permitidos = "0123456789";
foreach ($_GET as $keyy => &$vall) {
  for ($i=0; $i<strlen($vall); $i++){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
    if (strpos($permitidos, substr($vall,$i,1))===false){ 
      $cextranio = 1;
      break;
    }
  }
}

if($cextranio==0){
    $id_alumno = $_GET["id"];
    $id_generacion = 43;

    $alumno = select("nombre, apaterno,amaterno,correo,pass,usuario,idGrupo","alumno","idAlumno=".$id_alumno,"","");
    $nombre = $alumno[0]["nombre"].' '.$alumno[0]["apaterno"].' '.$alumno[0]["amaterno"];
    $id_grupo = $alumno[0]["idGrupo"];

    //var_export($alumno);

    if($id_alumno>0 && $id_grupo==2){//solo publico en general se autoriza
        //updatei(array("i",$id_alumno),"alumno", "autorizado=1", "idAlumno=?");
        $autorizacion = autoriza_alumno($id_generacion,$id_alumno,$id_grupo,-1);

        if($autorizacion==1){
        
        //inserti(array("iii",$id_alumno,$id_grupo,$id_generacion),"expediente", "id_alumno,id_grupo,id_generacion,id_usuario_autorizacion,fecha_registro","?,?,?,-1,now()");
          $mensaje = "Se ha activado tu cuenta en el Diplomado en Educaci&oacute;n Financiera.";
      } else {
          $mensaje = "No se ha logrado activar tu cuenta en el Diplomado en Educaci&oacute;n Financiera. <br>Para mayor informaci&oacute;n ponte en contacto con nosotros por medio del correo electr&oacute;nico: diplomado@condusef.gob.mx en un horario de 9:00 a 18:00 horas o al tel&eacute;fono (55) 54487000 ext. 6269.";
        }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  class='no-js' lang='es'>
<head>

<!--gob.mx-->
<link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
<link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
<!---->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONDUSEF | ACTIVACI&Oacute;N DIPLOMADO</title>
<meta http-equiv="X-UA-Compatible" />
<!--<link rel="stylesheet" type="text/css" href="css/theme4.css" />-->
<!--link rel="stylesheet" type="text/css" href="css/style.css" />-->

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->


<script type="text/javascript" src="js/scripts.js"></script>

</head>

<body>
	<main class="page">
      <div class="container">
<br>
	<h3>Diplomado en Educación Financiera</h3>
	<hr>
    <div class="row">
    <div class="col-sm-8">
    <table>
        <tr>
            <td><center><img src="imagenes/logoDEF.png" width="250" height="89" border="0"></center></td>
    </tr><tr>
            <td>
                <h3><?=$nombre?></h3>
                <div class="alert alert-info"><?=$mensaje?></div>
                
            </td>
        </tr><tr bgcolor="#d9d9d9"><td>&nbsp;</td></tr><tr bgcolor="#580000"><td>&nbsp;</td></tr>
    </table>

    </div>
    </div>

</div>
</main><!--Termina CONTAINER-->


<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->

</body>
</html>
<?php  } 
} //END EXTRAÑO 
?>