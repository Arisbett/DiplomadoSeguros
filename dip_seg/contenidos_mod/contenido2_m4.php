<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m4_c9" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        <ol class="carousel-indicators">
        <?php 

$contenidoIm4=$con->query("SELECT contenido FROM contenido where id_capitulo=9");
$contenidoIm4->execute();

$resultadoIm4 = $contenidoIm4->fetchAll(PDO::FETCH_ASSOC);
$c4=0;
foreach($resultadoIm4 AS $rowm4){ //var_export($row);

  //echo $row["contenido"];


       echo '
          <li data-target="#carousel-m4_c9" data-slide-to="'.$c4.'" class="active"></li>
       ';
  $c4++;    }

      ?>
          

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
        <?php 
$contenidocm4=$con->query("SELECT contenido FROM contenido where id_capitulo=9");
$contenidocm4->execute();
$resultadocm4 = $contenidocm4->fetchAll(PDO::FETCH_ASSOC);


foreach($resultadocm4 AS $rowcm4){ //var_export($rowc4);
  
  echo $rowcm4["contenido"];
}

?>
         
        </div> <br><br><br>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-m4_c9" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-m4_c9" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      

      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>