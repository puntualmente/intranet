<?php
    include_once (__dir__."/../config.php");

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM users WHERE NOT id = {$outgoing_id} AND (n_user LIKE '%{$searchTerm}%' OR l_user LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        $output='';
        foreach($query as $row8){
            ($row8['status'] == "Desconectado") ? $class = "" : $class = "online";
        $output .= '
                 
                            <li>
                                <a type="button" id="' . $row8['id'] . '" onclick="hola(this.id)">
                                    <div class="d-flex align-items-start">
                                        
                                        <div class="flex-shrink-0 user-img '. $class .' align-self-center me-3">
                                            <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row8['img'] . '" class="rounded-circle avatar-sm" alt="">
                                            <span class="user-status"></span>
                                        </div>
                                        
                                        <div class="flex-grow-1 overflow-hidden">
                                            <h5 class="text-truncate font-size-14 mb-1">' . $row8['n_user'] . " " . $row8['l_user'] .'</h5>
                                        </div>
                                       
                                    </div>
                                </a>
                            </li>
                  
                        ';
        }
    }else{
        $output .= 'No se encontraron usuarios';
    }
    echo $output;
?>