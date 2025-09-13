<?php 
/*ini_set("display_errors", "0");*/
ini_set("display_errors", "1");
error_reporting(E_ALL);
include("include/funciones.php");
//var_export($_POST);
$cextranio = 0;
$permitidos = "0123456789@.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_-";
foreach ($_POST as $keyy => &$vall) { //echo $keyy.'<br>';
	if($keyy!="g-recaptcha-response"){
		for ($i=0; $i<strlen($vall); $i++){ 
			if (strpos($permitidos, substr($vall,$i,1))===false){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
			$cextranio = 1;
			break;
			}
		}
	}	
}

$secret = "6Lc46tUhAAAAAO_bRK67Jq07hjQwRUxc6h3jNCRX";
$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$rsp = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$ip);
$arr = json_decode($rsp,true); //var_export($arr);
if($arr["success"]==false) $cextranio=1;

if($cextranio==0){ 
    
    $correo = trim($_POST["correo"]);
	$id_grupo = trim($_POST["grupo"]);
    $id_generacion = 1;
// $datos = select("UPPER(nombre) as nombre, UPPER(apaterno) as apaterno, UPPER(amaterno) as amaterno,correo,pass,usuario","alumno","idGrupo=$id_grupo and correo='$correo' and idGeneracion=$id_generacion","",""); //var_export($datos);
    $datos = select("UPPER(nombre) as nombre, UPPER(apaterno) as apaterno, UPPER(amaterno) as amaterno,correo,pass","alumno"," correo='$correo' and id_generacion=$id_generacion","",""); //var_export($datos);
    $receptor = $datos[0]["correo"]; //"ligomez@condusef.gob.mx"; //$_SESSION["usuario_correo"];
    $nombre = $datos[0]["nombre"].' '.$datos[0]["apaterno"].' '.$datos[0]["amaterno"]; //"Pedro Cruz";
    $usuario = $datos[0]["correo"]; //"usuprueba";
    $pass = $datos[0]["pass"]; //"pasprueba";


    /*if($id_grupo){
            //$grupo = select("nombre,correo,telefono,nombreUniv_Inst","coordinadores","idGrupo=".$id_grupo,"","");
		$grupo = select("b.nombre,b.correo,b.telefono,a.nombreUniv_Inst","grupo a, coordinadores b","a.idGrupo=b.idGrupo AND b.activo='1' and a.idGrupo=".$id_grupo,"","");
        $coordinador = $grupo[0]["nombre"]; //"Veronica Yahuaca Ramírez";
        $escuela = ($grupo[0]["nombreUniv_Inst"]); //"ESCUELA SUPERIOR DE COMERCIO Y ADMINISTRACIÓN, UNIDAD SANTO TÓMAS";
        $mail_coordinador= $grupo[0]["correo"]; //"diplomadocondusef_escasto@hotmail.com";
        $tel_coordinador= $grupo[0]["telefono"]; //"Tel. 5729-6000, Ext. 61568";
    }*/
    
    if(count($datos)>0){
$mensaje = '<!DOCTYPE HTML>
<html>
	<body>
	<table width="80%" align="center" border="0">
    
    <tr bgcolor="#d9d9d9"><td>&nbsp;</td></tr>
    <tr><td>
    
<p>&nbsp;</p>
<center><h2><font face="Montserrat">Estimado(a): '.strtoupper($nombre).'</font></h2></center>

<p style="font-family:Montserrat"><h2><font face="Montserrat">Usuario: <strong>'.$usuario.'</strong><br>Contrase&ntilde;a: <strong>'.$pass.'</strong></font></h2></p>

	</body>
</html>';


    } else {
        $mensaje = '<div id="msg" class="alert alert-info">El correo '.$correo.' no se encuentra registrado.</div>';
    }
 
    
}//end extraño
else { $mensaje = '<div id="msg" class="alert alert-info">El tiempo de la petici&oacute;n expiro</div>'; }
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
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        <button class="btn btn-default" type="button" onClick="document.location.href='login.php'">Regresar</button>
        <button class="btn btn-default" type="button" onClick="javascript:window.print()">Imprimir</button>
    </p>
    </div>
</div>
        <br><br><br><br>
</div>
</main><!--Termina CONTAINER-->
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->
</body>
</html>


