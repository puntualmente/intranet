<?php

require (__dir__."/../data/pdo.php");

if(isset($_POST['x'])){

    $data = json_decode($_POST['x']);

    if($data[0]->opcion==0){

        $empresa = $data[0]->empresa;
        $cargo = $data[0]->cargo;
        $f_ini_emp = $data[0]->f_ini_emp;
        $f_fin_emp = $data[0]->f_fin_emp;
        $funciones = $data[0]->funciones;

        $guardarInfo = $pdo->prepare("INSERT INTO exp_laboral_persona (cedula, empresa, cargo, funciones, f_inicio, f_fin) VALUES ('{$_SESSION['cedula']}', '{$empresa}','{$cargo}', '{$funciones}', '{$f_ini_emp}', '{$f_fin_emp}')");

        $guardarInfo->execute();

        $consultrabajos = $pdo->prepare("SELECT * FROM exp_laboral_persona WHERE cedula = '{$_SESSION['cedula']}'");
        $consultrabajos->execute();

        $output = "";
        foreach($consultrabajos as $trabajo){

        $output .= '
        <tr>
            <th scope="row"> '.$trabajo->empresa.' </th>
            <td> '.$trabajo->cargo.'</td>
            <td> '.$trabajo->f_inicio.' </td>
            <td> '.$trabajo->f_fin.' </td>
        </tr>';
        }
        echo $output;

    }elseif($data[0]->opcion==1){

        $institucion = $data[0]->institucion;
        $titulo = $data[0]->titulo;
        $f_ini_escol = $data[0]->f_ini_escol;
        $f_fin_escol = $data[0]->f_fin_escol;

        $guardarInfo = $pdo->prepare("UPDATE formacion_ac_persona (cedula, institucion, titulo, f_inicio, f_fin) VALUES ('{$_SESSION['cedula']}', '{$institucion}','{$titulo}', '{$f_ini_escol}', '{$f_fin_escol}')");

        $guardarInfo->execute();

        $consulacademico = $pdo->prepare("SELECT * FROM formacion_ac_persona WHERE cedula = '{$_SESSION['cedula']}'");
        $consulacademico->execute();

        $output = "";
        foreach($consulacademico as $trabajo){

        $output .= '
        <tr>
            <th scope="row"> '.$trabajo->institucion.' </th>
            <td> '.$trabajo->titulo.'</td>
            <td> '.$trabajo->f_inicio.' </td>
            <td> '.$trabajo->f_fin.' </td>
        </tr>';
        }
        echo $output;

    }elseif($data[0]->opcion==2){

        $nombre_ref = $data[0]->nombre_ref;
        $telefono = $data[0]->telefono;
        $parentesco = $data[0]->parentesco;

        $guardarInfo = $pdo->prepare("INSERT INTO referen_persona (cedula, nombre_ref, celular_ref, parentesco) VALUES ('{$_SESSION['cedula']}', '{$nombre_ref}','{$telefono}', '{$parentesco}')");

        $guardarInfo->execute();

        $consulref = $pdo->prepare("SELECT * FROM referen_persona WHERE cedula = '{$_SESSION['cedula']}'");
        $consulref->execute();

        $output = "";
        foreach($consulref as $trabajo){

        $output .= '
        <tr>
            <th scope="row"> '.$trabajo->nombre_ref.' </th>
            <td> '.$trabajo->celular_ref.' </td>
            <td> '.$trabajo->parentesco.' </td>
        </tr>';
        }
        echo $output;
    }

}else{


if(!empty($_POST['nombre'])&&!empty($_POST['celular'])&&!empty($_POST['direccion'])&&!empty($_POST['con_info'])&&!empty($_POST['cedula'])&&!empty($_POST['correo'])&&!empty($_POST['idiomas'])&&!empty($_POST['ap_hab'])&&!empty($_POST['perfil'])){

    $guardarInfo = $pdo->prepare("INSERT INTO persona (nombre, cedula, celular, correo, direccion, idiomas, aptitudes_habili, conoci_informa, perfil) VALUES ('{$_POST['nombre']}', '{$_POST['cedula']}','{$_POST['celular']}', '{$_POST['correo']}', '{$_POST['direccion']}', '{$_POST['idiomas']}', '{$_POST['ap_hab']}', '{$_POST['con_info']}', '{$_POST['perfil']}')");

    $guardarInfo->execute();

}else{
    echo "No estan los datos";
}


$hojadevida="HOJADEVIDA";
$documentoInden = "DOCUMENTODEIDENTIDAD";
$antecedentesPol = "ANTECEDENTEPOLICIA";
$anteceProcu = "ANTECEDENTEPROCURADURIA";
$certif_aca = "CERTIFICADOSACADEMICOS";
$certif_labor = "CERTIFICADOSLABORALES";
$eps = "CERTIFICADOEPS";
$banco = "CERTIFICADOCUENTABANCARIA";

$nombreArchivos = [];

$username="";
$usernamearr = explode(' ', $_SESSION['username']); 

foreach($usernamearr as $user){
    $username.=$user;
}

$micarpeta = __DIR__."/../../assets/archivosUsers/".$username;


if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}

if(!empty($_FILES['hv'])&&!empty($_FILES['di'])&&!empty($_FILES['apoli'])&&!empty($_FILES['aprocu'])&&!empty($_FILES['certif_ac'])&&!empty($_FILES['certif_lab'])&&!empty($_FILES['certif_eps'])&&!empty($_FILES['certif_banco'])){

    if (file_exists($micarpeta)) {

        $hv = $_FILES['hv']['name'];
        $hv_name2 = $_FILES['hv']['tmp_name'];

        $hv_name = "HOJADEVIDA_".$username;

        array_push($nombreArchivos, $hv_name);
        move_uploaded_file($hv_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$hv_name.".pdf");
        
        $guardararchivos = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$hv_name}', '{$username}', '{$hojadevida}')");
        $guardararchivos->execute();

        
        $di = $_FILES['di']['name'];
        $di_name2 = $_FILES['di']['tmp_name'];

        $di_name = "DOCUMENTODEIDENTIDAD_".$username;

        array_push($nombreArchivos, $di_name);
        move_uploaded_file($di_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$di_name.".pdf");

        $guardararchivos2 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$di_name}', '{$username}', '{$documentoInden}')");
        $guardararchivos2->execute();

        $apoli = $_FILES['apoli']['name'];
        $apoli_name2 = $_FILES['apoli']['tmp_name'];

        $apoli_name = "ANTECEDENTEPOLICIA_".$username;

        array_push($nombreArchivos, $apoli_name);
        move_uploaded_file($apoli_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$apoli_name.".pdf");
        $guardararchivos3 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$apoli_name}', '{$username}', '{$antecedentesPol}')");
        $guardararchivos3->execute();


        $aprocu = $_FILES['aprocu']['name'];
        $aprocu_name2 = $_FILES['aprocu']['tmp_name'];

        $aprocu_name = "ANTECEDENTEPROCURADURIA_".$username;

        array_push($nombreArchivos, $aprocu_name);
        move_uploaded_file($aprocu_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$aprocu_name.".pdf");
        $guardararchivos4 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$aprocu_name}', '{$username}', '{$anteceProcu}')");
        $guardararchivos4->execute();

        $totalArchivos = count($_FILES['certif_ac']['name']);
    
        for($i = 0; $i < $totalArchivos; $i++){

            if($i==0){
                $num="";
            }else{
                $num=$i+1;
            }

            $certif_ac = $_FILES['certif_ac']['name'][$i];
            $certif_ac_name2 = $_FILES['certif_ac']['tmp_name'][$i];
            $certif_ac_name = "CERTIFICADOSACADEMICOS_".$num.$username;

            array_push($nombreArchivos, $certif_ac_name);
            
            move_uploaded_file($certif_ac_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_ac_name.".pdf");
            $guardararchivos5 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$certif_ac_name}', '{$username}', '{$certif_aca}')");
            $guardararchivos5->execute();

        }

        $totalArchivosCertif = count($_FILES['certif_lab']['name']);
    
        for($i = 0; $i < $totalArchivosCertif; $i++){

            if($i==0){
                $num="";
            }else{
                $num=$i+1;
            }

            $certif_lab = $_FILES['certif_lab']['name'][$i];
            $certif_lab_name2 = $_FILES['certif_lab']['tmp_name'][$i];
            $certif_lab_name = "CERTIFICADOSLABORALES_".$num.$username;

            array_push($nombreArchivos, $certif_lab_name);
            
            move_uploaded_file($certif_lab_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_lab_name.".pdf");
            $guardararchivos6 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$certif_lab_name}', '{$username}', '{$certif_labor}')");
            $guardararchivos6->execute();

        }

        $certif_eps = $_FILES['certif_eps']['name'];
        $certif_eps_name2 = $_FILES['certif_eps']['tmp_name'];

        $certif_eps_name = "CERTIFICADOEPS_".$username;

        array_push($nombreArchivos, $certif_eps_name);
        move_uploaded_file($certif_eps_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_eps_name.".pdf");
        $guardararchivos7 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$certif_eps_name}', '{$username}', '{$eps}')");
        $guardararchivos7->execute();


        $certif_banco = $_FILES['certif_banco']['name'];
        $certif_banco_name2 = $_FILES['certif_banco']['tmp_name'];
        
        $certif_banco_name = "CERTIFICADOCUENTABANCARIA_".$username;

        array_push($nombreArchivos, $certif_banco_name);
        move_uploaded_file($certif_banco_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_banco_name.".pdf");
        $guardararchivos8 = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$certif_banco_name}', '{$username}', '{$banco}')");
        $guardararchivos8->execute();


        if($guardararchivos&&$guardararchivos2&&$guardararchivos3&&$guardararchivos4&&$guardararchivos5&&$guardararchivos6&&$guardararchivos7&&$guardararchivos8){
            echo "Guardado con exito";
        }else{
            echo "Error al guardar";
        }
    }

}else{
    echo "no estan";
}
}




?>