<?php
include_once (__dir__."/../config.php");

if (isset($_FILES['file_upl'])) {
    $img_name = $_FILES['file_upl']['name'];

    if(!empty($img_name)){
       // echo 'el archivo' . $img_name;
    }else{
        echo "No hay archivo";
    }
}

$tipo       = $_FILES['file_upl']['type'];
$tamanio    = $_FILES['file_upl']['size'];
$archivotmp = $_FILES['file_upl']['tmp_name'];
// echo $archivotmp;
$lineas     = file($archivotmp);

$i = 0;

$nuevosUsuario=0;
$datosActualizados=0;


foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $nombre           = !empty($datos[0])  ? ($datos[0]) : '';
		$apellido         = !empty($datos[1])  ? ($datos[1]) : '';
        $telefono         = !empty($datos[2])  ? ($datos[2]) : '';
        $cc               = !empty($datos[3])  ? ($datos[3]) : '';
		$password         = !empty($datos[4])  ? ($datos[4]) : '';
        $f_nacimiento     = !empty($datos[5])  ? ($datos[5]) : '';
        $id_area          = !empty($datos[6])  ? ($datos[6]) : '';
		$id_empresa       = !empty($datos[7])  ? ($datos[7]) : '';
        $f_ingreso_empre  = !empty($datos[8])  ? ($datos[8]) : '';
        $id_grupo         = !empty($datos[9])  ? ($datos[9]) : '';
        $rol              = !empty($datos[10])  ? ($datos[10]) : '';
        $img              = !empty($datos[11])  ? ($datos[11]) : '';
        $status           = !empty($datos[12])  ? ($datos[12]) : '';


       
if( !empty($cc) ){
    $checkemail_duplicidad = ("SELECT cedula FROM users WHERE cedula='".($cc)."' ");
            $ca_dupli = mysqli_query($conn, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO users( 
            n_user,
            l_user,
            tel_user,
            cedula,
            password,
            f_nacimiento,
            id_area,
            id_empresa,
            f_ingreso_empre,
            id_grupo,
            rol,
            img,
            status
        ) VALUES(
            '$nombre',
            '$apellido',
            '$telefono',
            '$cc',
            '$password',
            '$f_nacimiento',
            '$id_area',
            '$id_empresa',
            '$f_ingreso_empre',
            '$id_grupo',
            '$rol',
            '$img',
            '$status'
        )";
mysqli_query($conn, $insertarData);
    $nuevosUsuario+=1;
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE users SET 
        n_user='" .$nombre. "',
		l_user='" .$apellido. "',
        tel_user='" .$telefono. "',
		cedula='" .$cc. "',
		password='" .$password. "',
		f_nacimiento='" .$f_nacimiento. "',
		id_area='" .$id_area. "',
		id_empresa='" .$id_empresa. "',
		f_ingreso_empre='" .$f_ingreso_empre. "',
		id_grupo='" .$id_grupo. "',
		rol='" .$rol. "',
        img='" .$img. "',  
        status= '" .$status. "'
        WHERE cedula='".$cc."'
    ");
    $result_update = mysqli_query($conn, $updateData);
    $datosActualizados+=1;
    } 
  }

 $i++;
}

echo "Nuevos usuarios ".$nuevosUsuario. " Datos actualizados ".$datosActualizados;

?>
