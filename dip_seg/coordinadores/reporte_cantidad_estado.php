<?php
ini_set("display_errors", "1");
/*error_reporting(E_ALL);
ini_set("display_errors", "1");*/
set_time_limit(0);
/*ini_set('memory_limit', '1024M');
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
header("Content-Disposition: attachment; filename=\"ReportePorEstado".date("YmdHis").".xls\"");
header("Content-Type: application/vnd.ms-excel");*/


include("includes/funciones.php");
include("includes/seguridad.php");


$generacion = 1;

$lista = select("c.nombre as nombreg, b.NOMBRE as estado, COUNT(a.id_alumno) AS total,DATE_FORMAT(a.fecha_registro,'%Y-%m-%d') AS fecha, a.genero", "alumno a,grupo c, estados b ", " c.id_grupo=a.id_grupo and a.autorizacion=1 and a.id_generacion=$generacion and a.id_estado=b.ID GROUP BY b.NOMBRE, a.genero, c.id_grupo", "b.NOMBRE", ""); 
//var_export($lista);
if(count($lista)>0){
?>
<table border="1">
   
   <tr>
   <th>Grupo</th>
    <th>Estado</th>
    <th>Genero</th>
    <th>Fecha de Registro</th>
    <th>Total</th>
   </tr>

   <?php for($i=0;$i<count($lista);$i++){ 
       $id_alumno_lista = $lista[$i]["id_alumno"]; 
   ?>
   <tr>
   <td><?php echo utf8_decode($lista[$i]["nombreg"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["estado"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["genero"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["fecha"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["total"]);  ?></td>
   </tr>

   <?php } ?>
</table>



<?php } ?>