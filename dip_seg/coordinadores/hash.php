<?php
ini_set("display_errors", "0");
/*ini_set("display_errors", "1");
  error_reporting(E_ALL);*/
  
//include ("includes/funciones.php");

function verifica_pass($str1,$str2){

  //$opciones = array( 'cost' => 10);
  $salt = '$5$rounds=4000$0efd1pl0m4d0202@$';
  $hashed = crypt($str1,$salt);
  echo '<br>'.hash_equals($hashed, crypt("hola", $salt));
  $n1 = strlen($hashed);
    if (strlen($str2) != $n1) {
        $es = 0;
    }
    for ($i = 0, $diff = 0; $i != $n1; ++$i) {
        $diff |= ord($hashed[$i]) ^ ord($str2[$i]);
    }
    $es=(!$diff);
    
    return $es;
    }

    $SERVIDOR =  "localhost";
    $NOMBREDB = "dip_seguros";
    $USUARIODB = "root";
    $PSWDDB = "";


$link = mysqli_connect($SERVIDOR, $USUARIODB, $PSWDDB, $NOMBREDB);

//echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;

if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
}

    //$opciones = [ 'cost' => 10];


  //$sql_query = "SELECT * FROM usuarios_login where nivel!=3 AND activo='1' AND id_usuario>".$_GET["id"]." order by id_usuario";
/*$sql_query = "SELECT * FROM coordinadores where id_coordinadores=1";

	$result = mysqli_query($link,$sql_query);

  $salt = '$5$rounds=4000$0efd1pl0m4d0202@$';
    
    

	if ($result) {

		$finfo = $result->fetch_fields();

		$associativeArray = array();
		$num_fila = 0; echo '>'.$row_cnt = $result->num_rows;

		if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {

              try{
                $pass = $row["password"];
                $id = $row["id_coordinador"];
                //$pashash = password_hash($pass, PASSWORD_DEFAULT,$opciones);
                $pashash = crypt($pass,$salt);
                print "<br>$id, $pass, $pashash,verifica=".verifica_pass($pass,$pashash);
                //echo '<br>->'.$id.'*'.$pass.'*'.$pashash.'*'.(password_verify($pass,$pashash)?1:0); //var_export($row);
                mysqli_query($link,"update coordinadores set password='$pashash' where id_coordinador=".$id);
              } catch (Exception $e) {
                    echo 'Excepci�n capturada: ',  $e->getMessage(), "\n";
              }
            }
         }

		$result->free();
	}else{
		printf("Errormessage: %s\n", $mysqli->error);
	}

	$link->close();

  

$pass = "admin.rocio";
  $salt = '$5$rounds=4000$0efd1pl0m4d0202@$';
  $pashash = crypt($pass,$salt);
  print "$pass <br>, <br>$salt , <br>$pashash";*/
  
?>


