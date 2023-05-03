<?php

include_once (__dir__."/../config.php");
include_once (__dir__."/../admintablas/sqls_admin.php");
include_once (__dir__."/../OtrasConfigs/get-ip.php");

$f_h_actual = date ("Y-m-d h:i:s");
$ip = getRealIP();

$dataUserEnvia=mysqli_query($conn,"SELECT * FROM users Where id='{$_SESSION['unique_id']}'");
$datos=mysqli_fetch_assoc($dataUserEnvia);

if(isset($_POST['x'])){

    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;

    if($estado==0){
/*
        $id_empresa = $datos['id_empresa'];
        $id_grupo_proyecto = $datos['id_grupo'];
        $id_propietario_tkt= $_SESSION['unique_id'];
        $areaTkt = $data[0]->area_dest_tkt;
        $etiqueta = $data[0]->etiqueta;
        $descrip = $data[0]->descrip;
        $estado = 1;
        $redireccion = "";
        $id_redireccion = 0;
        $f_cierre="";
        $ip_cierre="";
        $id_user_cierre="";
*/
        $id_empresa = $datos['id_empresa'];
        $id_grupo_proyecto = $datos['id_grupo'];
        $id_propietario_tkt= $_SESSION['unique_id'];
        $areaTkt = $data[0]->area_dest_tkt;
        $etiqueta = $data[0]->etiqueta;
        $descrip = $data[0]->descrip;
        $estado = 1;
        $redireccion = "";
        $id_redireccion = 0;
        $f_cierre=0;
        $ip_cierre="";
        $id_user_cierre="0";

        if($_SESSION['id_area']==3){
            $id_jefe = $_SESSION['id_jefe'];
        }else{
            $id_jefe = 0;
        }


    $guardartkt=mysqli_query($conn, "INSERT INTO tickets (fecha_hora, ip_origen, id_empresa, id_grupo_proyecto, id_propietario_tck, id_area, id_jefe, id_etiqueta ,descrip, estado, descrip_solucion, id_area_redireccion, f_h_cierre, ip_cierre, id_user_cierre )  VALUES ( '{$f_h_actual}', '{$ip}', '{$id_empresa}', '{$id_grupo_proyecto}','{$id_propietario_tkt}','{$areaTkt}', '{$id_jefe}', '{$etiqueta}','{$descrip}','{$estado}','{$redireccion}','{$id_redireccion}','{$f_h_actual}','{$ip_cierre}','{$id_user_cierre}')")or die(mysqli_error($conn));

/*

    $guardartkt=mysqli_query($conn, "INSERT INTO tickets (fecha_hora, ip_origen, id_empresa, id_grupo_proyecto, id_propietario_tck, id_area, id_etiqueta ,descrip, estado, descrip_solucion, id_area_redireccion, f_h_cierre, ip_cierre, id_user_cierre )  VALUES ( '{$f_h_actual}', '{$ip}', '{$id_empresa}', '{$id_grupo_proyecto}','{$id_propietario_tkt}','{$areaTkt}', '{$etiqueta}','{$descrip}','{$estado}','{$redireccion}','{$id_redireccion}','{$f_cierre}','{$ip_cierre}','{$id_user_cierre}')")or die(mysqli_error($conn));
    */
    $id_ultimo_insert = mysqli_insert_id ($conn);
    
    $infoetiq=mysqli_query($conn, "SELECT * FROM etiquetas WHERE id_etiqueta='{$etiqueta}'");
    $nueva=mysqli_fetch_assoc($infoetiq);

    if($guardartkt){
        echo 'Ticket: '.$id_ultimo_insert.' Creado 👍...
              Tiempo estimado: '.$nueva['t_estimado']. " " .$nueva['tipo_t'].'';
    }else{
        echo "error al guardar";
    }
    }elseif($estado==1){

        $estadot = 3;
        $descrip_sol = $data[0]->descrip_sol; 
        $id_tkt = $data[0]->id_tkt;

        $esredireccion=mysqli_query($conn, "SELECT * FROM ticket_redireccion WHERE id_ticket='{$id_tkt}'");

        if(mysqli_num_rows($esredireccion)>0){
            $resolverRedirec=mysqli_query($conn, "UPDATE ticket_redireccion SET estado = '{$estadot}' WHERE id_ticket= '{$id_tkt}' AND area_redireccion = '{$_SESSION['id_area']}'" );

            if($resolverRedirec){
                echo "Ticket redirec resuelto";
                $solucionticket=mysqli_query($conn, "UPDATE tickets SET estado = '{$estadot}', descrip_solucion = '{$descrip_sol}', f_h_cierre ='{$f_h_actual}', ip_cierre = '{$ip}', id_user_cierre = '{$_SESSION['unique_id']}' WHERE id_ticket = '{$id_tkt}'");
            }else{
                echo "No resuelto";
            }
        }else{

            $solucionticket2=mysqli_query($conn, "UPDATE tickets SET estado = '{$estadot}', descrip_solucion = '{$descrip_sol}', f_h_cierre ='{$f_h_actual}', ip_cierre = '{$ip}', id_user_cierre = '{$_SESSION['unique_id']}' WHERE id_ticket = '{$id_tkt}'");

            if($solucionticket2){
                echo "Ticket Resuelto";
            }else{
                echo "No resuelto";
            }

        }
        



       

    }elseif($estado==2){
        $estado = 1;
        $descrip_reasig = $data[0]->descrip_reasig; 
        $id_tkt = $data[0]->id_tkt_reasig;
        $area_redirec = $data[0]->area_redirec;

        $validarRedireccion=mysqli_query($conn, "SELECT * FROM ticket_redireccion WHERE id_ticket = '{$id_tkt}'");

        if(mysqli_num_rows($validarRedireccion)>0){

        foreach($validarRedireccion as $redireccion){

            $ponerRedirAnteriores=mysqli_query($conn, "UPDATE ticket_redireccion SET estado = 2 WHERE id_ticket = '{$id_tkt}'");

        }

        $reasignar=mysqli_query($conn, "INSERT INTO ticket_redireccion(id_ticket, descrip_redirec, area_redireccion, user_redireccion, f_h_redireccion, estado) VALUES ('{$id_tkt}','{$descrip_reasig}','{$area_redirec}','{$_SESSION['unique_id']}','{$f_h_actual}','{$estado}')");


        }else{
      

        $reasignar=mysqli_query($conn, "INSERT INTO ticket_redireccion(id_ticket, descrip_redirec, area_redireccion, user_redireccion, f_h_redireccion, estado) VALUES ('{$id_tkt}','{$descrip_reasig}','{$area_redirec}','{$_SESSION['unique_id']}','{$f_h_actual}','{$estado}')");

        if($reasignar==0){
            echo "Error";
        }else{
            $estado_tck=mysqli_query($conn, "UPDATE tickets SET estado = 2 WHERE id_ticket = '{$id_tkt}'");
            echo "Reasignado con exito";
        }
    }
    }
}else{
    echo "wtf";
}



?>