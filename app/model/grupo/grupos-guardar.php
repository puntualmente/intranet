<?php
include_once (__dir__."/../config.php");
$ngrupo=$_POST['nombre'];
$outgoing_id = $_SESSION['unique_id'];

$usuariosgrupo=[];

if(isset($_POST['actualizar'])){
    $id_grupo=$_POST['idgrupo'];
    $sql3 = "SELECT * FROM grupo_integrante WHERE id_grupo = {$id_grupo}";
    $query3 = mysqli_query($conn, $sql3);
    $row3 = mysqli_fetch_assoc($query3);
    foreach($query3 as $value){
        array_push($usuariosgrupo, $value['id_usuario']);
    }
    $borrar = json_decode($_POST['borrar']);
    $agregar = json_decode($_POST['agregar']);

    //Borrar
    foreach($borrar as $value){ 
        $clave = array_search($value, $usuariosgrupo);
        if($value==$usuariosgrupo[$clave]){
            $del_query = mysqli_query($conn, "DELETE FROM grupo_integrante WHERE id_usuario = '{$value}' AND id_grupo = '{$id_grupo}'");
        }  
    }

    //Agregar
    foreach($agregar as $value){ 
        $clave = array_search($value, $usuariosgrupo);
        if($value!=$usuariosgrupo[$clave]){
            $add_query = mysqli_query($conn, "INSERT INTO grupo_integrante (id_grupo, id_usuario) VALUES ('{$id_grupo}', '{$value}')");
        }  
    }

    //Actualizar Nombre
    if(empty($ngrupo)){
        echo "Grupo Actualizado con exito";
    }else{
        $up_name = mysqli_query($conn, "UPDATE grupos_chat SET n_grupo ='{$ngrupo}' WHERE id_grupo = '{$id_grupo}'");
        echo "Grupo Actualizado con exito";
    }
  




}else{
    if(empty($ngrupo)){
        echo "Todos los campos son obligatorios";
    }else{
        $insert_query = mysqli_query($conn, "INSERT INTO grupos_chat (n_grupo, propietario) VALUES ('{$ngrupo}','{$outgoing_id}')");
        echo "Grupo Creado con exito";
        
        $sql = mysqli_query($conn, "SELECT * FROM grupos_chat WHERE n_grupo = '{$ngrupo}'");
        $row = mysqli_fetch_assoc($sql);
        $id_grupo = $row['id_grupo'];
        $data = json_decode($_POST['array']);
        array_push($data, $outgoing_id);
    
        
        foreach($data as $value){ 
            if($value==$_SESSION['unique_id']){
                $tipo="admin";
            }else{
                $tipo="user";
            }
        
            $insert_query = mysqli_query($conn, "INSERT INTO grupo_integrante (id_grupo, id_usuario, tipo_user) VALUES ('{$id_grupo}', '{$value}', '{$tipo}')");
        }
        echo "Integrantes guardados con exito";
    }
    
}



?>