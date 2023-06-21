<?php
// require (__dir__."/../data/pdo.php");
include_once(__dir__ . "/../config.php");

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d ");
$hora_ingreso_1 = "7:01:00";
$hora_ingreso_2 = "7:10:59";
$hora_ingreso_3 = "7:11:00";



if ($data[0]->tipo == 1) {
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);

        $incoming_id = $data[0]->id;
    if (isset($_POST['submit'])) {
        // Obtener los valores del formulario
        $n_user = $_POST['n_user'];
        $l_user = $_POST['l_user'];
        $f_h = $_POST['f_h'];
        $observaciones = $_POST['observaciones'];
        $campaña = $_POST['campaña'];

        if ($cedula != 0) {
            $insertar = ("INSERT INTO observacion_coordinadores (n_user,l_user,f_h,observaciones,campaña) VALUES ('{$n_user}', '{$l_user}','{$f_h}','{$observaciones}','{$campaña}'");
            mysqli_query($conn, $insertar);
            
        }
        
    }

    if ($conn->query($insertar) === true) {
        echo "Datos insertados correctamente.";
    } else {
        echo "Error al insertar los datos: " . $conn->error;
    }


    $conn->close();
}
}





// function ingreso($hora)
// {
//     $timestamp = strtotime($hora); // Convertir la fecha en un timestamp    
//     $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

//     return $hora;
// }

/* if (isset($_SESSION['unique_id'])) {
    $output = '';

    $data = json_decode($_POST['x']);

    if ($data[0]->tipo == 0) {
        $incoming_id = $data[0]->id_grupo;
        $campana = mysqli_query($conn, "SELECT * FROM users u, log_session l
        WHERE l.id_user=u.cedula
        AND DATE(f_h)  = '{$hoy}' 
        AND u.id_grupo='{$incoming_id}'
        GROUP BY l.id_user
        ORDER BY l.f_h ASC
        LIMIT 1 ");
        
        foreach ($campana as $user) {
            $grupos = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo='{$user['id_grupo']}'");
            $group = mysqli_fetch_assoc($grupos);
            

         
            $timestamp = strtotime($user['f_h']); // Convertir la fecha en un timestamp    
            $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"



            if ($hora < ingreso($hora_ingreso_1)) {
                $class = "text-success";

                // $insert_query = mysqli_query($conn, "INSERT INTO observacion_coordinadores (id,cedula, id_jefe ,id_grupo,observaciones)
                //  VALUES ('{$id}','{$cedula}','{$id_jefe}','{$id_grupo}','{$observaciones}'");

            } elseif ($hora <= ingreso($hora_ingreso_2)) {
                $class = "text-warning";
            } elseif ($hora >= ingreso($hora_ingreso_3)) {
                $class = "text-danger";
            } else {
                echo "error";
            }

             $output .= '
                 <tr>
                     <td scope="row" class="' . $class . '"> ' . $user['n_user'] . " " . $user['l_user'] . ' </td>
                     <td> <span> ' . $user['f_h'] . ' </span></td>
                     <td> 
                     <select class="form-control" >
                         <option value="0" > Elige una opción </option>                        
                         <option value="1">Ausencia Justificada</option>
                         <option value="2">Ausencia Injustificada</option>
                         <option value="3">Incapacidad</option>
                         <option value="4">Permiso</option>
                         <option value="5">Sanción</option>
                         <option value="6">Vacaciones</option>
                         <option value="7">Licencia de Maternidad</option>
                         <option value="8">Licencia de Paternidad</option>
                         <option value="9">Sanción</option>
                         </select>
               </td> 
                     <td> ' . $group['n_grupo'] . ' </td>
                 </tr>';
        }
        echo $output;
    }
} elseif ($data[0]->tipo == 1) {
    $incoming_id = $data[0]->id;
    $datos = mysqli_query($conn, "SELECT *FROM users INNER JOIN log_session ON  users.cedula=log_session.id_user WHERE log_session.accion='login' AND log_session.f_h  LIKE '{$hoy}%' AND users.id_grupo='{$incoming_id}'");
    $datos_2 = mysqli_fetch_assoc($datos);
    foreach ($datos_2 as $datos_3) {
        $id_jefe = mysqli_real_escape_string($conn, $_POST[$datos_3['id_jefe']]);
        $id_grupo = mysqli_real_escape_string($conn, $_POST[$datos_3['id_grupo']]);
        $observaciones = mysqli_real_escape_string($conn, $_POST[$datos_3['observaciones']]);
        $n_grupo = mysqli_real_escape_string($conn, $_POST[$datos_3['n_grupo']]);
        $campaña = mysqli_real_escape_string($conn, $_POST[$datos_3['campaña']]);
        $cedula = mysqli_real_escape_string($conn, $_POST[$datos_3['cedula']]);
        

        if ($cedula!=0) {
        $insertar = ("INSERT INTO observacion_coordinadores (cedula,id_jefe, id_grupo, observaciones,campaña) VALUES ('$cedula', '$id_jefe', '$id_grupo', '$observaciones','$campaña' "); }
        mysqli_query($conn, $insertar);
        }
    
} else {
    echo "tomo el ultimo camino en el modelo de observaciones php";
}
 */