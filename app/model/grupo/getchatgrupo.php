<?php
date_default_timezone_set('America/Bogota');
if (isset($_SESSION['unique_id'])) {
    include_once (__dir__."/../config.php");
    $output = '';
    $outgoing_id = $_SESSION['unique_id'];
    $incoming_id = mysqli_real_escape_string($conn, $_POST['id_grupo']);
    $sql2="SELECT * FROM grupos_chat WHERE id_grupo={$incoming_id}";
    $query2 = mysqli_query($conn, $sql2);

$vistos="UPDATE mensajes_grupos SET estado = 1 WHERE (id_grupo = {$incoming_id}) AND (id_persona = {$outgoing_id})";

       
        $visto=mysqli_query($conn, $vistos);
        $sql3 = "SELECT * FROM messages_grupos LEFT JOIN users ON id = messages_grupos.outgoing_msg_id
                WHERE (incoming_msg_id = {$incoming_id}) ORDER BY msg_id";
        $query3 = mysqli_query($conn, $sql3);
        $unavez=false;
        $unavez2=false;
        $output = '';

        if (mysqli_num_rows($query3) > 0) {

         
            $cuando="";
            $dia = date('Y-m-d');
            while ($row = mysqli_fetch_assoc($query3)) {

              

               
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

                if ($row['outgoing_msg_id'] === $outgoing_id) {
                   
                    if($row['tipo']!=1){
                        $output .= salida($_SESSION['username'], $row['msg'], formatohora($row['hora']), $row['msg_id']);
                        /*$output .= '
                        <div class="chat outgoing" id="'. $row['msg_id'] .'">
                        <div class="details">
                            <p>' . $row['msg'] . ' <br> <spam class="horasali"> ' . formatohora($row['hora']) . '</spam></p>
                        </div>
                        </div>';*/
                    }else{
                        $output.=salidamostrarimagen($row['n_user']." ".$row['l_user'],formatohora($row['hora']), $row['imagen']); 
                    }
                    
                } else {
                    if($row['tipo']!=1){

                    $output .= entrada($row['n_user']." ".$row['l_user'], formatohora($row['hora']), $row['msg'], $row['msg_id']);


                }else{
                    $output.=entradamostrarimagen($row['n_user']." ".$row['l_user'],formatohora($row['hora']), $row['imagen']); 
                }
            }
            }
        }else{
            $output .= '<div class="text">No hay mensajes disponibles. Una vez que envíe el mensaje, aparecerán aquí.</div>';
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
                                                   
                                                        <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg">Etiquetar </button>
                                                        <button type="button" id="'.$id.'" value="'.$mensaje.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviarid1v1(this.id, this.value)">Reenviar </button>
                        
                                                    </div>
                                                </div>
                        
                                                    
                                                    
                                                </div>
                                            </div>
                                            
                                        </li>
    
            ';
            return $output;
        }
    
        function salida($nombre, $mensaje, $hora, $id){
            $output='
    
                    <li class="right">
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
                                                   
                                <button type="button" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_etiq_msg">Etiquetar </button>
                                <button type="button" id="'.$id.'" value="'.$mensaje.'" class="dropdown-item" data-bs-toggle="modal"  data-bs-target="#modal_reenviar_msg" onclick="enviarid1v1(this.id, this.value)">Reenviar </button>
 
                            </div>
                        </div>
                        
                            
                        </div>
                    </div>
                    
                </li>    
            ';
            return $output;
        }
        
        function entradamostrarimagen($nombre, $hora, $imagen){
            $output='
            <li >
                                            <div class="conversation-list">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                                                        <ul class="list-inline message-img mt-3  mb-0">
                                                            <li class="list-inline-item message-img-list">
                                                                <a class="d-inline-block m-1">
                                                                    <img src="'.controlador::$rutaAPP.'app/assets/images/chatgrupos/'.$imagen.'" class="rounded img-thumbnail" onclick="verimagen(this.src)" type="button">
                                                                </a>                                                                  
                                                            </li>
    
                                                        </ul>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>';
            return $output;
        }
    
        function salidamostrarimagen($nombre, $hora, $imagen){
            $output='
            <li class="right">
                                            <div class="conversation-list">
                                                <div class="ctext-wrap">
                                                    <div class="ctext-wrap-content">
                                                        <h5 class="conversation-name"><a href="#" class="user-name">'.$nombre.'</a> <span class="time">'.$hora.'</span></h5>
                                                        <ul class="list-inline message-img mt-3  mb-0">
                                                            <li class="list-inline-item message-img-list">
                                                                <a class="d-inline-block m-1">
                                                                    <img src="'.controlador::$rutaAPP.'app/assets/images/chatgrupos/'.$imagen.'" class="rounded img-thumbnail" onclick="verimagen(this.src)" type="button">
                                                                </a>                                                                  
                                                            </li>
    
                                                        </ul>
                                                    
                                                </div>
                                            </div>
                                        </li>
                                    </ul>';
            return $output;
        }
?>