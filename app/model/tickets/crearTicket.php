<?php

include_once (__dir__."/../config.php");
include_once (__dir__."/../admintablas/sqls_admin.php");
include_once (__dir__."/../OtrasConfigs/get-ip.php");

$dataUserEnvia=mysqli_query($conn,"SELECT * FROM users Where id='{$_SESSION['unique_id']}'");
$datos=mysqli_fetch_assoc($dataUserEnvia);

if(isset($_POST['x'])){

    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;
    if($estado==0){

        $f_h_actual = date ("Y-m-d h:i:s");
        $ip = getRealIP();
        $id_empresa = $datos['id_empresa'];
        $id_grupo_proyecto = $datos['id_grupo'];
        $id_propietario_tkt= $_SESSION['unique_id'];
        $areaTkt = $data[0]->area_dest_tkt;
        $etiqueta = $data[0]->etiqueta;
        $descrip = $data[0]->descrip;
        $estado = 1;
        $redireccion = 0;
        $id_redireccion = "";
        $f_cierre="";
        $ip_cierre="";
        $id_user_cierre="";


    $guardartkt=mysqli_query($conn, "INSERT INTO tickets (fecha_hora, ip_origen, id_empresa, id_grupo_proyecto, id_propietario_tck, id_area, id_etiqueta ,descrip, estado, redireccion, id_area_redireccion, f_h_cierre, ip_cierre, id_user_cierre )  VALUES ( '{$f_h_actual}', '{$ip}', '{$id_empresa}', '{$id_grupo_proyecto}','{$id_propietario_tkt}','{$areaTkt}', '{$etiqueta}','{$descrip}','{$estado}','{$redireccion}','{$id_redireccion}','{$f_cierre}','{$ip_cierre}','{$id_user_cierre}')");

    if($guardartkt){
        echo "guardado con exito";
    }else{
        echo "error al guardar";
    }
    }
}else{
    echo "wtf";
}



?>