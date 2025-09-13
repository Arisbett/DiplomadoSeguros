<?php

/**
 * Funci�n para detectar el sistema operativo, navegador y versi�n del mismo
 */
$info=detect();
/*
echo "<br>-->Sistema operativo: ".$info["os"];
echo "<br>-->Navegador: ".$info["browser"];
echo "<br>-->Versi�n: ".$info["version"];
echo "<br>-->TipoNav: ".$_SERVER['HTTP_USER_AGENT'];
*/
/**
 * Funcion que devuelve un array con los valores:
 *	os => sistema operativo
 *	browser => navegador
 *	version => version del navegador
 */
function detect() {
    
	$browser=array("IE","OPERA","MOZILLA","NETSCAPE","FIREFOX","SAFARI","CHROME");
	$os=array("WIN","MAC","LINUX");
	
	# definimos unos valores por defecto para el navegador y el sistema operativo
	$info['browser'] = "OTHER";
	$info['os'] = "OTHER";
	
	# buscamos el navegador con su sistema operativo
	foreach($browser as $parent) {
		$s = strpos(strtoupper($_SERVER['HTTP_USER_AGENT']), $parent);
		$f = $s + strlen($parent);
		$version = substr($_SERVER['HTTP_USER_AGENT'], $f, 15);
		$version = preg_replace('/[^0-9,.]/','',$version);
		if ($s) {
			$info['browser'] = $parent;
			$info['version'] = $version;
			break;
		}
	}
	
	# obtenemos el sistema operativo
	foreach($os as $val) {
		if (strpos(strtoupper($_SERVER['HTTP_USER_AGENT']),$val)!==false)
			$info['os'] = $val;
			break;
	}
	
	# devolvemos el array de valores
	$info['browser'] = $parent;
	$info['version'] = $version;
	$info['os'] = $val;
	
	$variable = $parent."--".$version."--".$val;	
		
	return $variable;
}

?>