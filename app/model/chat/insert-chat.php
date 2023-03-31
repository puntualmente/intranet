<?php 
    date_default_timezone_set('America/Bogota');
    include_once (__dir__."/../OtrasConfigs/get-ip.php");

    if(isset($_SESSION['unique_id'])){
        include_once (__dir__."/../config.php");
        //include_once "get-ip.php";
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id =  $_POST['id_enviar'];
        $message = $_POST['msg'];
        $dia = date('Y-m-d');
        $hora = date('H:i:s');
        $ip = getRealIP();

        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, imagen, tipo, estado, fecha, hora, ip) VALUES ({$incoming_id}, {$outgoing_id}, '{$message}', '', '0', '0', '{$dia}','{$hora}','{$ip}')") or die();
            //----------------------PARA PODER TENER NOTIS DE LOS GRUPOS
            $id=mysqli_insert_id($conn);
            
            $esgrupo=mysqli_query($conn, "SELECT * FROM grupos_chat WHERE id_grupo= '{$incoming_id}'");

            if(mysqli_num_rows($esgrupo)>0){
                $integrantesgrupo=mysqli_query($conn, "SELECT id_usuario FROM grupo_integrante WHERE id_grupo= '{$incoming_id}'");

            foreach($integrantesgrupo as $integrante){
                $grupomsgs = mysqli_query($conn, "INSERT INTO mensajes_grupos (id_msg, id_persona, id_grupo, estado) VALUES ({$id}, {$integrante['id_usuario']}, '{$incoming_id}', '0')") or die();
            }
            }

        }else{
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];

                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);

                $extensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, __DIR__."/../../assets/images/chat/" . $new_img_name)) {

                            $insert_query = mysqli_query($conn, "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg, imagen, tipo, estado, fecha, hora, ip) VALUES ({$incoming_id}, {$outgoing_id},'', '{$new_img_name}', '1', '0', '{$dia}','{$hora}','{$ip}')") or die();
                            
                        }
                    } else {
                        echo "Cargue un archivo de imagen: jpeg, png, jpg";
                    }
                } else {
                    echo "Cargue un archivo de imagen: jpeg, png, jpg";
                }
            }
        }
    }else{
        header("location: login.php");
    }
        


    
?>