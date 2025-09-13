<?php
require ('funciones.php');
$estadoG = $_POST['id_estado'];
$grupo=select("a.id_grupo, a.nombre, b.*","grupo a, relacion_grupo_estado b","a.id_grupo=b.id_grupo and b.id_estado=$estadoG and a.estatus=1", "");

$html = "<option>Selecciona una opción ... </option>";
foreach ($grupo AS $rowM) {
    echo "<option value='$rowM[id_grupo]'>".$rowM['nombre']."</option>";
}
?>