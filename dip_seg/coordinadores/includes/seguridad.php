<?php
//Inicio la sesi�n
session_start();
//echo '<br><br>??'; var_export($_SESSION);
/* -- incluir archivo de funciones -- */
//include("funciones.php");

/* -- funcion de registro -- */
//logged();
if ($_SESSION['autentificado']!='SI') {

    header("Location: salir.php");
    exit();
}
?>
