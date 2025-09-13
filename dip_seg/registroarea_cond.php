<?php
include("include/funciones.php");
$termino = select("registro_fin, registro_inicio","generaciones", "estatus=1");

$inicio = explode('-',$termino[0]["registro_inicio"]);
$fin_reg= explode('-',$termino[0]["registro_fin"]);

$limreg_ini = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$inicio[1],$inicio[2],$inicio[0]);
$limreg_fin = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$fin_reg[1],$fin_reg[2],$fin_reg[0]);

//echo $limreg;
if ($limreg_ini <=0) {?>
<script>
window.location = 'index.php';
</script>
<?php } 
ini_set("display_errors", "0");
include("include/conexion.php");
session_start();
    $_SESSION["user"]=$_POST["correo"];
$nombre=strip_tags($_POST['nombre']);
$apaterno=strip_tags($_POST['apaterno']);
$amaterno=strip_tags($_POST['amaterno']);
$correo=strip_tags($_POST['correo']);
$correo2=strip_tags($_POST['correo2']);
$pass=strip_tags(trim($_POST['pass']));
$telefono=strip_tags(trim($_POST['telefono']));   
$sexo=strip_tags($_POST['sexo']);
$estado=strip_tags($_POST['estado']);
$grupo=strip_tags($_POST['grupo']);
$gen=$_POST['generacion'];
$edad=strip_tags($_POST['edad']);
$area=strip_tags($_POST['area']);
$aspirante=strip_tags($_POST['aspirante']);
$numeroE=strip_tags($_POST['numeroE']);
$info=strip_tags($_POST['info']);
$aut=1;

if($_POST["correo"] != $_POST["correo2"]) {
    $mensaje="El correo no coincide";
    
  }  
  else{  
    $verifica = Conexion::conectar()->prepare("SELECT * FROM alumno WHERE correo = :correo AND id_generacion=:gen");
    $verifica->bindParam(':correo', $correo, PDO::PARAM_STR);
    $verifica->bindParam(':gen', $gen, PDO::PARAM_STR);
    $verifica->execute();
    $total = $verifica->rowCount(); #esta línea almacena el resultado de la consulta devuelve 0 un 1
  
    if ($total == 1) {
        $mensaje="El correo ya existe.";
      $query = Conexion::conectar()->prepare("SELECT * FROM grupo WHERE id_grupo = :idGrupo");
      $query->bindParam(':idGrupo', $idGrupo, PDO::PARAM_STR);
      $query->execute();
      
      //descomponer la consulta
      $row = $query->fetch();
      $grupo=$row['idGrupo'];
     
    } else {
      $query = Conexion::conectar()->prepare("INSERT INTO alumno(nombre, apaterno, amaterno, pass, genero, edad, correo, telefono, matricula, id_area, id_estado, id_grupo, id_generacion, autorizacion, informacion, tipo_aspirante)
                                              VALUES (:nom, :apat, :amat,  :pass,:sex,:edad,:correo,:tel, :numeroE, :area, :estado,  :idGrupo, :gen, :aut,  :info, :aspirante)" );
      $query->bindParam(':nom', $nombre, PDO::PARAM_STR);
      $query->bindParam(':apat', $apaterno, PDO::PARAM_STR);
      $query->bindParam(':amat', $amaterno, PDO::PARAM_STR);
      $query->bindParam(':pass', $pass, PDO::PARAM_STR);
      $query->bindParam(':sex', $sexo, PDO::PARAM_STR); 
      $query->bindParam(':edad', $edad, PDO::PARAM_STR);
      $query->bindParam(':correo',$correo, PDO::PARAM_STR);
      $query->bindParam(':tel', $telefono, PDO::PARAM_STR);
      $query->bindParam(':numeroE', $numeroE, PDO::PARAM_STR);
      $query->bindParam(':area', $area, PDO::PARAM_STR);
      $query->bindParam(':estado', $estado, PDO::PARAM_STR);
      $query->bindParam(':idGrupo', $grupo, PDO::PARAM_STR);
      $query->bindParam(':gen', $gen, PDO::PARAM_STR);
      $query->bindParam(':aut', $aut, PDO::PARAM_STR);
      $query->bindParam(':info', $info, PDO::PARAM_STR);
      $query->bindParam(':aspirante', $aspirante, PDO::PARAM_STR); 
      $query->execute();

      $query_a = Conexion::conectar()->prepare("SELECT * FROM alumno WHERE correo=:correo and id_generacion=:id_generacion" );
      $query_a->bindParam(':correo',$correo, PDO::PARAM_STR);
      $query_a->bindParam(':id_generacion', $gen, PDO::PARAM_STR);
      $query_a->execute();
      $row = $query_a->fetch();
      $idAlumno=$row['id_alumno']; 
      $autorizado=$row['autorizacion'];
  
      
    
      ?>
  <!DOCTYPE html>
   <html lang="es">
  
   <?php include ("include/header_principal.php");?> 
   <div>&nbsp;</div>
   <div>&nbsp;</div>
   <div class="container">
    <center>
   <div class="col-md-12">
            <img src="imagenes/logo.png" alt="" class="img-responsive" width="350" style="vertical-align:middle">
            </div>
    </center>
   <?php
 
 echo "<center><h3><b>CONFIRMACIÓN DE INSCRIPCIÓN DIPLOMADO EN SEGUROS</b></h3></center></br>";
 echo "<b>$nombre $apaterno $amaterno </b></br> ";

    }
      } 
    
  
  if(empty($idAlumno)) {
  echo '<html lang="es">
  
   <head>
       <meta charset="utf-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1">
       <title>Diplomado</title>
       <!-- CSS -->
       <link href="/favicon.ico" rel="shortcut icon">
       <link href="https://framework-gb.cdn.gob.mx/assets/styles/main.css" rel="stylesheet">
       <link href="https://framework-gb.cdn.gob.mx/gm/accesibilidad/css/gobmx-accesibilidad.min.css" rel="stylesheet">
   </head>
   <body>
   <div>&nbsp;</div>
   <div>&nbsp;</div>
   <div class="container"><div class="row">
      <div class="col-sm-8">
  
  <div id="msg" class="alert alert-danger">'.$mensaje.'</div>
      </div>
  </div>';
  }
  ?>
  </div>
  <div class="row">
            <div class="col-md-12">
            <p style="text-align:center">
                    <a href="index.php" class="btn btn-primary" type="button">Regresar</a>
                    <button class="btn btn-danger" type="button" onClick="window.print()" >Guardar en PDF</button>
                </p>
            </div>
            </div>
  <div>&nbsp;</div>
   <div>&nbsp;</div>
  <script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>
  <script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
  </body>
  </html>