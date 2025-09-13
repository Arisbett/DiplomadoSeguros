<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m1_c4" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidoI4=$con->query("SELECT contenido FROM contenido where id_titulo=4 and id_capitulo=7");
$contenidoI4->execute();

$resultadoI4 = $contenidoI4->fetchAll(PDO::FETCH_ASSOC);
$c4=0;
foreach($resultadoI4 AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m1_c4" data-slide-to="'.$c4.'" class="active"></li>
       ';
  $c4++;    }

      ?>
          

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php 
$contenidoc4=$con->query("SELECT contenido FROM contenido where id_titulo=4 and id_capitulo=7");
$contenidoc4->execute();
$resultadoc4 = $contenidoc4->fetchAll(PDO::FETCH_ASSOC);


foreach($resultadoc4 AS $rowc4){ //var_export($rowc4);
  
  echo $rowc4["contenido"];
}

?>
         
        </div>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m1_c4" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m1_c4" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      

      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>