<?php include("include/header.php");
include("include/funciones.php");
session_start();
$idAl=$_SESSION['idAlumno'];
$idGen=$_SESSION['id_generacion'];
ini_set("display_errors", "0");
error_reporting(E_ALL);



?>
<script type="text/javascript" src="js/libreriaAjax.js"></script>
<br><br><br><br><br>
<body>

    <div class="w3-container">
        <h3>Mis calificaciones <?php echo $nombre;?></h3>
            <h4>Diplomado en Seguros</h4>
            <p>A continuación se muestran las calificaciones más altas obtenidas.
            Recuerda que la constancia se podrá descargar únicamente si cuentas con una calificación mínima de 7 en cada uno de los módulos.
            </p>
            </header>

            
                <p>
                <TABLE  class="table table-striped" style="width: 90%">
                    <TR>
                        <TD><strong>MÓDULOS </strong></TD>
                        <TD>MÓDULO 1 </TD>
                        <TD>MÓDULO 2 </TD>
                        <TD>MÓDULO 3 </TD>
                        <TD>MÓDULO 4 </TD>

                    </TR>
                    <TR>
                        <TD>CALIFICACIONES </TD>
                        <TD>
                            <center>
                                <?php $m1=select("Calificacion_Final","examen_m1","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi= max($m1); $r1= round(($calmaxi["Calificacion_Final"])/10); echo $r1; ?>
                            </center>
                        </TD>
                        <TD>
                            <center>
                                <?php $m2=select("Calificacion_Final","examen_m2","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi2= max($m2); $r2= round(($calmaxi2["Calificacion_Final"])/10); echo $r2; ?>
                            </center>
                        </TD>
                        <TD>
                            <center>
                                <?php $m3=select("Calificacion_Final","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi3= max($m3); $r3= round(($calmaxi3["Calificacion_Final"])/10); echo $r3; ?>
                            </center>
                        </TD>
                        <TD>
                            <center>
                                <?php $m4=select("Calificacion_Final","examen_m4","idAlumno=$idAl and idGeneracion=$idGen","",""); $calmaxi4= max($m4); $r4=round(($calmaxi4["Calificacion_Final"])/10);  echo $r4;?>
                            </center>
                        </TD>
                    </TR>
                    
                    <TR>
                      <TD>INTENTOS</TD>
                      <TD><center><?php $i1=select("*","examen_m1","idAlumno=$idAl and idGeneracion=$idGen","","");   echo count($i1);  ?> </center></TD>
                      <TD><center><?php $i2=select("*","examen_m2","idAlumno=$idAl and idGeneracion=$idGen","","");   echo count($i2);  ?> </center></TD>
                      <TD><center><?php $i3=select("*","examen_m3","idAlumno=$idAl and idGeneracion=$idGen","","");   echo count($i3);  ?> </center></TD>
                      <TD><center><?php $i4=select("*","examen_m4","idAlumno=$idAl and idGeneracion=$idGen","","");   echo count($i4);  ?> </center></TD>
                    </TR>
                </TABLE>

                </p>
           <div class="diploma_desc" id="dip_descarga"></div>

            <?php
            
           if ($r1>=7 && $r2 >=7 && $r3>=7 && $r4 >=7) {
            //var_export($r1);
            $prom=($r1+$r2+$r3+$r4)/4;
            echo '';
            echo "<h5>PROMEDIO GENERAL: $prom</h5><br><br><br>";
            echo "<p>Te recordamos guardar y almacenar tu diploma en tu dispositivo electrónico, ya que una vez que concluya el período del diplomado no se podrá volver a generar el diploma, solamente podrás verificar, al escanear el Código QR de tu diploma, si es válida o no tu constancia.</p><br><br />";
            echo '<a href="constancia.php" onclick="FAjax(\'alumnoDescarga.php\',\'div_descarga\',\'\',\'POST\'); "><p>Descarga tu Diploma Aquí</p></a>';
           

            $rev=select("*","calificaciones","id_alumno=$idAl and id_generacion=$idGen","","");
            $original = base64_encode($idAl.'|'.$prom.'|'.date("Y-m-d"));

            if ($rev>=1) {
                update("calificaciones","cal1=$r1, cal2=$r2, cal3=$r3, cal4=$r4, promedio=$prom, cadena='$original' ","calificaciones.id_alumno = $idAl AND calificaciones.id_generacion = $idGen","");
            }else{
            insert("calificaciones","cal1, cal2, cal3, cal4, promedio, cadena, id_alumno, id_generacion","$r1,$r2,$r3,$r4,$prom,'$original',$idAl,$idGen");
            } 
        }
            ?>


            

        
    </div>
    <br><br><br><br><br>
    <div id="parte1">
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <p class="pull-right">
                    <button class="btn btn-default" type="button"
                        onClick="document.location.href='contenido.php'">Regresar</button>
                    <button class="btn btn-danger" type="button" onClick="window.print()">Descargar
                        Calificaciones</button>
                </p>
            </div>
        </div>
    </div>
    <BR></BR><BR></BR><BR></BR>


    <?php include("include/footer.php");

    ?>