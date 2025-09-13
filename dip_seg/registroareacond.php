<?php include ("include/header_principal.php");
include("include/funciones.php");

ini_set("display_errors", "0");

$termino = select("registro_fin, registro_inicio","generaciones", "estatus=1");

$inicio = explode('-',$termino[0]["registro_inicio"]);
$fin_reg= explode('-',$termino[0]["registro_fin"]);

$limreg_ini = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$inicio[1],$inicio[2],$inicio[0]);
$limreg_fin = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$fin_reg[1],$fin_reg[2],$fin_reg[0]);

//echo $limreg;
if ($limreg_ini <=0) {?>
<script>
window.location = 'index.php';
</script>
<?php } ?>
<style>

.tooltip-container {
    margin: 0 auto;
    display: inline-block;
}

/* EMPIEZA AQUÍ */

.tooltip-container {
    position: relative;
    cursor: pointer;
}

.tooltip-one {
    padding: 8px 3px;
    background: #fff;
    position: absolute;
    width: 220px;
    border-radius: 5px;
    /*text-align: center;*/
    filter: drop-shadow(0 3px 5px #ccc);
    line-height: 1.5;
    display: none;
    bottom: 20px;
    right: 50%;
    margin-right: -110px;
    font-size: 12px;
}

.tooltip-one:after {
    content: "";
    position: absolute;
    bottom: -9px;
    left: 50%;
    margin-left: -9px;
    width: 18px;
    height: 18px;
    background: white;
    transform: rotate(45deg);
}

.tooltip-trigger:hover+.tooltip-one {
    display: block;
}
</style>
</style>
<!-- Contenido -->

<main class="page">

    <div class="bottom-buffer"></div>
    <div class="container">
        <!--Inicia Container-->
        <form role="form" name="form1">
            <div class="row">
                <div class="col-md-12">
                    <p>&nbsp;</p>
                    <h3 align="center">Registro para el Diplomado en Seguros para personal de CONDUSEF</h3>

                    <div class="contenedor_registro">
                        <div class="alert alert-info">Revisa que todos tus datos sean correctos antes de enviar tu
                            registro, recuerda que si el nombre está mal capturado así aparecerá en tu diploma</div>


                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Nombre:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <div class="tooltip-one">
                                Escribe tú nombre completo sin abreviaciones, este dato se utilizará para generar tu
                                constancia al concluir el Diplomado en Seguros
                            </div>

                            <input class="form-control " id="nombre" name="nombre" placeholder="Nombre" type="text">
                        </div>


                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Primer apellido:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <div class="tooltip-one">
                                Escribe tú primer apellido completo sin abreviaciones, recuerda que este dato se
                                utilizará para generar tu constancia al concluir el Diplomado en Seguros
                            </div>

                            <input class="form-control " id="apaterno" name="apaterno" placeholder="Primer Apellido"
                                type="text">
                        </div>

                        <div class="tooltip-container col-md-4">
                            <label class="control-label" for="text">Segundo apellido:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <div class="tooltip-one">
                                Escribe tú segundo apellido completo sin abreviaciones, recuerda que este dato se
                                utilizará para generar tu constancia al concluir el Diplomado en Seguros
                            </div>
                            <input class="form-control " id="amaterno" name="amaterno" placeholder="Segundo Apellido"
                                type="text">
                        </div>

                        <div class="tooltip-container col-md-4">
                            <label class="control-label" for="text">Estado:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <?php $estado=select("ID, NOMBRE","estados","status=1","ID ASC LIMIT 1, 32"); ?>

                            <div class="tooltip-one">
                                Entidad Federativa en la cual radicas actualmente
                            </div>

                            <select name="estado" id="estado" class="form-control">
                                <option value="">Elige una opción</option>
                                <?php 
                                    foreach($estado AS $row){
                                 ?>
                                    <option value="<?php echo $row ['ID']?>"><?php echo $row ['NOMBRE']?></option>

                                <?php }?>
                            </select>
                        </div>

                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Sexo:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <div class="tooltip-one"> Favor de seleccionar una opción</div>
                            <select name="sexo" id="sexo" class="form-control">
                                <option value="">Elige una opción</option>
                                <option value="F">Femenino</option>
                                <option value="M">Masculino</option>
                                <!--<option value="O">Otro</option>-->
                            </select>
                        </div>

                        <div class="tooltip-container col-md-4">
                            <label class="control-label" for="text">Edad:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <?php $edad=select("edad","edad","estatus=1",""); ?>
                            <div class="tooltip-one">Años cumplidos</div>
                            <select name="edad" id="edad" class="form-control">
                                <option value="">Elige una opción</option>
                                <?php foreach($edad AS $row){?>
                                    <option value="<?php echo $row ['edad']?>"><?php echo $row ['edad']?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Tipo aspirante:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <?php $aspirante=select("id_tipo_aspirante, aspirante","tipos_aspirante","estatus=1",""); ?>
                            <div class="tooltip-one">Elije una opcion</div>
                            <select name="aspirante" id="aspirante" class="form-control">
                                <option value="">Elige una opción</option>
                                <?php foreach($aspirante AS $row){?>
                                    <option value="<?php echo $row ['id_tipo_aspirante']?>"><?php echo $row ['aspirante']?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Área de adscripción:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <?php $area=select("id_area,nombreArea","areas","estatus=1",""); ?>
                            <div class="tooltip-one">Elije el Área de adscripción que haz cursado</div>
                            <select name="area" id="area" class="form-control">
                                <option value="">Elige una opción</option>
                                <?php foreach($area AS $row){?>
                                    <option value="<?php echo $row ['id_area']?>"><?php echo $row ['nombreArea']?></option>
                                <?php }?>
                            </select>
                        </div>

                        <div class="tooltip-container col-md-4">

                            <label class="control-label" for="text">Número de Empleado o prestador:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>

                            <div class="tooltip-one">
                                Escribe tú número de empleado o prestador
                            </div>

                            <input class="form-control " id="numeroE" name="numeroE" placeholder="Número Empleado" type="text">
                        </div>


                        <div class="tooltip-container col-md-6">
                            <label class="control-label" for="text">Correo electrónico:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <div class="tooltip-one"> Revisa bien que el correo electrónico sea correcto, ya que este se utilizará para enviarte información al respecto</div>
                            <input class="form-control" id="correo" name="correo" placeholder="Correo electrónico"
                                type="email" onpaste="alert('Ingresa nuevamente tu correo');return false"
                                onchange=" FAjax('verifica.php','existe_correo','c='+this.value+'&g='+document.getElementById('gen').value,'POST');">
                        </div>

                        <div class="tooltip-container col-md-6">
                            <label class="control-label" for="text">Confirma correo electrónico:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <div class="tooltip-one"> Revisa bien que el correo electrónico sea correcto, ya que este se utilizará para enviarte información al respecto</div>
                            <input class="form-control" id="correo2" name="correo2"
                                placeholder="Confirma tu correo electrónico" type="email"
                                onpaste="alert('Ingresa nuevamente tu correo');return false">
                        </div>


                        <div class="tooltip-container col-md-4">
                            <label class="control-label" for="text">Número de celular:</label>
                            <i class="fas fa-question-circle tooltip-trigger"></i>
                            <div class="tooltip-one">Número celular 10 dígitos</div>
                            <input class="form-control" id="telefono" name="telefono" placeholder="0123456789"
                                type="text" minlength="10" maxlength="10"
                                onkeypress="return ((event.charCode >= 48 && event.charCode <= 57))"
                                onpaste="alert('Ingresa tu número de celular');return false">
                        </div>

                        <div class="tooltip-container col-md-4">
                                <label class="control-label" for="text">Contraseña:</label>
                                <i class="fas fa-question-circle tooltip-trigger"></i>
                                <div class="tooltip-one">
                                Genera una contraseña de mínimo 8 y máximo 12 caracteres. Puedes hacer una combinación de letras (mayúsculas y minúsculas) y números. Evita dejar espacios y no utilices acentos, comas o caracteres especiales (Ñ, ñ, "#, $, %, etc.)
                                </div>
                                &nbsp;
                                <span class="glyphicon glyphicon-eye-open" aria-hidden="true"
                                    onclick="mostrarContrasena()"></span>
                                    <input class="form-control" id="pass" name="pass" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))"
                                    
                                    placeholder="Contraseña" type="password">
                            </div>

                        <?php $grupo=select("id_grupo","grupo", "id_grupo=2",""); 
                        foreach($grupo AS $row){
                        ?>
                        <input id="grupo" name="grupo" type="hidden" value="<?php echo $row['id_grupo']; ?>">
                        <?php }?>
                        <?php
                       $generacion=select("id_generacion","generaciones", "estatus=1");
                        foreach($generacion AS $row){
                        ?>
                        <input id="generacion" name="generacion" type="hidden"
                            value="<?php echo $row['id_generacion']; ?>">
                        <?php }?>
                    </div>

                </div>
            </div>
            <br><br><br>
            <div class="row">
                <div class="col-md-12">
                    <!--Div de los check-->
                    <div class="form-group">
                        <div class="checkboxcol-md-12" align="center">
                            <strong>Nota: Tu usuario será el correo electrónico que registraste.</trong><br><br>
                            <strong>He leído el Aviso de Privacidad. </strong><a href="###" target="_blank"
                                rel="noopener noreferrer"> Click
                                aquí para leerlo </a> <input type="checkbox" id="myCheck" name="test">
                        </div>

                        <!--<div class="checkbox col-md-12" align="center">
                        <strong>He leído el Reglamento General del Diplomado. </strong><a href="documentos/REGLAMENTO-INTERNO-2023-FINAL-FEBRERO.pdf"
                            target="_blank" rel="noopener noreferrer">
                            Click aquí para leerlo</a><span>&nbsp;</span> <input type="checkbox" id="myCheck2" name="test" >
                    </div>-->
                        <p align="center">
                            <strong>Deseo recibir información de Educación Financiera en mi celular.<br></strong>
                            <label><input type="radio" name="info" id="info1" value="Si"> Sí</label><br>
                            <label><input type="radio" name="info" id="info2" value="No"> No</label><br>
                        </p>
                        <p>* Todos los campos son obligatorios</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
                    <div id="existe_correo"><input type="hidden" id="respuesta_correo"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <p style="text-align:center">
                        <a href="index.php"><button class="btn btn-primary" type="button">Regresar</button></a>
                        <!--<button class="btn btn-primary" name="registro" type="submit" onclick="return fenvia()">Enviar</button>-->
                        <button class="btn btn-primary" type="button" onClick="return fenvia()">Enviar</button>
                    </p>
                </div>
            </div>
        </form>
    </div>
    <!--Termina Container-->




   
    <script>
    function fenvia() {


        form = document.form1;

        //validarCorreo(document.getElementById('correo').value);
        var tamanio_tel = 0;
        var tamanio_pas = 0;


        if (document.getElementById("nombre").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El nombre esta vacío"
            return false;
        }

        if (document.getElementById("apaterno").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Apellido paterno esta vacío";
            return false;
        }

        if (document.getElementById("amaterno").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Apellido materno esta vacío";
            return false;
        }

        if (document.getElementById("estado").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El estado esta vacío";
            return false;
        }

        if (document.getElementById("sexo").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Elige una opción en el campo sexo";
            return false;
        }

        if (document.getElementById("edad").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Elige una opción en el campo edad";
            return false;
        }

        if (document.getElementById("aspirante").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Elige una opción en el campo aspirante";
            return false;
            }

            if (document.getElementById("area").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Elige una opción en el campo área de adscripción";
            return false;
            }

            if (document.getElementById("numeroE").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Elige una opción en el campo número empleado";
            return false;
            }

        

        if (document.getElementById("correo").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El correo esta vacío";
            return false;
        }

        if (document.getElementById("correo2").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Confirma el correo";
            return false;
        }

        if (document.getElementById("telefono").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El campo teléfono esta vacío";
            return false;
        }
        tamanio_tel = document.getElementById("telefono").value.length;
        if (tamanio_tel < 10 || tamanio_tel > 20) {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El campo teléfono debe ser mínimo de 10 digitos y máximo 20";
            return false;
        }


        if (document.getElementById("pass").value == "") {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Escribe una contraseña";
            return false;
        }
        /* */
        tamanio_pass = document.getElementById("pass").value.length;
        if (tamanio_pass < 12 || tamanio_pass > 20) {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "La contraseña debe ser de 12 caracteres alfanuméricos";
            return false;
        }

        if (!document.getElementById("myCheck").checked) {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Es necesario marcar el Aviso de Privacidad";
            return false;
        }



        if (!document.getElementById('info1').checked && !document.getElementById('info2').checked) {
            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Es necesario marcar la opción para recibir información";
            return false;
        }

        if (document.getElementById("correo").value != document.getElementById("correo2").value) {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "Los correos no son iguales";
            return false;
        }

        if (document.getElementById("respuesta_correo").value == 1) {

            document.getElementById("msg").style.visibility = "visible";
            document.getElementById("msg").innerHTML = "El correo ya existe";
            return false;
        }

        try {
            if (document.getElementById("msg").style.visibility == "visible")
                document.getElementById("msg").style.visibility = "hidden";
        } catch (error) {}

        form.action = "registroarea_cond.php";
        form.method = "post";
        form.submit();
    }


  function mostrarContrasena(){
      var tipo = document.getElementById("pass");
      if(tipo.type == "password"){
          tipo.type = "text";
      }else{
          tipo.type = "password";
      }
  }

    </script>



    <!--Termina Container-->
</main>
<div>&nbsp;</div>




<!-- JS -->
<script src="js/formulario.js"></script>
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
</body>

</html>