<?php
    include_once (__dir__."/../config.php");
  
    
    if(!isset($_POST['x'])){
    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
    $sql = "SELECT * FROM users WHERE NOT unique_id = {$outgoing_id} AND (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data-user-group.php";
    }else{
        $output .= 'No se encontraron usuarios';
    }
    echo $output;

    }else{
        $data = json_decode($_POST['x']);
        $id_user_group = $data[0]->id_user_group;
        $estado= $data[0]->estado;

        $sql3 = "SELECT * FROM users WHERE id = {$id_user_group}";
        $output = "";
        $query3 = mysqli_query($conn, $sql3);
        if(mysqli_num_rows($query3) > 0){
        
    if(isset($query)){
        while ($row = mysqli_fetch_assoc($query)) {
            $sql2 = "SELECT * FROM messages WHERE (incoming_msg_id = {$row['unique_id']}
                        OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
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
            ($row['status'] == "offline now") ? $offline = "offline" : $offline = "";
            ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
        
            $output .= '
            <li>

            <a type="button" id="' . $row['id'] . '" onclick="hola(this.id)">
                <div class="d-flex align-items-start">
                    
                    <div class="flex-shrink-0 user-img '. $class .' align-self-center me-3">
                        <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row['img'] . '" class="rounded-circle avatar-sm" alt="">
                        <span class="user-status"></span>
                    </div>
                    
                    <div class="flex-grow-1 overflow-hidden">
                        <h5 class="text-truncate font-size-14 mb-1">' . $row['n_user'] . " " . $row['l_user'] .'</h5>
                        <p class="text-truncate mb-0">'. $msg .'</p>
                    </div>
                    <div class="flex-shrink-0">
                        <div class="font-size-11">02 min</div>
                    </div>
                </div>
            </a>

        </li>';
        }
    }else{
            while ($row = mysqli_fetch_assoc($query3)) {

                if($estado==false){
                    $output .= '
                    <li id="' . $row['id'] . '">

                    <a>
                        <div class="d-flex align-items-start">
                            
                            <div class="flex-shrink-0 user-img align-self-center me-3">
                                <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row['img'] . '" class="rounded-circle avatar-sm" alt="">
                            </div>
                            
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">' . $row['n_user'] . " " . $row['l_user'] .'</h5>
                            </div>
                            <div class="flex-shrink-0">
                            <button id="' . $row['id'] . '" onclick="borraruser(this.id)" type="button" class="btn btn-light"><i class=" fas fa-user-minus"></i></button>
                            </div>
                        </div>
                    </a>

                </li>'; 
                            // agregar borraruser   
                        }else{
                            $output .= '
                            <div id="' . $row['id'] . '">
                            <li>
        
                            <a>
                                <div class="d-flex align-items-start">
                                    
                                    <div class="flex-shrink-0 user-img align-self-center me-3">
                                        <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row['img'] . '" class="rounded-circle avatar-sm" alt="">
                                    </div>
                                    
                                    <div class="flex-grow-1 overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">' . $row['n_user'] . " " . $row['l_user'] .'</h5>
                                    </div>
                                    <div class="flex-shrink-0">
                                    <button id="' . $row['id'] . '" onclick="borraruser2(this.id)" type="button" class="btn btn-light"><i class=" fas fa-user-minus"></i></button>
                                    </div>
                                </div>
                            </a>
        
                        </li>
                        </div>
                        '; 
                }
                
                            }
        
    }


        }else{
            $output .= 'No se encontraron usuarios';
        }
        echo $output;
    }
  

?>