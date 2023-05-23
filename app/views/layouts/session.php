<?php

// cambiar $_SESSION['activo'] a 0 para expulsarlos a todos de la session

if($_SESSION['activo']==1){
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