<?php
    include_once (__dir__."/../config.php");
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM users WHERE NOT id = {$outgoing_id} ORDER BY n_user ASC";
    $query = mysqli_query($conn, $sql);
 
    //$ordenado=$orden + $noestan;
   
   

    $output = "";
    $class="";

   
    if(mysqli_num_rows($query) == 0){
        $output .= "No Hay Usuarios";
    }elseif(mysqli_num_rows($query) > 0){

        $letra = ""; 

        foreach($query as $esta) { 

            if($letra==$esta['n_user'][0]) {
                $mostrarletra="";
            }else{
                $letra=$esta['n_user'][0];
                $mostrarletra='<div class="px-3 contact-list">'.$letra.'</div>';
            }        
            //class="active"
            $output .= '
                    <div >
                        
                        '.$mostrarletra.'

                        <ul class="list-unstyled chat-list">
                            <li>
                                <a type="button" id="' . $esta['id'] . '" onclick="hola(this.id)">
                                    <h5 class="font-size-14 mb-0">'.$esta['n_user']." ".$esta['l_user'].'</h5>
                                </a>
                            </li>
                        </ul>
                    </div>
                        ';
        }
    }
    echo $output;


?>