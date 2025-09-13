<?php
ini_set("display_errors", "0");
error_reporting(E_ALL);
require ("include/conexion.php");
$db = new Conexion();
$con = $db->conectar();
session_start();

$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
$descarga=1;

if ($idAl>0) {

$comando = $con->query("SELECT * FROM descarga WHERE idAlumno=$idAl AND idGeneracion=$idGen ");
$comando->execute();
$resultado = $comando->fetchAll(PDO::FETCH_ASSOC); 

if(!$resultado){
$query=Conexion::conectar()->prepare("INSERT INTO descarga(idAlumno, idGeneracion, descarga, fecha_registro)
 VALUES(:idAlumno, :idGen, :descarga, current_timestamp)");
$query->bindParam(':idAlumno', $idAl, PDO::PARAM_STR);
$query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
$query->bindParam(':descarga', $descarga, PDO::PARAM_STR);
$query->execute();
//var_dump($query);
}
echo '';
}


?>