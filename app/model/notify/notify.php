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