<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m35" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidoI=$con->query("SELECT contenido FROM contenido where id_capitulo=7 and id_titulo=5");
$contenidoI->execute();
$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
$contador=0;
foreach($resultado AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m35" data-slide-to="'.$contador.'" class="active"></li>
       ';
  $contador++;    }

      ?>
       </ol>
	   <br><br><br>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <!--<div class="item active"><img src="image/m1/M1_pantalla_3.jpg" data-color="violet" alt="SALUD"></div>-->
		
        <?php 
$contenidoI=$con->query("SELECT id_contenido, contenido FROM contenido where id_capitulo=7 and id_titulo=5");
$contenidoI->execute();
$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);


foreach($resultado AS $row){ //var_export($row);
  $id_contenido = $row["id_contenido"];
  echo $row["contenido"];
}

?>
        </div>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m35" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m35" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
           
        </div> 	<!--Termina ROW carrusel-->
        <br><br>
        <?php 
$mr1=select("*","actividad_modulo3","actividad1=1 and actividad2=1 and actividad3=1 and actividad4=1 and actividad5=1 and actividad6=1 and actividad7=1 and actividad8=1 and actividad9=1 and id_alumno=$idAl","","");
//var_export(count($mr1));
if (count($mr1) == 1) {
  echo '<center><a href="examen_m3.php" ><button type="button" id="boton_m3" class="btn btn-primary ">Evaluación</button></a></center>';
?>

<?php 
}
//$m3=select("Calificacion_Final","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m3);

$comandoEF = $con->query("SELECT idExamen, MAX(Calificacion_Final) from examen_m3 WHERE idAlumno=$idAl");
$comandoEF->execute();
$resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);

$conteo = $con->query("SELECT idExamen from examen_m3 WHERE idAlumno=$idAl");
$conteo->execute();
$conteoR = $conteo->fetchAll(PDO::FETCH_ASSOC);

//var_export(count($conteoR));

if ( $resultadoEF[0]["MAX(Calificacion_Final)"] >=70 || count($conteoR)>=3 ) {?>
  <script>
document.getElementById('boton_m3').disabled=true;
</script>
<?php } ?>