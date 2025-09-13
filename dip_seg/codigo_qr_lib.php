<?php 

require "codigo_qr/qrlib.php";

function genera_imagen_qr($id_alumno,$id_generacion){
//Declaramos una carpeta temporal para guardar la imagenes generadas
$dir = 'img_qr/';

//Si no existe la carpeta la creamos
if (!file_exists($dir))
    mkdir($dir);

//Declaramos la ruta y nombre del archivo a generar
$filename = $dir.'qr_verifica_'.$id_generacion.'_'.$id_alumno.'.png';

//Parametros de Condiguración

$tamaño = 3; //Tamaño de Pixel
$level = 'M'; //Precisión Baja
$framSize = 1; //Tamaño en blanco
$contenido = "qr_verififica.php?ida=$id_alumno&idg=$id_generacion";
//"https://phpapps.condusef.gob.mx/soldiploma/verifica_certificado.php?ida=$id_alumno&idg=$id_generacion"; //Texto

if (!file_exists($filename)){
//Enviamos los parametros a la Función para generar código QR
QRcode::png($contenido, $filename, $level, $tamaño, $framSize);
}

//Mostramos la imagen generada
//echo '<img src="'.$dir.basename($filename).'" />';
return $filename;
}

//echo '<img src="img_qr/'.basename(genera_imagen_qr(1,42)).'" />';
//echo '>'.basename(genera_imagen_qr(1,42));
?>