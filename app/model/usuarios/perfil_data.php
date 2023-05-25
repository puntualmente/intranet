<?php

require (__dir__."/../data/pdo.php");

$hojadevida="HOJADEVIDA";
$documentoInden = "DOCUMENTODEIDENTIDAD";
$antecedentesPol = "ANTECEDENTEPOLICIA";
$anteceProcu = "ANTECEDENTEPROCURADURIA";
$certif_aca = "CERTIFICADOSACADEMICOS";
$certif_lab = "CERTIFICADOSLABORALES";
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

    // prepare query
    /*
    $statement = $pdo->prepare("SELECT * FROM persona");
    $statement->execute();
    */
   
    // print results
    /*
    while ($result = $statement->fetch()) {
        echo $result->nombre . '<br>';
    }*/

if(isset($_FILES['hv'])&&isset($_FILES['di'])&&isset($_FILES['apoli'])&&isset($_FILES['aprocu'])&&isset($_FILES['certif_ac'])&&isset($_FILES['certif_lab'])&&isset($_FILES['certif_eps'])&&isset($_FILES['certif_banco'])){

    if (file_exists($micarpeta)) {

        $hv = $_FILES['hv']['name'];
        $hv_name2 = $_FILES['hv']['tmp_name'];

        $hv_name = "HOJADEVIDA_".$username;

        array_push($nombreArchivos, $hv_name);
        move_uploaded_file($hv_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$hv_name.".pdf");

        $di = $_FILES['di']['name'];
        $di_name2 = $_FILES['di']['tmp_name'];

        $di_name = "DOCUMENTODEIDENTIDAD_".$username;

        array_push($nombreArchivos, $di_name);
        move_uploaded_file($di_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$di_name.".pdf");


        $apoli = $_FILES['apoli']['name'];
        $apoli_name2 = $_FILES['apoli']['tmp_name'];

        $apoli_name = "ANTECEDENTEPOLICIA_".$username;

        array_push($nombreArchivos, $apoli_name);
        move_uploaded_file($apoli_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$apoli_name.".pdf");


        $aprocu = $_FILES['aprocu']['name'];
        $aprocu_name2 = $_FILES['aprocu']['tmp_name'];

        $aprocu_name = "ANTECEDENTEPROCURADURIA_".$username;

        array_push($nombreArchivos, $aprocu_name);
        move_uploaded_file($aprocu_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$aprocu_name.".pdf");

        $totalArchivos = count($_FILES['certif_ac']['name']);
    
        for($i = 0; $i < $totalArchivos; $i++){

            if($i==0){
                $num="";
            }else{
                $num=$i;
            }

            $certif_ac = $_FILES['certif_ac']['name'][$i];
            $certif_ac_name2 = $_FILES['certif_ac']['tmp_name'][$i];
            $certif_ac_name = "CERTIFICADOSACADEMICOS_".$username.$num;

            array_push($nombreArchivos, $certif_ac_name);
            
            move_uploaded_file($certif_ac_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_ac_name.".pdf");

        }

        $totalArchivosCertif = count($_FILES['certif_lab']['name']);
    
        for($i = 0; $i < $totalArchivosCertif; $i++){

            if($i==0){
                $num="";
            }else{
                $num=$i;
            }

            $certif_lab = $_FILES['certif_lab']['name'][$i];
            $certif_lab_name2 = $_FILES['certif_lab']['tmp_name'][$i];
            $certif_lab_name = "CERTIFICADOSLABORALES_".$username.$num;

            array_push($nombreArchivos, $certif_lab_name);
            
            move_uploaded_file($certif_lab_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_lab_name.".pdf");

        }

        $certif_eps = $_FILES['certif_eps']['name'];
        $certif_eps_name2 = $_FILES['certif_eps']['tmp_name'];

        $certif_eps_name = "CERTIFICADOEPS_".$username;

        array_push($nombreArchivos, $certif_eps_name);
        move_uploaded_file($certif_eps_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_eps_name.".pdf");


        $certif_banco = $_FILES['certif_banco']['name'];
        $certif_banco_name2 = $_FILES['certif_banco']['tmp_name'];
        
        $certif_banco_name = "CERTIFICADOCUENTABANCARIA_".$username;

        array_push($nombreArchivos, $certif_banco_name);
        move_uploaded_file($certif_banco_name2, __DIR__."/../../assets/archivosUsers/".$username."/".$certif_banco_name.".pdf");

        print_r($nombreArchivos);

        //echo  $totalArchivos ." " .$di. " " .$apoli. " " .$aprocu. " " .$certif_ac. " " .$certif_lab. " " .$certif_eps. " " .$certif_banco;

        $guardararchivos = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$hv_name}', '{$username}', 'HOJADEVIDA')");
        $guardararchivos->execute();

        if($guardararchivos){
            echo "Guardado con exito";
        }else{
            echo "Error al guardar";
        }
    }

}else{
    echo "no estan";
}





?>