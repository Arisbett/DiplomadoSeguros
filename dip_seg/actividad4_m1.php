<?php include("include/header.php");
include("include/conexion.php");
include("include/funciones.php");
  
 ?>
       

    <link rel="stylesheet" href="css/estilo.css" type="text/css" media="all" />
        <!-- Dependencias -->
    <script src="https://code.jquery.com/jquery-2.2.4.min.js" crossorigin="anonymous"></script>
    <script src="js/wordfind.js"></script>
    <script src="js/wordfindgame.js"></script>
</head>

<body>
<div class="container">   
<!-- Estructura de la sopa de letras-->
    <?php
    
    $actividad1=select('a.nombre ','actividades a',
'a.id_actividad=4 ','','');

foreach ($actividad1 as $var) {
    if($id_act==0 ||  $id_act != $row["id_actividad"]){
        echo "<h3>".$var["nombre"]."</h3> <br>  <p>Instrucciones: Encuentra en la sopa de letras el concepto que corresponda a cada definición.</p>";
        
    }
}
?>
<div class="col-md-6">
<?php
                $pregunta=select('pregunta','actividades_preguntas','id_actividad=4');
                foreach($pregunta as $row){
                    echo '<p>'.$row["pregunta"];'.</p>';
                }
            ?>
</div>
    <div id="contenedor"></div>
    
    <div id="palabras-sopadeletras"></div>
    <div class="col-sm-offset-2 col-sm-10">
                            <p class="pull-right">

                                <button class="btn btn-default" type="button"
                                    onClick="document.location.href='modulo2.php?p=1'">Regresar</button>
                                
                            </p>
                        </div>

                       <?php $idAl=$_SESSION["idAlumno"];
            $idGen=$_SESSION["id_generacion"];

            $mr1=select("id_alumno","actividad_modulo1","id_alumno=$idAl","","");

            if (count($mr1)>=1) {
                update("actividad_modulo1","actividad4=1 ","actividad_modulo1.id_alumno = $idAl AND actividad_modulo1.id_generacion = $idGen","");
            }else{
            insert("actividad_modulo1","id_alumno, actividad4, id_generacion","'$idAl', '1', '$idGen'");
            } ?>
    <!-- Construcción de la sopa de letras -->
    <script>
        // Array con las palabras que el usuario debe buscar
        var palabras = ['poliza','beneficiario','asegurado','coberturas','deducible','riesgo','exclusiones','prima'
        ];

        // Comienza un juego de palabras
        var sopaLetras = wordfindgame.create(palabras, '#contenedor', '#palabras-sopadeletras');

        // Función para resolver la sopa de petras             
        $("#BTNresolver").click(function () {
            var resultado = wordfindgame.solve(sopaLetras, palabras);
            console.log(resultado);
        });

        // Función para reiniciar la sopa de letras
        $("#BTNrefresh").click(function () {
            window.location.href = window.location.href;
        });
    </script>
    
</div> 
<?php 
include("include/footer.php");?>
