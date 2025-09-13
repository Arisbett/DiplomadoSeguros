<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m1_4" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <?php 

$contenidoI4=$con->query("SELECT contenido FROM contenido where id_capitulo=4");
$contenidoI4->execute();

$resultadoI4 = $contenidoI4->fetchAll(PDO::FETCH_ASSOC);
$c4=0;
foreach($resultadoI4 AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m1_4" data-slide-to="'.$c4.'" class="active"></li>
       ';
  $c4++;    }

      ?>


        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php 
$contenidoc2=$con->query("SELECT contenido FROM contenido where id_capitulo=4");
$contenidoc2->execute();
$resultadoc2 = $contenidoc2->fetchAll(PDO::FETCH_ASSOC);


foreach($resultadoc2 AS $rowc2){ //var_export($rowc2);
  
  echo $rowc2["contenido"];
}

?>

        </div>
        <br><br><br>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m1_4" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m1_4" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--Termina Slide
      <div class="col-md-1"></div>-->



</div>
<!--Termina ROW carrusel-->
<br><br>
<?php 
$mr1=select("*","actividad_modulo1","actividad1=1 and actividad2=1 and actividad3=1 and actividad4=1 and id_alumno=$idAl","","");
//var_export(count($mr1));
if (count($mr1) == 1) {
  echo '<center><a href="examen_m1.php" ><button type="button" id="boton_m1" class="btn btn-primary ">Evaluación</button></a></center>';
?>

<?php 
}
//$m3=select("Calificacion_Final","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m3);

$comandoEF = $con->query("SELECT idExamen, MAX(Calificacion_Final) from examen_m1 WHERE idAlumno=$idAl");
$comandoEF->execute();
$resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);

$conteo = $con->query("SELECT idExamen from examen_m1 WHERE idAlumno=$idAl");
$conteo->execute();
$conteoR = $conteo->fetchAll(PDO::FETCH_ASSOC);

//var_export(count($conteoR));

if ( $resultadoEF[0]["MAX(Calificacion_Final)"] >=70 || count($conteoR)>=3 ) {?>
  <script>
document.getElementById('boton_m1').disabled=true;
</script>
<?php } ?>
              