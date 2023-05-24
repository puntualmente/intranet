<?php

      include_once(__dir__."/../admintablas/sqls_admin.php");
      include_once (__dir__."/../config.php");

      $tickets=mysqli_query($conn, "SELECT * FROM tickets WHERE id_jefe = '{$_SESSION['unique_id']}' and estado = 1");
      $redir_tickets=mysqli_query($conn, "SELECT * FROM ticket_redireccion where id_jefe = '{$_SESSION['unique_id']}' and estado = 1");

if(!isset($_POST['x'])){

    if(getnoti($consulnotis)>0||getnoti($noty_grupos)>0||getnotitickets($tickets)>0||getnotitickets($redir_tickets)>0){
        if($_SESSION['rol']==3){
        
            $total= getnoti($consulnotis) + getnoti($noty_grupos);
           
        }else{

            $total= getnoti($consulnotis) + getnoti($noty_grupos) + getnotitickets($tickets) + getnotitickets($redir_tickets);

        }
        echo $total;
    }else{
        echo 0;
    }
    

}else{
    $data = json_decode($_POST['x']);
    $estado = $data[0]->estado;

    if($estado==0){

        echo getnoti($consulnotis);

    }elseif($estado==1){

        echo getnoti($noty_grupos);

    }elseif($estado==2){
        if($_SESSION['rol']==1||$_SESSION['rol']==2){
            echo getnotitickets($tickets) + getnotitickets($redir_tickets);
        }else{
            echo 0;
        }

    }elseif($estado==3){
        /*
        $notys_dinam=mysqli_query($conn, "SELECT * FROM notificaciones WHERE id_destino = '{$_SESSION['unique_id']}' and visto = 0");
        $output="";
        foreach($notys_dinam as $noty){

            if($noty['tipo_noty']=="tkt-solu"){
                $color="success";
            }elseif($noty['tipo_noty']=="tkt-redir"){
                $color="danger";
            }elseif($noty['tipo_noty']=="tkt-asig"){
                $color="warning";
            }

           /* $output.= '
                <a href="tickets" class="text-reset notification-item">
                    <div class="d-flex">
                        <div class="flex-shrink-0 avatar-sm me-3">
                            <span class="avatar-title bg-'.$color.' rounded-circle font-size-16">
                                <i class="mdi mdi-ticket-account"></i>
                            </span>
                        </div>
                        <div class="flex-grow-1">
                            <h6 class="mb-1">Tickets</h6>
                            <div class="font-size-13 text-muted">
                                <p class="mb-1">'.$noty['descrip_noty'].'</p>
                                <!-- <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?php //echo $language["3_min_ago"]; ?></span></p> -->
                            </div>
                        </div>
                    </div>
                </a>';
        }
        echo $output;*/

    }
}




      function getnoti($notis){
        $cont=0;
        foreach($notis as $noti){
            if($noti['estado']==0){
                $cont=$cont+1;
            }
        }
        return $cont;
    }

    function getnotitickets($notis){
        $cont=0;
        foreach($notis as $noti){
            if($noti['estado']==1){
                $cont=$cont+1;
            }
        }
        return $cont;
        
    }



?>