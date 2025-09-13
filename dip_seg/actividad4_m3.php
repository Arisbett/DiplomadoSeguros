<?php 

include("include/header.php");
include("include/funciones.php");

ini_set("display_errors", "0");
error_reporting(E_ALL);

$actividad1=select('a.nombre ','actividades a',
'a.id_actividad=15','','');

foreach ($actividad1 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<br><br><h3>".$var["nombre"]."</h3> <br>  <p>Instrucciones: Completa las siguientes expresiones arrastrando el recuadro de la respuesta correcta a donde corresponda</p>";
        
    }
}

?>
<style>
#div1,
#div2,
#div3,
#div4,
#div5,
#div6,
#div7,
#div8,
#div9,
#div10 {
    width: 152x;
    height: 45px;
    padding: -10px;
    border: 1px solid #007878;

}

#div11,
#div12,
#div13,
#dvi14,
#div15,
#div16,
#div17,
#div18,
#dvi19,
#div20 {
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




<form role="form" name="actividad4_m3">
    <input type="hidden" name="r1" id="r1">
    <input type="hidden" name="r2" id="r2">
    <input type="hidden" name="r3" id="r3">
    <input type="hidden" name="r4" id="r4">
    <input type="hidden" name="r5" id="r5">
    <input type="hidden" name="r6" id="r6">
    <input type="hidden" name="r7" id="r7">
    <input type="hidden" name="r8" id="r8">
    <input type="hidden" name="r9" id="r9">
    <input type="hidden" name="r10" id="r10">

    <div class=" row">
        <div class="col-md-12">

            <table>
                <tr>
                    <td>
                        <div id="div11" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag1"
                                src="image\actividad_m3\2023-09-24_240901.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div12" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag2"
                                src="image\actividad_m3\2023-09-24_240902.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div13" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag3"
                                src="image\actividad_m3\2023-09-24_240903.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div14" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag4"
                                src="image\actividad_m3\2023-09-24_240904.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                </tr>
                <br>
                <tr>
                    <td>
                        <div id="div15" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag5"
                                src="image\actividad_m3\2023-09-24_240905.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div16" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag6"
                                src="image\actividad_m3\2023-09-24_240906.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div17" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag7"
                                src="image\actividad_m3\2023-09-24_240907.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div18" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag8"
                                src="image\actividad_m3\2023-09-24_240908.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>

                </tr>
                <tr>
                    <td>
                        <div id="div19" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag9"
                                src="image\actividad_m3\2023-09-24_240909.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>
                    <td>
                        <div id="div20" ondrop="drop(event)" ondragover="allowDrop(event)"><img id="drag10"
                                src="image\actividad_m3\2023-09-24_240910.png" draggable="true" ondragstart="drag(event)"
                                width="150" height="40"></div>
                    </td>


                </tr>
            </table>
        </div>
    </div>

    <table border="0">
        <tr>
            <td>El </td>
            <td style="width:160px">
                <div id="div1" name="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div1"></div>
                <div id="r1_evalua">
            </td>
            <td>
                <p>cubre el riesgo de impago o pérdidas de las cuentas pendientes</p>
            </td>
        </tr>

    </table>
    <br>
    <table border="0">
        <tr>
            <td>Las tres funciones del seguro de crédito son: prevención, recobro e </td>
            <td style="width:160px">
                <div id="div2" name="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div2"></div>
                <div id="r2_evalua">
            </td>
        </tr>
    </table>
    <br>
    <table border="0">
        <tr>
            <td>El seguro de crédito </td>
            <td style="width:160px">
                <div id="div3" name="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div3"></div>
                <div id="r3_evalua">
            </td>
            <td>garantiza el cobro de las ventas a crédito en el territorio nacional, proporcionando a la </td>
        </tr>
        <tr>
            <td colspan="3"> asegurada protección ante una eventual falta de pago de los clientes.</td>
        </tr>

    </table>
    <br>
    <table border="0">
        <tr>
            <td>El seguro de crédito de </td>
            <td style="width:160px">
                <div id="div4" name="div4" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div4"></div>
                <div id="r4_evalua">
            </td>
            <td colspan="2">ofrece cobertura frente al riesgo</td>
            <td>comercial de falta de pago por parte de los</td>
        </tr>
        <tr>
            <td colspan="3"> importadores de tus productos o servicios con transacciones </td>
            <td style="width:160px">
                <div id="div5" name="div5" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div5"></div>
                <div id="r5_evalua">
            </td>
        </tr>

    </table>
    <br>
    <table border="0">
        <tr>
            <td>Los dos riesgos cubiertos por el seguro de crédito son: comercial y </td>
            <td style="width:160px">
                <div id="div6" name="div6" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div6"></div>
                <div id="r6_evalua">
            </td>
        </tr>

    </table>
    <br>
    <table border="0">
        <tr>
            <td>El seguro de daños asociado a un crédito</td>
            <td style="width:160px">
                <div id="div7" name="div7" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div7"></div>
                <div id="r7_evalua">
            </td>
            <td>protege la propiedad adquirida contra </td>
        </tr>

        <tr>
            <td>riesgos como incendio, explosión, inundación,</td>
            <td style="width:160px">
                <div id="div8" name="div8" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div8"></div>
                <div id="r8_evalua">
            </td>
            <td >o alguna otra eventualidad que provoque daños en la  </td>
        </tr>
        <tr><td>vivienda.</td>
       </tr>


    </table>
    <br>
    <table border="0">
        <tr>
            <td style="width:10px">La</td>
            <td style="width:160px">
                <div id="div9" name="div9" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div9"></div>
                <div id="r9_evalua">
            </td>
            <td >asegurada, en los seguros de daños asociados a créditos  </td>
            <td>hipotecarios</td>
        </tr>
        <tr>
            <td colspan="3"> se refiere a la cantidad máxima posible por la que responderá </td>
            <td style="width:160px">
                <div id="div10" name="div10" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                <div id="err_asterisco_div10"></div>
                <div id="r10_evalua">
            </td>
            <td>por pérdida o daños </td>
            
        </tr>
        <tr><td colspan="3">al inmueble. </td></tr>
        

    </table>


    <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>


    <br>

    <!--<DIV class="pull-left">            * Campos obligatorios         </DIV>-->
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <p class="pull-right">


                <button class="btn btn-default" type="button"
                    onClick="document.location.href='modulo3.php?p=2'">Regresar</button>
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
                form = document.actividad4_m3;

                for (i = 1; i <= 10; i++) {
                    cadena = document.getElementById("div" + i).innerHTML;
                    idimg = cadena.substr(9, 10);
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

                for (i = 1; i <= 10; i++) {
                    cadena = document.getElementById("div" + i).innerHTML;
                    idimg = cadena.substr(9,10);
                    //alert(cadena+"*"+idimg.replace("drag",""));
                    document.getElementById("r" + i).value = idimg.replace("drag", "");
                }


                form.action = "actividad4_m3.php";
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
            $r8 = $_POST["r8"];
            $r9 = $_POST["r9"];
            $r10 = $_POST["r10"];
           
            $c=0;
            
         
            
              
          for($i=1;$i<=10;$i++){ 
            echo "<script>src = document.getElementById('drag".${"r".$i}."').src; </script>";
            echo "<script>document.getElementById('div".$i."').innerHTML='<img src='+src+'>';</script>";
            if($r1==4){
            echo "<script> document.getElementById('r1_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_1=1;
            }else{
            echo "<script>document.getElementById('r1"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_1=0;
          }
            if($r2==9){
              echo "<script> document.getElementById('r2_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
              $puntaje_2=1;
             } else{
              echo "<script>document.getElementById('r2"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
              $puntaje_2=0;
            }
            if($r3==1){
            echo "<script> document.getElementById('r3_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_3=1;
             } else{
            echo "<script>document.getElementById('r3"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_3=0;
          }
          if($r4==7){
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
          if($r6==10){
            echo "<script> document.getElementById('r6_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_6=1;
             } else{
            echo "<script>document.getElementById('r6"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_6=0;
          }
          if($r7==2){
            echo "<script> document.getElementById('r7_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_7=1;
             } else{
            echo "<script>document.getElementById('r7"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_7=0;
          }
          if($r8==8){
            echo "<script> document.getElementById('r8_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_8=1;
             } else{
            echo "<script>document.getElementById('r8"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_8=0;
          }
          if($r9==3){
            echo "<script> document.getElementById('r9_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_9=1;
             } else{
            echo "<script>document.getElementById('r9"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_9=0;
          }
          if($r10==6){
            echo "<script> document.getElementById('r10_evalua').innerHTML ='<img src=\"image/imag/palomita.png\" width=\"30\"  />';</script>";
            $puntaje_10=1;
             } else{
            echo "<script>document.getElementById('r10"."_evalua').innerHTML ='<img src=\"image/imag/tache.png\" width=\"30\"  />';</script>";
            $puntaje_10=0;
          }

        }
        $idAl=$_SESSION["idAlumno"];
        $idGen=$_SESSION["id_generacion"];
       
        $mr1=select("id_alumno","actividad_modulo3","id_alumno=$idAl","","");
       
        if (count($mr1)>=1) {
            update("actividad_modulo3","actividad4=1 ","actividad_modulo3.id_alumno = $idAl AND actividad_modulo3.id_generacion = $idGen","");
        }else{
        insert("actividad_modulo3","id_alumno, actividad4, id_generacion","'$idAl', '1', '$idGen'");
        }   
    
}


include("include/footer.php");
?>