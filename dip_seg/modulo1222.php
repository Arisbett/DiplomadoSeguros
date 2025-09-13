<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  

session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
?>

<p>&nbsp;</p>
<br><br>
<?php include("include/menu-modulo.php");
 $modulo1=select("modulo, objetivo","modulo", "id_modulo=1","");
 /*$mod1=$con->query("SELECT modulo, objetivo FROM modulo  WHERE id_modulo=1");
 $mod1->execute();
 $r = $mod1->fetchAll(PDO::FETCH_ASSOC);*/
 $p =$_GET["p"];
 
 foreach($modulo1 AS $rm1){ //var_export($rowc4);

?>
<h3><?php echo $rm1["modulo"];?></h3>
<div class="row">
    <div class="col-md-12 ">
        <?php echo $rm1["objetivo"];?>
    </div>
</div>
<?php } 
function active($currect_page){
    $url_array =  explode('/', $_SERVER['REQUEST_URI']) ;
    $url = end($url_array);  
    if($currect_page == $url){
        echo 'active'; //class name in css 
    } 
  }
?>
<div class="row">
    <div class="col-md-12 ">

        <ul class="nav nav-tabs">
            <?php  $capitulo1=select("capitulo","capitulo", "id_modulo=1 and id_capitulo=1","");
 
 $ct=1;
 foreach($capitulo1 AS $rm1t){ 

?>
            <li ><a data-toggle="tab" class="<?php active('modulo1222.php?p=1');?>"  href="#tab-01"><?php echo $rm1t["capitulo"]; ?></a></li>


            <?php $ct++; }?>
        </ul>

        <div class="tab-content" >
            <div class="tab-pane <?=($p==1?"active in":"")?> " id="tab-01" >
                <!------>
                <?php include("contenidos_mod/contenido1_m1.php");?>
            </div>
            <div class="tab-pane <?=($p==2?"active in":"")?>" id="tab-02"  >
                <!------>
                <?php include("contenidos_mod/contenido2_m1.php");?>
                <!-- <center><button class="btn btn-primary btn-lg active" type="button">Actividad 2</button></center>
                    ---->
            </div>
            <div class="tab-pane <?=($p==3?"active in":"")?>" id="tab-03">
                <!------>
                <?php include("contenidos_mod/contenido3_m1.php");?>
                <!------>
            </div>
            <div class="tab-pane <?=($p==4?"active in":"")?>" id="tab-04">
                <!------>
                <?php include("contenidos_mod/contenido4_m1.php");?>
                <!------>
            </div>
        </div>

    </div>

    <?php
    $comandoEF = $con->query("SELECT idExamen, Calificacion_Final from examen_m1 WHERE idAlumno=$idAl");
    $comandoEF->execute();
    $resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);
    $cal=$resultadoEF[0]["Calificacion_Final"];
   
    if (count($resultadoEF)<4 && $cal <=69)  {
        echo '<center><a href="examen_m1.php" class="btn btn-primary ">EVALUACIÓN</a></center>'; 
        
    }

    ?>
    
<!--<center><a href="examen_m1.php"><button type="button" class="btn btn-primary">Evaluación</button></a></center>-->
<br><br>

</div>
<!--<div class="row bottom-buffer">
            <div class="col-md-12 ">
            <center><br><button class="btn btn-primary btn-lg active" type="button">Evaluación del Módulo 1</button></center>
            </div>
        </div>-->
<?php include("include/footer.php");?>