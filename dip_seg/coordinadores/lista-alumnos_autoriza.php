<?php
/**/ini_set("display_errors", "1");
error_reporting(E_ALL);
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("includes/header.php");
include("includes/funciones.php");
include("includes/funciones_generales.php");
//include("includes/autoriza_masiva.php");

$cextranio = 0;
$permitidos = "0123456789,";
foreach ($_POST as $keyy => &$vall) {
  for ($i=0; $i<strlen($vall); $i++){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
    if (strpos($permitidos, substr($vall,$i,1))===false){ 
      $cextranio = 1;
      break;
    }

  }
}


if($cextranio==0){

    $arreglo_ids = $_POST["arr_ids"]; 
    $accion = $_POST["accion"];
    //var_dump( explode(',',$arreglo_ids));
    $lista = explode(',',$arreglo_ids);
    $total = 0;

    for($i=0;$i<count($lista);$i++){
        if(is_numeric($lista[$i])){
            $id_alumno =  $lista[$i];
            if($accion==2){ //print "<br>quita $id_generacion,$id_alumno,$id_grupo,$id_coordinador";
            $autorizacion = quitar_autorizacion_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion);
            } else{ //print "<br>autorizo $id_generacion,$id_alumno,$id_grupo,$id_coordinador";
            $autorizacion = autoriza_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion);
            }
            //echo '<br>id:'.$lista[$i];
            $total += $autorizacion;
        }
    }

    if($total>0){ 
        $mensaje = "Se han actualizado los alumnos solicitados";
    }else{
        $mensaje = "No se han logrado actualizar el(los) alumno(s) solicitado(s)";
    }

//$lista = select("b.NOMBRE as estadoc,a.* ", "alumno a, estados b", "a.estado=b.ID AND a.autorizado=0 and a.falta>='$fecha1_registro' and a.falta<='$fecha2_registro' and a.idGrupo=$id_grupo", "", ""); 
//var_export($lista);

?>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="js/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
    
<div class="row">
    <div class="col-sm-12"><br><br><h2>AUTORIZACI&Oacute;N DE ALUMNOS</h2></div>
</div>
<div class="row">
    <div class="col-sm-12"><br><br><div class="alert alert-info"><?=$mensaje?></div></div>
</div>


<?php  } //end extranio
include("includes/footer.php");?>