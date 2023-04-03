<?php
      include_once(__dir__."/../admintablas/sqls_admin.php");
      include_once (__dir__."/../config.php");

if(!isset($_POST['x'])){

    if(getnoti($consulnotis)>0){
        echo getnoti($consulnotis);
    }else{
        echo getnoti($consulnotis);
    }
    

}else{
    $data = json_decode($_POST['x']);
    $estado = $data[0]->estado;

    if($estado==1){
        if(getnoti($consulnotis)>0){
            echo getnoti($noty_grupos);
        }else{
            echo getnoti($noty_grupos);
        }
    }elseif($estado==2){
        $tickets=mysqli_query($conn, "SELECT * FROM tickets WHERE id_area = '{$_SESSION['id_area']}' and estado = 1");

        if(getnotitickets($tickets)>0){
            echo getnotitickets($tickets);
        }else{
            echo getnotitickets($tickets);
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