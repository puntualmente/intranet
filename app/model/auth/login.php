<?php
    include_once (__dir__."/../config.php");
    date_default_timezone_set('America/Bogota');


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
            $status = "Disponible";
            if(!isset($_SESSION)){
                session_start();
            }
            $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$row['id']}");
            if ($sql2) {

                

                $dia = date('Y-m-d');
                $hora = date('H:i:s');
                //$ip=getRealIP();
                //$log_session= mysqli_query($conn, "INSERT INTO log_sesiones (id_usuario, fecha, hora, ip) VALUES ('{$row['unique_id']}', '{$dia}', '{$hora}', '{$ip}')");
                
                $_SESSION['unique_id'] = $row['id'];
                $_SESSION['username'] = $row['n_user'] . " " . $row['l_user'];
                $_SESSION['rol'] = $row['rol'];
                $_SESSION['img'] = $row['img'];
                
                $status = mysqli_query($conn, "SELECT (status) FROM users WHERE cedula = '{$cedula}'");
                $row3 = mysqli_fetch_assoc($status);

                $_SESSION['status']= $row3['status'];
                
                echo "Proceso Exitoso";
            } else {
                echo "Algo salió mal. ¡Inténtalo de nuevo!";
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
