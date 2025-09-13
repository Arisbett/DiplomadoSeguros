<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carouselc5" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidom2c2=$con->query("SELECT contenido FROM contenido where id_capitulo=6 AND estatus=1");
$contenidom2c2->execute();
$resultadom2c2 = $contenidom2c2->fetchAll(PDO::FETCH_ASSOC);
$contador=0;
foreach($resultadom2c2 AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carouselc5
          " data-slide-to="'.$contador.'" class="active"></li>
       ';
  $contador++;    }

      ?>
       </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <!--<div class="item active"><img src="image/m2/M2_pantalla_64.jpg" data-color="violet" alt="SALUD"></div>-->
        <?php 
$contenidoIc6=$con->query("SELECT id_contenido, contenido FROM contenido where id_capitulo=6");
$contenidoIc6->execute();
$resultado6 = $contenidoIc6->fetchAll(PDO::FETCH_ASSOC);


foreach($resultado6 AS $row6){ //var_export($row);
  $id_contenido = $row6["id_contenido"];
  echo $row6["contenido"];
}

?>
        </div>
        <br><br><br>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carouselc5
        " role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carouselc5
        " role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      
      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>
        <?php 
$mr1=select("*","actividad_modulo2","actividad1=1 and actividad2=1 and actividad3=1 and actividad4=1 and actividad5=1 and id_alumno=$idAl","","");
//var_export(count($mr1));
if (count($mr1) == 1) {
  echo '<center><a href="examen_m2.php" ><button type="button" id="boton_m2" class="btn btn-primary ">Evaluación</button></a></center>';
?>

<?php 
}
//$m3=select("Calificacion_Final","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m3);

$comandoEF = $con->query("SELECT idExamen, MAX(Calificacion_Final) from examen_m2 WHERE idAlumno=$idAl");
$comandoEF->execute();
$resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);

$conteo = $con->query("SELECT idExamen from examen_m2 WHERE idAlumno=$idAl");
$conteo->execute();
$conteoR = $conteo->fetchAll(PDO::FETCH_ASSOC);

//var_export(count($conteoR));

if ( $resultadoEF[0]["MAX(Calificacion_Final)"] >=70 || count($conteoR)>=3 ) {?>
  <script>
document.getElementById('boton_m2').disabled=true;
</script>
<?php } ?>