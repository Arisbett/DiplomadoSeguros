<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m3_3" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidom3c1=$con->query("SELECT contenido FROM contenido where id_capitulo=7 AND estatus=1 AND id_titulo=3");
$contenidom3c1->execute();
$resultadom3c1 = $contenidom3c1->fetchAll(PDO::FETCH_ASSOC);
$contador=0;
foreach($resultadom3c1 AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m3_3" data-slide-to="'.$contador.'" class="active"></li>
       ';
  $contador++;    }

      ?>
       </ol>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <!--<div class="item active"><img src="image/m1/M1_pantalla_3.jpg" data-color="violet" alt="SALUD"></div>-->
        <?php 
$contenidoIm3=$con->query("SELECT id_contenido, contenido FROM contenido where id_capitulo=7 AND estatus=1 AND id_titulo=3");
$contenidoIm3->execute();
$resultado = $contenidoIm3->fetchAll(PDO::FETCH_ASSOC);


foreach($resultado AS $row){ //var_export($row);
  $id_contenido = $row["id_contenido"];
  echo $row["contenido"];
}

?>
        </div>
        <br><br>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m3_3" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m3_3" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      
      <?php


?>
      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>