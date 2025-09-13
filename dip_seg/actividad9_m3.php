<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  

$actividad3=select('a.nombre ','actividades a','a.id_actividad=20 ','','');

foreach ($actividad3 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<h3>".$var["nombre"]."</h3> <br>  <p>Instrucciones: Relacione las columnas, escribiendo en el recuadro, el número que considere se apega a la descripción de cada definición.</p>";
        
    }
}

$respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_actividad=20');
$contador=1;
?>
 <form role="form" name="actividad9">
<div class="container">
    <div class="col-md-4">
    <?php foreach($respuesta as $row){ ?>
       <p> <?php echo $contador.') '.$row["opcion"]; ?></p>


        <?php $contador++; } ?>
    </div>

    <div class="col-md-6">
            <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=103');
                foreach($pregunta as $row){
            ?>
            <div class="col-md-2" id="r1_evalua"></div>
        <div class="pregunta<?php echo $contador; ?>">
        
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r1" class="form-text"></span><input class="form-control" id="r1" name="r1" placeholder="*" type="text" > <div id="err_asterisco_r1"></div>
        </div>

        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=104');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r2_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r2" class="form-text"><input class="form-control" id="r2" name="r2" placeholder="*" type="text"><div id="err_asterisco_r2"></div>
        </div>

        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=105');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r3_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r3" class="form-text"><input class="form-control" id="r3" name="r3" placeholder="*" type="text"><div id="err_asterisco_r3"></div>
        </div>

        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=106');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r4_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r4" class="form-text"><input class="form-control" id="r4" name="r4" placeholder="*" type="text"><div id="err_asterisco_r4"></div>
        </div>

        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=107');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r5_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r5" class="form-text"><input class="form-control" id="r5" name="r5" placeholder="*" type="text"><div id="err_asterisco_r5"></div>
        </div>


        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=108');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r6_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r6" class="form-text"><input class="form-control" id="r6" name="r6" placeholder="*" type="text"><div id="err_asterisco_r6"></div>
        </div>

        <?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=109');
                foreach($pregunta as $row){
            ?>
        <div class="pregunta<?php echo $contador; ?>">
        <div class="col-md-2" id="r7_evalua"></div>
            <p> <b> <?php echo $row["pregunta"]; }?></b></p>
            <span id="asterisco_r7" class="form-text"><input class="form-control" id="r7" name="r7" placeholder="*" type="text"><div id="err_asterisco_r7"></div>
        </div>


       <br><br><br>
    

    <p class="pull-left">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='modulo4.php?p=1'">Regresar</button>
        <button class="btn btn-primary" type="button" onClick="return fenvia();" id="valida">Validar</button>
    </p>
</div>
</form>
<div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
<script>
function fenvia() {

error_msg = 0;
form = document.actividad9;



for (i = 1; i <= 7; i++) {
    if (document.getElementById("r" + i).value == "") {
        campo_error("r" + i, 1, "");
        texto_error("asterisco_r" + i, 1, "");
        error_msg = 1;
    } else {
        campo_error("r" + i, 2, "msg");
        texto_error("asterisco_r" + i, 2, "msg");
    }
}

if (error_msg == 1) {
    document.getElementById("msg").style.visibility = "visible";
    document.getElementById("msg").innerHTML =
        "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
    //document.getElementById("r1").focus();
    return false;
}

form.action = "actividad9_m3.php";
form.method = "post";
form.submit();
}


function campo_error(element, tipo, msg) {

if (tipo == 1) {
    document.getElementById(element).className = "form-control form-control-error";
    //document.getElementById(element).focus();
} else {
    document.getElementById(element).className = "form-control";
}
}

function texto_error(element, tipo, msg) { //alert(element+"*"+tipo+"*"+msg)

if (tipo == 1) {
    //document.getElementById(msg).style.visibility ="visible";
    document.getElementById(element).className = "form-text form-text-error";
    document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
} else {
    document.getElementById(element).className = "";
    //document.getElementById(msg).style.visibility ="hidden";
    document.getElementById("err_" + element).innerHTML = '';
}
}
</script>



<?php 


if ($_POST) { 
    $r1=$_POST["r1"];
    $r2=$_POST["r2"];
    $r3=$_POST["r3"];
    $r4=$_POST["r4"];
    $r5=$_POST["r5"];
    $r6=$_POST["r6"];
    $r7=$_POST["r7"];
    
    

     if ($r1 == '3') {
     echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";

 }else{
     echo "<script> document.getElementById('r1_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";

                     
 }if ($r2 == '7') {
     echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";

 }else{
     echo "<script> document.getElementById('r2_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";          
 }

 if ($r3 == '1') {
     echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";

 }else{
     echo "<script> document.getElementById('r3_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";               
 }

 if ($r4 == '4') {
     echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";

 }else{
     echo "<script> document.getElementById('r4_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";                
 }
 if ($r5 == '5') {
     echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";

 }else{
     echo "<script> document.getElementById('r5_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";                  
 }
 if ($r6 == '2') {
     echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";
 }else{
     echo "<script> document.getElementById('r6_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";                  
 }
 if ($r7 == '6') {
    echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/palomita.png\" width=\"30\"  /></div>';</script>";
}else{
    echo "<script> document.getElementById('r7_evalua').innerHTML ='<div class=\"alert alert-success\"><img src=\"image/imag/tache.png\" width=\"30\"  /></div>';</script>";                  
}

$idAl=$_SESSION["idAlumno"];
            $idGen=$_SESSION["id_generacion"];
           
            $mr1=select("id_alumno","actividad_modulo3","id_alumno=$idAl","","");
           
            if (count($mr1)>=1) {
                update("actividad_modulo3","actividad9=1 ","actividad_modulo3.id_alumno = $idAl AND actividad_modulo3.id_generacion = $idGen","");
            }else{
            insert("actividad_modulo3","id_alumno, actividad9, id_generacion","'$idAl', '1', '$idGen'");
            }  
 
 
}


include("include/footer.php");?>