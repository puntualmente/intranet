<?php

include_once (__dir__."/../model/OtrasConfigs/get-ip.php");

class controlador{
    public static $rutaAPP="/intranet/";

    public function iniciar_sesion(){

        if(!isset($_SESSION)){
            session_start();
        }

        if(isset($_SESSION["unique_id"])){
            return true;
        }
        return false;
    }

    
    public function login(){
        include_once(__dir__."/../views/auth/login.php");
    }

    public function registrar(){
        include_once(__dir__."/../views/opc_admin/registrar_users.php");
    }

    public function home(){
        include_once(__dir__."/../views/home/index.php");
    }

    public function admint(){
        include_once(__dir__."/../views/home/admint.php");
    }

    public function perfil(){
        include_once(__dir__."/../views/home/perfil.php");
    }

    public function perfildata(){
        include_once(__dir__."/../model/usuarios/perfil_data.php");
    }



    //Actualizar listado users

    public function updListado(){
        include_once(__dir__."/../views/opc_admin/actualizar_listado.php");
    }

    public function subirArchivoUs(){
        include_once(__dir__."/../model/OtrasConfigs/subirArchivoUs.php");
    }
  



    // --------------------------------------------POST----------------------------------------- //

    public function signup(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            include_once(__dir__."/../model/usuarios/signup.php");
        }else{
            header("location: registrar");
        }
    }

    public function auth(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            include_once(__dir__."/../model/auth/login.php");
        }else{
            header("location: login");
        }
    }

    public function admintablas(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            include_once(__dir__."/../model/admintablas/admin_tablas.php");
        }else{
            header("location: home");
        }
    }

//________________________________________________Chats---------------------------------------------//

    public function chat(){
        include_once(__dir__."/../views/home/chat.php");
    }

    public function notify(){
        include_once(__dir__."/../model/notify/notify.php");
    }

    public function getchat(){
        if ($_SERVER["REQUEST_METHOD"] == "POST"){
            include_once(__dir__."/../model/chat/get-chat.php");
        }else{
            header("Location: home");
        }
    }
    public function users(){

        include_once(__dir__."/../model/chat/users.php");
       
    }

    public function getheader(){

        include_once(__dir__."/../model/chat/getheaderchat.php");

    }

    public function insertchat(){
        include_once(__dir__."/../model/chat/insert-chat.php");
    }
    
    public function buscar(){
        include_once(__dir__."/../model/chat/search.php");
    }

    public function contactos(){
        include_once(__dir__."/../model/chat/get-contactos.php");

    }

// ------------------------------------ GRUPOS-------------------------------

    public function addusersgroup(){
        include_once(__dir__."/../model/grupo/busquedauser.php");
    }

    public function guardargrupos(){
        include_once(__dir__."/../model/grupo/grupos-guardar.php");
    }

    public function mostrargrupos(){
        include_once(__dir__."/../model/grupo/mostrargrupos.php");

    }
    public function admingrupos(){
        include_once(__dir__."/../model/grupo/admingrupos.php");
    }
    public function getgruposheader(){
        include_once(__dir__."/../model/grupo/getheadergrupos.php");
    }

    public function getchatgrupos(){
        include_once(__dir__."/../model/grupo/getchatgrupo.php");
    }


// ----------------TICKETS-----------------

    public function adminetiquetas(){
        include_once(__dir__."/../views/home/adminEtiquetas.php");
    }

    public function guardar_etiqueta(){
        include_once(__dir__."/../model/tickets/tickets.php");
    }

    public function otrasconsultastick(){
        include_once(__dir__."/../model/tickets/otrasconsultastick.php");
    }

    public function creartkt(){
        include_once(__dir__."/../model/tickets/crearTicket.php");
    }

    public function mistickets(){
        include_once(__dir__."/../views/home/mistickets.php");
    }

    public function tickets(){
        include_once(__dir__."/../views/home/tickets.php");
    }



// -----------------Admin users----------------

    public function adminusers(){
        include_once(__dir__."/../views/home/adminusers.php");
    }




    function cerrar_sesion(){
        if(!isset($_SESSION)){
            session_start();
        }
        session_destroy();
        include(__dir__."/../model/config.php");
        $status="Desconectado";
        $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE id = {$_SESSION['unique_id']}");
        header('Location: '.controlador::$rutaAPP);

        $hoy = date("Y-m-d H:i:s"); 
        $ip=getRealIP();

        $log_session= mysqli_query($conn, "INSERT INTO log_session (id_user, f_h, ip , accion) VALUES ('{$_SESSION['cedula']}', '{$hoy}', '{$ip}', 'logout')");
        
    }

    public function index(){
        session_destroy();
        include_once(__dir__."/../views/auth/login.php");
    }

}
?>