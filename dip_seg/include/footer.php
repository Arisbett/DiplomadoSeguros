

                        
                    
                </div>
</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- JS -->
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
<script type="text/javascript" src="js/link-tabs.js"></script>
</body>


<script language="javascript">
      $gmx(document).ready(function() {
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
	 });
    </script>
</body>
</html>



<?php

include ("detecta_so.php");
require_once ("funciones.php");

$id_grupo = (!$_SESSION["id_grupo"]?0: $_SESSION["id_grupo"]);
$id_alumno = (!$_SESSION["idAlumno"]?0:$_SESSION["idAlumno"]);

function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}

$url = dameURL();
$info= detect();
$ip = $_SERVER['REMOTE_ADDR'];

/*echo "$id_grupo, $id_alumno, '$url', '$info', '$ip', now()";
echo $_SESSION["id_grupo"].'jjj';*/
//if($link)
insert ("monitoreo_alumnos", "id_grupo, id_alumno, url, explorador, ip, fecha_registro", "$id_grupo, $id_alumno, '$url', '$info', '$ip', now()");

?>

<?php include("./chatBot_Interno.php"); ?>


 