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


 for($t=0;$t<count($examen1);$t++){ 
    $cal_exa1[$examen1[$t]["idAlumno"]] = $examen1[$t]["Calificacion"];
}

//var_export($examen1);

$lista = select("c.nombre as nombreg, b.NOMBRE as estado, COUNT(d.id_alumno) AS total, a.genero",
 "alumno a,grupo c, estados b, calificaciones d",
  " c.id_grupo=a.id_grupo and a.autorizacion=1 and a.id_generacion=$generacion and a.id_estado=b.ID and d.id_alumno=a.id_alumno and promedio>=7 GROUP BY a. genero, b.NOMBRE, c.id_grupo", "b.NOMBRE", ""); 

?>
<table border="1">
   
   <tr>
   <th>Grupo</th>
    <th>Estado</th>
    <th>Aprobados</th>
    <th>Genero</th>

    
   </tr>

   <?php for($i=0;$i<count($lista);$i++){ 
       $id_alumno_lista = $lista[$i]["id_alumno"]; 
       $E1 = 60*$cal_exa1[$id_alumno_lista]/15;
   ?>
   <tr>
   <td><?php echo utf8_decode($lista[$i]["nombreg"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["estado"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["genero"]);  ?></td>
       <td><?php echo utf8_decode($lista[$i]["total"]);  ?></td>

   </tr>

   <?php } ?>
</table>



<?php //} ?>