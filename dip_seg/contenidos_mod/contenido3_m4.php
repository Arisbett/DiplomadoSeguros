<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m4_c10" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidoIm4=$con->query("SELECT contenido FROM contenido where id_capitulo=10 and estatus=1");
$contenidoIm4->execute();

$resultadoIm4 = $contenidoIm4->fetchAll(PDO::FETCH_ASSOC);
$c4=0;
foreach($resultadoIm4 AS $rowm4){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m4_c10" data-slide-to="'.$c4.'" class="active"></li>
       ';
  $c4++;    }

      ?>
          

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

        <?php 
$contenidocm4=$con->query("SELECT contenido FROM contenido where id_capitulo=10 and estatus=1");
$contenidocm4->execute();
$resultadocm4 = $contenidocm4->fetchAll(PDO::FETCH_ASSOC);


foreach($resultadocm4 AS $rowcm4){ //var_export($rowc4);
  
  echo $rowcm4["contenido"];
}

?>
         
        </div>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m4_c10" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m4_c10" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->

        </div> 	<!--Termina ROW carrusel-->
        <br><br> 
        <?php 
$mr1=select("*","actividad_modulo4","actividad1=1 and actividad2=1 and actividad3=1 and id_alumno=$idAl","","");
//var_export(count($mr1));
if (count($mr1) == 1) {
  echo '<center><a href="examen_m4.php" ><button type="button" id="boton_m4" class="btn btn-primary ">Evaluación</button></a></center>';
?>

<?php 
}
//$m4=select("Calificacion_Final","examen_m4","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m4);

$comandoEF = $con->query("SELECT idExamen, MAX(Calificacion_Final) from examen_m4 WHERE idAlumno=$idAl");
$comandoEF->execute();
$resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);

$conteo = $con->query("SELECT idExamen from examen_m4 WHERE idAlumno=$idAl");
$conteo->execute();
$conteoR = $conteo->fetchAll(PDO::FETCH_ASSOC);

//var_export(count($conteoR));

if ( $resultadoEF[0]["MAX(Calificacion_Final)"] >=70 || count($conteoR)>=3 ) {?>
  <script>
document.getElementById('boton_m4').disabled=true;
</script>
<?php } ?>