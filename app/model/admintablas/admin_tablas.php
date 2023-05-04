<?php
    include_once (__dir__."/../config.php");

if(isset($_POST['x'])){
    $data = json_decode($_POST['x']);
    $estado= $data[0]->estado;
    $areas = mysqli_query($conn, "SELECT * FROM areas");

    if($estado==0){
        $borrar=$data[0]->borrar;
        if($borrar==false){
            $narea = $data[0]->nombre;

            $sql="INSERT INTO areas (n_area) VALUES ('{$narea}')";
            $status = mysqli_query($conn, $sql);
            $areas = mysqli_query($conn, "SELECT * FROM areas");
            $output=mostrartabla($areas);
            echo $output;
        }else{
            $id = $data[0]->id;

            $sql="DELETE FROM areas WHERE id_area = '{$id}'";
            $status = mysqli_query($conn, $sql);
            if($status!=0){
                $areas = mysqli_query($conn, "SELECT * FROM areas");
                $output=mostrartabla($areas);
                echo $output;
            }else{
                echo "no se pudo eliminar el dato";
            } 
        }
        
    }elseif($estado==1){
        $borrar=$data[0]->borrar;

        if($borrar==false){
            
            $ngrupo = $data[0]->nombre;


                $sql="INSERT INTO grupos (n_grupo) VALUES ('{$ngrupo}')";
                $status = mysqli_query($conn, $sql);
                $grupos = mysqli_query($conn, "SELECT * FROM grupos");
                $output=mostrartablagrupos($grupos);
                echo $output;

        }else{
            $id = $data[0]->id_grupo;

                $sql="DELETE FROM grupos WHERE id_grupo = '{$id}'";
                $status = mysqli_query($conn, $sql);
                if($status!=0){
                    $grupos = mysqli_query($conn, "SELECT * FROM grupos");
                    $output=mostrartablagrupos($grupos);
                    echo $output;
                }else{
                    echo "no se pudo eliminar el dato";
                }
            }
}elseif($estado==2){
    $t_img = $data[0]->t_img;
    $sql="UPDATE config_generales SET t_imgs = {$t_img} WHERE id_config = 1";
        $status = mysqli_query($conn, $sql);
        if($status>0){
            $t_img2=$t_img/1000;
           echo "El tamaño de los documentos actualmente es de: $t_img bytes o $t_img2 Kb";
        }else{
            echo "no se pudo actualizar el tamaño";
        }
}elseif($estado==3){

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
    }elseif($estado==4){
        $borrar=$data[0]->borrar;
        if($borrar==false){
            $nsede = $data[0]->nombre;

            $sql="INSERT INTO sedes (n_sede) VALUES ('{$nsede}')";
            $status = mysqli_query($conn, $sql);
            $sedes = mysqli_query($conn, "SELECT * FROM sedes");
            $output=mostrartablasedes($sedes);
            echo $output;
        }else{
            $id = $data[0]->id;

            $sql="DELETE FROM areas WHERE id_area = '{$id}'";
            $status = mysqli_query($conn, $sql);
            if($status!=0){
                $areas = mysqli_query($conn, "SELECT * FROM areas");
                $output=mostrartablasedes($areas);
                echo $output;
            }else{
                echo "no se pudo eliminar el dato";
            }
        }
}elseif($estado==5){
    $borrar=$data[0]->borrar;
    if($borrar==false){
        $nempresa = $data[0]->nombre;

        $sql="INSERT INTO empresas (n_empresa) VALUES ('{$nempresa}')";
        $status = mysqli_query($conn, $sql);
        $empresas = mysqli_query($conn, "SELECT * FROM empresas");
        $output=mostrartablaempresas($empresas);
        echo $output;
    }else{
        $id = $data[0]->id;

        $sql="DELETE FROM areas WHERE id_area = '{$id}'";
        $status = mysqli_query($conn, $sql);
        if($status!=0){
            $areas = mysqli_query($conn, "SELECT * FROM areas");
            $output=mostrartablaempresas($areas);
            echo $output;
        }else{
            echo "no se pudo eliminar el dato";
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

function mostrartabla($areas){

    $output="";
    
    foreach($areas as $value){
    $output .='
        <tr data-id="1">
        <td id="id" style="width: 80px">'.$value['id_area'].'</td>
        <td id="name">'.$value['n_area'].'</td>
        <td style="width: 100px">
            <a type="button" id="'.$value['id_area'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificararea(this.id) >
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
        </tr> ';
                
    }  

    return $output;
}
function mostrartablasedes($areas){

    $output="";
    
    foreach($areas as $value){
    $output .='
        <tr data-id="1">
        <td id="id" style="width: 80px">'.$value['id_sede'].'</td>
        <td id="name">'.$value['n_sede'].'</td>
        <td style="width: 100px">
            <a type="button" id="'.$value['id_sede'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificarsede(this.id) >
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
        </tr> ';
                
    }  

    return $output;
}

function mostrartablaempresas($areas){

    $output="";
    
    foreach($areas as $value){
    $output .='
        <tr data-id="1">
        <td id="id" style="width: 80px">'.$value['id_empresa'].'</td>
        <td id="name">'.$value['n_empresa'].'</td>
        <td style="width: 100px">
            <a type="button" id="'.$value['id_empresa'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificarempresa(this.id) >
                <i class="fas fa-pencil-alt"></i>
            </a>
        </td>
        </tr> ';
                
    }  

    return $output;
}

function mostrartablagrupos($grupos){
    $output="";
    
    foreach($grupos as $value){
    $output .='
    <tr data-id="1">
    <td id="id" style="width: 80px">'.$value['id_grupo'].'</td>
    <td id="name">'.$value['n_grupo'].'</td>
    <td style="width: 100px">
        <a type="button" id="'.$value['id_grupo'].'" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificargrupo(this.id) >
            <i class="fas fa-pencil-alt"></i>
        </a>
    </td>
    </tr> ';
                
    }  

    return $output;
}

function selectareas($areas, $id){
    $output="";
    foreach($areas as $value){
        if($value['id_area']==$id){
            $output = '<option value="' . $value['id_area'] .'" selected disabled>'.$value['n_area'].'</option>';
        }
    }

    foreach($areas as $value){

        $output .= '
            <option value="' . $value['id_area'] .'">'.$value['n_area'].'</option>
        ';

   
}
return $output;
}
?>

