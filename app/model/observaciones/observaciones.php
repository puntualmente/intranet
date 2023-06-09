<?php
// require (__dir__."/../data/pdo.php");
include_once (__dir__."/../config.php");

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d ");





$campana=mysqli_query($conn, "SELECT *FROM users INNER JOIN log_session ON users.cedula=log_session.id_user WHERE log_session.accion='login' AND log_session.f_h LIKE '{$hoy}%'");


foreach($campana as $user){
    /* $id = mysqli_real_escape_string($conn, $_POST[$user['id']]); */
    $cedula = mysqli_real_escape_string($conn, $_POST[$user['cedula']]);
    /*
    $id_jefe = mysqli_real_escape_string($conn, $_POST[$user['id_jefe']]);
    $id_grupo = mysqli_real_escape_string($conn, $_POST[$user['id_grupo']]);
    $observaciones = mysqli_real_escape_string($conn, $_POST[$user['observaciones']]);
     */
    if(isset ($cedula)){

        echo "$cedula"." ";
        // $insert_query = mysqli_query($conn, "INSERT INTO observacion_coordinadores (id,cedula, id_jefe ,id_grupo,observaciones)
        //  VALUES ('{$id}','{$cedula}','{$id_jefe}','{$id_grupo}','{$observaciones}'");
        
    }else{
        echo"No sirve";
    }

}
    

