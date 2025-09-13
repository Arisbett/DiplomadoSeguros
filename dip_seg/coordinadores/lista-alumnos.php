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

include("includes/header.php");
include("includes/funciones.php");


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
    
    if(($id_coordinador==18 && $letra) || $id_coordinador!=18){
        //echo "b.NOMBRE as nombreestado, c.nombre,DATE_FORMAT(a.fecha_registro,'%d-%m-%Y') as fregistro,upper(a.nombre) as nombre1, upper(a.apaterno) as apaterno1,upper(a.amaterno) as amaterno1,a.*", "alumno a,estados b,grupo c ", ($id_autorizacion==3?"":" a.autorizacion=".($id_autorizacion==1?$id_autorizacion:0)." and ").($id_coordinador==$id_super_admin?"  and ":"  a.id_grupo=$id_grupo and ")." b.nombre=a.id_estado and a.fecha_registro>='$fecha1_registro' and a.fecha_registro<='$fecha2_registro 23:59:59' AND c.id_grupo=a.id_grupo ".($id_coordinador==18?" and (upper(nombre) like '$letra%' or upper(apaterno) like '$letra%' or upper(amaterno) like '$letra%') ";
   $lista = select("b.NOMBRE as nombreestado,c.nombre as nombreG,DATE_FORMAT(a.fecha_registro,'%d-%m-%Y') as fregistro,upper(a.nombre) as nombre1, upper(a.apaterno) as apaterno1,upper(a.amaterno) as amaterno1,a.*", "alumno a,estados b,grupo c ", ($id_autorizacion==3?"":" a.autorizacion=".($id_autorizacion==1?$id_autorizacion:0)." and"). "(a.id_grupo=1 or a.id_grupo=2 or a.id_grupo=3) and a.id_estado=b.ID and a.fecha_registro>='2023-02-09' and a.fecha_registro<='2023-12-12 23:59:59' AND c.id_grupo=a.id_grupo");    
   //var_export($lista);
    }

?>

<link href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="js/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>
<div class="row">
    <div class="col-sm-12">
        <form name="formalumnos" action="lista-alumnos.php" method="POST">
            <p>Estado:
                <select name="id_autorizacion" onchange='document.formalumnos.submit()'>
                    <option value="3" <?php echo ($id_autorizacion==3?"selected":""); ?>>Todos los Registrados</option>
                    <option value="2" <?php echo ($id_autorizacion==2?"selected":""); ?>>No Autorizados</option>
                    <option value="1" <?php echo ($id_autorizacion==1?"selected":""); ?>>Autorizados</option>
                </select>
            </p>
            <?php if($id_coordinador==18){?>
            <p>Nombre, apellido paterno o materno que comience con:
                <select name="letra" onchange='document.formalumnos.submit()'>
                    <option value=""></option>
                    <option value="A" <?php echo ($letra==A?"selected":""); ?>>A</option>
                    <option value="B" <?php echo ($letra==B?"selected":""); ?>>B</option>
                    <option value="C" <?php echo ($letra==C?"selected":""); ?>>C</option>
                    <option value="D" <?php echo ($letra==D?"selected":""); ?>>D</option>
                    <option value="E" <?php echo ($letra==E?"selected":""); ?>>E</option>
                    <option value="F" <?php echo ($letra==F?"selected":""); ?>>F</option>
                    <option value="G" <?php echo ($letra==G?"selected":""); ?>>G</option>
                    <option value="H" <?php echo ($letra==H?"selected":""); ?>>H</option>
                    <option value="I" <?php echo ($letra==I?"selected":""); ?>>I</option>
                    <option value="J" <?php echo ($letra==J?"selected":""); ?>>J</option>
                    <option value="K" <?php echo ($letra==K?"selected":""); ?>>K</option>
                    <option value="L" <?php echo ($letra==L?"selected":""); ?>>L</option>
                    <option value="M" <?php echo ($letra==M?"selected":""); ?>>M</option>
                    <option value="N" <?php echo ($letra==N?"selected":""); ?>>N</option>
                    <option value="Ñ" <?php echo ($letra==Ñ?"selected":""); ?>>Ñ</option>
                    <option value="O" <?php echo ($letra==O?"selected":""); ?>>O</option>
                    <option value="P" <?php echo ($letra==P?"selected":""); ?>>P</option>
                    <option value="Q" <?php echo ($letra==Q?"selected":""); ?>>Q</option>
                    <option value="R" <?php echo ($letra==R?"selected":""); ?>>R</option>
                    <option value="S" <?php echo ($letra==S?"selected":""); ?>>S</option>
                    <option value="T" <?php echo ($letra==T?"selected":""); ?>>T</option>
                    <option value="U" <?php echo ($letra==U?"selected":""); ?>>U</option>
                    <option value="V" <?php echo ($letra==V?"selected":""); ?>>V</option>
                    <option value="W" <?php echo ($letra==W?"selected":""); ?>>W</option>
                    <option value="X" <?php echo ($letra==X?"selected":""); ?>>X</option>
                    <option value="Y" <?php echo ($letra==Y?"selected":""); ?>>Y</option>
                    <option value="Z" <?php echo ($letra==Z?"selected":"");?>>Z</option>
                </select>
            </p>
            <?php } ?>
        </form>
    </div>
</div>
<div class="row">
    <div class="col-sm-12"><br><br>
        <h2>ALUMNOS REGISTRADOS</h2>
    </div>
</div>

<div class="row top-buffer table-responsive">
    <div class="col-xs-12">

        <?php if(count($lista)>0){?>
        <p>Puedes autorizar todos los alumnos al hacer clic en el bot&oacute;n "Autoriza Todos"</p>
        <form name="autoriza">
            <input type="hidden" name="arr_ids">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Nombre</th>

                        <th>Estado</th>

                        <th>Grupo</th>
                        <th>Fecha de Registro</th>
                        <th>Autorizado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php  $ids = "";
            for($i=0;$i<count($lista);$i++){ 
                $ids .= $lista[$i]["id_alumno"].',';
        ?>
                    <tr>
                        <td><a
                                href="alumno_datos.php?id=<?php echo $lista[$i]["id_alumno"]; ?>"><?php echo (trim($lista[$i]["nombre1"].' '.$lista[$i]["apaterno1"].' '.$lista[$i]["amaterno1"])); ?></a>
                        </td>

                        <td><?php echo ($lista[$i]["nombreestado"]); ?></td>

                        <td><?php echo ($lista[$i]["nombreG"]); ?></td>
                        <td><?php echo $lista[$i]["fregistro"]; ?></td>
                        <td align="center">

                            <?php echo ($lista[$i]["autorizacion"]==1?"SI":""); ?>
                            <?php echo ($lista[$i]["autorizacion"]==0?"NO":""); ?>
                        </td>
                    </tr>
                    <?php } ?>
                    </tfoot>
            </table>
            <p class="pull-right">
                <button class="btn btn-primary" type="button" onClick="return checar_forma(1);">Autoriza Todos</button>
            </p>
        </form>
        <?php } else{ ?><br><br>
        <div id="msg" class="alert alert-info">No hay alumnos registrados.</div>

        <?php } ?>
    </div>
</div>

<script language="javascript">
function checar_forma(all) {

    form = document.autoriza;


    form.arr_ids.value = "<?php echo $ids; ?>";
    form.action = "lista-alumnos_autoriza.php";
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
<?php } //end extranio ?>
<?php  include("includes/footer.php"); ?>