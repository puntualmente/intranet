<?php
date_default_timezone_set('America/Bogota');
if (isset($_SESSION['unique_id'])) {
    include_once (__dir__."/../config.php");
    $output = '';

    $data = json_decode($_POST['x']);
                                                     
        if($data[0]->tipo==0){

            $outgoing_id = $_SESSION['unique_id'];
            $incoming_id = $data[0]->id_user;

                $sql = "SELECT * FROM messages LEFT JOIN users ON users.id = messages.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) AND tipo = 1 ORDER BY msg_id";
                $query = mysqli_query($conn, $sql);
                
                foreach($query as $q){
                    if($q['imagen']!=''){
                        if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                            $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                        }else{
                            $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                        }
                    }
                    
                    
                }
                echo $output;

        }elseif($data[0]->tipo==1){

            $outgoing_id = $_SESSION['unique_id'];
            $incoming_id = $data[0]->id_grupo;

                $sql = "SELECT * FROM messages_grupos LEFT JOIN users ON users.id = messages_grupos.outgoing_msg_id
                WHERE (incoming_msg_id = {$incoming_id}) AND tipo = 1 ORDER BY msg_id";
                $query = mysqli_query($conn, $sql);
                
                foreach($query as $q){
                    if($q['imagen']!=''){
                        if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                            $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                        }else{
                            $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                        }
                    }
                    
                }
                echo $output;
            }elseif($data[0]->tipo==2){

                    
                    $incoming_id = $data[0]->id_grupo;
        
                        $sql = "SELECT * FROM etiquetas_mensajes INNER JOIN messages_grupos ON etiquetas_mensajes.id_mensaje = messages_grupos.msg_id
                        WHERE (etiquetas_mensajes.id_etiqueta = {$incoming_id}) AND messages_grupos.tipo = 1 AND etiquetas_mensajes.tipo=1";
                        $query = mysqli_query($conn, $sql);

                        $output="";
                        
                        foreach($query as $q){
                            if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                                $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                            }else{
                                $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                            }
                            
                        }
                        
                        $sql_2 = "SELECT * FROM etiquetas_mensajes INNER JOIN messages on etiquetas_mensajes.id_mensaje = messages.msg_id
                        WHERE (etiquetas_mensajes.id_etiqueta = {$incoming_id}) AND messages.tipo = 1 AND etiquetas_mensajes.tipo = 0";
                        $query_2 = mysqli_query($conn, $sql_2);

                        foreach($query_2 as $q){
                            if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                                $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                            }else{
                                $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                            }
                            
                        }

                        echo $output;

                    }elseif($data[0]->tipo==3){

                    
                            $incoming_id = $data[0]->id_grupo;
                
                                $sql = "SELECT * FROM messages_grupos WHERE (etiquetas_mensajes.id_etiqueta = {$incoming_id}) AND messages_grupos.tipo = 1 AND etiquetas_mensajes.tipo = 1";
                                $query = mysqli_query($conn, $sql);
        
                                $output="";
                                
                                foreach($query as $q){
                                    if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                                        $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                                    }else{
                                        $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                                    }
                                    
                                }
                                
                                $sql_2 = "SELECT * FROM etiquetas_mensajes INNER JOIN messages on etiquetas_mensajes.id_mensaje = messages.msg_id
                                WHERE (etiquetas_mensajes.id_etiqueta = {$incoming_id}) AND messages.tipo = 1 AND etiquetas_mensajes.tipo = 0";
                                $query_2 = mysqli_query($conn, $sql_2);
        
                                foreach($query_2 as $q){
                                    if(file_exists(__DIR__."/../../assets/images/chat/".$q['imagen'])){
                                        $output.="/intranet/app/assets/images/chat/".$q['imagen'].",";  
                                    }else{
                                        $output.="/intranet/app/assets/images/chatgrupos/".$q['imagen'].","; 
                                    }
                                    
                                }
        
                                echo $output;
         
         }else{ 
            echo "No esta bien";
        }
}