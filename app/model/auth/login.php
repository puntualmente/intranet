<?php
    include_once (__dir__."/../config.php");
    date_default_timezone_set('America/Bogota');
    include_once (__dir__."/../OtrasConfigs/get-ip.php");



//include_once "get-ip.php";

$cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
$password = mysqli_real_escape_string($conn, $_POST['contraseña']);
if (!empty($cedula) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE cedula = '{$cedula}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        $user_pass = md5($password);
        $enc_pass = $row['password'];
        if ($user_pass === $enc_pass) {

            if($row['mantenimiento']==0){

                $status = "Disponible";
                if(!isset($_SESSION)){
                    session_start();
                }
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$row['id']}");
                if ($sql2) {

                    
                    $hoy = date("Y-m-d H:i:s"); 
                    $ip=getRealIP();

                    $log_session= mysqli_query($conn, "INSERT INTO log_session (id_user, f_h, ip , accion) VALUES ('{$row['cedula']}', '{$hoy}', '{$ip}', 'login')");
                    
                    $_SESSION['unique_id'] = $row['id'];
                    $_SESSION['username'] = $row['n_user'] . " " . $row['l_user'];
                    $_SESSION['rol'] = $row['rol'];
                    $_SESSION['img'] = $row['img'];
                    $_SESSION['id_area']=$row['id_area'];
                    //$_SESSION['id_jefe']=$row['id_jefe'];
                    $_SESSION['id_grupo']=$row['id_grupo'];
                    $_SESSION['cedula']=$row['cedula'];
                    $_SESSION['activo']=$row['activo'];
                    $_SESSION['mantenimiento']=$row['mantenimiento'];

                    //solo cree este pedaso

                    $sqlpermisochat = mysqli_query($conn, "SELECT * FROM permisos WHERE id_grupo = '{$row['id_grupo']}' and rol = '{$row['rol']}' and id_area = '{$row['id_area']}' and activo = '{$row['activo']}'");

                        if(mysqli_num_rows($sqlpermisochat)>0){

                            $permiso = mysqli_fetch_assoc($sqlpermisochat);

                            switch($permiso['tipo_permiso']){

                                case 'chat':

                                    if($permiso['value']==0){
                                        $_SESSION['permisochat']=false;
                                    }else{
                                        $_SESSION['permisochat']=true;
                                    }
                                    
                                case 'etiquetado':

                                    if($permiso['value']==0){
                                        $_SESSION['permisoetiquetado']=false;
                                    }else{
                                        $_SESSION['permisoetiquetado']=true;
                                    }
                            
                            }
                            
                        }else{
                            $_SESSION['permisochat']=true;
                            $_SESSION['permisoetiquetado']=true;
                        }
                    
                    //
                    $status = mysqli_query($conn, "SELECT (status) FROM users WHERE cedula = '{$cedula}'");
                    $row3 = mysqli_fetch_assoc($status);

                    $_SESSION['status']= $row3['status'];
                    
                    echo "Proceso Exitoso";
                } else {
                    echo "Algo salió mal. ¡Inténtalo de nuevo!";
                }
            }else{
                echo "Un momentos estamos ajustando algo! 🛠";
            }
        } else {
            echo "¡Cedula o la contraseña incorrectas!";
        }
    } else {
        echo "$cedula - ¡Esta cedula no existe!";
    }
} else {
    echo "¡Todos los campos de entrada son obligatorios!";
}
