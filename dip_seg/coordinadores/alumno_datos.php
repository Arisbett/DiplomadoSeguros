<?php
ini_set("display_errors", "0");
ini_set("display_errors", "1");
error_reporting(E_ALL);
$id_alumno = ($_GET['id']?$_GET['id']:0);
$id_alumno = filter_var($id_alumno, FILTER_SANITIZE_NUMBER_INT);

$cextranio = 0;
if($id_apoderado){
    $permitidos = "0123456789";
    for ($i=0; $i<strlen($id_alumno); $i++){//
              if (strpos($permitidos, substr($id_alumno,$i,1))===false){ //echo substr($parametros,$i,1);
                $cextranio = 1;
                break;
              }
    }
} 

if($cextranio == 0){

header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include("includes/header.php");
include("includes/funciones.php");

if($id_alumno>0){

    $alumno =  select("c.nombre as nombreG,a.*", "alumno a,grupo c", "c.id_grupo=a.id_grupo and a.id_alumno=$id_alumno", "", "");
    $estados = select("ID,NOMBRE", "estados", "", "", "");
    $areas = select("id_area,nombreArea", "areas", "", "", "");
    
    $id_grupo = $alumno[0]["id_grupo"];

?>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<!--<script type="text/javascript" src="js/libreriaAjax.js"></script>-->

<div class="row">
    <div class="col-sm-10"><br><br>
<h1>Datos del Alumno</h1>
<div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
    </div>
</div>


<div class="row">
<div class="col-sm-12">

<form  class="clearfix" role="form" name="forma5" oncontextmenu="return false">
<input type="hidden" name="id_alumno" id="id_alumno" value="<?php echo $id_alumno; ?>">
<input type="hidden" name="id_grupo" id="id_grupo" value="<?php echo $id_grupo; ?>">
<div class="row">

    <div class="col-md-4">
    <div class="form-group">
       <label>Nombre(s)<span id="asterisco_nombre" class="form-text">*</span>:</label>
       <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Nombre(s)" style="margin:0px" value="<?php echo ($alumno[0]["nombre"]); ?>">
    <div id="err_asterisco_nombre"></div>
    </div>
    </div>
    
    <div class="col-md-4">
    <div class="form-group">
       <label>Apellido Paterno<span id="asterisco_a_paterno" class="form-text">*</span>:</label>
       <input type="text" id="a_paterno" name="a_paterno" class="form-control" placeholder="Apellido Paterno" style="margin:0px" value="<?php echo ($alumno[0]["apaterno"]); ?>">
    <div id="err_asterisco_a_paterno"></div>
    </div>
    </div>
    
    <div class="col-md-4">
    <div class="form-group">
       <label>Apellido Materno<span id="asterisco_a_materno" class="form-text">*</span>:</label>
       <input type="text" id="a_materno" name="a_materno" class="form-control" placeholder="Apellido Materno" style="margin:0px" value="<?php echo ($alumno[0]["amaterno"]); ?>">
    <div id="err_asterisco_a_materno"></div>
    </div>
    </div>


    </div><!--TERMIMNA ROW-->
    
    <div class="row">

    <!--<div class="col-md-4">
        <div class="form-group">
        <label for="name">Entidad Federativa<span id="asterisco_entidad" class="form-text">*</span>:

        <select name="entidad" id="entidad" class="form-control" style="margin:0px">
        <? for($i=0;$i<count($estados);$i++){?>
        <option value="<?php echo $estados[$i]["id_estado"]; ?>" <?php echo ($alumno[0]["NOMBRE"]==$estados[$i]["id_estado"]?"selected":""); ?>><?php echo ($estados[$i]["NOMBRE"]); ?>    
        <? } ?> 
        </select>

            <div id="err_asterisco_entidad"></div>
        </div>
    </div>-->
    <div class="col-md-4">
        <div class="form-group">
        <label for="name">Grupo: <br><?php echo ($alumno[0]["nombreG"]); ?> </label>

        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
        <label for="name">Sexo<span id="asterisco_sexo" class="form-text">*</span>:
            <select name="sexo" id="sexo" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="F" <?php echo ($alumno[0]["genero"]=="F"?"selected":""); ?>>Femenino</option>
                            <option value="M" <?php echo ($alumno[0]["genero"]=="M"?"selected":""); ?>>Masculino</option>
                            <option value="O" <?php echo ($alumno[0]["genero"]=="O"?"selected":""); ?>>Otro</option>
                        </select>
            <div id="err_asterisco_sexo"></div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="form-group">
        <label for="name">Edad<span id="asterisco_edad" class="form-text">*</span>:
            <select name="edad" id="edad" class="form-control" required>
                            <option value="">Elige una opción</option>
                            <option value="15-20" <?php echo ($alumno[0]["edad"]=="15-20"?"selected":""); ?>>15-20</option>
                            <option value="21-25" <?php echo ($alumno[0]["edad"]=="21-25"?"selected":""); ?>>21-25</option>
                            <option value="26-30" <?php echo ($alumno[0]["edad"]=="26-30"?"selected":""); ?>>26-30</option>
                            <option value="31-35" <?php echo ($alumno[0]["edad"]=="31-35"?"selected":""); ?>>31-35</option>
                            <option value="36-40" <?php echo ($alumno[0]["edad"]=="36-40"?"selected":""); ?>>36-40</option>
                            <option value="41-45" <?php echo ($alumno[0]["edad"]=="41-45"?"selected":""); ?>>41-45</option>
                            <option value="46-50" <?php echo ($alumno[0]["edad"]=="46-50"?"selected":""); ?>>46-50</option>
                            <option value="51-55" <?php echo ($alumno[0]["edad"]=="51-55"?"selected":""); ?>>51-55</option>
                            <option value="56-60" <?php echo ($alumno[0]["edad"]=="56-60"?"selected":""); ?>>56-60</option>
                            <option value="61+" <?php echo ($alumno[0]["edad"]=="61+"?"selected":""); ?>>61+</option>
                        </select>
            <div id="err_asterisco_edad"></div>
        </div>
    </div>

    </div><!--TERMIMNA ROW-->

    <div class="row">

<div class="col-md-4">
    <div class="form-group">
    <label for="name">Correo electr&oacute;nico<span id="asterisco_correo" class="form-text">*</span>:</label>
    <input type="text" id="correo" name="correo" class="form-control" placeholder="correo@correo.com" style="margin:0px" value="<?php echo $alumno[0]["correo"]?>">
        <div id="err_asterisco_correo"></div>
    </div>
</div>

<div class="col-md-4">
        <div class="form-group">
        <label for="name">Tel&eacute;fono M&oacute;vil<span id="asterisco_telefono_m" class="form-text">*</span>:
        <input type="text" id="telefono_m" name="telefono_m" class="form-control" placeholder="##########" style="margin:0px" maxlength="10" size="10" onkeypress="return isNumberKey (event)" onkeydown="chk_keys(event);" value="<?php echo $alumno[0]["telefono"];?>">
            <div id="err_asterisco_telefono_m"></div>
        </div>
    </div>

    <!--<div class="col-md-4">
        <div class="form-group">
        <label for="name">Nivel de Estudio<span id="asterisco_nivel" class="form-text">*</span>:
            <select name="nivel" id="nivel" class="form-control" required>
            <option value="">Elige una opción</option>
            <option value="Doctorado" <?php echo ($alumno[0]["nivelMaximo"]=="Doctorado"?"selected":""); ?> >Doctorado</option>
            <option value="Maestría" <?php echo (utf8_encode($alumno[0]["nivelMaximo"])=="Maestría"?"selected":""); ?>>Maestría</option>
            <option value="Educación Superior" <?php echo (utf8_encode($alumno[0]["nivelMaximo"])=="Educación Superior"?"selected":""); ?>>Educación Superior</option>
            <option value="Educación Media Superior" <?php echo (utf8_encode($alumno[0]["nivelMaximo"])=="Educación Media Superior"?"selected":""); ?>>Educación Media Superior</option>
            <option value="Otro" <?php echo ($alumno[0]["nivelMaximo"]=="Otro"?"selected":""); ?>>Otro..</option>

                        </select>
            <div id="err_asterisco_nivel"></div>
        </div>
    </div>-->

</div>

</div><!--termina row-->


    </div><!--termina row-->
    
    <div class="row">

    <?php //if($id_grupo!=2){?>
    <!--<div class="col-md-4">
        <div class="form-group">
        <label for="name">N&uacute;mero de Empleado <?php echo ($id_grupo==21?"/ control":""); ?><span id="asterisco_num_empleado" class="form-text">*</span>:
            <input type="text" id="num_empleado" name="num_empleado" class="form-control" placeholder="########" style="margin:0px" maxlength="8" size="8" value="<?php echo $alumno[0]["numeroEmpleado"]; ?>">
            <div id="err_asterisco_num_empleado"></div>
        </div>
    </div>-->
    <?php //} 
    
        if($id_grupo==2){
    ?>
    <div class="col-md-4">
        <div class="form-group">
        <label for="name">Area de Adscripci&oacute;n<span id="asterisco_area" class="form-text">*</span>:

        <select name="area" id="area" class="form-control" style="margin:0px">
        <?php for($i=0;$i<count($areas);$i++){?>
        <option value="<?php echo ($areas[$i]["nombreArea"]); ?>" <?php echo (($alumno[0]["tipoCandidato"])==($areas[$i]["nombreArea"])?"selected":"");?>><?php echo ($areas[$i]["nombreArea"]); ?>    
        <?php } ?> 
        </select>

            <div id="err_asterisco_area"></div>
        </div>
    </div>
    <?php }  
        
        if($id_grupo>1){?>
        <!--<div class="col-md-4">
        <div class="form-group">
        <label for="name">Tipo de Candidato<span id="asterisco_tCand" class="form-text">*</span>:
            <select name="tCand" id="tCand" class="form-control" required>
            <option value="">Elige una opción</option>
            <option value="Profesionista independiente" <?php echo (($alumno[0]["tipoCandidato"])=="Profesionista independiente"?"selected":"");?> >Profesionista independiente</option>
            <option value="Empleado" <?php echo (($alumno[0]["tipoCandidato"])=="Empleado"?"selected":"");?> >Empleado</option>
            <option value="Estudiante" <?php echo (($alumno[0]["tipoCandidato"])=="Estudiante"?"selected":"");?> >Estudiante</option>
            <option value="Jubilado / Pensionado" <?php echo (($alumno[0]["tipoCandidato"])=="Jubilado / Pensionado"?"selected":"");?> >Jubilado / Pensionado</option>
            </select>
            <div id="err_asterisco_tCand"></div>
        </div>
    </div>-->
    <?php } ?>

    <div class="col-md-4">
    <div class="form-group">
       <label>Contrase&ntilde;a<span id="asterisco_password" class="form-text">*</span>:</label>
       <input class="form-control" name="password" id="password" placeholder="*****" type="text" value="<?php echo $alumno[0]["pass"];?>" maxlength="8" onkeypress="return ((event.charCode >= 48 && event.charCode <= 57) || (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122))">
    <div id="err_asterisco_password"></div>
    </div>
    </div>

    

   
    

    <div class="col-md-4">
        <div class="form-group">
        <label for="name">Autorizado<span id="asterisco_autorizado" class="form-text">*</span>:

        <select name="autorizado" id="autorizado" class="form-control" style="margin:0px" >
        <option value="1" <?php echo ($alumno[0]["autorizado"]=="1"?"selected":""); ?> >SI
        <option value="0" <?php echo ($alumno[0]["autorizado"]=="0"?"selected":""); ?> >NO
        </select>

            <div id="err_asterisco_autorizado"></div>
            <?//=($alumno[0]["autorizado"]=="1"?"SI":"NO")?>
            <!--<input type="hidden" name="autorizado" id="autorizado" value="<?=$alumno[0]["autorizado"]?>">-->
        </div>
    </div>




    <div class="clearfix">
        <div class="row"><div class="col-md-8 col-md-offset-4"><hr></div></div>

        <div class="pull-left text-muted text-vertical-align-button">* Campos obligatorios</div>

        <div class="pull-right">
            <button id="guarda" type="button" class="btn btn-primary" onClick="return checar_forma_datos();"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span>&nbsp;Actualizar</button>
        </div>
    </div>

</form>
</div>
</div>

<script language="javascript">

function valida_correo(forma,emailf){

    var er_fh = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

    if ( !(er_fh.test( forma[emailf].value )) ) {

        document.getElementById("msg").innerHTML="Formato de correo electr&oacute;nico invalido";
        document.getElementById("msg").style.visibility ="visible";
        return 0;
    } else{
        document.getElementById("msg").style.visibility ="hidden";
    }
    return 1;
}

function checar_forma_datos() { 

    var error_msg = 0;
    var form = document.forma5;
    var campotmp = "",campotmp_sin_espacios = "";
    
    var in_text = ['nombre', 'a_paterno', 'a_materno', 'telefono_m','correo','password']; 
    //var in_sel = [ 'sexo', 'edad', 'nivel' ,'autorizado'];
    var in_sel = [ 'sexo', 'edad', 'nivel' ];

 
 
    for(i=0;i<in_text.length;i++){ //alert(in_text[i]+" "+form[in_text[i]].value);

        campotmp = form[in_text[i]].value
        campotmp_sin_espacios = campotmp.replace(/\s+/g, '');

        if(campotmp_sin_espacios==""){
                  campo_error(in_text[i],1,"");
                  texto_error("asterisco_"+in_text[i],1,"");
                  error_msg = 1;
        } else {
                campo_error(in_text[i],2,"msg");
                texto_error("asterisco_"+in_text[i],2,"msg");
        }

    }

    <?php if($id_grupo!=2){ //CONDUSEF?>

        if(form["num_empleado"].value==""){
                  campo_error("num_empleado",1,"");
                  texto_error("asterisco_num_empleado",1,"");
                  error_msg = 1;
        } else {
                campo_error("num_empleado",2,"msg");
                texto_error("asterisco_num_empleado",2,"msg");
        } 
    <?php } if($id_grupo==1){?>
        if(form["area"].value==""){
                  campo_error("area",1,"");
                  texto_error("asterisco_area",1,"");
                  error_msg = 1;
        } else {
                campo_error("area",2,"msg");
                texto_error("asterisco_area",2,"msg");
        } 
    <?php } else if($id_grupo>1){?>
        if(form["tCand"].value==""){
                  campo_error("tCand",1,"");
                  texto_error("asterisco_tCand",1,"");
                  error_msg = 1;
        } else {
                campo_error("tCand",2,"msg");
                texto_error("asterisco_tCand",2,"msg");
        } 
    <?php } ?>
    
    if(valida_correo(form,"correo")==0){
          return false;
    }
    
    for(i=0;i<in_sel.length;i++){ //alert(in_sel[i]+" "+form[in_sel[i]].value);

        if(form[in_sel[i]].value==""){ 
                  campo_error(in_sel[i],1,"");
                  texto_error("asterisco_"+in_sel[i],1,"");
                  error_msg = 1;
        } else {
                campo_error(in_sel[i],2,"msg");
                texto_error("asterisco_"+in_sel[i],2,"msg");
        }

    }
    
    if(form["telefono_m"].value.length!=10){

        campo_error("telefono_m",1,"");
        texto_error("asterisco_telefono_m",1,"");
        error_msg = 2
    } else {
                campo_error("telefono_m",2,"msg");
                texto_error("asterisco_telefono_m",2,"msg");
    }

    if(form["password"].value.length<8){ 
        error_msg = 3;
    }

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de acualizaci&oacute;n!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } else if(error_msg == 2){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de acualizaci&oacute;n!</b> Verifica el formato requerido";
        return false;
    } else if(error_msg == 3){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de acualizaci&oacute;n!</b> La contrase&ntilde;a debe ser alfanum&eacute;rica de 8 caracteres";
        return false;
    }

    /**/form.method="POST";
    form.action="alumno_datos_guardar.php";
    form.submit();

}


/*function activacion(){

    if(document.getElementById("cot").checked==true){
      document.getElementById("registros").value=-1
        document.getElementById("registros").disabled="true";
    }else{
        document.getElementById("registros").disabled="";
        
    }
}

function activacion_chk(){

    if(document.getElementById("registros").selectedIndex !=-1){
        document.getElementById("cot").disabled=true;
        document.getElementById("cot").checked=false;
    }else{ 
        document.getElementById("cot").disabled=false;
        
    }
}*/
 


</script>
<?php } //end id_alumno ?>
<br><br>
<?php include("includes/footer.php"); ?>
<?php } ?>
