<?php
include_once(__DIR__ . "/../config.php");
$outgoing_id = $_SESSION['unique_id'];
$output = "";
$sql2 = mysqli_query($conn, "SELECT * FROM grupo_integrante WHERE id_usuario = '{$outgoing_id}'");
$row = mysqli_fetch_assoc($sql2);

$mensajes2 = [];
$noestan = [];

foreach($sql2 as $row){
    $id_grupo = $row['id_grupo'];
    $chat_grupo = mysqli_query($conn, "SELECT * FROM messages_grupos INNER JOIN users ON messages_grupos.outgoing_msg_id = users.id WHERE incoming_msg_id = '$id_grupo' ORDER BY msg_id DESC LIMIT 1");
    $row2 = mysqli_fetch_assoc($chat_grupo);



        foreach($chat_grupo as $msg){

            array_push($mensajes2, [
                "msg_id" => $msg['msg_id'],
                "grupo_id" => $id_grupo
            ]);
        }  
    if(mysqli_num_rows($chat_grupo)==0){
        array_push($noestan, $id_grupo);
    }
}

RSORT($mensajes2);

$ordenado = [];

$ordenado = array_map(function($mensajes2) {
    return $mensajes2['grupo_id'];
  }, $mensajes2);

foreach($noestan as $no){
    array_push($ordenado, $no);
}

if (mysqli_num_rows($sql2) == 0) {
    $output .= "No estas en ningún grupo";
} elseif (mysqli_num_rows($sql2) > 0) {

    foreach($ordenado as $esta) {

        $id_grupo = $esta;
        $sql3 = mysqli_query($conn, "SELECT * FROM grupos_chat WHERE id_grupo = '{$id_grupo}'");
        $row2 = mysqli_fetch_assoc($sql3);
        $n_chat = $row2['n_grupo'];
        $letra = $n_chat[0];

        $notys = mysqli_query($conn, "SELECT * FROM mensajes_grupos WHERE id_grupo ='{$id_grupo}' AND id_persona ='{$_SESSION['unique_id']}' AND estado='0'");
        $notify = 0;
        if (mysqli_num_rows($notys) > 0) {
            $notify = mysqli_num_rows($notys);
        } else {
            $notify = "";
        }

        $chat_grupo = mysqli_query($conn, "SELECT * FROM messages_grupos INNER JOIN users ON messages_grupos.outgoing_msg_id = users.id WHERE incoming_msg_id = '$id_grupo' ORDER BY msg_id DESC LIMIT 1");

        $info_chat = mysqli_fetch_assoc($chat_grupo);

        $f_actual = date("Y-m-d");



        if (empty($info_chat['n_user']) || empty($info_chat['msg'])) {

            if (!empty($info_chat['imagen'])) {
                $nombre = $info_chat['n_user'] . ":";
                $msg = '<i class="fas fa-image">  Foto </i>';
                if ($info_chat['fecha'] == $f_actual) {
                    $tiempo = formatohora($info_chat['hora']);
                } else {
                    $newDate = date("d-m-Y", strtotime($info_chat['fecha']));
                    $tiempo = $newDate;
                    $msg = '<i class="fas fa-image">  Foto </i>';
                }
            } else {
                $tiempo = "";
                $nombre = "No hay mensajes";
                $msg = "";
            }
        } else {
            $nombre = $info_chat['n_user'] . ":";
            $msg = $info_chat['msg'];

            if ($info_chat['fecha'] === $f_actual) {
                $tiempo = formatohora($info_chat['hora']);
            } else {
                $newDate = date("d-m-Y", strtotime($info_chat['fecha']));
                $tiempo = $newDate;
            }
        }

        $output .=
            '
    <li>
    <a id="' . $id_grupo . '" type="button" id="' . $row['id'] . '" onclick="holagrupos(this.id)" >
        <div class="d-flex align-items-start">

            <div class="flex-shrink-0 avatar-sm me-3">
                <span class="avatar-title rounded-circle  bg-primary-subtle text-primary">
                    ' . $letra . '
                </span>
            </div>
            
            <div class="flex-grow-1 overflow-hidden">
                <h5 class="font-size-14 mb-0">' . $row2['n_grupo'] . '</h5>
                <p class="text-truncate mb-0">' . $nombre . ' ' . $msg . '</p>
            </div>
            <div class="flex-shrink-0">
                <div class="font-size-11"> ' . $tiempo . '</div>
            </div>
            <div class="unread-message">
                <span class="badge bg-danger rounded-pill">' . $notify . '</span>
            </div>
            </div>
        </div>
    </a>
    </li>
';
    }
}

function formatohora($hora)
{

    return date("g:i a", strtotime($hora));
    ;

}


echo $output;