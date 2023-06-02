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
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) AND tipo = 0 ORDER BY msg_id";
                $query = mysqli_query($conn, $sql);
                
                foreach($query as $q){
                    if($q['imagen']!=""){
                        $output.=$q['imagen'].",";  
                    }
                    
                }
                echo $output;
        }else{
            echo "No esta bien";
        }
}