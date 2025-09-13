<?php 

include("include/header.php");
include("include/funciones.php");

ini_set("display_errors", "1");
error_reporting(E_ALL);

?>
<style>
#div1,
#div2,
#div3,
#div4,
#div5,
#div6,
#div7{
    width: 140x;
    height: 40px;
    padding: -10px;
    border: 1px solid #007878;

}
#div8,
#div9,
#div10,
#div11,
#div12,
#div13,
#dvi14 {
    width: 250px;
    height: 55px;
    padding: 5px;
    border: 0px solid #007878;
}

.pull-bottom {
    display: inline-block;
    vertical-align: bottom;
    float: none;
}
</style>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}
</script>

<div>&nbsp;</div>

<p>Instrucciones: Completa la frase siguiente con las palabras de los recuadros</p>


<form role="form" name="actividad3_m2">
    <input type="hidden" name="r1" id="r1">
    <input type="hidden" name="r2" id="r2">
    <input type="hidden" name="r3" id="r3">
    <input type="hidden" name="r4" id="r4">
    <input type="hidden" name="r5" id="r5">
    <input type="hidden" name="r6" id="r6">
    <input type="hidden" name="r7" id="r7">
    

    <div class=" row">
        <div class="col-md-12">

            <table>
                <tr>
                    <td>
                        <div id="div1/" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag1"
                                src="image\actividad_m2\2023-09-24_240201.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div9" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag2"
                                src="image\actividad_m2\2023-09-24_240202.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div10" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag3"
                                src="image\actividad_m2\2023-09-24_240203.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div11" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag4"
                                src="image\actividad_m2\2023-09-24_240204.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <div id="div12" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag5"
                                src="image\actividad_m2\2023-09-24_240205.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div13" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag6"
                                src="image\actividad_m2\2023-09-24_240206.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div14" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag7"
                                src="image\actividad_m2\2023-09-24_240207.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    
                </tr>
               
            </table>
        </div>
    </div>

    <table border="0">
        <tr>
            <td>Las disposiciones para el registro de</td>
            <td style="width:160px">
                <div id="div1" name="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div1"></div>
                <div id="r1_evalua">
            </td>
            <td>
                <p>nacen por el ordenamiento establecido en el artículo 204 de la</p>
            </td>
            
        </tr>

    </table>
   
    <table border="0">
        <tr>
        <td style="width:160px">
                <div id="div2" name="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div2"></div>
                <div id="r2_evalua">
            </td>
            <td>en el que las instituciones de seguros deberán registrar los formatos de su documentación contractual</td>
            
        </tr>
    </table>
   
    <table border="0">
        <tr>
            <td> consistentes en</td>
            <td style="width:160px">
                <div id="div3" name="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div3"></div>
                <div id="r3_evalua">
            </td>
            <td>consentimiento y certificados, de acuerdo con el de</td>
            <td style="width:160px">
                <div id="div4" name="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div4"></div>
                <div id="r4_evalua">
            </td>
        </tr>
        <tr>
            <td colspan="3"> operación que se encuentra dentro del sistema. </td>
        </tr>

    </table>
    <br>
    <table border="0">
        <tr>
            <td>Una vez concluido el registro en &nbsp;</td>
            <td style="width:180px">la documentación  </td>
            <td style="width:380px">deberá aparecer en cada documento el</td>
            
            <td style="width:160px">
                <div id="div5" name="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div5"></div>
                <div id="r5_evalua">
            </td>

            
            
        </tr>
        <tr>
            <td >de registro otorgado por la </td>
            <td style="width:160px">
                <div id="div6" name="div6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div6"></div>
                <div id="r6_evalua">
            </td>
            <td colspan="3">posterior al otorgado por la CNSF, con esto el usuario podrá </td>
            
        </tr>

        <tr>
            <td >&nbsp;ubicar su contrato con facilidad en el</td>
            <td style="width:160px">
                <div id="div7" name="div7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div7"></div>
                <div id="r7_evalua">
            </td>
            
        </tr>

    </table>
    


    <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>


    <br>

    <!--<DIV class="pull-left">            * Campos obligatorios         </DIV>-->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <p class="pull-right">


                <button class="btn btn-default" type="button"
                    onClick="document.location.href='modulo2.php?p=2'">Regresar</button>
                <button class="btn btn-primary" type="button" onclick="return valida();" id="">Validar</button>
            </p>
        </div>
    </div>
</form>

<script>
            function valida() {
                var cadena;
                var idimg;
                var error_msg = 0;
                form = document.actividad3_m2;

                for (i = 1; i <= 7; i++) {
                    cadena = document.getElementById("div" + i).innerHTML;
                    idimg = cadena.substr(9, 7);
                    //alert(cadena);

                    if (cadena == "") {
                        texto_error("asterisco_div" + i, 1, "msg");
                        document.getElementById('div' + i).focus();
                        error_msg = 1;
                    } else {
                        texto_error("asterisco_div" + i, 2, "msg");
                    }
                }

                if (error_msg == 1) {
                    document.getElementById("msg").style.visibility = "visible";
                    document.getElementById("msg").innerHTML =
                        "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
                    return false;
                }

                for (i = 1; i <= 7; i++) {
                    cadena = document.getElementById("div" + i).innerHTML;
                    idimg = cadena.substr(9,7);
                    //alert(cadena+"*"+idimg.replace("drag",""));
                    document.getElementById("r" + i).value = idimg.replace("drag", "");
                }


                form.action = "actividad3_m2.php";
                form.method = "post";
                form.submit();
            }

            function texto_error(element, tipo, msg) {

                if (tipo == 1) {
                    document.getElementById(msg).style.visibility = "visible";
                    document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
                } else {
                    document.getElementById(msg).style.visibility = "hidden";
                    document.getElementById("err_" + element).innerHTML = '';
                }
            }
            </script>


<?php

    
           

           if($_POST){
           
            $r1 = $_POST["r1"];
            $r2 = $_POST["r2"];
            $r3 = $_POST["r3"];
            $r4 = $_POST["r4"];
            $r5 = $_POST["r5"];
            $r6 = $_POST["r6"];
            $r7 = $_POST["r7"];
            
            for($i=1;$i<=7;$i++){ 
                echo "<script>src = document.getElementById('drag".${"r".$i}."').src; </script>";
                echo "<script>document.getElementById('div".$i."').innerHTML='<img src='+src+'>';</script>";
                if($r1==6){
                echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_1=1;
                }else{
                echo "<script>document.getElementById('r1"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_1=0;
              }
                if($r2==2){
                  echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                  $puntaje_2=1;
                 } else{
                  echo "<script>document.getElementById('r2"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                  $puntaje_2=0;
                }
                if($r3==7){
                echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_3=1;
                 } else{
                echo "<script>document.getElementById('r3"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_3=0;
              }
              if($r4==4){
                echo "<script> document.getElementById('r4_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_4=1;
                 } else{
                echo "<script>document.getElementById('r4"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_4=0;
              }
              if($r5==5){
                echo "<script> document.getElementById('r5_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_5=1;
                 } else{
                echo "<script>document.getElementById('r5"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_5=0;
              }
              if($r6==1){
                echo "<script> document.getElementById('r6_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_6=1;
                 } else{
                echo "<script>document.getElementById('r6"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_6=0;
              }
              if($r7==3){
                echo "<script> document.getElementById('r7_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
                $puntaje_7=1;
                 } else{
                echo "<script>document.getElementById('r7"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
                $puntaje_7=0;
              }
          
        }

        $idAl=$_SESSION["idAlumno"];
        $idGen=$_SESSION["id_generacion"];

        $mr1=select("id_alumno","actividad_modulo2","id_alumno=$idAl","","");

        if (count($mr1)>=1) {
            update("actividad_modulo2","actividad3=1 ","actividad_modulo2.id_alumno = $idAl AND actividad_modulo2.id_generacion = $idGen","");
        }else{
        insert("actividad_modulo2","id_alumno, actividad3, id_generacion","'$idAl', '1', '$idGen'");
        } 
        
    
}


include("include/footer.php");
?>