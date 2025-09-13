<?php
ini_set("display_errors", "1");
/*error_reporting(E_ALL);
ini_set("display_errors", "1");*/
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/*header("Content-Disposition: attachment; filename=\"Base_Alumnos_Registrados".date("YmdHis").".xls\"");
header("Content-Type: application/vnd.ms-excel");*/

include("includes/funciones.php");
include("includes/seguridad.php");

$fecha1_registro = $_SESSION["fecha1_registro"];
$fecha2_registro = $_SESSION["fecha2_registro"];
$id_coordinador = $_SESSION["id_coordinador"];
$id_grupo = $_SESSION["id_grupo"];
$id_super_admin = 18;

#agregar fecha de inicio y de fin en la que aparecera la lista de participantes
//echo "b.estado as nombreestado,upper(c.nombreUniv_Inst) as nombreUniv_Inst,DATE_FORMAT(a.falta,'%d-%m-%Y') as fregistro,upper(nombre) as nombre1, upper(apaterno) as apaterno1,upper(amaterno) as amaterno1,a.* from alumno a,states b,grupo c where". ($id_coordinador==$id_super_admin?" (a.idGrupo=1 or a.idGrupo=2 or a.idGrupo=11 or a.idGrupo=21) and ":"  a.idGrupo=$id_grupo and ")." a.estado=b.id_estado and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro' AND c.idGrupo=a.idGrupo";
$lista = select("a.*, e.NOMBRE as estado, g.nombre as grupo,DATE_FORMAT(a.fecha_registro,'%Y-%m-%d') AS fecha", "alumno a, estados e, grupo g, generaciones", " a.id_estado=e.ID and a.id_grupo=g.id_grupo AND a.id_generacion=1", "", ""); 
//var_export($lista);

if(count($lista)>0){
?>


    <table border="1">
    <tr>
    <th>NOMBRE</th>
    <th>TELEFONO</th>
    <th>CORREO</th>
    <th>CONTRASEÑA</th>
    <th>GRUPO</th>
    <th>ESTADO</th>
    <th>EDAD</th>
    <th>GENERO</th>
    <th>AUTORIZACIÓN</th>
    <th>INFORMACION</th>
    <th>FECHA REGISTRO</th>

    </tr>
    <?php for($i=0;$i<count($lista);$i++){ 
        $tipo_candidato = $lista[$i]["tipoCandidato"];
        $id_grupo_alumno = $lista[$i]["idGrupo"];
    ?>
    <tr>
    <td><?php echo utf8_decode($lista[$i]["nombre"]).' '.utf8_decode($lista[$i]["apaterno"]).' '.utf8_decode($lista[$i]["apaterno"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["telefono"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["correo"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["pass"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["grupo"]); ?></td>
    <td><?php echo utf8_decode($lista[$i]["estado"]); ?></td>
    <td><?php echo $lista[$i]["edad"]; ?></td>
    <td><?php echo $lista[$i]["genero"]; ?></td>
    <td><?php echo ($lista[$i]["autorizacion"]==1?"SI":"NO"); ?></td>
    <td><?php echo $lista[$i]["informacion"]; ?></td>
    <td><?php echo $lista[$i]["fecha"]; ?></td>
    
    </tr>
    <?php  } ?>
    </table>

    <?php } ?>
    
