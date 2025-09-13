<?php
//Inicio la sesi�n
//session_start();
$paginas = explode('/',$_SERVER["REQUEST_URI"]);

//var_export($_SESSION);
/* -- funcion de registro -- */
//echo '<br>exmaen:'.$_SESSION["ExamDiag".$_SESSION['idAlumno']].' && '.$_SESSION['idAlumno'].' >0 && '.$_SESSION["idGrupo"].' >0 &&  '.$paginas[2]."!=Ex_Diagnostico.php";
/**/if( $_SESSION['idAlumno']>0 && $_SESSION["id_grupo"]>0 && $paginas[2]!="contenido.php" ){
    //echo '<br><b>redirecciona a Diagnostico</b>';
    
} else if ($_SESSION['autentificado']!='SI' && $_SESSION['idAlumno']<=0) { echo 'salir';

    header("Location: cerrar_sesion.php");
    exit();
}
?>
