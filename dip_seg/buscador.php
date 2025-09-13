<?php
/**/ini_set("display_errors", "1");
error_reporting(E_ALL);
set_time_limit(0);
ini_set('memory_limit', '1024M');


header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("include/header.php");
include("include/funciones.php");
session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];



$cextranio = 0;
$permitidos = "0123456789-/ABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
foreach ($_POST as $keyy => &$vall) {
  for ($i=0; $i<strlen($vall); $i++){ //echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
    if (strpos($permitidos, substr($vall,$i,1))===false){ 
      $cextranio = 1;
      break;
    }
  }
} 

if($cextranio==0){

    $id_autorizacion = (!$_POST["id_autorizacion"]?"3":$_POST["id_autorizacion"]);
    $letra = $_POST["letra"];
    
    
        //echo "b.NOMBRE as nombreestado, c.nombre,DATE_FORMAT(a.fecha_registro,'%d-%m-%Y') as fregistro,upper(a.nombre) as nombre1, upper(a.apaterno) as apaterno1,upper(a.amaterno) as amaterno1,a.*", "alumno a,estados b,grupo c ", ($id_autorizacion==3?"":" a.autorizacion=".($id_autorizacion==1?$id_autorizacion:0)." and ").($id_coordinador==$id_super_admin?"  and ":"  a.id_grupo=$id_grupo and ")." b.nombre=a.id_estado and a.fecha_registro>='$fecha1_registro' and a.fecha_registro<='$fecha2_registro 23:59:59' AND c.id_grupo=a.id_grupo ".($id_coordinador==18?" and (upper(nombre) like '$letra%' or upper(apaterno) like '$letra%' or upper(amaterno) like '$letra%') ";
   $lista = select("c.termino, c.contenido", "letra a,relacion_letra_cont b, contenido_glosario c", "a.id_letra=c.id_letra AND b.id_letra=a.id_letra AND b.id_contenido=c.id_contenido_glosario AND (upper(a.letra) LIKE '$letra%' or upper(c.termino) LIKE '$letra%')");    
   //var_export($lista);
    

?>
<br><br><br>
<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>

<div class="row top-buffer table-responsive">
    <div class="col-xs-12">

        <?php if(count($lista)>0){?>
        <form name="autoriza">
            <input type="hidden" name="arr_ids">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Termino</th>
                        <th>Significado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $ids = "";
            for($i=0;$i<count($lista);$i++){ 
                $ids .= $lista[$i]["id_alumno"].',';
        ?>
                    <tr>
                       

                        <td><?php echo ($lista[$i]["termino"]); ?></td>
                        <td><?php echo ($lista[$i]["contenido"]); ?></td>

                       
                    </tr>
                    <?php } ?>
                    </tfoot>
            </table>
            <p class="pull-right">
                <button class="btn btn-primary" type="button" onClick="document.location.href='contenido.php'">Regresar</button>
            </p>
        </form>
        <?php } else{ ?><br><br>
        <div id="msg" class="alert alert-info">Puede ser que no exista la palabra que buscas dentro de nuestro glosario</div>

        <?php } ?>
    </div>
</div>



<script language="javascript">
function checar_forma(all) {

    form = document.autoriza;


    form.arr_ids.value = "<?php echo $ids; ?>";
    form.action = "buscador.php";
    form.method = "POST";
    form.submit();
}

$(document).ready(function() {
    $('#example').DataTable({
        "order": [0, 'asc'],
        "pageLength": 150,
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
        }
    });
});
</script>

<?php } include("include/footer.php"); ?>