<?php  
ini_set("display_errors", "0");
/*ini_set("display_errors", "1");
error_reporting(E_ALL); var_export($_POST);*/
include("includes/header.php");
include("includes/funciones.php");
include("includes/funciones_generales.php");
//include("includes/autoriza_masiva.php");

$cextranio = 0;
$permitidos = "0123456789@.abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_- áéíóúÁÉÍÓÚüÜ/ñÑ#";
foreach ($_POST as $keyy => &$vall) {
  for ($i=0; $i<strlen($vall); $i++){  
    if (strpos($permitidos, substr($vall,$i,1))===false){ echo '<br>'.$keyy.' '.$vall.' '.substr($vall,$i,1).' '.strpos($permitidos, substr($vall,$i,1));
      $cextranio = 1;
      break;
    }
  }
} 

if($cextranio==0){
    
    $correo = trim($_POST["correo"]);
    $nombre =$_POST["nombre"]; 
    $a_paterno = $_POST["a_paterno"];
    $a_materno = $_POST["a_materno"];
    $telefono_m = $_POST["telefono_m"];
    $password = $_POST["password"];
    $entidad = $_POST["entidad"]; 
    $sexo = $_POST["sexo"];
    $edad = $_POST["edad"];
    $nivel = $_POST["nivel"];
    $autorizado = $_POST["autorizado"];
    $numeroEmpleado = (!$_POST["num_empleado"]?'':$_POST["num_empleado"]);
    $area = (!$_POST["area"]?'':$_POST["area"]);
    $tCand = (!$_POST["tCand"]?'':$_POST["tCand"]);
    $id_alumno= $_POST["id_alumno"];
    $id_grupo= $_POST["id_grupo"];
   
    //print "antes: $nombre,$a_paterno,$a_materno,$correo,$telefono_m,$password,$sexo,$tCand,$nivel,$numeroEmpleado,$edad,$autorizado,$id_alumno,$id_coordinador,$id_generacion,$id_grupo,$id_tabla_generacion";
    set_datos_alumno($nombre,$a_paterno,$a_materno,$correo,$telefono_m,$password,$sexo,(!$tCand?$area:$tCand),$nivel,$numeroEmpleado,$edad,$autorizado,$id_alumno,$id_coordinador,$id_generacion,$id_grupo,$id_tabla_generacion);
    $mensaje = "Se actualizaron los datos del alumno";


?>

	<div class="row">	<div class="col-sm-12">&nbsp;</div>	</div>
    <div class="row"><br><br><div class="col-sm-8"><div id="msg" class="alert alert-info"><?=$mensaje?></div></div>
        <br><br><br><br>


        
<?php  }//end extraño ?>
<?php include("includes/footer.php"); ?>