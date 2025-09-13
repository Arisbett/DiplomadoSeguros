<?php
ini_set("display_errors", "0");
  error_reporting(E_ALL);
?>
    </div>
    </main>
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<script language="javascript">
      $gmx(document).ready(function() {
	$('[data-toggle="popover"]').popover();
	$('[data-toggle="tooltip"]').tooltip();
	 });
    </script>
</body>
</html>
<?php

include ("detecta_so_n_v.php");
require_once ("funciones.php");
$id_grupo     = (!$id_grupo?0:$id_grupo);
$id_coordinador = (!$_SESSION["id_coordinadores"]?0:$_SESSION["id_coordinadores"]);

function dameURL(){
$url="http://".$_SERVER['HTTP_HOST'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];
return $url;
}

$url = dameURL();
$info= detect();
$ip = $_SERVER['REMOTE_ADDR'];


//if($link)
insert ("monitoreo_coordinadores", "id_grupo, id_coordinador, url, explorador, ip, fecha_registro", "$id_grupo, $id_coordinador, '$url', '$info', '$ip', now()");

?>
