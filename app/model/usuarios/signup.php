<?php
include_once (__dir__."/../config.php");

$fname = mysqli_real_escape_string($conn, $_POST['nombre']);
$lname = mysqli_real_escape_string($conn, $_POST['apellido']);
$cedula = mysqli_real_escape_string($conn, $_POST['cedula']);
$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
$area = mysqli_real_escape_string($conn, $_POST['area']);
$sede = mysqli_real_escape_string($conn, $_POST['sede']);
$empresa = mysqli_real_escape_string($conn, $_POST['empresa']);
$f_nacimiento= mysqli_real_escape_string($conn, $_POST['nacimiento']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$f_ingreso= mysqli_real_escape_string($conn, $_POST['f_ingreso']);
$rol = mysqli_real_escape_string($conn, $_POST['rol']);
$grupo = mysqli_real_escape_string($conn, $_POST['grupo']);




if (!empty($fname) && !empty($lname) && !empty($cedula) && !empty($f_nacimiento) && !empty($telefono) && !empty($password) && !empty($rol) && $area!=0 && $grupo!=0 && $empresa!=0 && $sede!=0) {
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE cedula = '{$cedula}'");
        if (mysqli_num_rows($sql) > 0) {
            echo "$username - ¡Este cedula ya esta registrada!";
        } else {
            if (isset($_FILES['foto'])) {
                $img_name = $_FILES['foto']['name'];
                $img_type = $_FILES['foto']['type'];
                $tmp_name = $_FILES['foto']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, __DIR__."/../../assets/images/users/" . $new_img_name)) {
                            $status = "Desconectado";
                            $encrypt_pass = md5($password);
                            $insert_query = mysqli_query($conn, "INSERT INTO users (n_user, l_user, tel_user, cedula, password, f_nacimiento, id_area, id_empresa, f_ingreso_empre, id_grupo, rol, img, status)
                                VALUES ('{$fname}', '{$lname}','{$telefono}', '{$cedula}', '{$encrypt_pass}', '{$f_nacimiento}','{$area}','{$empresa}', '{$f_ingreso}','{$grupo}','{$rol}','{$new_img_name}', '{$status}')");
                            if ($insert_query) {
                                $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE cedula = '{$cedula}'");
                                if (mysqli_num_rows($select_sql2) > 0) {
                                    $result = mysqli_fetch_assoc($select_sql2);
                                 
                                    echo "Proceso Exitoso";
                                } else {
                                    echo "¡Este Usuario no existe!";
                                }
                            } else {
                                echo "Algo salió mal. ¡Inténtalo de nuevo!";
                            }
                        }
                            } else{
                                echo "Cargue un archivo de imagen: jpeg, png, jpg";
                            }
                        }
            }
        }
} else {
    echo "¡Todos los campos de entrada son obligatorios!";
}
