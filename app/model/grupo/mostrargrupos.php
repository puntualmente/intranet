<?php
include_once (__dir__."/../config.php");
$outgoing_id = $_SESSION['unique_id'];
$output = "";
$sql2 = mysqli_query($conn, "SELECT * FROM grupo_integrante WHERE id_usuario = '{$outgoing_id}'");
$row = mysqli_fetch_assoc($sql2);
if(mysqli_num_rows($sql2) == 0){
    $output .= "No estas en ningún grupo";
}elseif(mysqli_num_rows($sql2) > 0){
    foreach($sql2 as $value){
    $id_grupo=$value['id_grupo'];
    $sql3 = mysqli_query($conn, "SELECT * FROM grupos_chat WHERE id_grupo = '{$id_grupo}'");
    $row2 = mysqli_fetch_assoc($sql3);
    $n_chat = $row2['n_grupo'];
    $letra=$n_chat[0];

    $notys=mysqli_query($conn, "SELECT * FROM mensajes_grupos WHERE id_grupo ='{$id_grupo}' AND id_persona ='{$_SESSION['unique_id']}' AND estado='0'");
    $notify=0;
    if(mysqli_num_rows($notys)>0){
        $notify=mysqli_num_rows($notys);
    }else{
        $notify="";
    }
    

    $output .= 
    '
    <li>
    <a id="' . $id_grupo . '" type="button" id="' . $row['id'] . '" onclick="hola(this.id)" >
        <div class="d-flex align-items-center">
            <div class="flex-shrink-0 avatar-sm me-3">
                <span class="avatar-title rounded-circle  bg-primary-subtle text-primary">
                    '.$letra.'
                </span>
            </div>
            
            <div class="flex-grow-1">
                <h5 class="font-size-14 mb-0">'.$row2['n_grupo'].'</h5>
            </div>
           
            <div class="unread-message">
                <span class="badge bg-danger rounded-pill">'.$notify.'</span>
            </div>
        </div>
    </a>
    </li>
';
}
}
echo $output;


    ?>