<?php
include_once (__dir__."/../config.php");
date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d ");

$areas=mysqli_query($conn, "SELECT * FROM areas");
$grupos=mysqli_query($conn, "SELECT * FROM grupos");
$empresas=mysqli_query($conn, "SELECT * FROM empresas");
$sedes=mysqli_query($conn, "SELECT * FROM sedes");
$usuarios=mysqli_query($conn, "SELECT * FROM users WHERE NOT id='{$_SESSION['unique_id']}'");
$consulnotis=mysqli_query($conn,"SELECT * FROM messages WHERE ( incoming_msg_id = {$_SESSION['unique_id']})");
$grupos_chat=mysqli_query($conn, "SELECT * FROM grupos_chat");
$etiquetas=mysqli_query($conn, "SELECT * FROM etiquetas");
$campana=mysqli_query($conn, "SELECT *FROM users INNER JOIN log_session ON users.cedula=log_session.id_user WHERE log_session.accion='login' AND log_session.f_h LIKE '{$hoy}%'");



$mistickets = mysqli_query($conn, "SELECT * FROM tickets WHERE id_propietario_tck = '{$_SESSION['unique_id']}'");

$redirigidosporarea=mysqli_query($conn, "SELECT * FROM ticket_redireccion WHERE id_jefe = '{$_SESSION['unique_id']}' AND estado = 1 OR estado = 3");


if($_SESSION['rol']==2||$_SESSION['rol']==1){

    if($_SESSION['id_area']==3){
        $ticketsPorArea = mysqli_query($conn, "SELECT * FROM tickets WHERE id_jefe='{$_SESSION['unique_id']}'");
    }else{
        $ticketsPorArea = mysqli_query($conn, "SELECT * FROM tickets WHERE id_jefe = '{$_SESSION['unique_id']}'");
    }
}

$noty_grupos = mysqli_query($conn, "SELECT * FROM mensajes_grupos WHERE id_persona = '{$_SESSION['unique_id']}' AND estado='0'");

?>