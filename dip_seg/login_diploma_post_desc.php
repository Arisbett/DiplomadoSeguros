<?php
ini_set("display_errors", "1");
error_reporting(E_ALL);
include ("include/funciones.php");

 $cextranio = 0;
$permitidos = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-_@.#()¡!¿?;$&/*+,%:<>";
foreach ($_POST as $keyy => &$vall) {echo '<br>'.substr($val,$i,1).' '.strpos($permitidos, substr($val,$i,1));
 if($keyy!="g-recaptcha-response"){
    for ($i=0; $i<strlen($vall); $i++){ 
      if (strpos($permitidos, substr($vall,$i,1))===false){ 
        $cextranio = 1;
        break;
      }
    }
  }
}

$secret = "6Lc46tUhAAAAAO_bRK67Jq07hjQwRUxc6h3jNCRX";
$ip = $_SERVER['REMOTE_ADDR'];
$captcha = $_POST['g-recaptcha-response'];
$rsp = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=".$secret."&response=".$captcha."&remoteip=".$ip);
$arr = json_decode($rsp,true);
//Aquí esta el comentario para el captcha
//if($arr["success"]==false) $cextranio=1;
//echo '>'.$cextranio;
if($cextranio==0){

$usuario = trim($_POST["user"]?$_POST["user"]:"");
$usuario = strip_tags(filter_var($usuario, FILTER_SANITIZE_EMAIL));

$pswd = trim($_POST["password"]?$_POST["password"]:"");
$pswd = strip_tags(filter_var($pswd, FILTER_SANITIZE_STRING));

//print "$usuario && $pswd";
if($usuario && $pswd){
  

    //$id_generacion = 1;
  
    
//echo "c.nombreUniv_Inst,c.imagen,a.idGrupo,a.idAlumno,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno from alumno a,grupo c,expedientes d where  c.idGrupo=a.idGrupo AND a.idAlumno=d.id_alumno and d.autorizado='1' and d.id_generacion=$id_generacion and a.autorizado='1' AND TRIM(a.correo)='$usuario' and TRIM(a.pass)='$pswd'";
    $info_usuario = select("upper(c.nombre) as institucion, a.id_alumno,a.id_grupo,a.id_alumno,upper(a.nombre) as nombre,upper(a.apaterno) as apaterno,upper(a.amaterno) as amaterno,g.registro_inicio, g.registro_fin, g.fin_ds, g.id_generacion",
     "alumno a,grupo c,generaciones g", " c.id_grupo=a.id_grupo and a.autorizacion='1' and a.id_generacion=g.id_generacion AND TRIM(a.correo)='$usuario' and TRIM(a.pass)='$pswd'", "");
    $id_alumno=$info_usuario[0]["id_alumno"];
    $id_grupo = $info_usuario[0]["id_grupo"];
    $nombre = $info_usuario[0]["nombre"].' '.$info_usuario[0]["apaterno"].' '.$info_usuario[0]["amaterno"];
    $nombre_grupo = $info_usuario[0]["institucion"];
    $cierre = $info_usuario[0]["fin_ds"];
    $id_generacion = $info_usuario[0]["id_generacion"];

    var_export($info_usuario);

    //$generacion = select("*", "generaciones", "id_generacion=$id_generacion", "");
    
    if($id_alumno>0){

        session_start();
        $_SESSION["autentificado"] 	= "SI";
        $_SESSION["idAlumno"] = $id_alumno;
        $_SESSION["nombre"] 		= $nombre;
        $_SESSION["id_grupo"]   	  = $id_grupo;
        $_SESSION["nombre_grupo"]       = $nombre_grupo;
        $_SESSION["registro_inicio"]    = "2023-05-15"; 
        $_SESSION["registro_fin"]    = "2023-08-11";
        $_SESSION["fin_ds"] = $cierre;
        $_SESSION["id_generacion"]  =   $id_generacion;
        

        //inserti(array("iis",$id_alumno,$id_grupo,$nombre),"tiradas_login_alumnos", "id_alumno,id_grupo,nombre", "?,?,?");
        
        //diagnostico
        /*$diagnostico = select("IdExamDiag,fecha_registro", "examendiag", "idAlumno=$id_alumno and id_generacion=$id_generacion", "");
        if($diagnostico[0]["IdExamDiag"]>0)
        $_SESSION["ExamDiag".$id_alumno]= 1;
        else
        $_SESSION["ExamDiag".$id_alumno]= 0;*/
 
        header("Location: constancia.php");

    }  else {
         //echo "no hay alumno"; 
         header("Location: login_diploma_post.php?m=1"); 
        }    

   }  
 } //end extranio
 else  { 
    //echo "extraño"; 
    header("Location: login_diploma_post.php?m=2"); 
}

?>