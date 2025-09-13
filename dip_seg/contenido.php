<?php 


include("include/header.php");
ini_set("display_errors", "0");
error_reporting(E_ALL);

include ("include/funciones.php");
  
//include ("include/cierre.php");

/*require ("includes/conexion.php");
$db = new Conexion();
$con = $db->conectar();*/

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

//$p =$_GET["p"];
date_default_timezone_set("America/Mexico_City");
session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
$cierre=$_SESSION['fin_ds'];
//var_export($cierre);
?>
<style>
    .bg-light{background-color:#f8f9fa!important}
    .p-2{padding:.5rem!important}
    .border{border:1px solid #dee2e6!important}
    .gap-3{gap:1rem!important}
    .d-grid{display:grid!important}
</style>
        <p>&nbsp;</p>
<br><br>

<?php 
$m1=select("Calificacion_Final","examen_m1","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m1);    
$m2=select("Calificacion_Final","examen_m2","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi2= max($m2);  
$m3=select("Calificacion_Final","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi3= max($m3);  
$m4=select("Calificacion_Final","examen_m4","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi4= max($m4); 

$r1= round(($calmaxi["Calificacion_Final"]));
$r2= round(($calmaxi2["Calificacion_Final"]));
$r3= round(($calmaxi3["Calificacion_Final"]));
$r4= round(($calmaxi4["Calificacion_Final"]));

?>
   <a href="#" target="_blank" rel="noopener noreferrer">¿Cómo utilizo la plataforma?</a>     
        <div class="row bottom-buffer">
            <div class="col-md-12 ">
              <table border="0" width="100%">
                <tr>
                    <th><h2>M&oacute;dulos</h2></th>
                    <th><center>Porcentaje de estudios</center></th>
                </tr>
              </table>
                     
                    
                
            
            
                <!-- As a link -->
                <div class="d-grid gap-3">
                    <div class="p-2 bg-light border">
                        <div class="col-md-9 "><img src="image/MODULO_1.png" style="vertical-align:middle; max-width: 180px; max-height: 82px;"> RIESGO Y SEGURO </div>
                        <div class="col-md-2"><br><div class="progress">  <div class="progress-bar" role="progressbar" style="width: <?php echo $calmaxi["Calificacion_Final"]?>%;" aria-valuenow="<?php echo $calmaxi["Calificacion_Final"]?>" aria-valuemin="0" aria-valuemax="10"><?php echo $r1;?> %</div></div></div>
                        <div class="col-md-1 "><br><a href="modulo1.php?p=1" class="alert-link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></div>
                        
                        
                    </div>
                    <div class="p-2 bg-light border">
                        <div class="col-md-9 "><img src="image/MODULO_2.png" style="vertical-align:middle; max-width: 180px; max-height: 82px;"> NORMATIVA EN SEGUROS </div>
                        <div class="col-md-2 "><br><div class="progress">  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $calmaxi2["Calificacion_Final"]?>%;" aria-valuenow="<?php echo $calmaxi2["Calificacion_Final"]?>" aria-valuemin="0" aria-valuemax="10"><?php echo $r2;?> %</div></div></div>
                        <div class="col-md-1 "><br><a href="modulo2.php?p=1" class="alert-link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></div>
                    </div>
                    <div class="p-2 bg-light border">
                        <div class="col-md-9 "><img src="image/MODULO_3.png" style="vertical-align:middle; max-width: 180px; max-height: 82px;"> OPERACIONES DE SEGUROS </div>
                        <div class="col-md-2 "><br><div class="progress">  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $calmaxi3["Calificacion_Final"]?>%;" aria-valuenow="<?php echo $calmaxi3["Calificacion_Final"]?>" aria-valuemin="0" aria-valuemax="10"><?php echo $r3;?> %</div></div></div>
                        <div class="col-md-1 "><br><a href="modulo3.php?p=1" class="alert-link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></div>
                    </div>
                    <div class="p-2 bg-light border">
                        <div class="col-md-9"><img src="image/MODULO_4.png" style="vertical-align:middle; max-width: 180px; max-height: 82px; float: left; margin: 0px 15px 15px 0px;"> <BR>TÉCNICAS DE DISTRIBUCIÓN DEL RIESGO Y ACCIONES Y HERRAMIENTAS DE PROTECCIÓN </div>
                        <div class="col-md-2 "><br><div class="progress">  <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $calmaxi4["Calificacion_Final"]?>%;" aria-valuenow="<?php echo $calmaxi4["Calificacion_Final"]?>" aria-valuemin="0" aria-valuemax="10"><?php echo $r4;?> %</div></div></div>
                        <div class="col-md-1 "><br><a href="modulo4.php?p=1" class="alert-link"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a></div>
                    </div>
                </div>
            
            </div>
           
        </div>
<?php include("include/footer.php")?> 