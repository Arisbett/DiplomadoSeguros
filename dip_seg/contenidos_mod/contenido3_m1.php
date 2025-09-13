<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m1_c3" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidoI2=$con->query("SELECT contenido FROM contenido where id_capitulo=3");
$contenidoI2->execute();

$resultadoI2 = $contenidoI2->fetchAll(PDO::FETCH_ASSOC);
$c2=0;
foreach($resultadoI2 AS $row){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m1_c3" data-slide-to="'.$c2.'" class="active"></li>
       ';
  $c2++;    }

      ?>
          

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php 
$contenidoc2=$con->query("SELECT contenido FROM contenido where id_capitulo=3");
$contenidoc2->execute();
$resultadoc2 = $contenidoc2->fetchAll(PDO::FETCH_ASSOC);


foreach($resultadoc2 AS $rowc2){ //var_export($rowc2);
  
  echo $rowc2["contenido"];
}

?>
         
        </div>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m1_c3" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m1_c3" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      

      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>