<?php

include_once (__dir__."/../config.php");
include_once (__dir__."/../admintablas/sqls_admin.php");

if(!isset($_POST['x'])){

    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;
    if($estado==0){

        $f_h_actual = date ("d-m-Y h:i:s");
        $areaTkt = $data[0]->area_dest_tkt;
        $etiqueta = $data[0]->etiqueta;
        $descrip = $data[0]->descrip;



       // $guardartkt=mysqli_query($conn, "INSERT INTO tickets ( fecha_hora, ip_origen, id_empresa, id_grupo_proyecto, id_propietario_tck, id_area, descrip, estado, redireccion, id_area_redireccion, f_h_cierre, ip_cierre, id_user_cierre )  VALUES (  )  ");
    }
}else{

}



?>