<?php include("include/header_index.php");
ini_set("display_errors", "0");
$m = (!$_GET["m"]?0:$_GET["m"]);
?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<br><br><br><br>
<div class="container">
    <div class="col-md-6">
        <img src="image/CONDUSEF-AMIS.png" style="max-width:80%" alt="condusef&amis.png" class="img-responsive">
        <br><br>
        <p>Este Diplomado fue elaborado por la CONDUSEF y cuenta el aval de la Asociación Mexicana de Instituciones de Seguros (AMIS) con respecto a los contenidos.</p>
    </div>
    <center>
        <br><br>
        <div class="col-md-6">
            <h4>Diplomado en Seguros <br> Inicio de Sesión</h4>
            <div id="msg" class="alert alert-danger" <?php echo ($m==0?'style="visibility:hidden"':'')?> ><?php echo ($m==0?'':($m==1?'DATOS INCORRECTOS, FAVOR DE VERIFICAR':'El tiempo expiro'))?></div>
            <form class="form-horizontal" role="form" name="form" id="form" autocomplete="off">

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="usuario-acceso">Usuario<span id="asterisco_user">*</span>:</label>

                    <div class="col-sm-7">
                        <input class="form-control" name="user" id="user" placeholder="correo@correo" type="text">
                        <div id="err_asterisco_user"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label" for="password">Contrase&ntilde;a<span id="asterisco_password">*</span>:</label>

                    <div class="col-sm-7">
                        <input class="form-control" name="password" id="password" placeholder="*****" type="password"  minlength="12">
                        <div id="err_asterisco_password"></div>
                    </div>
                </div>
                <div class="row">
                        <div class="col-sm-3">&nbsp;</div>
                        <div id="capcha_div" class="g-recaptcha col-sm-7" data-sitekey="6Lc46tUhAAAAAJM-32kpeqA72IBJnvXHL4eoVBn0"></div>                                                                   
                        </div>

                <br>
                <DIV class="pull-left"> * Campos obligatorios </DIV>
                <br><br>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <p class="pull-rigth">

                            <button class="btn btn-default" type="button"
                                onClick="document.location.href='index.php'">Regresar</button>
                           <button class="btn btn-primary" type="button"
                                onClick="return checar_forma();">Entrar</button>
                        </p>
                        <a href="recupera_contraseña.php" target="_blank" rel="noopener noreferrer">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>

            </form>
        </div>
    </center>
    <script language="javascript">

function valida_correo(forma,emailf){

var er_fh = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/; //se declara el formato del correo

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

    if(error_msg==0 &&  document.form.password.value.length<12){
        error_msg = 3;
    }

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } else if(error_msg == 2){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Formato de correo electr&oacute;nico no es correcto";
      document.getElementById("correo").focus();
        return false;
    } else if(error_msg == 3){ 
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> El tama&ntilde;o de la contrase&ntilde;a es menor al requerido";
      document.getElementById("user").focus();
        return false;
    } 
    
    form.method="post";
    form.action="login_form.php";
    form.submit();
}
	
 
</script>
</div>
<br><br><br>
<?php include("include/footer_principal.php");?>