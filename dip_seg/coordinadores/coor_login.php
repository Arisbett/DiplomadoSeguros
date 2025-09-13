<?php
/*ini_set("display_errors", "1");
error_reporting(E_ALL);*/
include ("includes/funciones.php");
//include ("includes/detecta_so_n_v.php");
include ("hash.php");

$usuario = ($_POST["user"]?$_POST["user"]:"");
$usuario = strip_tags(filter_var($usuario, FILTER_SANITIZE_STRING));

$pswd = ($_POST["password"]?$_POST["password"]:"");
$pswd = strip_tags(filter_var($pswd, FILTER_SANITIZE_STRING));

$pswd = str_replace("CHAR(35)","#",$pswd);
$pswd = str_replace("CHAR(36)","$",$pswd);
//print "$usuario && $pswd";
if($usuario && $pswd){
      
    //$info= detect();

    $info_usuario = select("id_coordinador,id_grupo,nombre,password,id_tipo_coordina", "coordinadores", "activo='1' AND usuario='$usuario'", "", ""); 
    $pass_bd = $info_usuario[0]["password"];
    $id_coordinador=$info_usuario[0]["id_coordinador"];
    $id_grupo = $info_usuario[0]["idGrupo"];
    $nombre = $info_usuario[0]["nombre"];
    $id_tipo_coordinador = $info_usuario[0]["id_tipo_coordina"];
//var_export($info_usuario);

     if(verifica_pass($pswd,$pass_bd)==1)
                $id_usuario = $info_usuario[0]["id_coordinador"];
    else
                $id_usuario = 0;

    if($id_usuario>0){
    
        $grupo = select("nombreUniv_Inst", "grupo", "idGrupo=$id_grupo", "", "");
        $nombre_grupo = $grupo[0]["nombreUniv_Inst"];

        session_start();
        $_SESSION["autentificado"] 	= "SI";
        $_SESSION["id_coordinador"] = $id_coordinador;
        $_SESSION["nombre"] 		= $nombre;
        $_SESSION["tipo_coordinador"] = $id_tipo_coordinador;
        $_SESSION["id_grupo"]   	  = $id_grupo;
        $_SESSION["nombre_grupo"]       = $nombre_grupo;
        $_SESSION["fecha1_registro"]    = "2023-09-04"; //"22-08-2022";
        $_SESSION["fecha2_registro"]    = "2023-10-02";
        $_SESSION["id_generacion"]  =   "1";
        $_SESSION["id_super_admin"]  =   18;
        $_SESSION["id_tabla_generacion"] = 2;

        inserti(array("iis",$id_coordinador,$id_grupo,$nombre),"tiradas_login_coordinadores", "id_coordinador,id_grupo,nombre,fecha_registro", "?,?,?,now()");
 
        header("Location: lista-alumnos.php");

    }  else { header("Location: index.php"); }         

 } else  header("Location: index.php");
?>
