<?php

require_once __dir__.'/app/controller/controlador.php';

$userPuntualmente = new controlador();
date_default_timezone_set("America/Bogota");

if($userPuntualmente->iniciar_sesion()){

    //ADMIN

    if(isset($_GET["action"]) && ($_SESSION['rol']==1)){
        
        switch($_GET["action"]){

            case 'home':
                $userPuntualmente->home();
                break;
            case 'notify':
                $userPuntualmente->notify();
                break;
            case 'registrar':
                $userPuntualmente->registrar();
                break;
            case 'signup':
                $userPuntualmente->signup();
                break;
            
                // CHAT
            case 'chat':
                $userPuntualmente->chat();
                break;
            case 'chat/getchat':
                $userPuntualmente->getchat();
                break;
            case 'chat/users':
                $userPuntualmente->users();
                break;
            case 'chat/getheader':
                $userPuntualmente->getheader();
                break;
            case 'chat/insertchat':
                $userPuntualmente->insertchat();
                break;
            case 'chat/contactos':
                $userPuntualmente->contactos();
                break;
            case 'chat/busqueda':
                $userPuntualmente->buscar();
                break;
            case 'chat/otrasconsultastick':
                $userPuntualmente->otrasconsultastick();
                break;

                //GRUPOS
            
            case 'chat/addusersgroup':
                $userPuntualmente->addusersgroup();
                break;
            
            case 'chat/guardargrupos':
                $userPuntualmente->guardargrupos();
                break;
            case 'chat/mostrargrupos':
                $userPuntualmente->mostrargrupos();
                break;
            case 'chat/admingrupos':
                $userPuntualmente->admingrupos();
                break;
            case 'chat/grupos/header':
                $userPuntualmente->getgruposheader();
                break;
            case 'chat/grupos/chat':
                $userPuntualmente->getchatgrupos();
                break;

                //TABLAS

            case 'admint':
                $userPuntualmente->admint();
                break;
            case 'admintablas':
                $userPuntualmente->admintablas();
                break;
            case 'adminusers':
                $userPuntualmente->adminusers();
                break;

                //ETICKETAS

            case 'adetiquetas':
                $userPuntualmente->adminEtiquetas();
                break;

            case 'adetiquetas/guardaretiqueta':
                $userPuntualmente->guardar_etiqueta();
                break;

                //TICKETS

            case 'chat/tkt/creartkt':
                $userPuntualmente->creartkt();
                break;
            
            case 'mistickets':
                $userPuntualmente->mistickets();
                break;

            case 'tickets':
                $userPuntualmente->tickets();
                break;





            case 'cerrar':
                $userPuntualmente->cerrar_sesion();
                break;
            default:
               // $userPuntualmente->home();
               header('Location:'.controlador::$rutaAPP.'home');

                break;
        }
    }
    // usuario con privilegios

    else if (isset($_GET["action"])&&($_SESSION['rol']==2)){

        switch ($_GET["action"]){

            case "/":
                $userPuntualmente->chat();
                break;

            case 'notify':
                $userPuntualmente->notify();
                break;
            case 'registrar':
                $userPuntualmente->registrar();
                break;
            case 'signup':
                $userPuntualmente->signup();
                break;
    
                // CHAT
                case 'chat':
                    $userPuntualmente->chat();
                    break;
                case 'chat/getchat':
                    $userPuntualmente->getchat();
                    break;
                case 'chat/users':
                    $userPuntualmente->users();
                    break;
                case 'chat/getheader':
                    $userPuntualmente->getheader();
                    break;
                case 'chat/insertchat':
                    $userPuntualmente->insertchat();
                    break;
                case 'chat/contactos':
                    $userPuntualmente->contactos();
                    break;
                case 'chat/busqueda':
                    $userPuntualmente->buscar();
                    break;
                case 'chat/otrasconsultastick':
                    $userPuntualmente->otrasconsultastick();
                    break;
                //GRUPOS
            
                case 'chat/addusersgroup':
                $userPuntualmente->addusersgroup();
                break;
            
            case 'chat/guardargrupos':
                $userPuntualmente->guardargrupos();
                break;
            case 'chat/mostrargrupos':
                $userPuntualmente->mostrargrupos();
                break;
            case 'chat/admingrupos':
                $userPuntualmente->admingrupos();
                break;
            case 'chat/grupos/header':
                $userPuntualmente->getgruposheader();
                break;
            case 'chat/grupos/chat':
                $userPuntualmente->getchatgrupos();
                break;

            //TICKETS
                
            case 'chat/tkt/creartkt':
                $userPuntualmente->creartkt();
                break;

            case 'mistickets':
                $userPuntualmente->mistickets();
                break;

            case 'tickets':
                $userPuntualmente->tickets();
                break;



            

            case 'cerrar':
                $userPuntualmente->cerrar_sesion();
                break;
            default:
                $userPuntualmente->chat();
                break;
        }
        
    }else if (isset($_GET["action"])&&($_SESSION['rol']==3)){

        switch ($_GET["action"]){


            case "/":
                $userPuntualmente->chat();
                break;

            case 'notify':
                $userPuntualmente->notify();
                break;
    
                // CHAT
                case 'chat':
                    $userPuntualmente->chat();
                    break;
                case 'chat/getchat':
                    $userPuntualmente->getchat();
                    break;
                case 'chat/users':
                    $userPuntualmente->users();
                    break;
                case 'chat/getheader':
                    $userPuntualmente->getheader();
                    break;
                case 'chat/insertchat':
                    $userPuntualmente->insertchat();
                    break;
                case 'chat/contactos':
                    $userPuntualmente->contactos();
                    break;
                case 'chat/busqueda':
                    $userPuntualmente->buscar();
                    break;
                case 'chat/otrasconsultastick':
                    $userPuntualmente->otrasconsultastick();
                    break;
               

                //GRUPOS
            
            case 'chat/addusersgroup':
                $userPuntualmente->addusersgroup();
                break;
            
            case 'chat/guardargrupos':
                $userPuntualmente->guardargrupos();
                break;
            case 'chat/mostrargrupos':
                $userPuntualmente->mostrargrupos();
                break;
            case 'chat/admingrupos':
                $userPuntualmente->admingrupos();
                break;
            case 'chat/grupos/header':
                $userPuntualmente->getgruposheader();
                break;
            case 'chat/grupos/chat':
                $userPuntualmente->getchatgrupos();
                break;
          

                //TICKETS
                
            case 'chat/tkt/creartkt':
                $userPuntualmente->creartkt();
                break;
            case 'mistickets':
                $userPuntualmente->mistickets();
                break;
            case 'tickets':
                $userPuntualmente->tickets();
                break;





            case 'cerrar':
                $userPuntualmente->cerrar_sesion();
                break;
            default:
                $userPuntualmente->chat();
                break;
        }
    }else{
        if($_SESSION['rol']==1){
            $userPuntualmente->home();
        }elseif($_SESSION['rol']==2||$_SESSION['rol']==3){
            $userPuntualmente->chat();
        }
        
    }

    // Usuario regular

}else{

    if(isset($_GET["action"])){
        switch ($_GET["action"]){
            case 'login':
                $userPuntualmente->login();
                break;
            case 'auth':
                $userPuntualmente->auth();
                break;
            default:
                header("location: login");
                break;
        }
    }else{
        $userPuntualmente->home();
    }
}


?>