<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  
$actividad1=select('a.nombre ','actividades a',
'a.id_actividad=17 ','','');

foreach ($actividad1 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<h3>".$var["nombre"]."</h3> <br>  <p>Instrucciones:Selecciona la respuesta correcta</p>";
        
    }
}
?>

            <!--Inicia Container-->


            <form role="form" name="actividad4">
                <div class="form-group pregunta1">
                    <?php
                             $pregunta=select('pregunta','actividades_preguntas','id_actividad_preguntas=82');
                             foreach($pregunta as $row){ ?>
                    <label><?php echo $row ['pregunta']?><span id="asterisco_r1" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=82','id_actividad_opciones ASC');?>
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
                             $pregunta2=select('pregunta','actividades_preguntas','id_actividad_preguntas=83');
                             foreach($pregunta2 as $row2){ ?>
                    <label><?php echo $row2 ['pregunta']?><span id="asterisco_r2" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=83','id_actividad_opciones ASC');?>
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
                             $pregunta3=select('pregunta','actividades_preguntas','id_actividad_preguntas=84');
                             foreach($pregunta3 as $row3){ ?>
                    <label><?php echo $row3 ['pregunta']?><span id="asterisco_r3" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=84','id_actividad_opciones ASC');?>
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
                             $pregunta4=select('pregunta','actividades_preguntas','id_actividad_preguntas=85');
                             foreach($pregunta4 as $row4){ ?>
                    <label><?php echo $row4 ['pregunta']?><span id="asterisco_r4" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=85','id_actividad_opciones ASC');?>
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
                             $pregunta5=select('pregunta','actividades_preguntas','id_actividad_preguntas=86');
                             foreach($pregunta5 as $row5){ ?>
                    <label><?php echo $row5 ['pregunta']?><span id="asterisco_r5" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=86','id_actividad_opciones ASC');?>
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


                <div class="form-group pregunta6">
                    <?php
                             $pregunta5=select('pregunta','actividades_preguntas','id_actividad_preguntas=87');
                             foreach($pregunta5 as $row6){ ?>
                    <label><?php echo $row6 ['pregunta']?><span id="asterisco_r6" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=87','id_actividad_opciones ASC');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r6" id="r6_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r6"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r6_evalua"></div>
                        <div id="err_asterisco_r6"></div>

                    </div>
                </div>

                <div class="form-group pregunta7">
                    <?php
                             $pregunta5=select('pregunta','actividades_preguntas','id_actividad_preguntas=88');
                             foreach($pregunta5 as $row7){ ?>
                    <label><?php echo $row7 ['pregunta']?><span id="asterisco_r7" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=88','id_actividad_opciones ASC');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r7" id="r7_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r7"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r7_evalua"></div>
                        <div id="err_asterisco_r7"></div>

                    </div>
                </div>


                <div class="form-group pregunta8">
                    <?php
                             $pregunta8=select('pregunta','actividades_preguntas','id_actividad_preguntas=89');
                             foreach($pregunta8 as $row8){ ?>
                    <label><?php echo $row8 ['pregunta']?><span id="asterisco_r8" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=89','id_actividad_opciones ASC');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r8" id="r8_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r8"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r8_evalua"></div>
                        <div id="err_asterisco_r8"></div>

                    </div>
                </div>


                <div class="form-group pregunta9">
                    <?php
                             $pregunta9=select('pregunta','actividades_preguntas','id_actividad_preguntas=90');
                             foreach($pregunta9 as $row9){ ?>
                    <label><?php echo $row9 ['pregunta']?><span id="asterisco_r9" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=90','id_actividad_opciones ASC');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r9" id="r9_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r9"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r9_evalua"></div>
                        <div id="err_asterisco_r9"></div>

                    </div>
                </div>



                <div class="form-group pregunta10">
                    <?php
                             $pregunta10=select('pregunta','actividades_preguntas','id_actividad_preguntas=91');
                             foreach($pregunta10 as $row10){ ?>
                    <label><?php echo $row10 ['pregunta']?><span id="asterisco_r10" class="form-text">*</span>:</label>
                    <?php } ?>

                    <div class="checkbox">
                        <label class="radio-inline">
                            <?php
                               $respuesta=select('opcion, id_actividad_opciones','actividades_opciones','id_pregunta=91','id_actividad_opciones ASC');?>
                            <?php   $i=0;
                                       foreach($respuesta as $row){
                                            ?>
                            <p><input type="radio" name="r10" id="r10_<?=$i?>"
                                    value="<?php echo $row ['id_actividad_opciones']?>"
                                    <?=($_POST["r10"]==$row ['id_actividad_opciones']?"checked":"")?>><?php echo $row ['opcion']?>
                            </p>

                        </label>
                        <?php $i++; }?>

                        <div id="r10_evalua"></div>
                        <div id="err_asterisco_r10"></div>

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

                if (!document.getElementById('r1_0').checked && !document.getElementById('r1_1').checked && !document
                    .getElementById('r1_2').checked) {
                    texto_error("asterisco_r1", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r1", 2, "msg");
                }

                if (!document.getElementById('r2_0').checked && !document.getElementById('r2_1').checked && !document
                    .getElementById('r2_2').checked) {
                    texto_error("asterisco_r2", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r2", 2, "msg");
                }

                if (!document.getElementById('r3_0').checked && !document.getElementById('r3_1').checked && !document
                    .getElementById('r3_2').checked) {
                    texto_error("asterisco_r3", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r3", 2, "msg");
                }

                if (!document.getElementById('r4_0').checked && !document.getElementById('r4_1').checked && !document
                    .getElementById('r4_2').checked) {
                    texto_error("asterisco_r4", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r4", 2, "msg");
                }

                if (!document.getElementById('r5_0').checked && !document.getElementById('r5_1').checked && !document
                    .getElementById('r5_2').checked) {
                    texto_error("asterisco_r5", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r5", 2, "msg");
                }

                if (!document.getElementById('r6_0').checked && !document.getElementById('r6_1').checked && !document
                    .getElementById('r6_2').checked) {
                    texto_error("asterisco_r6", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r6", 2, "msg");
                }

                if (!document.getElementById('r7_0').checked && !document.getElementById('r7_1').checked && !document
                    .getElementById('r7_2').checked) {
                    texto_error("asterisco_r7", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r7", 2, "msg");
                }

                if (!document.getElementById('r8_0').checked && !document.getElementById('r8_1').checked && !document
                    .getElementById('r8_2').checked) {
                    texto_error("asterisco_r8", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r8", 2, "msg");
                }

                if (!document.getElementById('r9_0').checked && !document.getElementById('r9_1').checked && !document
                    .getElementById('r9_2').checked) {
                    texto_error("asterisco_r9", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r9", 2, "msg");
                }

                if (!document.getElementById('r10_0').checked && !document.getElementById('r10_1').checked && !document
                    .getElementById('r10_2').checked) {
                    texto_error("asterisco_r10", 1, "");

                    error_msg = 1;
                } else {
                    texto_error("asterisco_r10", 2, "msg");
                }

                if (error_msg == 1) {
                    document.getElementById("msg").style.visibility = "visible";
                    document.getElementById("msg").innerHTML =
                        "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
                    return false;
                }

                form.action = "actividad6_m3.php";
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
               $r6=$_POST["r6"];
               $r7=$_POST["r7"];
               $r8=$_POST["r8"];
               $r9=$_POST["r9"];
               $r10=$_POST["r10"];
               $c =0;
               $i=0;
                if ($r1 == 132) {
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_1 =1;
            }else{
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_1 = 0;                    
            }if ($r2 == 135) {
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_2 =1;
            }else{
                echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_2 = 0;                    
            }

            if ($r3 == 139) {
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_3 =1;
            }else{
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_3 = 0;                    
            }

            if ($r4 == 141) {
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_4 =1;
            }else{
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_4 = 0;                    
            }
            if ($r5 == 145) {
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_5 =1;
            }else{
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_5 = 0;                    
            }

            if ($r6 == 146) {
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_6 =1;
            }else{
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_6 = 0;                    
            }

            if ($r7 == 151) {
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_7 =1;
            }else{
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_7 = 0;                    
            }

            if ($r8 == 152) {
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_8 =1;
            }else{
                echo "<script> document.getElementById('r8_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_8 = 0;                    
            }

            if ($r9 == 157) {
                echo "<script> document.getElementById('r9_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_9 =1;
            }else{
                echo "<script> document.getElementById('r9_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_9 = 0;                    
            }

            if ($r10 == 158) {
                echo "<script> document.getElementById('r10_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $c+=1;
                $puntaje_10 =1;
            }else{
                echo "<script> document.getElementById('r10_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $i+=1;
                $puntaje_10 = 0;                    
            }

            $idAl=$_SESSION["idAlumno"];
            $idGen=$_SESSION["id_generacion"];
           
            $mr1=select("id_alumno","actividad_modulo3","id_alumno=$idAl","","");
           
            if (count($mr1)>=1) {
                update("actividad_modulo3","actividad6=1 ","actividad_modulo3.id_alumno = $idAl AND actividad_modulo3.id_generacion = $idGen","");
            }else{
            insert("actividad_modulo3","id_alumno, actividad6, id_generacion","'$idAl', '1', '$idGen'");
            }   
        }?>
<?php
include("include/footer.php");?>