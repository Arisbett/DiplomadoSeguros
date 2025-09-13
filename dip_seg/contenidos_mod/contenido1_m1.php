<?php
//include("include/conexion.php");
?>
<link rel="stylesheet" type="text/css" href="././css/carrusel.css">
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-au" class="carousel slide col-md-12" data-ride="carousel" data-interval="90000">
        <!-- Indicators -->
        
        <ol class="carousel-indicators">
        
            <?php 

					$contenidoI=$con->query("SELECT id_contenido, contenido FROM contenido where id_capitulo=1 and estatus=1 ");
					$contenidoI->execute();
					$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
					$contador=0;
					foreach($resultado AS $row){ //var_export($row);

						echo '
							<li data-target="#carousel-au" data-slide-to="'.$contador.'" class="active"></li>
						';

					$contador++;    }

      ?>
        </ol>
        <br>
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <!--<div class="item active"><img src="image/m1/M1_pantalla_3.jpg" data-color="violet" alt="SALUD"></div>-->

            <?php 
					$contenidoI=$con->query("SELECT id_contenido, contenido FROM contenido where id_capitulo=1 ");
					$contenidoI->execute();
					$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
					//$id_contenidos = 1;

					foreach($resultado AS $row){ //var_export($row);
					$id_contenido = $row["id_contenido"];
					
					echo $row["contenido"];

						}

				?>
        </div>

        <br>
        <!-- Controls -->
        <a class="left carousel-control-prev-icon" href="#carousel-au" role="button" data-slide="prev">
            
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="right carousel-control-next-icon" href="#carousel-au" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            
        </a>
    </div>
    <!--Termina Slide
      <div class="col-md-1"></div>-->

   

</div>
<!--Termina ROW carrusel-->
<br><br>