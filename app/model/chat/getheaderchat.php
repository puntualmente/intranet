<?php
    include_once (__dir__."/../config.php");

        $arrayJefes = [];

        $id = mysqli_real_escape_string($conn, $_POST['id_user']);


        $datos= mysqli_query($conn, "SELECT * FROM users WHERE id='$id'");
    
        $data= mysqli_fetch_assoc($datos);

        $EsMiJefeSql = mysqli_query($conn, "SELECT * FROM jefe_grupo WHERE id_jefe = '{$id}' AND id_grupo = '{$_SESSION['id_grupo']}'");

        if(mysqli_num_rows($EsMiJefeSql)>0){
            $esjefe = true;
        }else{
            $esjefe = 0;
        }

        $header = headerchatuser($data['img'], $data['n_user']." ".$data['l_user'], $data['status'], $id, $esjefe);
        echo $header;



   

  


function headerchatuser($imagen, $nombre, $status, $id_user, $es_mi_jefe){
    $output='
        <input type="hidden" id="id_enviar" name="id_enviar" dissabled value ="'.$id_user.'">
        <input type="hidden" id="tipo_chat" name="tipo_chat" dissabled value ="chat_1_1">
        <input type="hidden" id="es_mi_jefe" name="es_mi_jefe" dissabled value ="'.$es_mi_jefe.'">


    <div class="row">
            
            <div class="col-xl-4 col-7">

                <div class="d-flex align-items-center">
                <div class="flex-shrink-0 avatar-sm me-3 d-sm-block d-none">
                    <img src="'.controlador::$rutaAPP.'app/assets/images/users/'.$imagen.'" alt="" class="img-fluid d-block rounded-circle">
                </div>
                <div class="flex-grow-1">
                    <h5 class="font-size-14 mb-1 text-truncate"><a href="#" class="text-dark">'.$nombre.'</a></h5>
                    <p class="text-muted text-truncate mb-0">'.$status.'</p>
                </div>
                
            </div>
            

        </div>
        <div class="col-xl-8 col-5">
            <ul class="list-inline user-chat-nav text-end mb-0">
                
                <li class="list-inline-item">
                    <div class="dropdown">
                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </button>
                        '.esadmin().'
                    </div>
                </li>
            </ul>                                                                                                                                                                                                                                                                                        
        </div>

    </div>
    </div>

    ';
    return $output;
}

function esadmin(){
    if($_SESSION['rol']==1||$_SESSION['rol']==2){
        return '<div class="dropdown-menu dropdown-menu-end">
        <button class="dropdown-item" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" >Mensajes Destacados</button>
        </div>';
    }
    
}


/*

<li class="list-inline-item">
                    <div class="dropdown">
                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-search"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-md p-2">
                            <form class="px-2">
                                <div>
                                    <input type="text" class="form-control border bg-light-subtle" placeholder="Search...">
                                </div>
                            </form>
                        </div>
                    </div>
                </li>

*/



/* drop menu del header

<div class="col-xl-8 col-5">
            <ul class="list-inline user-chat-nav text-end mb-0">
                
                <li class="list-inline-item">
                    <div class="dropdown">
                        <button class="btn nav-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-dots-horizontal-rounded"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Archive</a>
                            <a class="dropdown-item" href="#">Muted</a>
                            <a class="dropdown-item" href="#">Delete</a>
                        </div>
                    </div>
                </li>
            </ul>                                                                                                                                                                                                                                                                                        
        </div>
        */
