<?php
date_default_timezone_set('America/Bogota');
if (isset($_SESSION['unique_id'])) {
    include_once (__dir__."/../config.php");
    $output = '';
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['id_user']);
    $sql2="SELECT * FROM grupos_chat WHERE id_grupo={$incoming_id}";
    $query2 = mysqli_query($conn, $sql2);

        $sql = "SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id
        WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
        OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        $output = '';
        $vistos="UPDATE messages SET estado = 1 WHERE (outgoing_msg_id = {$incoming_id}) AND (outgoing_msg_id = {$outgoing_id} OR incoming_msg_id = {$outgoing_id})";

        $visto=mysqli_query($conn, $vistos);
        

        if (mysqli_num_rows($query) > 0) {
            $unavez=false;
            $unavez2=false;
            $cuando="";
            $dia = date('Y-m-d');
            $output="";
        while ($row = mysqli_fetch_assoc($query)) {

            
               
                if($row['fecha']==$dia){
                    $cuando="Hoy";
                    if($unavez==false){
                        $output .='
                            <li class="chat-day-title"> 
                                <span class="title">'.$cuando.'</span>
                            </li>';
                        $unavez = true;
                    }
                    
                }else{
                    $antes=$row['fecha'];
                        if($antes==$row['fecha']){
                            if($unavez2==false){
                                $output .='
                                    <li class="chat-day-title"> 
                                        <span class="title">'.$antes.'</span>
                                    </li>';
                                $unavez2 = true;
                                $cuando="";
                            }else{
                                $unavez2=false;
                            }
                        }
                    
                }

                if($row['estado']==1){
                    $color='#33adff';
                }else{
                    $color='';
                }

            




    if ($row['outgoing_msg_id'] === $outgoing_id) {
        if($row['tipo']!=1){

            $output .= salida($_SESSION['username'], $row['msg'], formatohora($row['hora']), $color, $row['msg_id']);


            }else{
            $output.=salidamostrarimagen($row['n_user']." ".$row['l_user'],formatohora($row['hora']), $row['imagen'], $color, $row['msg_id'], $incoming_id); 
            }
    } else {
        if($row['tipo']!=1){

            $output .= entrada($row['n_user']." ".$row['l_user'], formatohora($row['hora']), $row['msg'], $row['msg_id']);

          


        }else{
            $output.=entradamostrarimagen($row['n_user']." ".$row['l_user'],formatohora($row['hora']), $row['imagen'], $row['msg_id'], $incoming_id); 
        }
    }

    }$output .= ' </ul>
    </div>'
    ;
    } else {
        $output .= entrada("", "", "NO HAY CHATS PARA MOSTRAR", "");
    }}

        echo $output;

 

    
    function formatohora($hora){

        

        return date("g:i a",strtotime($hora));;
    
    
}
  
    function entrada($nombre, $hora, $mensaje, $id){
        $output='
                                   
                                    <li>
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                                                    <p class="mb-0">'.$mensaje.'</p>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                   
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg" onclick="pasarid('.$id.')">
                                                    Etiquetar </button>
                                                    <button type="button" id="'.$id.'" value="'.$mensaje.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviarid1v1(this.id, this.value)">
                                                    Reenviar </button>
 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        
                                    </li>

        ';
        return $output;
    }

    function salida($nombre, $mensaje, $hora, $color, $id){
        $output='

                <li class="right">
                <div class="conversation-list">
                    <div class="ctext-wrap">
                        <div class="ctext-wrap-content">
                            <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                            <p class="mb-0">'.$mensaje.'</p>
                            <i class="fas fa-check-double" style="color: '.$color.'; font-size: 10px;"></i>
                        </div>
                        <div class="dropdown align-self-start">
                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-vertical-rounded"></i>
                            </a>
                            <div class="dropdown-menu">
                                                   
                                <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg" onclick="pasarid('.$id.')">Etiquetar </button>
                                <button type="button" id="'.$id.'" value="'.$mensaje.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviarid1v1(this.id, this.value)">Reenviar </button>
 
                            </div>
                        </div>
                        
                </div>
                
            </li>    
        ';
        return $output;
    }
    
    function entradamostrarimagen($nombre, $hora, $imagen, $id, $incoming_id){

        $archivo = (__dir__."/../../assets/images/chat/$imagen");
        if(file_exists($archivo)){
            $ruta = controlador::$rutaAPP."app/assets/images/chat/".$imagen;
        }else{
            $ruta = controlador::$rutaAPP."app/assets/images/chatgrupos/".$imagen;
        }

        $output='
        <li >
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                                                    <ul class="list-inline message-img mt-3  mb-0">
                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1">
                                                                <img onclick="verimagen(this.alt)" type="button" value="'.$incoming_id.'" src="'.$ruta.'" alt="'.$ruta.'" class="rounded img-thumbnail" ">
                                                            </a>                                                                  
                                                        </li>

                                                    </ul>
                                                </div>
                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                   
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg" onclick="pasarid('.$id.')">
                                                    Etiquetar </button>
                                                    <button type="button" id="'.$id.'" value="'.$imagen.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviaridgrupo(this.id, this.value)">
                                                    Reenviar </button>
 
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </li>
                                </ul>';
        return $output;
    }

    function salidamostrarimagen($nombre, $hora, $imagen, $color, $id, $incoming_id){

        $archivo = (__dir__."/../../assets/images/chat/$imagen");
        if(file_exists($archivo)){
            $ruta = controlador::$rutaAPP."app/assets/images/chat/".$imagen;
        }else{
            $ruta = controlador::$rutaAPP."app/assets/images/chatgrupos/".$imagen;
        }

        $output='
        <li class="right">
                                        <div class="conversation-list">
                                            <div class="ctext-wrap">
                                                <div class="ctext-wrap-content">
                                                    <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                                                    <ul class="list-inline message-img mt-3  mb-0">
                                                        <li class="list-inline-item message-img-list">
                                                            <a class="d-inline-block m-1">
                                                            <img onclick="verimagen(this.alt)" type="button" value="'.$incoming_id.'" src="'.$ruta.'" alt="'.$ruta.'" class="rounded img-thumbnail" ">
                                                            </a>                                                      <i class="fas fa-check-double" style="color: '.$color.'; font-size: 10px;"></i>
           
                                                        </li>

                                                    </ul>
                                                
                                            </div>
                                            <div class="dropdown align-self-start">
                                            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </a>
                                            <div class="dropdown-menu">
                                           
                                            <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg" onclick="pasarid('.$id.')">
                                            Etiquetar </button>
                                            <button type="button" id="'.$id.'" value="'.$imagen.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviaridgrupo(this.id, this.value)">
                                            Reenviar </button>

                                            </div>
                                        </div>
                                           
                                        </div>
                                    </li>
                                </ul>';
        return $output;
    }


    /* PARA EL MENU LATERAL DE LOS MENSAJES
    <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="#">Copy</a>
                                                        <a class="dropdown-item" href="#">Save</a>
                                                        <a class="dropdown-item" href="#">Forward</a>
                                                        <a class="dropdown-item" href="#">Delete</a>
                                                    </div>
                                                </div>


lo que va en los mensajes para etik...

                                                <div class="dropdown align-self-start">
                                                    <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>
                                                    <div class="dropdown-menu">
                                                   
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg">
                                                    Etiquetar </button>
 
                                                    </div>
                                                */