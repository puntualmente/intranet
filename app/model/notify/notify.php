<?php
      include_once(__dir__."/../admintablas/sqls_admin.php");
      include_once (__dir__."/../config.php");

if(!isset($_POST['x'])){

    if(getnoti($consulnotis)>0){
        echo getnoti($consulnotis);
    }else{
        echo "";
    }
    

}else{
    $data = json_decode($_POST['x']);
    $estado = $data[0]->estado;

    if($estado==1){
        if(getnoti($consulnotis)>0){
            echo getnoti($noty_grupos);
        }else{
            echo "";
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




?>