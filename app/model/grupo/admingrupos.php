<?php
    include_once (__dir__."/../config.php");


    if(!isset($_POST['x'])){

    $idgrupo = mysqli_real_escape_string($conn, $_POST['id_grupo']);
  

    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM grupo_integrante WHERE id_grupo = {$idgrupo} ORDER BY id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "No users are available to chat";
    }elseif(mysqli_num_rows($query) > 0){
        while ($row = mysqli_fetch_assoc($query)) {
            $id_user=$row['id_usuario'];
            $rolgrupo=$row['tipo_user'];

            if($rolgrupo=="admin"){
                $clase="danger";
                $onclick="admin(this.id)";
            }else{
                $clase="warning";
                $onclick="admin(this.id)";
            }

            $sql3 = "SELECT * FROM users WHERE id = {$id_user}";
            $query3 = mysqli_query($conn, $sql3);
            while ($row2 = mysqli_fetch_assoc($query3)) {
                if($row['id_usuario']!=$outgoing_id){
                    $output .= '
                    <div id="' . $row2['id'] . '">
                    <li >

                    <a>
                        <div class="d-flex align-items-start">
                            
                            <div class="flex-shrink-0 user-img align-self-center me-3">
                                <img src="'.controlador::$rutaAPP.'app/assets/images/users/' . $row2['img'] . '" class="rounded-circle avatar-sm" alt="">
                            </div>
                            
                            <div class="flex-grow-1 overflow-hidden">
                                <h5 class="text-truncate font-size-14 mb-1">' . $row2['n_user'] . " " . $row2['l_user'] .'</h5>
                            </div>
                            <div class="flex-shrink-0">
                            <button id="' . $row2['id'] . '" onclick="borraruser2(this.id)" type="button" class="btn btn-light"><i class=" fas fa-user-minus"></i></button>
                            </div>
                        </div>
                    </a>

                </li>
                </div>';
                    
                }else{
                    $output .= '';
                }
                 
            }}}
    echo $output;
        }else{
            $data=json_decode($_POST['x']);
            $idgrupo=$data->idgrupo;

            $outgoing_id = $_SESSION['unique_id'];
            $sql = "SELECT * FROM grupo_integrante WHERE id_grupo = {$idgrupo} ORDER BY id_integrante_grupo DESC";
            $query = mysqli_query($conn, $sql);
            $output = "";
            if(mysqli_num_rows($query) == 0){
                $output .= "No users are available to chat";
            }elseif(mysqli_num_rows($query) > 0){
                while ($row = mysqli_fetch_assoc($query)) {
                    $id_user=$row['id_usuario'];
                    $rolgrupo=$row['tipo_u'];

                    if($rolgrupo=="admin"){
                        $clase="danger";
                        $onclick="admin(this.id)";
                    }else{
                        $clase="warning";
                        $onclick="admin(this.id)";
                    }

                    $sql3 = "SELECT * FROM users WHERE unique_id = {$id_user}";
                    $query3 = mysqli_query($conn, $sql3);
                    while ($row2 = mysqli_fetch_assoc($query3)) {
                        if($row['id_usuario']!=$outgoing_id){
                            $output .= '
                            <div class="users-list">
                                <a id="'.$row['id_usuario'].'">
                                <div class="content">
                                <img src="php/images/grupo/' . $row2['img'] . '" alt="">
                                <div class="details">
                                    <span>' . $row2['fname'] . " " . $row2['lname'] . '</span>
                                </div>
                                </div>
                                <div> 
                                <button class="btn btn-outline-'.$clase.'" title="Asignar rol admin" id="'.$row['id_usuario'].'" onclick="'.$onclick.'"><i class="fa-solid fa-crown"></i></button>
                                <button class="btn btn-outline-danger" id="'.$row['id_usuario'].'" onclick="borraruser(this.id)"><i class="fa-solid fa-minus"></i></button>
                                </div>
                                </a>
                            </div>';
                        }
                        
                    }}}
            echo $output;
    
        }

?>
    

    