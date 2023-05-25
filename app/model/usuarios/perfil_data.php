<?php

require (__dir__."/../data/pdo.php");

    // prepare query
    $statement = $pdo->prepare("SELECT * FROM persona");
    $statement->execute();
    
   
    // print results
    /*
    while ($result = $statement->fetch()) {
        echo $result->nombre . '<br>';
    }*/

if(isset($_FILES['hv'])&&isset($_FILES['di'])&&isset($_FILES['apoli'])&&isset($_FILES['aprocu'])&&isset($_FILES['certif_ac'])&&isset($_FILES['certif_lab'])&&isset($_FILES['certif_eps'])&&isset($_FILES['certif_banco'])){

    $username="";
    $usernamearr = explode(' ', $_SESSION['username']); 

    foreach($usernamearr as $user){
        $username.=$user;
    }

    $hv = $_FILES['hv']['name'];
    $hv_name2 = $_FILES['hv']['tmp_name'];

    $hv_name = "HOJADEVIDA_".$username;


    $di = $_FILES['di']['name'];
    $di_name2 = $_FILES['di']['tmp_name'];

    $di_name = "DOCUMENTODEIDENTIDAD_".$username;

    $apoli = $_FILES['apoli']['name'];
    $apoli_name2 = $_FILES['apoli']['tmp_name'];

    $apoli_name = "ANTECEDENTEPOLICIA_".$username;

    $aprocu = $_FILES['aprocu']['name'];
    $aprocu_name2 = $_FILES['aprocu']['tmp_name'];

    $aprocu_name = "ANTECEDENTEPROCURADURIA_".$username;

    $certif_ac = $_FILES['certif_ac']['name'][1];
    $certif_ac_name2 = $_FILES['certif_ac']['tmp_name'];

    $certif_ac_name = "CERTIFICADOSACADEMICOS_".$username;

    $certif_lab = $_FILES['certif_lab']['name'];
    $certif_lab_name2 = $_FILES['certif_lab']['tmp_name'];

    $certif_lab_name = "CERTIFICADOSLABORALES_".$username;

    $totalArchivos = count($_FILES['certif_ac']['name']);

    $certif_eps = $_FILES['certif_eps']['name'];
    $certif_eps_name2 = $_FILES['certif_eps']['tmp_name'];

    $certif_eps_name = "CERTIFICADOEPS_".$username;

    $certif_banco = $_FILES['certif_banco']['name'];
    $certif_banco_name = $_FILES['certif_banco']['tmp_name'];
    
    $certif_banco_name = "CERTIFICADOCUENTABANCARIA_".$username;

    echo  $totalArchivos ." " .$di. " " .$apoli. " " .$aprocu. " " .$certif_ac. " " .$certif_lab. " " .$certif_eps. " " .$certif_banco;

    $micarpeta = __DIR__."/../../assets/archivosUsers/".$username;
    

        if (!file_exists($micarpeta)) {
            mkdir($micarpeta, 0777, true);
        }

        move_uploaded_file($hv_name2, $micarpeta);

    $guardararchivos = $pdo->prepare("INSERT INTO archivos_persona (cedula, nombre_archivo, nombre_carpeta, tipo_archivo) VALUES ('{$_SESSION['cedula']}', '{$hv_name}', '{$username}', 'HOJADEVIDA')");
    $guardararchivos->execute();

    if($guardararchivos){
        echo "Guardado con exito";
    }else{
        echo "Error al guardar";
    }

}else{
    echo "no estan";
}





?>