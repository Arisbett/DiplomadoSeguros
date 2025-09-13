<?php
include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
ini_set("display_errors", "0");
error_reporting(E_ALL);
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];  



if($_POST){    
    $total_bien = 0;
    for($i=1;$i<=15;$i++){
        ${"r".$i} = $_POST["r".$i];
        $tmp = explode('_',${"r".$i});
        ${"id_pregunta".$i} = $tmp[0];
        ${"id_respuesta".$i} = $tmp[1];
        $cadena= ${"id_respuesta".$i};

        $camposr .= "Respuesta".$i.($i<15?",":"");
        $valoresr .= ${"id_respuesta".$i}.($i<15?",":"");

        $camposp .= "Pregunta".$i.($i<15?",":"");
        $valoresp .= ${"id_pregunta".$i}.($i<15?",":"");
         //echo '<br>'.$i.' id_pregunta:<b>'. ${"id_pregunta".$i}.'</b> respuesta:<b>'.${"id_respuesta".$i}.'</b>'.($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i}?"Bien":"Mal");
      
    }    
$query_respuestas = Conexion::conectar()->prepare("SELECT * FROM actividades_opciones WHERE id_pregunta IN ($valoresp) AND correcta='1'");
$query_respuestas->execute();
$resultado_respuestas = $query_respuestas->fetchAll(PDO::FETCH_ASSOC);

foreach($resultado_respuestas AS $row_res){ 
    $correctas[$row_res["id_pregunta"]] = $row_res["id_actividad_opciones"];
}

for($i=1;$i<=15;$i++){
    ${"r".$i} = $_POST["r".$i];
    $tmp = explode('_',${"r".$i});
    ${"id_pregunta".$i} = $tmp[0];
    ${"id_respuesta".$i} = $tmp[1];
    $cadena= ${"id_respuesta".$i};

    if($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i})
    $total_bien++;
    
} 
$calEx=60*$total_bien/15;
if ($total_bien==15) {
    echo "<div>&nbsp;</div><div>&nbsp;</div><div class=\"alert alert-info\"><b>Tienes " .$total_bien." respuestas correctas de 15 preguntas.<br></b></div>";
    echo '<a href="modulo3.php?p=1" class="btn btn-primary ">Regresar</a><br>';
 } else{
    echo "<div>&nbsp;</div><div>&nbsp;</div><div class=\"alert alert-info\"><b>Tienes " .$total_bien." respuestas correctas de 15 preguntas.<br></b></div>";
    echo '<a href="modulo3.php?p=1" class="btn btn-primary ">Regresar</a><br>';                     
}
// echo "INSERT INTO examen_m1 (idAlumno,$camposr,$camposp,Calificacion,idGeneracion) VALUES (:idAl, $valoresr,$valoresp, :cal, :idGen)";
$tot=round(($total_bien*100)/15);
// echo "INSERT INTO examen_m1 (idAlumno,$camposr,$camposp,Calificacion,idGeneracion) VALUES (:idAl, $valoresr,$valoresp, :cal, :idGen)";
$query = Conexion::conectar()->prepare("INSERT INTO examen_m3 (idAlumno,$camposr,$camposp,Calificacion_R,Calificacion_Final,idGeneracion) VALUES (:idAl, $valoresr,$valoresp, :cal,:caltot, :idGen)");
$query->bindParam(':idAl', $idAl, PDO::PARAM_STR); 
$query->bindParam(':cal', $total_bien, PDO::PARAM_STR);
$query->bindParam(':caltot', $tot, PDO::PARAM_STR);
 $query->bindParam(':idGen', $idGen, PDO::PARAM_STR);
$query->execute();

    
} 

include("include/footer.php"); ?>
