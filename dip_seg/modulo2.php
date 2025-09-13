<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  
$m=1;
session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
?>

        <p>&nbsp;</p>
<br><br>
<?php include("include/menu-modulo.php");
 
 $mod1=$con->query("SELECT modulo, objetivo FROM modulo  WHERE id_modulo=2");
 $mod1->execute();
 $r = $mod1->fetchAll(PDO::FETCH_ASSOC);
 $p =$_GET["p"];
 
 foreach($r AS $rm1){ //var_export($rowc4);

?> 
<h3><?php echo $rm1["modulo"];?></h3>
<div class="row">
    <div class="col-md-12 ">
    <?php echo $rm1["objetivo"];?>
    </div>
</div>
<?php } ?>
        <div class="row">
            <div class="col-md-12 ">
            
                <ul class="nav nav-tabs">
                <?php 
 
 $mod1t=$con->query("SELECT capitulo FROM capitulo WHERE id_modulo=2");
 $mod1t->execute();
 $rt = $mod1t->fetchAll(PDO::FETCH_ASSOC);
 
 $ct=1;
 foreach($rt AS $rm1t){ //var_export($rowc4);

?> 
                    <li ><a data-toggle="tab" href="#tab-0<?php echo $ct; ?>"><?php echo $rm1t["capitulo"]; ?></a></li>
                   

                    <?php $ct++; }?>
                </ul>

               
                <div class="tab-content">
                <div class="tab-pane <?=($p==1?"active in":"")?>" id="tab-01">
                    <!------>
                    <?php include("contenidos_mod/contenido1_m2.php");?>
                </div>
                <div class="tab-pane <?=($p==2?"active in":"")?>" id="tab-02">
                    <!------>
                    <?php include("contenidos_mod/contenido2_m2.php");?>
                   <!-- <center><button class="btn btn-primary btn-lg active" type="button">Actividad 2</button></center>
                    ---->  
                </div>
                
                
            
            </div>
           
        </div>
       <?php
     /*$comandoEF = $con->query("SELECT idExamen, Calificacion_Final from examen_m2 WHERE idAlumno=$idAl");
    $comandoEF->execute();
    $resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);
    $cal=$resultadoEF[0]["Calificacion_Final"];
   
    if (count($resultadoEF)<4 && $cal <=69)  {
        echo '<center><a href="examen_m2.php" class="btn btn-primary ">EVALUACIÓN</a></center>'; 
        
    }*/

    ?>
<br><br>
        <!--<div class="row bottom-buffer">
            <div class="col-md-12 ">
            <center><br><button class="btn btn-primary btn-lg active" type="button">Evaluación del Módulo 1</button></center>
            </div>
        </div>-->
<?php include("include/footer.php");?>           