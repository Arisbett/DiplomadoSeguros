<?php
/*include ("funciones.php");
session_start();*/
$cierrem=$_SESSION["fin_ds"];

$termino = explode('-',$cierrem);

$lim = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$termino[1],$termino[2],$termino[0]);
//echo $lim;
if ($lim >=0) {
    header("Location: index.php");
}
?>