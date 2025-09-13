<?php
/*ini_set("display_errors", "1");
error_reporting(E_ALL); */
function autoriza_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion){
    print "$id_generacion,$id_alumno,$id_grupo,$id_coordinador";
    updatei(array("i",$id_alumno),"alumno", "autorizado=1", "idAlumno=?");
    
    //$expediente = select("*","expedientes","id_generacion=$id_generacion and id_alumno=".$id_alumno,"","");
    $expediente = select("*","expedientes",($id_tabla_generacion>=2?"id_tabla_generacion=$id_tabla_generacion":"id_generacion=$id_generacion")." AND id_alumno=".$id_alumno,"","");
//var_export($expediente);
    if(!$expediente){
        if($id_tabla_generacion<3)
        inserti(array("iiii",$id_alumno,$id_grupo,$id_generacion,$id_coordinador),"expedientes", "id_alumno,id_grupo,id_generacion,id_usuario_autorizacion,fecha_registro,fecha_actualizacion","?,?,?,?,now(),now()");
        else
        inserti(array("iiii",$id_alumno,$id_grupo,$id_tabla_generacion,$id_coordinador),"expedientes", "id_alumno,id_grupo,id_tabla_generacion,id_usuario_autorizacion,fecha_registro,fecha_actualizacion","?,?,?,?,now(),now()");
    } else {
        if($id_tabla_generacion<3)
        updatei(array("iii",$id_coordinador,$id_alumno,$id_generacion),"expedientes", "activo='1',id_usuario_autorizacion=?,fecha_actualizacion=now()", "id_alumno=? and id_generacion=?");
        else
        updatei(array("iii",$id_coordinador,$id_alumno,$id_tabla_generacion),"expedientes", "activo='1',id_usuario_autorizacion=?,fecha_actualizacion=now()", "id_alumno=? and id_tabla_generacion=?");
    }

    return 1;
}

function quitar_autorizacion_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion){
    //print "$id_generacion,$id_alumno,$id_grupo,$id_coordinador";
    updatei(array("i",$id_alumno),"alumno", "autorizado=0", "idAlumno=?");
    
    if($id_tabla_generacion<3)
    updatei(array("iii",$id_coordinador,$id_alumno,$id_generacion),"expedientes", "activo='0',id_usuario_autorizacion=?,fecha_actualizacion=now()", "id_alumno=? and id_generacion=?");
    else
    updatei(array("iii",$id_coordinador,$id_alumno,$id_tabla_generacion),"expedientes", "activo='0',id_usuario_autorizacion=?,fecha_actualizacion=now()", "id_alumno=? and id_tabla_generacion=?");
    
    return 1;
}

function set_datos_alumno($nombre,$paterno,$materno,$correo,$telefono,$pass,$sexo,$tipoCandidato,$nivelMaximo,$numeroEmpleado,$edad,$autorizado,$id_alumno,$id_coordinador,$id_generacion,$id_grupo,$id_tabla_generacion){
print "datos_alumno: $nombre,$paterno,$materno,$correo,$telefono,$pass,$sexo,$tipoCandidato,$nivelMaximo,$numeroEmpleado,$edad,$autorizado,$id_alumno,$id_coordinador,$id_generacion,$id_grupo,$id_tabla_generacion";
 
    if($autorizado==1){
        update("alumno", "nombre='".utf8_decode($nombre)."',apaterno='".utf8_decode($paterno)."',amaterno='".utf8_decode($materno)."',correo='$correo',telefono='$telefono',pass='$pass',sexo='$sexo',tipoCandidato='".utf8_decode($tipoCandidato)."',nivelMaximo='".utf8_decode($nivelMaximo)."',numeroEmpleado='$numeroEmpleado',edad='$edad',autorizado='$autorizado',factualizacion=now(),usuario_actualizacion=$id_coordinador", "idAlumno=$id_alumno");

        autoriza_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion);

    } else if($autorizado==0)
        quitar_autorizacion_alumno($id_generacion,$id_alumno,$id_grupo,$id_coordinador,$id_tabla_generacion);
}
?>