<?php
      include_once(__dir__."/../admintablas/sqls_admin.php");
      include_once (__dir__."/../config.php");

      $tickets=mysqli_query($conn, "SELECT * FROM tickets WHERE id_area = '{$_SESSION['id_area']}' and estado = 1");

if(!isset($_POST['x'])){

    if(getnoti($consulnotis)>0||getnoti($noty_grupos)>0||getnotitickets($tickets)>0){
        $total= getnoti($consulnotis) + getnoti($noty_grupos) + getnotitickets($tickets);
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

        echo getnotitickets($tickets);

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