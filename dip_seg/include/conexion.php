<?php
class Conexion{
	public static function conectar(){
		try {
			$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$pdo = new PDO('mysql:dbname=dip_seguros;host=localhost;charset=utf8','root','',$opciones);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			return $pdo;

           /* echo "<br><br><b>									#Estas líneas son para mandar mesaje de conexión
            <div class=\"container\">
               <div class=\"alert alert-success\" align=\"center\">
                  <font face=arial size=2 color=Green>¡Conectado! Satisfactoriamente </font>
               </div>
            </div></b><br/>";*/

		} catch (PDOException $e) {
			echo "<br><br><b>
			<div class=\"container\">
			   <div class=\"alert alert-danger\" align=\"center\">
			      <font face=arial size=2 color=red>¡Error 3224!: ".$e->getMessage()."
			      </font>
			   </div>
			</div></b><br/>";
			die();
		}
	}
}
Conexion::conectar();


$db = new Conexion();
$con = $db->conectar();
?>