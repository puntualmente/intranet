<?php
    include_once (__dir__."/../config.php");
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT id = {$outgoing_id} ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
 
    $mensajes=[];
    $noestan=[];
    $estan=[];
    $orden=[];
    $mensajes2=[];
    $mayor=0;
   
    foreach($query as $row){
        $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['id']}
        OR outgoing_msg_id = {$row['id']}) AND (outgoing_msg_id = {$outgoing_id} 
        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);

        foreach($query2 as $msg){

            array_push($mensajes2, [
                "msg_id" => $msg['msg_id'],
                "us_id" => $row['id']
            ]);
        }  
    }

    RSORT($mensajes2);

    $ordenado = [];
  
    $ordenado = array_map(function($mensajes2) {
        return $mensajes2['us_id'];
      }, $mensajes2);
    
    $output = "";
    $class="";
       

    function getnoti($notis){
        $cont=0;
        foreach($notis as $noti){
            if($noti['estado']==0){
                $cont=$cont+1;
            }
        }
        return $cont;
    }

    function formatohora($hora){

            return date("g:i a",strtotime($hora));;
        
    }
   


    if(mysqli_num_rows($query) == 0){
        $output .= "No tienes chats";
    }elseif(mysqli_num_rows($query) > 0){

        foreach($ordenado as $esta) {
            $msg="";
            $sql = "SELECT * FROM users WHERE id= {$esta}";
            $query = mysqli_query($conn, $sql);
            $row8 = mysqli_fetch_assoc($query);

            
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row8['id']}
                        OR outgoing_msg_id = {$row8['id']}) AND (outgoing_msg_id = {$outgoing_id} 
                        OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
            $query2 = mysqli_query($conn, $sql2);
            $row2 = mysqli_fetch_assoc($query2);
            (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result = "No hay mensajes disponibles";
            (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;
            if (isset($row2['outgoing_msg_id'])) {
                ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
            } else {
                $you = "";
            }
            ($row8['status'] == "Desconectado") ? $class = "" : $class = "online";
            ($outgoing_id == $row['id']) ? $hid_me = "hide" : $hid_me = "";

            $consulnotis="SELECT * FROM messages WHERE (outgoing_msg_id = {$row8['id']}) AND (outgoing_msg_id = {$outgoing_id} 
            OR incoming_msg_id = {$outgoing_id})";
            $notis=mysqli_query($conn, $consulnotis);
            $unread=getnoti($notis);

            if($unread!=0){
                $notify='<div class="unread-message">
                <span class="badge bg-danger rounded-pill">'.$unread.'</span>
            </div>';
                $class2='class="unread"';
                
            }else{
                $class2='';
                $notify='';
            }

            if(!empty($row2['hora'])){
                $f_actual=date("Y-m-d");
                if($row2['fecha']===$f_actual){
                    $tiempo=formatohora($row2['hora']);
                }else{
                    $newDate = date("d-m-Y", strtotime($row2['fecha']));
                    $tiempo=$newDate;
                }
            }else{
                $tiempo="";
            }

            if($msg==""){
                $msg='<i class="fas fa-image">  Foto </i>';
            }else{
                $msg=$msg;
            }

            
            //class="active"
            $output .= '
                            <li '.$class2.'>

                                <a type="button" id="' . $row8['id'] . '" onclick="holausers(this.id)">
                                    <div class="d-flex align-items-start">
                                        
                                        <div class="flex-shrink-0 user-img '. $class .' align-self-center me-3">
                                            <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row8['img'] . '" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>
                                        
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">' . $row8['n_user'] . " " . $row8['l_user'] .'</h5>
                                            <p class="text-truncate mb-0">'. $msg .'</p>
                                        </div>
                                        <div class="flex-shrink-0">
                                            <div class="font-size-11">'.$tiempo.'</div>
                                        </div>
                                        '.$notify.'
                                    </div>
                                </a>

                            </li>
                        ';
        }
    }
    echo $output;


?>