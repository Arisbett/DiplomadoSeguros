<?php
ini_set("display_errors", "0");

function crear_conexioni(){



$SERVIDOR =  "localhost";
$NOMBREDB = "dip_seguros";
$USUARIODB = "root";
$PSWDDB = "";





/* -- Conexi�n db -- */
/*$link = mysql_connect($SERVIDOR,$USUARIODB,$PSWDDB) or	die("error no se pudo conectar a al servidor");
$db = mysql_select_db($NOMBREDB,$link) or	die("error al seleccionar la db");*/

$link = mysqli_connect($SERVIDOR, $USUARIODB, $PSWDDB, $NOMBREDB);

//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
//mysqli_query($link,"SET NAMES 'utf8'");
if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		//printf("No se puede conetar");
		exit();
}
return $link;
}
/* -- -- -- -- -- -- */


 



?>
