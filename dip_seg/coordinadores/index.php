<?php include("includes/header_index.php");

$ip =$_SERVER['REMOTE_ADDR'];
$ip_arr = explode('.',$ip);


?>

<div class="row">
    <div class="col-sm-8">
Ingresa con tu usuario y contrase&ntilde;a proporcionado por la CONDUSEF
<div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
    </div>
</div>


<div class="row">
<div class="col-sm-8">
<h2>Iniciar sesi&oacute;n</h2>
<form class="form-horizontal" role="form" name="form" id="form" autocomplete="off">

<div class="form-group">
    <label class="col-sm-5 control-label" for="usuario-acceso">Usuario<span id="asterisco_user">*</span>:</label>
    <div class="col-sm-7"><input class="form-control" name="user" id="user" placeholder="Usuario" type="text">
    <div id="err_asterisco_user"></div>
    </div>
</div>


<div class="form-group">
    <label class="col-sm-5 control-label"  for="password">Contrase&ntilde;a<span id="asterisco_password">*</span>:</label>
    <div class="col-sm-7"><input class="form-control" name="password" id="password" placeholder="*****" type="password" value="">
    <div id="err_asterisco_password"></div>
    </div>
</div>
<br>
<DIV class="pull-left">            * Campos obligatorios         </DIV>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
	<p class="pull-right">    
        
        <button class="btn btn-default" type="button" onClick="document.location.href='http://10.33.21.78:81/dip_seg/'">Regresar</button>
        <button class="btn btn-primary" type="button" onClick="return checar_forma();">Entrar</button>
    </p>
    </div>
</div>

</form>
</div>
</div>

<script language="javascript">
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
    

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } 
    
    form.password.value=form.password.value.replace(/CHAR(35)/g,"#");
    form.password.value=form.password.value.replace(/CHAR(36)/g,"$");

    form.method="post";
    form.action="dip_login.php";
    form.submit();
}
	
 
</script>

<br><br>

</div>
</main><!--Termina CONTAINER-->


<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->

</body>
</html>

