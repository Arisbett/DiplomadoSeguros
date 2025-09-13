<?php
include ("include/funciones.php"); 

//$grupos = select("idGrupo,nombreUniv_Inst", "grupo", "nombreUniv_Inst!='' ", "nombreUniv_Inst");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html  class='no-js' lang='es'>
<head>

<!--gob.mx-->
<link rel="shortcut icon" href="https://framework-gb.cdn.gob.mx/favicon.ico">
<link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
<!---->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CONDUSEF | DIPLOMADO - RECUPERA ACCESO</title>
<meta http-equiv="X-UA-Compatible" />
<!--<link rel="stylesheet" type="text/css" href="css/theme4.css" />-->
<!--link rel="stylesheet" type="text/css" href="css/style.css" />-->

<!--[if IE]>
<link rel="stylesheet" type="text/css" href="css/ie-sucks.css" />
<![endif]-->


<script type="text/javascript" src="js/scripts.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>

  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MC4ZVBV');</script>
<!-- End Google Tag Manager -->

</head>

<body>
 

<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MC4ZVBV"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<main class="page">
      <div class="container">
<br>
<ol class="breadcrumb">
			<li><a href="http://www.gob.mx/"><i class="icon icon-home"></i></a></li>
			<li><a href="http://www.condusef.gob.mx/">Comisi&oacute;n Nacional para la Protecci&oacute;n y Defensa de los Usuarios de Servicios Financieros</a></li>
			<li><a href="index.php">Recupera acceso - Diplomado en Educaci&oacute;n Financiera</a></li>
		</ol>
	
	<div class="row">
	<div class="col-sm-12">&nbsp;</div>

	</div>
	
	<h3>Recupera Contrase&ntilde;a</h3>
	<hr>
<div class="row">
    <div class="col-sm-8">
Captura los siguientes datos para recuperar tu contrase&ntilde;a
<div id="msg" class="alert alert-danger" style="visibility:hidden"></div>
    </div>
</div>


<div class="row">
<div class="col-sm-8">

<form class="form-horizontal" role="form" name="form" id="form" autocomplete="off">

<div class="form-group">
    <label class="col-sm-5 control-label" for="usuario-acceso">Correo<span id="asterisco_correo">*</span>:</label>
    <div class="col-sm-7"><input class="form-control" name="correo" id="correo" placeholder="correo@dominio" type="text">
    <div id="err_asterisco_correo"></div>
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
    <button class="btn btn-default" type="button" onClick="document.location.href='cur_login.php'">Regresar</button>
    <button class="btn btn-primary" type="button" onClick="return checar_forma();">Enviar</button></p>
    </div>
</div>
<?//='**'.preg_match("/^[A-Za-z\d]{3}$/","ee-1");?>
</form>
</div>
</div>

<script language="javascript">
function checar_forma() {

	var error_msg = 0;

	if(form.correo.value==""){
          campo_error("correo",1,"");
          texto_error("asterisco_correo",1,"");
          error_msg = 1;
    } else {
        campo_error("correo",2,"msg");
        texto_error("asterisco_correo",2,"msg");
    }

    
    
    if(error_msg == 0 && valida_correo(form,"correo")==0){
          return false;
    }

    if(error_msg==0 && document.getElementById("g-recaptcha-response").value==""){
        error_msg = 2;
    }

    if(error_msg == 1){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> No has llenado varios campos requeridos. Por favor verifica.";
        return false;
    } else if(error_msg == 2){
      document.getElementById("msg").style.visibility ="visible";
      document.getElementById("msg").innerHTML = "<b>&iexcl;Error de registro!</b> Marca la casilla \"No soy un robot\" ";
        return false;
    } 
    
    form.method="post";
    form.action="recupera_acceso.php";
    form.submit();
}
	
 
</script>

<br><br>

</div>
</main><!--Termina CONTAINER-->


<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script> <!--gob.mx-->

</body>
</html>

