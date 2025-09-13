<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  
$actividad1=select('a.nombre ','actividades a',
'a.id_actividad=16','','');

foreach ($actividad1 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<h3>".$var["nombre"]."</h3> <br>  <p>Instrucciones: En las frases siguientes elige si se trata de verdadero o falso:</p>";
        
    }
}
?>

            <!--Inicia Container-->


            <form role="form" name="actividad4">
                <div class="form-group pregunta1">
                    <?php
                             $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=77');
                             foreach($pregunta as $row){ ?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r1" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=77');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r1" id="r1_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r1"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r1_evalua"></div>
                        <div id="err_asterisco_r1"></div>

                    </div>
                </div>

                <div class="form-group pregunta2">
                    <?php
                             $pregunta2=select('pregunta','actividades_preguntas','id_actividad_preguntas=78');
                             foreach($pregunta2 as $row2){ ?>
                    <label><?php echo $row2 ['pregunta']?><span id="asterisco_r2" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=78');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r2" id="r2_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r2"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r2_evalua"></div>
                        <div id="err_asterisco_r2"></div>

                    </div>
                </div>


                <div class="form-group pregunta3">
                    <?php
                             $pregunta3=select('pregunta','actividades_preguntas','id_actividad_preguntas=79');
                             foreach($pregunta3 as $row3){ ?>
                    <label><?php echo $row3 ['pregunta']?><span id="asterisco_r3" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=79');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r3" id="r3_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r3"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r3_evalua"></div>
                        <div id="err_asterisco_r3"></div>

                    </div>
                </div>

                <div class="form-group pregunta4">
                    <?php
                             $pregunta4=select('pregunta','actividades_preguntas','id_actividad_preguntas=80');
                             foreach($pregunta4 as $row4){ ?>
                    <label><?php echo $row4 ['pregunta']?><span id="asterisco_r4" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=80');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r4" id="r4_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r4"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r4_evalua"></div>
                        <div id="err_asterisco_r4"></div>

                    </div>
                </div>

                <div class="form-group pregunta5">
                    <?php
                             $pregunta5=select('pregunta','actividades_preguntas','id_actividad_preguntas=81');
                             foreach($pregunta5 as $row5){ ?>
                    <label><?php echo $row5 ['pregunta']?><span id="asterisco_r5" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=81');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r5" id="r5_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r5"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r5_evalua"></div>
                        <div id="err_asterisco_r5"></div>

                    </div>
                </div>


                    <div>&nbsp;</div>
                    
                    <br>
                    <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <p class="pull-right">

                                <button class="btn btn-default" type="button"
                                    onClick="document.location.href='modulo3.php?p=2'">Regresar</button>
                                <button class="btn btn-primary" type="button" onClick="return fenvia()"
                                    id="valida">Validar</button>
                            </p>
                        </div>
                    </div>

                    <div>&nbsp;</div>

            </form>
            <script language="javascript">
            function fenvia() {

                form = document.actividad4;
                var error_msg = 0;

                if (!document.getElementById('r1_0').checked && !document.getElementById('r1_1').checked ) {
                    texto_error("asterisco_r1", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r1", 2, "msg");
                }

                if (!document.getElementById('r2_0').checked && !document.getElementById('r2_1').checked ) {
                    texto_error("asterisco_r2", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r2", 2, "msg");
                }

                if (!document.getElementById('r3_0').checked && !document.getElementById('r3_1').checked) {
                    texto_error("asterisco_r3", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r3", 2, "msg");
                }

                if (!document.getElementById('r4_0').checked && !document.getElementById('r4_1').checked) {
                    texto_error("asterisco_r4", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r4", 2, "msg");
                }

                if (!document.getElementById('r5_0').checked && !document.getElementById('r5_1').checked) {
                    texto_error("asterisco_r5", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r5", 2, "msg");
                }

                if (error_msg == 1) {
                    document.getElementById("msg").style.visibility = "visible";
                    document.getElementById("msg").innerHTML =
                        "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
                    return false;
                }

                form.action = "actividad5_m3.php";
                form.method = "post";
                form.submit();
            }

            function campo_error(element, tipo, msg) {

                if (tipo == 1) {
                    document.getElementById(element).className = "form-control form-control-error";
                    document.getElementById(element).focus();
                } else {
                    document.getElementById(element).className = "form-control";
                }
            }

            function texto_error(element, tipo, msg) {

                if (tipo == 1) {
                    //document.getElementById(msg).style.visibility ="visible";
                    //document.getElementById(element).className="form-text form-text-error";
                    document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
                } else {
                    //document.getElementById(element).className="";
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
               $c =0;
               $i=0;
                if ($r1 == 121) {
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_1 =1;
            }else{
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_1 = 0;                    
            }if ($r2 == 123) {
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_2 =1;
            }else{
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_2 = 0;                    
            }

            if ($r3 == 126) {
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_3 =1;
            }else{
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_3 = 0;                    
            }

            if ($r4 == 127) {
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_4 =1;
            }else{
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_4 = 0;                    
            }
            if ($r5 == 130) {
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_5 =1;
            }else{
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_5 = 0;                    
            }

            $idAl=$_SESSION["idAlumno"];
            $idGen=$_SESSION["id_generacion"];
           
            $mr1=select("id_alumno","actividad_modulo3","id_alumno=$idAl","","");
           
            if (count($mr1)>=1) {
                update("actividad_modulo3","actividad5=1 ","actividad_modulo3.id_alumno = $idAl AND actividad_modulo3.id_generacion = $idGen","");
            }else{
            insert("actividad_modulo3","id_alumno, actividad5, id_generacion","'$idAl', '1', '$idGen'");
            }   
        }?>
<?php
include("include/footer.php");?>