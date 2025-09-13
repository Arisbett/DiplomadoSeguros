<?php /*ini_set("display_errors", "1");
  error_reporting(E_ALL);*/
    include ("config_diplomado.php");
/* -- Regresa arreglo con datos o vac�o -- */
function select($campos, $tablas, $where="1", $order="1", $limit="") {
    $link =crear_conexioni();
	//verificar variables
	if($where=="")
		$where = 1;
	if($order=="")
		$order = 1;
	if($limit!="")
		$limit = "LIMIT $limit";
	//query
	$sql_query = "SELECT $campos FROM $tablas WHERE $where ORDER BY $order $limit";
	
	$tmp   = array("if(","IF(","delete ","DELETE ","insert ","INSERT ","drop ","DROP ","EXTRACTVALUE","extractvalue","/**//**/","/**/","0x","_SCHEMA",'~',"ALTER","alter","table","TABLE","ETL","etl","FLOOR","floor","RAND","rand","ROW","row");
     $entra=1;
     for($i=0;$i<count($tmp);$i++){
            $pos = strripos($sql_query, $tmp[$i]);
            if(!$pos==false){
                $entra=0;
                $sql_query="";
                break;
            }
     }

    if($entra==1){

	$result = mysqli_query($link,$sql_query);

	if ($result) {

		$finfo = $result->fetch_fields();

		$associativeArray = array();
		$num_fila = 0;
		while ($row = $result->fetch_array(MYSQLI_NUM)) {
			$pos = 0;
			foreach ($finfo as $val) {
				$associativeArray[$num_fila][$val->name] = $row[$pos];
				$pos++;
			}
			$num_fila++;
		}
		 $link->close();
//var_export($associativeArray); echo '<br>';
		return $associativeArray;

		$result->free();
	}else{
		printf("Errormessage: %s\n", $link->error);
	}
    } else $query = array();
	return $associativeArray;
}


/*function selecti($array_variables,$campos, $tablas, $where="1", $order="1", $limit="") {
//var_export($array_variables);
//verificar variables
	if($where=="")
		$where = 1;
	if($order=="")
		$order = 1;
	if($limit!="")
		$limit = "LIMIT $limit";

    $link =crear_conexioni();

    for($i=1;$i<count($array_variables);$i++){
      if(!is_numeric($array_variables[$i]))
        $array_variables[$i] = mysqli_real_escape_string($link, $array_variables[$i]);
    }
//echo "<br>SELECT $campos FROM $tablas WHERE $where ORDER BY $order $limit";
    if($stmt = $link->prepare("SELECT $campos FROM $tablas WHERE $where ORDER BY $order $limit")){

        if(!is_null($array_variables))
        call_user_func_array(array($stmt, 'bind_param'), refValues($array_variables));
        $stmt->execute(); //var_export($stmt);
        $resultado = $stmt->get_result();
        $finfo = $resultado->fetch_fields();

		$associativeArray = array();
		$num_fila = 0;
		while ($row = $resultado->fetch_array(MYSQLI_NUM)) {
			$pos = 0;
			foreach ($finfo as $val) {
				$associativeArray[$num_fila][$val->name] = $row[$pos];
				$pos++;
			}
			$num_fila++;
		}

		return $associativeArray;

		$result->free();
        $stmt->close();
    } else { 	printf("Errormessage: %s\n", $link->error); }

    $link->close();
    
}*/

function refValues($arr){
        if (strnatcmp(phpversion(),'5.3') >= 0) //Reference is required for PHP 5.3+
        {
            $refs = array();
            foreach($arr as $key => $value)
                $refs[$key] = &$arr[$key];
            return $refs;
        }
        return $arr;
    }
/* -- -- -- -- -- -- */

/* -- Borra alg�n registro de la db -- */
function delete($tabla, $where) {

    if($where=="")
    		$where = 1;

    $link =crear_conexioni();
	//query
	$sql_query = "DELETE FROM $tabla WHERE $where";
	$q_query = mysql_query($sql_query,$link) or
		die("error en query: $sql_query");
	$link->close();
}
/* -- -- -- -- -- -- */

/* -- Agrega alg�n registro a la db -- */
function insert($tabla, $campos, $valores) {

	$link =crear_conexioni();
	$sql_query = "INSERT INTO $tabla ($campos) VALUES ($valores)";
	$result = mysqli_query($link,$sql_query) or die($link->error);
	
    $req = mysqli_query($link,"Select last_insert_id() as id");
    $data = mysqli_fetch_assoc($req);
	$id = $data["id"];
    $link->close();
    return $id;
}

function inserti($array_variables,$tabla, $campos, $valores) {

	$link =crear_conexioni();

	for($i=1;$i<count($array_variables);$i++){
      if(!is_numeric($array_variables[$i]))
        $array_variables[$i] = mysqli_real_escape_string($link, $array_variables[$i]);
    }

    if($stmt = $link->prepare("INSERT INTO $tabla ($campos) VALUES ($valores)")){

        call_user_func_array(array($stmt, 'bind_param'), refValues($array_variables));
        if($stmt->execute()) ; else 	printf("Errormessage: %s\n", $link->error);
        $stmt->close();
    } else { 	printf("Errormessage: %s\n", $link->error); } 
    
    $req = mysqli_query($link,"Select last_insert_id() as id");
    $data = mysqli_fetch_assoc($req);
	$id = $data["id"];
    
    $link->close();
    return $id;
}
/* -- -- -- -- -- -- */

/* -- Actualiza alg�n registro de la db -- */
function update($tabla, $campos, $where="1",$x="") {

	$link =crear_conexioni();
	$sql_query = "UPDATE $tabla SET $campos WHERE $where";
	$result = mysqli_query($link,$sql_query) or die($link->error);
    $link->close();
}

function updatei($array_variables,$tabla, $campos, $where="1") {

	$link =crear_conexioni();
	
	for($i=1;$i<count($array_variables);$i++){
      if(!is_numeric($array_variables[$i]))
        $array_variables[$i] = mysqli_real_escape_string($link, $array_variables[$i]);
    }
    //echo "UPDATE $tabla SET $campos WHERE $where";
    if($stmt = $link->prepare("UPDATE $tabla SET $campos WHERE $where")){

        call_user_func_array(array($stmt, 'bind_param'), refValues($array_variables));
        $stmt->execute();
        $stmt->close();
    } else { echo "UPDATE $tabla SET $campos WHERE $where";
     printf("Errormessage: %s\n", $link->error);
     printf("Error en consulta update");
    }
    
    $link->close();
}
/* -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- -- */

/* -- Regresa numero de registros en alguna tabla -- */
function total($tabla, $where="1") {
	//query
	$total = select("*", $tabla, $where);

	return count($total);
}
/* -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- --  -- -- -- -- -- -- */

function logout() {
	session_start();
	unset($_SESSION["usuario_nombre"], $_SESSION["usuario_usuario"], $_SESSION["usuario_nivel"]);
	session_destroy();
	header("Location: index.php");
}


function logged() {

		if(!isset($_SESSION["usuario_nombre"]) || !isset($_SESSION["usuario_usuario"]) || !isset($_SESSION["usuario_nivel"]))
			header("Location: sca_login_expiro.php");
}

function mes_espaniol($mes){
  if($mes == 1) $cadena = "Enero";
  else if($mes == 2) $cadena = "Febrero";
  else if($mes == 3) $cadena = "Marzo";
  else if($mes == 4) $cadena = "Abril";
  else if($mes == 5) $cadena = "Mayo";
  else if($mes == 6) $cadena = "Junio";
  else if($mes == 7) $cadena = "Julio";
  else if($mes == 8) $cadena = "Agosto";
  else if($mes == 9) $cadena = "Septiembre";
  else if($mes == 10) $cadena = "Octubre";
  else if($mes == 11) $cadena = "Noviembre";
  else if($mes == 12) $cadena = "Diciembre"; 
  return $cadena;
}


//echo 'res';
/*var_export(selecti(array("s","cmoreno"),"l.id_usuario, l.nombre, l.usuario, l.password, l.puesto, l.nivel, l.id_institucion, l.correo, l.telefono, l.activo,l.id_sector, si.nombre AS nombre_institucion,  si.nombre_corto, si.status, si.id_transformante", "usuarios_login l, sipres_instituciones si", "l.usuario=? AND l.activo='1' AND l.id_institucion=si.id","",""));*/
//var_export(select("*","areas","","",""));
?>
<?//=decode("SVRBMWN5c3dsbktkTVVNdytT");?>
<?//=encode("usuario10");?>
