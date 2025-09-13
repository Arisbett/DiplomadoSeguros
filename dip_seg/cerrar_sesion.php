<?php
session_start();
unset($_SESSION["nombre"], $_SESSION["id_grupo"], $_SESSION["autentificado"]);
session_destroy();
header("Location: login.php");
?>