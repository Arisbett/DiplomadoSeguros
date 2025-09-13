<?php
ini_set("display_errors", "0");
$correo=$_POST["c"];
require_once ("include/conexion.php");
$verifica = Conexion::conectar()->prepare("SELECT COUNT(idAlumno) AS Total FROM `alumno` WHERE correo=:correo");
$verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
$verifica->execute();

$row = $verifica->fetch();
$total=$row['Total'];
$total ='<input type="text" name="idv" value="'.$total.'">';
echo $total;

?>
