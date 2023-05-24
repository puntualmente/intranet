<?php

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

    $certif_ac = $_FILES['certif_ac']['name'];
    $certif_ac_name2 = $_FILES['certif_ac']['tmp_name'];

    $certif_ac_name = "CERTIFICADOSACADEMICOS_".$username;

    $certif_lab = $_FILES['certif_lab']['name'];
    $certif_lab_name2 = $_FILES['certif_lab']['tmp_name'];

    $certif_lab_name = "CERTIFICADOSLABORALES_".$username;

    $certif_eps = $_FILES['certif_eps']['name'];
    $certif_eps_name2 = $_FILES['certif_eps']['tmp_name'];

    $certif_eps_name = "CERTIFICADOEPS_".$username;

    $certif_banco = $_FILES['certif_banco']['name'];
    $certif_banco_name = $_FILES['certif_banco']['tmp_name'];

    echo $hv_name. " " .$di. " " .$apoli. " " .$aprocu. " " .$certif_ac. " " .$certif_lab. " " .$certif_eps. " " .$certif_banco;


}else{
    echo "no estan";
}


$micarpeta = __DIR__."/../../assets/archivosUsers/hola";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}


?>