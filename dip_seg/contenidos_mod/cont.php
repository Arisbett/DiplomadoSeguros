<?php
include("../include/conexion.php");
include("../include/header.php");
?>
<style>
    /*Modificaciones Carrusel*/
.carousel-indicators
			{
				bottom: -50px;
				z-index: 0;
			}
			.carousel-indicators li
			{
				display: inline-block;
				width: 10px;
				height: 10px;
				margin: 1px;
				text-indent: -999px;
				cursor: pointer;
				background-color: #911639;
				background-color: rgba(0,0,0,0);
				border: 1px solid #911639;
				border-radius: 50%;
			}
			.carousel-indicators .active
			{
				width: 15px;
				height: 15px;
				margin: 0;
				background-color: #911639;
			}
			.carousel-caption
			{
				position: absolute;
				right: 0;
				bottom: 0;
				left: 0;
				z-index: 10;
				padding-top: 5px;
				padding-bottom: 5px;
				color: #fff;
				text-align: center;
				background: rgba(0,0,0,0.4);
			}
</style>
<div class="row">
    <!--<div class="col-md-1"></div>-->
    <div id="carousel-m1_2" class="carousel slide col-md-12" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
		<?php 

$contenidoI=$con->query("SELECT id_contenido,contenido FROM contenido2 where id_capitulo=1 ");
$contenidoI->execute();
$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
$contador=1;
foreach($resultado AS $row){ //var_export($row);

	echo '
		<li data-target="#carousel-au" data-slide-to="'.$contador.'" class="active"></li>
	';

$contador++;    }

?>
          

        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" >
		<div class="item active"><center>
        <iframe width="840" height="680" src="../image/video/Modulo1.mp4"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>  
        </div>
		<?php 
					$contenidoI=$con->query("SELECT id_contenido,contenido FROM contenido2 where id_capitulo=1 and estatus=1");
					$contenidoI->execute();
					$resultado = $contenidoI->fetchAll(PDO::FETCH_ASSOC);
					//$id_contenidos = 1;

					foreach($resultado AS $row){ //var_export($row["contenido"]);
					$id_contenido = $row["id_contenido"];
					var_export($id_contenido);
					
					if ($row["actividad"]==1 ) {
						echo '<div class="item "><img src="../'.$row["contenido"].'" data-color="violet" alt="DIPLOMADO"></div>';
						echo '<a href="actividad1.php"><button type="button" class="btn btn-primary">Actividad</button></a>'; 
						
					}else{ echo '';}
					}
					
					?>


        </div>
		<?php 
		
					?>
        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-m1_2" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#carousel-m1_2" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!--Termina Slide
      <div class="col-md-1"></div>-->
      

      
        </div> 	<!--Termina ROW carrusel-->
        <br><br>

	<?php
	
	include("../include/footer.php");?>