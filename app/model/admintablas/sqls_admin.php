<?php
include_once (__dir__."/../config.php");

$areas=mysqli_query($conn, "SELECT * FROM areas");
$grupos=mysqli_query($conn, "SELECT * FROM grupos");
$empresas=mysqli_query($conn, "SELECT * FROM empresas");
$sedes=mysqli_query($conn, "SELECT * FROM sedes");
$usuarios=mysqli_query($conn, "SELECT * FROM users WHERE NOT id='{$_SESSION['unique_id']}'");
$consulnotis=mysqli_query($conn,"SELECT * FROM messages WHERE ( incoming_msg_id = {$_SESSION['unique_id']})");
$grupos_chat=mysqli_query($conn, "SELECT * FROM grupos_chat");
$etiquetas=mysqli_query($conn, "SELECT * FROM etiquetas");

$noty_grupos = mysqli_query($conn, "SELECT * FROM mensajes_grupos WHERE id_persona = '{$_SESSION['unique_id']}' AND estado='0'");

//Consultas para funciones







?>