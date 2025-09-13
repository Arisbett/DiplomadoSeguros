<?php
include("include/header_principal.php");
include("include/funciones.php");
?>
<div class="bottom-buffer"></div>
<div class="container">
    <!--Inicia Container-->
    <p>&nbsp;</p>

    <br>
    <div class="row">
        <div class="col-md-12">
            <center><img src="https://educacionfinanciera.condusef.gob.mx/DiplomadoSeguros/img/DS_LogoX.png" alt=""
                    class="img-responsive" style="vertical-align:middle; max-width: 380px; max-height: 182px;">
            </center>
            <center><a href="login.php" class="btn btn-primary" type="button">Iniciar Sesión</a>

                <div class="btn-group" role="group">
                    <button id="btnGroupVerticalDrop1" type="button" class="btn btn-default dropdown-toggle"
                        data-toggle="dropdown" aria-expanded="false">
                        Registro
                        <span class="glyphicon glyphicon-list-alt"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="btnGroupVerticalDrop1">
                        <li><a href="registropg.php">Registro para público en general</a></li>
                        <li><a href="registroareacond.php">CONDUSEF eres empleado o prestas servicios</a></li>
                        <li><a href="registroconvenio.php">Instituciones que tienen grupo en convenio</a></li>
                    </ul>
                </div>
        </div>
    
    </center>
    <?php 
    $termino = select("registro_fin, registro_inicio","generaciones", "estatus=1");
    
    $inicio = explode('-',$termino[0]["registro_inicio"]);
    $fin_reg= explode('-',$termino[0]["registro_fin"]);

    $limreg_fin = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$fin_reg[1],$fin_reg[2],$fin_reg[0]);
    $limreg_ini = mktime(date("H"),0,0,date("m"),date("d"),date("Y")) - mktime(0,0,0,$inicio[1],$inicio[2],$inicio[0]);
   
//echo $limreg_ini;
if ($limreg_ini <=0) {?>
    <script>
document.getElementById('btnGroupVerticalDrop1').disabled=true;
</script>
<?php } ?>
    
 

<div class="row">
    <div class="col-md-12 ">

        <?php include("contenido_index.php")?>

    </div>

</div>

<div class="row">
    <div class="col-md-12">
        <p>&nbsp;</p>
        <p style="text-align:center" class="alert alert-info">
            <a href="https://educacionfinanciera.condusef.gob.mx/DiplomadoSeguros/doctos/DS_AvisoPrivacidad.pdf"
                target="_blank"><strong>AVISO DE PRIVACIDAD</strong></a>
        </p>
    </div>
</div>

</div>

</div>
<?php include("./chatBot_Externo.php"); ?>
<!-- JS -->
<script src="https://framework-gb.cdn.gob.mx/gobmx.js"></script>

<script src="https://framework-gb.cdn.gob.mx/gm/accesibilidad/js/gobmx-accesibilidad.min.js"></script>
<script type="text/javascript" src="js/link-tabs.js"></script>
</body>

</html>