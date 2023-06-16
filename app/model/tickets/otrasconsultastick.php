<?php
include_once(__dir__ . "/../config.php");
include_once(__dir__ . "/../admintablas/sqls_admin.php");



if (isset($_POST['tipo'])) {
    $users = json_decode($_POST['users']);
    $nombre = [];

    foreach ($users as $value) {
        $sql = "SELECT * FROM users WHERE unique_id= '{$value}'";
        $datos = mysqli_query($conn, $sql);
        foreach ($datos as $value) {

            array_push($nombre, $value['fname'] . " " . $value['lname']);
        }
    }

    $nams = implode(", ", $nombre);
    echo $nams;
} else {
    $data = json_decode($_POST['x']);

    if ($data[0]->tipo == 1) {
        $output = '    
            <label for="sel_user" class="form-label font-size-13 text-muted">Elige un usuario:</label>
            <select class="form-control" data-trigger name="sel_user" id="sel_user">
            <option value="0" selected disabled>1. Seleccione una etiqueta</option>';

        $id_area = $data[0]->id_area;

        if ($_SESSION['id_area'] == 3 && $id_area == 3) {

            $sql = "SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}' and jefe_grupo.id_grupo = '{$_SESSION['id_grupo']}'";
            $users_area_jefes = mysqli_query($conn, $sql);
            foreach ($users_area_jefes as $jefes) {
                $output .= '
                        <option value="' . $jefes['id'] . '">' . $jefes['n_user'] . " " . $jefes['l_user'] . '</option>
                    ';
            }
        } else {
            $sql = "SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}'";
            $users_area_jefes = mysqli_query($conn, $sql);
            foreach ($users_area_jefes as $jefes) {
                $output .= '
                        <option value="' . $jefes['id'] . '">' . $jefes['n_user'] . " " . $jefes['l_user'] . '</option>
                    ';
            }
        }

        $output .= '</select>';

        $output .= '    
            <label for="sel_etiqueta" class="form-label font-size-13 text-muted">Etiqueta:</label>
            <select class="form-control" data-trigger name="sel_etiqueta" id="sel_etiqueta">
            <option value="0" selected disabled>1. Seleccione una etiqueta</option>';

        $id_area = $data[0]->id_area;
        $sql = "SELECT * FROM etiquetas WHERE id_area= {$id_area}";
        $etiquetas_area = mysqli_query($conn, $sql);
        foreach ($etiquetas_area as $value) {
            $output .= '
                    <option value="' . $value['id_etiqueta'] . '">' . $value['descrip_etiq'] . '</option>
                ';
        }
        $output .= '</select>';
        echo $output;
    } elseif ($data[0]->tipo == 2) {
        $output = "";
        $output .= '    
            <label for="sel_user" class="form-label font-size-13 text-muted">Selecciona Usuario:</label>
            <select class="form-control" data-trigger name="sel_user" id="sel_user">
            <option value="0" selected disabled>1. Seleccione un Usuario</option>';

        $id_area = $data[0]->id_area;

        $sql = "SELECT * FROM jefe_grupo INNER JOIN users ON jefe_grupo.id_jefe = users.id WHERE jefe_grupo.id_area= '{$id_area}'";
        $jefes_area = mysqli_query($conn, $sql);
        foreach ($jefes_area as $jefe) {
            $output .= '
                    <option value="' . $jefe['id'] . '">' . $jefe['n_user'] . " " . $jefe['l_user'] . '</option>
                ';
        }
        $output .= '</select>';
        echo $output;
    } elseif ($data[0]->tipo == 3) {

        $id_etiqueta = $data[0]->id_etiqueta;
        $id_msg = $data[0]->id_msg;
        $tipo_chat = $data[0]->tipo_chat;

        $sql = mysqli_query($conn, "INSERT INTO etiquetas_mensajes (id_mensaje, id_etiqueta, etiqueto, tipo) VALUES ('{$id_msg}', '{$id_etiqueta}','{$_SESSION['cedula']}', '{$tipo_chat}')");

        if ($sql) {
            $output = 'Mensaje Etiquetado...';
        } else {
            $output = $sql;
        }
        echo $output;
    } elseif ($data[0]->tipo == 4) {
        /*
            $id_etiqueta=$data[0]->id_etiqueta;

            $mensajes_chat_normal=mysqli_query($conn, "SELECT * FROM etiquetas_mensajes INNER JOIN messages ON etiquetas_mensajes.id_mensaje = messages.msg_id WHERE etiquetas_mensajes.id_etiqueta = '{$id_etiqueta}' AND etiquetas_mensajes.tipo = 0");

            $mensajes_grupos=mysqli_query($conn, "SELECT * FROM etiquetas_mensajes INNER JOIN messages_grupos ON etiquetas_mensajes.id_mensaje = messages_grupos.msg_id WHERE etiquetas_mensajes.id_etiqueta = '{$id_etiqueta}' AND etiquetas_mensajes.tipo = 1");

                $output="";

                if($mensajes_chat_normal && $mensajes_grupos){
                    foreach($mensajes_chat_normal as $mensaje){

                    if($mensaje['imagen']==""){
                        $output.='
                        
                        <li >
                        <a>
                            <div class="d-flex align-items-start">
                                
                                <div class="d-flex justify-content-between flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">' . $mensaje['msg'] .'</h5>
                                    <span>'.$mensaje['fecha'].'</span>
                                </div>
                            </div>
                        </a>
    
                        </li>
                        <hr>
                        ';
                    }else{
                        $archivo = (__dir__."/../../assets/images/chat/".$mensaje['imagen']);
                        if(file_exists($archivo)){
                            $ruta = controlador::$rutaAPP."app/assets/images/chat/".$mensaje['imagen'];
                        }else{
                            $ruta = controlador::$rutaAPP."app/assets/images/chatgrupos/".$mensaje['imagen'];
                        }

                        $output.='
                        <li class="list-inline-item message-img-list">
                            <div>
                            <a class="d-inline-block m-1">
                                <img onclick="verimagengrupo_2(this.alt)" type="button" src="'.$ruta.'" alt="'.$ruta.'" class="rounded img-thumbnail" ">
                            <a>
                            </div>
                            <div>
                                <span class="d-flex justify-content-end" style="margin-bottom: 5px;">'.$mensaje['fecha'].'</span>
                            </div>                                  
                        </li>
                        <hr>';
                    }
                    }

                    foreach($mensajes_grupos as $mensaje_grupo){

                        if($mensaje_grupo['imagen']==""){
                            $output.='
                            <li >
                            <a>
                                <div class="d-flex align-items-start">
                                    
                                    <div class="d-flex justify-content-between flex-grow-1 overflow-hidden">
                                        <h5 class="text-truncate font-size-14 mb-1">' . $mensaje_grupo['msg'] .'</h5>
                                        <span>'.$mensaje['fecha'].'</span>
                                    </div>
                                </div>
                            </a>
        
                            </li>
                            <hr>';
                        }else{
                            $archivo = (__dir__."/../../assets/images/chat/".$mensaje_grupo['imagen']);
                            if(file_exists($archivo)){
                                $ruta2 = controlador::$rutaAPP."app/assets/images/chat/".$mensaje_grupo['imagen'];
                            }else{
                                $ruta2 = controlador::$rutaAPP."app/assets/images/chatgrupos/".$mensaje_grupo['imagen'];
                            }
    
                            $output.='
                            <li class="list-inline-item message-img-list">
                                <div>
                                <a class="d-inline-block m-1">
                                    <img onclick="verimagengrupo_2(this.alt)" type="button" src="'.$ruta2.'" alt="'.$ruta2.'" class="rounded img-thumbnail" ">
                                <a> 
                                </div>

                                <div>
                                    <span class="d-flex justify-content-end" >'.$mensaje_grupo['fecha'].'</span>
                                </div>     

                            </li>
                            <hr>';
                        }
                        
                    }

                    
                }else{
                    $output= $sql;
                }
            echo $output;
            */
        $id_etiqueta = $data[0]->id_etiqueta;
        $outgoing_id = $data[0]->id_enviar;
        $incoming_id = $_SESSION['unique_id'];

        $output = "";



        if ($data[0]->tipo_chat) {
            $mensajes_grupos = mysqli_query($conn, "SELECT * FROM etiquetas_list INNER JOIN messages_grupos ON etiquetas_list.id = messages_grupos.id_etiqueta WHERE messages_grupos.id_etiqueta = '{$id_etiqueta}' AND (messages_grupos.incoming_msg_id = {$outgoing_id}) ORDER BY messages_grupos.msg_id");

            foreach ($mensajes_grupos as $mensaje) {

                if ($mensaje['imagen'] == "") {
                    $output .= '
                        
                        <li >
                        <a>
                            <div class="d-flex align-items-start">
                                
                                <div class="d-flex justify-content-between flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">' . $mensaje['msg'] . '</h5>
                                    <span>' . $mensaje['fecha'] . '</span>
                                </div>
                            </div>
                        </a>
    
                        </li>
                        <hr>
                        ';
                } else {
                    $archivo = (__dir__ . "/../../assets/images/chat/" . $mensaje['imagen']);
                    if (file_exists($archivo)) {
                        $ruta = controlador::$rutaAPP . "app/assets/images/chat/" . $mensaje['imagen'];
                    } else {
                        $ruta = controlador::$rutaAPP . "app/assets/images/chatgrupos/" . $mensaje['imagen'];
                    }

                    $output .= '
                        <li class="list-inline-item message-img-list">
                            <div>
                            <a class="d-inline-block m-1">
                                <img onclick="verimagengrupo_2(this.alt)" type="button" src="' . $ruta . '" alt="' . $ruta . '" class="rounded img-thumbnail" ">
                            <a>
                            </div>
                            <div>
                                <span class="d-flex justify-content-end" style="margin-bottom: 5px;">' . $mensaje['fecha'] . '</span>
                            </div>                                  
                        </li>
                        <hr>';
                }
            }
        } else {
            $mensajes_chat_normal = mysqli_query($conn, "SELECT * FROM messages INNER JOIN etiquetas_list ON etiquetas_list.id = messages.id_etiqueta WHERE ((messages.outgoing_msg_id = {$outgoing_id} AND messages.incoming_msg_id = {$incoming_id}) OR (messages.outgoing_msg_id = {$incoming_id} AND messages.incoming_msg_id = {$outgoing_id})) AND messages.id_etiqueta = '{$id_etiqueta}' ORDER BY messages.msg_id");

            foreach ($mensajes_chat_normal as $mensaje_grupo) {

                if ($mensaje_grupo['imagen'] == "") {
                    $output .= '
                        <li >
                        <a>
                            <div class="d-flex align-items-start">
                                
                                <div class="d-flex justify-content-between flex-grow-1 overflow-hidden">
                                    <h5 class="text-truncate font-size-14 mb-1">' . $mensaje_grupo['msg'] . '</h5>
                                    <span>' . $mensaje_grupo['fecha'] . '</span>
                                </div>
                            </div>
                        </a>
    
                        </li>
                        <hr>';
                } else {
                    $archivo = (__dir__ . "/../../assets/images/chat/" . $mensaje_grupo['imagen']);
                    if (file_exists($archivo)) {
                        $ruta2 = controlador::$rutaAPP . "app/assets/images/chat/" . $mensaje_grupo['imagen'];
                    } else {
                        $ruta2 = controlador::$rutaAPP . "app/assets/images/chatgrupos/" . $mensaje_grupo['imagen'];
                    }

                    $output .= '
                        <li class="list-inline-item message-img-list">
                            <div>
                            <a class="d-inline-block m-1">
                                <img onclick="verimagengrupo_2(this.alt)" type="button" src="' . $ruta2 . '" alt="' . $ruta2 . '" class="rounded img-thumbnail" ">
                            <a> 
                            </div>

                            <div>
                                <span class="d-flex justify-content-end" >' . $mensaje_grupo['fecha'] . '</span>
                            </div>     

                        </li>
                        <hr>';
                }
            }
        }






        echo $output;
    } elseif ($data[0]->tipo == 5) {

        $id_etiqueta = $data[0]->id_etiqueta;
        $id_msg = $data[0]->id_msg;
        $tipo_chat = $data[0]->tipo_chat;

        if ($tipo_chat == 0) {
            //es grupo
            $sql = mysqli_query($conn, "UPDATE messages SET id_etiqueta = '{$id_etiqueta}' WHERE msg_id = '{$id_msg}'");

            if ($sql) {
                $output = 'Mensaje Etiquetado...';
            } else {
                $output = $sql;
            }
            echo $output;
        } elseif ($tipo_chat == 1) {
            //no es grupo
            $sql = mysqli_query($conn, "UPDATE messages_grupos SET id_etiqueta = '{$id_etiqueta}' WHERE msg_id = '{$id_msg}'");

            if ($sql) {
                $output = 'Mensaje Etiquetado...';
            } else {
                $output = $sql;
            }
            echo $output;
        }
    }
}
