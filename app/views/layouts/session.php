<?php

// cambiar $_SESSION['mantenimiento'] a 1 para expulsar al usuarios de la session

if($_SESSION['mantenimiento']==0){
    // Initialize the session
    if(!isset($_SESSION)){
        session_start();
    }
    // Check if the user is logged in, if not then redirect him to login page
    if(!isset($_SESSION["unique_id"])){
        header("location: login");
        exit;
    }
}else{
    header("location: cerrar");
    exit;
}
?>