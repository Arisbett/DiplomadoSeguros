<?php
/*ini_set("display_errors", "1");
error_reporting(E_ALL);*/

// Cargamos la librería dompdf que hemos instalado en la carpeta dompdf
require_once ('dompdf/autoload.inc.php');

require ('include/conexion.php');
require ('codigo_qr_lib.php');
$db = new Conexion();
$con = $db->conectar();
session_start();
$idAl=$_SESSION['idAlumno'];
$nombre=$_SESSION['nombre'];
$id_generacion = $_SESSION["id_generacion"];

$exam= Conexion::conectar()->query("SELECT c.promedio, c.cadena, g.generacion, g.fin_ds FROM calificaciones c, generaciones g WHERE c.id_alumno=$idAl AND g.id_generacion=$id_generacion");
$exam->execute();
$resultado = $exam->fetchAll(PDO::FETCH_ASSOC);
$final=$resultado[0]["promedio"];
$codigo = $resultado[0]["cadena"];
$fin = explode('-',$resultado[0]["fin_ds"]);
//$m1f = explode('-',$resultado[0]["evaluacion3_fin"]);*/
//var_export($resultado[0]["fin_ds"]);
//echo "".$fin[2]." de ".mes_espaniol($fin[1])." de ".$fin[0]."";
$nombreImagenFondo = "image/fondo_diploma.png";
$imagenBase64f = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenFondo));

$nombreImagenQR = genera_imagen_qr($idAl,$id_generacion);
$imagenBase64QR = "data:image/png;base64," . base64_encode(file_get_contents($nombreImagenQR));


$httml="
<!DOCTYPE html>
<html>
<head>
<link href='http://fonts.googleapis.com/css?family=Montserrat:light' rel='stylesheet' type='text/css'>
</head>

<style  type='text/css'>

	@page {
		margin-left: 0;
		margin-right: 0;
    margin-bottom: 0;
		margin-top: 0;
	}

body {
  background-image: url('".$imagenBase64f."');
  font-family: 'Montserrat', sans-serif; 
  background-repeat: no-repeat;
  background-attachment: local; 
  background-position: center;
  background-size: cover;
 
  background-size: 99%;
  width:99%;
}
.nombre {

  position: absolute;
  top: 61%;
  left: 17%;
  right: 30%;
  margin: -25px 0 0 -25px; 
}
table {
  width: 95%;
  height: 300px;
  margin-top:27%;
  margin-left:27px;
}      

</style>
<body >
<div style='text-align:center;'>
<table border='0' cellspacing='25' cellpadding='15' class='table table-bordered table-responsive' >
  
  <tr align='center' >
    <td colspan='3'><p><font size='32pt'>$nombre</font></p>
    <br><p><font size='18pt'>Por haber acreditado con una calificación de <b>$final</b> el Diplomado en Seguros, en la modalidad en línea, con una duración de 120h.</font></p>
    </td>
  </tr>
  <tr>
    <td>
    </td>
    <td align='right'>".$fin[2].' de '.mes_espaniol($fin[1]).' de '.$fin[0]."</td>
    <td align='right' ><p class='w400'  margin-top:0; margin-bottom:0;'><img class='img-responsive' src='".$imagenBase64QR."' alt='codigo_qr' width='100'><br>".$codigo."</p></td>
  </tr>

</table>
</div>
</body>
</html>";




use Dompdf\Dompdf;
use Dompdf\Options;

if (0== 0) {
  

    //$dompdf = new Dompdf();

    $options = new Options();
    $options->set('defaultFont', 'Montserrat');
    $options->set('fontDir', 'https://fonts.googleapis.com/css?family=Montserrat');
    $dompdf = new Dompdf($options);

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
    // Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml($httml); 
     
    $dompdf->setPaper('A4','landscape'); 
    $dompdf->render(); 
    $dompdf->stream("Constancia", array("Attachment" => 0));
}else {
  $dompdf = new Dompdf();

    // Load HTML content 
    // $dompdf->loadHtml('<h1>Welcome to niceshipest.com</h1>'); 
     
    // Load html file 
    //$html = file_get_contents("diploma.php");
    
    $dompdf->loadHtml(""); 
     
    $dompdf->setPaper('A4'); 
    $dompdf->render(); 
    $dompdf->stream("niceshipest", array("Attachment" => 0));
}

function mes_espaniol($mes){
  if($mes == 1) $cadena = "Enero";
  else if($mes == 2) $cadena = "Febrero";
  else if($mes == 3) $cadena = "Marzo";
  else if($mes == 4) $cadena = "Abril";
  else if($mes == 5) $cadena = "Mayo";
  else if($mes == 6) $cadena = "Junio";
  else if($mes == 7) $cadena = "Julio";
  else if($mes == 8) $cadena = "Agosto";
  else if($mes == 9) $cadena = "Septiembre";
  else if($mes == 10) $cadena = "Octubre";
  else if($mes == 11) $cadena = "Noviembre";
  else if($mes == 12) $cadena = "Diciembre"; 
  return $cadena;
}

?>