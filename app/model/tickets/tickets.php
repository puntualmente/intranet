<?php

include_once (__dir__."/../config.php");
include_once (__dir__."/../admintablas/sqls_admin.php");

if(isset($_POST['x'])){

    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;
    $areas = mysqli_query($conn, "SELECT * FROM areas");

if($estado==3){

    if(!isset($data[0]->borrar) && !isset($data[0]->actualizar)){
        $descrip=$data[0]->descrip;
        $t_estimado=$data[0]->t_estimado;
        $tipo_t=$data[0]->tipo_t;
        $area_etiqueta=$data[0]->area_etiqueta;

        $sql="INSERT INTO etiquetas (id_area, descrip_etiq, t_estimado, tipo_t) VALUES ('{$area_etiqueta}','{$descrip}','{$t_estimado}','{$tipo_t}')";
        $etiqueta=mysqli_query($conn, $sql);
        $area_etiq=mysqli_query($conn, "SELECT * FROM areas");
        $etiquetas = mysqli_query($conn, "SELECT * FROM etiquetas");
        if($etiqueta){
            echo tablaetiquetas($etiquetas, $area_etiq);
        }else{
            echo "Error al guardar";
        }

    }elseif(isset($data[0]->actualizar)){
            if($data[0]->actualizar==true){
                $descrip=$data[0]->descrip;
                $t_estimado=$data[0]->t_estimado;
                $tipo_t=$data[0]->tipo_t;
                $area_etiqueta=$data[0]->area_etiqueta;
                $id=$data[0]->id_etiqueta;
    
                $sql="UPDATE etiquetas SET id_area='{$area_etiqueta}', descrip_etiq='{$descrip}', t_estimado='{$t_estimado}', tipo_t='{$tipo_t}' WHERE id_etiqueta= {$id}";
                $etiqueta=mysqli_query($conn, $sql);
                $area_etiq=mysqli_query($conn, "SELECT * FROM areas");
                $etiquetas = mysqli_query($conn, "SELECT * FROM etiquetas");
            if($etiqueta){
                echo tablaetiquetas($etiquetas, $area_etiq);
            }else{
                echo "Error al guardar";
            }
        }

    }elseif(isset($data[0]->borrar) && !isset($data[0]->actualizar)){
        $borrar=$data[0]->borrar;
        if($borrar==true){
        $id = $data[0]->id_etiqueta;

                $sql="DELETE FROM etiquetas WHERE id_etiqueta = '{$id}'";
                $status = mysqli_query($conn, $sql);
                if($status!=0){
                    $area_etiq=mysqli_query($conn, "SELECT * FROM areas");
                    $etiquetas = mysqli_query($conn, "SELECT * FROM etiquetas");
                    echo tablaetiquetas($etiquetas, $area_etiq);
                }else{
                    echo "no se pudo eliminar el dato";
                }
        }elseif($borrar==false){
            $id = $data[0]->id_etiqueta;

                $sql="SELECT * FROM etiquetas WHERE id_etiqueta = '{$id}'";
                $status = mysqli_query($conn, $sql);
                foreach($status as $value){
                    $output='

                <tr>
                    <td>'.$etiqueta['id_etiqueta'].'</td>
                    <td>'.$etiqueta['id_area'].'</td>
                    <td>'.$etiqueta['descrip_etiq'].'</td>
                    <td>'.$etiqueta['t_estimado'].'</td>
                    <td>'.$etiqueta['tipo_t'].'</td>
                    <td>
                    <a type="button" id="'.$etiqueta['id_etiqueta'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                    <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a type="button" id="'.$etiqueta['id_etiqueta'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                    <i class=" fas fa-trash-alt"></i>
                    </a>
                </td>
                </tr>

                    ';
                }
                echo $output;
        }
    
    }
}
}else{
    echo "no hay datos de envio";
}



function tablaetiquetas($etiquetas, $area_etiq){
    $output="";
    

    foreach($etiquetas as $value){
        $narea="";
        foreach($area_etiq as $value2){
            if($value['id_area'] == $value2['id_area']){
                $narea = $value2['n_area'];
             
        $output .= '
        <tr>
                    <td>'.$value['id_etiqueta'].'</td>
                    <td>'.$value['id_area'].'</td>
                    <td>'.$value['descrip_etiq'].'</td>
                    <td>'.$value['t_estimado'].'</td>
                    <td>'.$value['tipo_t'].'</td>
                    <td>
                    <a type="button" id="'.$value['id_etiqueta'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                    <i class="fas fa-pencil-alt"></i>
                    </a>
                    <a type="button" id="'.$value['id_etiqueta'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                    <i class=" fas fa-trash-alt"></i>
                    </a>
                </td>
                </tr>
        ';
            }
    }}
    return $output;
}

?>


