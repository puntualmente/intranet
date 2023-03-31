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
                        <textarea name="des_etiqueta" id="des_etiqueta" cols="20" rows="2" value="'. $value['descrip_etiq'] .'">'. $value['descrip_etiq'] .'</textarea>
                        <br>
                        <span for="t_estimado">Tiempo estimado respuesta de la tarea: </span>
                        <input type="number" name="t_estimado" id="t_estimado" value= '. $value['t_estimado'].'>
                        <select name="tipo_t" id="tipo_t">
                            <option value="'.$value['tipo_t'].'" selected disabled>'.$value['tipo_t'].'</option>
                            <option value="horas">Horas</option>
                            <option value="dias">Dias</option>
                        </select>
                        <select name="area_etiqueta" id="area_etiqueta">
                            '.selectareas($areas, $value['id_area']).'
                        </select>
                        <button type="button" id="'. $value['id_etiqueta'] .'" class="btn-borde" onclick="actualizaretiqueta(this.id)">Actualizar</button>
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
            <td>
                <span>' . $value['descrip_etiq'] . '</span>
            </td>
            <td>
                <span>' . $narea .'</span>
            </td>
            <td>
                <span>' .$value['t_estimado'] . " " . $value['tipo_t'] .'</span>
            </td>
            <td>
            <button type="button" id="' . $value['id_etiqueta'] . '" onclick="editaretiqueta(this.id)" class="btn-borde"><i class="fa-solid fa-pen-to-square"></i></button>
            </td>
            <td>
            <button type="button" id="' . $value['id_etiqueta'] . '" onclick="borraretiqueta(this.id)" class="btn-borde"><i class="fa-solid fa-xmark"></i></button>
            </td>
                                
        </tr>
        ';
            }
    }}
    return $output;
}

?>


