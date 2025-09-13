<?php 
include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
ini_set("display_errors", "0");
error_reporting(E_ALL);

session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];

$comandoEF = $con->query("SELECT idExamen, Calificacion_Final from examen_m2 WHERE idAlumno=$idAl");
$comandoEF->execute();
$resultadoEF = $comandoEF->fetchAll(PDO::FETCH_ASSOC);

if (count($resultadoEF)>=3 || $resultadoEF[0]["Calificacion_Final"] >=70) {
    header("Location:modulo3.php?p=1");
}

$actividad1=select('a.nombre ','actividades a',
'a.id_actividad=11 ','','');

foreach ($actividad1 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<h3>".$var["nombre"]."</h3> <br>   <p>Instrucciones: Se mostraran 15 preguntas cada una con opción múltiple, selecciona la respuesta que consideres correcta, cuentas con 60 minutos para contestar la evaluación, una vez concluido el tiempo el sistema en automático cerrará la evaluación.
        <br>
        Recuerda que la calificación mínima para cada evaluación es 7. Si en tu primer intento no consigues la calificación de 7 o deseas mejorarla, dispones de dos intentos más para responder la evaluación y se tomará la calificación final la calificación más alta que hayas obtenido.</p>";
        
        
    }
}

  

$nuevowhere = "";
if($_POST){
    $nuevowhere = "(";
    for($i=1;$i<=15;$i++){
        ${"r".$i} = $_POST["r".$i];
        $tmp = explode('_',${"r".$i});
        ${"id_pregunta".$i} = $tmp[0];

        
        $nuevowhere .= "SELECT * FROM actividades_preguntas WHERE id_actividad_preguntas=".${"id_pregunta".$i}.($i<15?" union ":")");
         //echo '<br>'.$i.' id_pregunta:<b>'. ${"id_pregunta".$i}.'</b> respuesta:<b>'.${"id_respuesta".$i}.'</b>'.($correctas[${"id_pregunta".$i}]==${"id_respuesta".$i}?"Bien":"Mal");
      //var_export($nuevowhere);
    } 
}?>

<!-- comienza cronometro y cambio de parametro-->
<script>
const myTimeout = setTimeout(myGreeting, 3600000);

function myGreeting() {
    window.location = 'modulo2.php?p=1';
}
</script>
   
<table class="default">
  <tr>
    <td> Tu tiempo restante es de: &nbsp;&nbsp;</td>
    <td>&nbsp;&nbsp; <div id="countdown3"></div>&nbsp;&nbsp; </td>
    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Has tenido <?php echo count($resultadoEF) ?> intentos</td>

  </tr>
</table>
<div class="row">

<br><br><br>
<script src="js/countdown.js"></script>
<!-- termina cronometro y cambio de parametro-->
            
            <form role="form" name="examen">
            
                <div class="Pregunta">
                <?php
                    if(!$nuevowhere){ 
                    $comando = Conexion::conectar()->query("SELECT * FROM actividades_preguntas WHERE id_actividad='11' ORDER BY rand() LIMIT 15");
                    } else { 
                    $comando = Conexion::conectar()->query($nuevowhere);
                    }
                    $comando->execute();
                    $total= $comando->rowCount();
                    $resultado = $comando->fetchAll(PDO::FETCH_ASSOC);
                    $i=1;
                    //var_dump($total);
                    $t=1;
   
                    foreach($resultado AS $row){ 
                       
                                     
                        echo '<div class="form-group"> <label>'.$t++.'.-' .$row ["pregunta"].'<span id="asterisco_r'.$i.'" class="form-text">*</span>:</label>';
                        
                        echo '<div class="checkbox">';
                        $comando1 = Conexion::conectar()->query("SELECT id_actividad_opciones,id_pregunta, opcion FROM actividades_opciones WHERE id_actividad='11' AND id_pregunta=$row[id_actividad_preguntas]");
                        $comando1->execute();
                        
                        $resultado1= $comando1->fetchAll(PDO::FETCH_ASSOC);
                        $j=1;
                        foreach($resultado1 as $row1){
                            
                            echo '<p><label class="radio-inline"><input name="r'.$i.'" type="radio" id="r'.$i.'_'.$j.'" value="'.$row1["id_pregunta"].'_'.$row1["id_actividad_opciones"].'"'.(${"r".$i}==$row1["id_pregunta"].'_'.$row1["id_actividad_opciones"]?"checked":"").'>'.$row1["opcion"].'</label></p>';
                            
                        $j++;
                        } 
                        echo '<div id="err_asterisco_r'.$i.'"></div>';
                        echo '</div></div><div id="r'.$i.'_evalua"></div>';
                        $i++;
                        
                    }
                    

                    
                    
                ?>
                </div>
                <div>&nbsp;</div>
                <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='modulo2.php?p=1'">Regresar</button>
        <?php if(!$_POST){?>
        <button class="btn btn-primary" type="button"  onclick=" valida(); ">Enviar</button>
        <?php } ?>
        </p>
    </div>
</div>


                
                
<div>&nbsp;</div><div>&nbsp;</div>
            </form>
           
            
            <!--Termina Container-->
            <script>
                document.addEventListener("DOMContentLoaded", function(){
                // Invocamos cada 5 segundos ;)
                const milisegundos = 5 *1000;
                setInterval(function(){
                    // No esperamos la respuesta de la petición porque no nos importa
                    fetch("./refrescar.php");
                },milisegundos);
            });

    function valida(){

        var error_msg = 0;
        form = document.examen;
//alert(document.getElementById("r1_1")+"*"+document.getElementById("r1_2")+"*"+document.getElementById("r1_3"))
        for(i=1;i<=15;i++){

            
            if(!document.getElementById('r'+i+"_1").checked && !document.getElementById('r'+i+"_2").checked){
              texto_error("asterisco_r"+i,1,"msg");
              document.getElementById('r'+i+"_1").focus();
              error_msg = 1;
            } else {
              texto_error("asterisco_r"+i,2,"msg");
            }
        

            try {
                if(error_msg==1 && !document.getElementById('r'+i+"_3").checked){
                texto_error("asterisco_r"+i,1,"msg");
                document.getElementById('r'+i+"_1").focus();
                error_msg = 1;
                } else {
                texto_error("asterisco_r"+i,2,"msg");
                error_msg = 0;
                }
            } catch (error) {}
        }

        if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } 

    if (!confirm ("¿Estas seguro de enviar la evaluación final del Módulo 2?\n\n-Haz clic en el botón \"Cancelar\" si deseas realizar algún cambio en las respuestas.")){
		return false;
	} else {
        form.action="examenm2.php"; 
   form.method="post";
   form.submit();
    }

        
    }
    

    function texto_error(element,tipo,msg){

      if(tipo==1){
          document.getElementById(msg).style.visibility ="visible";
          document.getElementById("err_"+element).innerHTML='<small class="form-text form-text-error">Este campo es obligatorio</small>';
      }else{
          document.getElementById(msg).style.visibility ="hidden";
          document.getElementById("err_"+element).innerHTML='';
      }
    }

    function myFunction() {
  confirm("¿Estas seguro de enviar el examen del Módulo 2?");
}
    </script>



<?php include("include/footer.php"); ?>