<?php
// require (__dir__."/../data/pdo.php");
include_once(__dir__ . "/../config.php");

date_default_timezone_set('America/Bogota');
$hoy = date("Y-m-d ");
$hora_ingreso_1 = "7:01:00";
$hora_ingreso_2 = "7:10:59";




function ingreso($hora)
{
    $timestamp = strtotime($hora); // Convertir la fecha en un timestamp    
    $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

    return $hora;
}

if (isset($_SESSION['unique_id'])) {
    $output = '';

    $data = json_decode($_POST['x']);

    if ($data[0]->tipo == 0) {
        $incoming_id = $data[0]->id_grupo;
        $campana = mysqli_query($conn, "SELECT *FROM users INNER JOIN log_session ON  users.cedula=log_session.id_user WHERE log_session.accion='login' AND log_session.f_h  LIKE '{$hoy}%' AND users.id_grupo='{$incoming_id}'");

        foreach ($campana as $user) {
            $grupos = mysqli_query($conn, "SELECT *FROM grupos WHERE id_grupo='{$user['id_grupo']}'");
            $group = mysqli_fetch_assoc($grupos);
            
            /* $id = mysqli_real_escape_string($conn, $_POST[$user['id']]); */
            /*
        
         */
            $timestamp = strtotime($user['f_h']); // Convertir la fecha en un timestamp    
            $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"



            if ($hora < ingreso($hora_ingreso_1)) {
                $class = "text-success";

                // $insert_query = mysqli_query($conn, "INSERT INTO observacion_coordinadores (id,cedula, id_jefe ,id_grupo,observaciones)
                //  VALUES ('{$id}','{$cedula}','{$id_jefe}','{$id_grupo}','{$observaciones}'");

            } elseif ($hora <= ingreso($hora_ingreso_2)) {
                $class = "text-warning";
            } elseif ($hora > ingreso($hora_ingreso_2)) {
                $class = "text-danger";
            } else {
                echo "error";
            }

            $output .= '
                <tr>
                    <td scope="row" class="' . $class . '"> ' . $user['n_user'] . " " . $user['l_user'] . ' </td>
                    <td> <span> ' . $user['f_h'] . ' </span></td>
                    <td> 
                    <select class="form-control">
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
} elseif($data[0]->tipo == 1){
    $incoming_id = $data[0]->id;
    $datos = mysqli_query($conn, "SELECT *FROM users INNER JOIN log_session ON  users.cedula=log_session.id_user WHERE log_session.accion='login' AND log_session.f_h  LIKE '{$hoy}%' AND users.id_grupo='{$incoming_id}'");
    $datos_2 = mysqli_fetch_assoc($datos);
    foreach($datos_2 as $datos_3){
    $id_jefe = mysqli_real_escape_string($conn, $_POST[$datos_3['id_jefe']]);
    $id_grupo = mysqli_real_escape_string($conn, $_POST[$datos_3['id_grupo']]);
    $observaciones = mysqli_real_escape_string($conn, $_POST[$datos_3['observaciones']]);
    $n_grupo = mysqli_real_escape_string($conn, $_POST[$datos_3['n_grupo']]);


    echo '

            <div class="mb-3">
    
            <div class="bg-secondary text-white">
                <p> 
                    <b>Ticket ID:</b> '.$id_jefe['id_jefe'].', <br>
                    <b>Fecha y Hora: </b> '.$id_grupo['id_grupo'].',<br>
                    <b>Proyecto: </b> '.$observaciones['observaciones'].',<br>
                    <b>Proyecto: </b> '.$n_grupo['n_grupo'].',<br>
                </p>
            </div>

            </div>
                                                

        
    ';


}}else{
    echo "tomo el ultimo camino en la vista de observaciones php";
}
