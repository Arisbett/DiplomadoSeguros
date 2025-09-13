<?php 

include("include/header_index.php");
ini_set("display_errors", "0");
$ip =$_SERVER['REMOTE_ADDR'];
$ip_arr = explode('.',$ip);
$m = (!$_GET["m"]?0:$_GET["m"]);
$usuario = $_GET["u"];
$pass = $_GET["p"];

$id_generacion = "DESCARGA DE DIPLOMAS";
$reglamento = "documentos/REGLAMENTO-INTERNO-2023-FINAL-FEBRERO.pdf";
$manual = "documentos/MANUAL_DE_USUARIO_DIPLOMADO_2023.pdf";

//if(($ip_arr[0]=='10' && $ip_arr[1]=='33') || ($ip_arr[0]=='172' && $ip_arr[1]=='16')){

?>

<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="row">
    <div class="col-sm-12">
    <center><h3>¡ <?php echo $id_generacion; ?> !</h3>   </center>
    </div>
    <div class="col-md-4 col-md-offset-4"><img src="image/logo.png" class="img-responsive" /></div>
    <div class="col-sm-12">
<ol>
    <li>Si obtuviste un promedio mínimo de 7 y fuiste acreedor(a) al diploma que sustenta los estudios realizados, en este espacio podrás descargarlo.</li>
    
</ol>
</div>

</div>

<div class="row">
<div class="col-sm-12">

<h2 style="text-align:center">Iniciar sesi&oacute;n</h2>
<!--<div id="msg" class="alert alert-danger" <?php echo ($m==0?'style="visibility:hidden"':'')?> ><?php echo ($m==0?'':($m==2?'DATOS INCORRECTOS, FAVOR DE VERIFICAR':'El tiempo expiro'))?></div>-->
<div id="msg" class="alert alert-warning" <?php echo ($m==0?'style="visibility:hidden"':'')?> ><?php echo ($m==0?'':($m==1?'NO CUMPLES CON LA CALIFICACIÓN MÍNIMA':'El tiempo expiro'))?></div>
</div>
</div>

<div class="row">
<div class="col-sm-8">

<form class="form-horizontal" role="form" name="form" id="form" autocomplete="off">

	<div class="form-group">
    <label class="col-sm-5 control-label" for="usuario-acceso">Usuario<span id="asterisco_user">*</span>:</label>
    
    <div class="col-sm-7">
    <input class="form-control" name="user" id="user" placeholder="correo@correo" type="text">
    <div id="err_asterisco_user"></div>
    </div>
	</div>

	<div class="form-group">
    <label class="col-sm-5 control-label"  for="password">Contrase&ntilde;a<span id="asterisco_password">*</span>:</label>
    
    <div class="col-sm-7">
    <input class="form-control" name="password" id="password" placeholder="*****" type="password" value="" maxlength="12">
    <div id="err_asterisco_password"></div>
    </div>
</div>

<div class="row">
                        <div class="col-sm-5">&nbsp;</div>
                        <div id="capcha_div" class="g-recaptcha col-sm-7" data-sitekey="6Lc46tUhAAAAAJM-32kpeqA72IBJnvXHL4eoVBn0"></div>                                                                   
                        </div>

<br>
<DIV class="pull-left">            * Campos obligatorios         </DIV>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="index.php">Regresar</button>
        <!--<button class="btn btn-default" type="button" onClick="document.location.href='recupera_acceso.php'">¿Olvidaste tu contraseña?</button>-->
        <button class="btn btn-primary" type="button" onClick="return checar_forma();">Entrar</button>
    </p>
    </div>
</div>

</form>
</div>
</div>

<script language="javascript">

function valida_correo(forma,emailf){

var er_fh = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;

if ( !(er_fh.test( forma[emailf].value )) ) { 

    document.getElementById("msg").innerHTML="El formato de correo electr&oacute;nico no es correcto";
    document.getElementById("msg").style.visibility ="visible";
    return 0;
} else{
    document.getElementById("msg").style.visibility ="hidden";
}
return 1;
}
function checar_forma() {

	var error_msg = 0;

	if(form.user.value==""){
          campo_error("user",1,"");
          texto_error("asterisco_user",1,"");
          error_msg = 1;
    } else {
        campo_error("user",2,"msg");
        texto_error("asterisco_user",2,"msg");
    }

    if(form.password.value==""){

          campo_error("password",1,"");
          texto_error("asterisco_password",1,"");
          error_msg = 1;
    } else {
        campo_error("password",2,"msg");
        texto_error("asterisco_password",2,"msg");
    }
    
    if(error_msg==0 && valida_correo(document.form,"user")==0){
        error_msg = 2;
    }

    if(error_msg==0 &&  document.form.password.value.length<8){
        error_msg = 3;
    }

    if(error_msg==0 && document.getElementById("g-recaptcha-response").value==""){
        error_msg = 4;
    }

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } else if(error_msg == 2){ 
      document.getElementById("msg_").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Formato de correo electr&oacute;nico no es correcto";
      document.getElementById("correo").focus();
        return false;
    } else if(error_msg == 3){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> El tama&ntilde;o de la contrase&ntilde;a es menor al requerido";
      document.getElementById("user").focus();
        return false;
    } 
    //comentario para el captcha
    else if(error_msg == 4){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Marca la casilla \"No soy un robot\" ";
      document.getElementById("user").focus();
        return false;
    }
    
    form.method="post";
    form.action="login_diploma_post_desc.php";
    form.submit();
}
	
 
</script>

<br><br>

</div>
</main><!--Termina CONTAINER-->


<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->

</body>
</html>

