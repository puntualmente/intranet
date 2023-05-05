<?php
include_once (__dir__."/../config.php");
include_once (__dir__."/../admintablas/sqls_admin.php");



if(isset($_POST['tipo'])){
    $users = json_decode($_POST['users']);
    $nombre=[];
    
    foreach($users as $value){
        $sql = "SELECT * FROM users WHERE unique_id= '{$value}'";
        $datos = mysqli_query($conn, $sql);
        foreach($datos as $value){
    
            array_push($nombre,$value['fname'] . " " . $value['lname']);
        
        }
    }
    
    $nams = implode(", ", $nombre);
    echo $nams;
}else{
        $data = json_decode($_POST['x']);
                                                     
        if($data[0]->tipo==1){
            $output ='    
            <label for="sel_user" class="form-label font-size-13 text-muted">Elige un usuario:</label>
            <select class="form-control" data-trigger name="sel_user" id="sel_user">
            <option value="0" selected disabled>1. Seleccione una etiqueta</option>';

            $id_area=$data[0]->id_area;

            if($_SESSION['id_area']==3 && $id_area==3){

                $sql="SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}' and jefe_grupo.id_grupo = '{$_SESSION['id_grupo']}'";
                $users_area_jefes = mysqli_query($conn, $sql);
                foreach($users_area_jefes as $jefes){
                    $output .='
                        <option value="'.$jefes['id'].'">'.$jefes['n_user']." ".$jefes['l_user'].'</option>
                    ';
                }
            }else{
                $sql="SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}'";
                $users_area_jefes = mysqli_query($conn, $sql);
                foreach($users_area_jefes as $jefes){
                    $output .='
                        <option value="'.$jefes['id'].'">'.$jefes['n_user']." ".$jefes['l_user'].'</option>
                    ';
                }
            }
          
        $output .='</select>';

            $output .='    
            <label for="sel_etiqueta" class="form-label font-size-13 text-muted">Etiqueta:</label>
            <select class="form-control" data-trigger name="sel_etiqueta" id="sel_etiqueta">
            <option value="0" selected disabled>1. Seleccione una etiqueta</option>';

            $id_area=$data[0]->id_area;
            $sql="SELECT * FROM etiquetas WHERE id_area= {$id_area}";
            $etiquetas_area = mysqli_query($conn, $sql);
            foreach($etiquetas_area as $value){
                $output .='
                    <option value="'.$value['id_etiqueta'].'">'.$value['descrip_etiq'].'</option>
                ';
            }
        $output .='</select>';
            echo $output;

        }elseif($data[0]->tipo==2){
            $output="";
            $output .='    
            <label for="sel_user" class="form-label font-size-13 text-muted">Selecciona Usuario:</label>
            <select class="form-control" data-trigger name="sel_user" id="sel_user">
            <option value="0" selected disabled>1. Seleccione un Usuario</option>';

            $id_area=$data[0]->id_area;

            $sql="SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}'";
            $jefes_area = mysqli_query($conn, $sql);
            foreach($jefes_area as $jefe){
                $output .='
                    <option value="'.$jefe['id'].'">'.$jefe['n_user']." ".$jefe['l_user'].'</option>
                ';
            }
        $output .='</select>';
            echo $output;
        }

}


?>