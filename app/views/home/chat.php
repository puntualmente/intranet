<?php include_once(__dir__."/../layouts/session.php");  ?>

<?php include(__dir__."/../layouts/head-main.php");  ?>

<?php
      include_once(__dir__."/../../model/admintablas/sqls_admin.php");
      ?>

<head>
    <!-- choices css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />

    <!-- color picker css -->
    <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/@simonwep/pickr/themes/classic.min.css" /> <!-- 'classic' theme -->
    <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/@simonwep/pickr/themes/monolith.min.css" /> <!-- 'monolith' theme -->
    <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/@simonwep/pickr/themes/nano.min.css" /> <!-- 'nano' theme -->

    <!-- datepicker css -->
    <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.css">
    <!-- alertifyjs Css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet" type="text/css" />

    <title>Chat | Puntualmente</title>
    
    <?php include(__dir__."/../layouts/head.php");  ?>
    <?php include(__dir__."/../layouts/head-style.php");  ?>

    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />


</head>

<?php  include(__dir__."/../layouts/body.php");  ?>

<!-- Begin page -->
<div id="layout-wrapper">

<?php include(__dir__."/../layouts/menu.php");  ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Chat</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Apps</a></li>
                                    <li class="breadcrumb-item active">Chat</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="d-lg-flex">
                    <div class="chat-leftsidebar card">
                        <div class="p-3 px-4 border-bottom">
                            <div class="d-flex align-items-start ">
                                <div class="flex-shrink-0 me-3 align-self-center">
                                    <img src="<?php echo controlador::$rutaAPP?>app/assets/images/users/<?php echo $_SESSION['img']?>" class="avatar-sm rounded-circle" alt="">
                                </div>
                                
                                <div class="flex-grow-1">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"><?php echo $_SESSION['username']?> <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                    <p class="text-muted mb-0"><?php echo $_SESSION['status']?></p>
                                </div>

                                <!-- <div class="flex-shrink-0">
                                    <div class="dropdown chat-noti-dropdown">
                                        <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Profile</a>
                                            <a class="dropdown-item" href="#">Edit</a>
                                            <a class="dropdown-item" href="#">Add Contact</a>
                                            <a class="dropdown-item" href="#">Setting</a>
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="search-box position-relative">
                                <input type="text" class="form-control rounded border" id="buscadorusuarios" autocomplete="off" placeholder="Buscar">
                                <i class="bx bx-search search-icon"></i>
                            </div>
                        </div>

                        <div class="chat-leftsidebar-nav">
                            <ul class="nav nav-pills nav-justified bg-light-subtle p-1">
                                <li class="nav-item">
                                    <a href="#chat" data-bs-toggle="tab" aria-expanded="true" class="nav-link active">
                                        <i class="bx bx-chat font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Chat</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#groups" onclick="actualizarGrupos()" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                        <i class="bx bx-group font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Grupos</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#contacts" data-bs-toggle="tab" aria-expanded="false" onclick="actualizarContactos()" class="nav-link">
                                        <i class="bx bx-book-content font-size-20 d-sm-none"></i>
                                        <span class="d-none d-sm-block">Contactos</span>
                                    </a>
                                </li>

                                <li class="nav-item" hidden>
                                    <a id="botonbuscar" href="#busqueda" data-bs-toggle="tab" aria-expanded="false" class="nav-link">
                                    </a>
                                </li>



                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane show active" id="chat">
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Reciente</h5>
                                            </div>
                                            <ul class="list-unstyled chat-list" id="user-list">
                                                
                                            <!-- se llena solo   -->

                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="groups">
                                    <div class="chat-message-list" data-simplebar>
                                       

                                     
                                        <div class="pt-3">

                                            <div class="px-3">
                                            <div class="d-flex justify-content-between">

                                                <h5 class="font-size-14 mb-3">Grupos</h5>
                                                <div class="flex-shrink-0">


                                    <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){?>
                                        <div class="dropdown chat-noti-dropdown">
                                                <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-plus"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-end">
                                                    <a type="button" class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalScrollable">Crear Grupo</a>
                                            </div>
                                        </div>
                                    <?php } ?>

                                </div>
                                            </div>
                                            <ul class="list-unstyled chat-list" id="lista-grupos">
                                               <!-- ----se llena -->
                                            </ul>
                                        </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="contacts">
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Usuarios</h5>
                                            </div>

                                            <div id="listadeusuarios">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tab-pane" id="busqueda">
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3" >
                                        <div class="px-3">
                                            <h5 class="font-size-14 mb-3">Usuarios</h5>
                                        </div>

                                        <ul class="list-unstyled chat-list" id="contentsearch">
                                                
                                            <!-- se llena solo   -->

                                        </ul>

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                    <!-- end chat-leftsidebar -->
                    <div class="w-100 user-chat mt-4 mt-sm-0 ms-lg-1">
                        <form id="typing-area" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="p-3 px-lg-4 border-bottom" id="headerchat">
                                
                            <input type="text" id="id_enviar" name="id_enviar" hidden dissabled value ="nada">
                            <input type="text" id="tipo_chat" name="tipo_chat" hidden dissabled value ="nada">

                                
                            </div>
                            <div class="chat-conversation p-3 px-2" data-simplebar >
                                <ul class="list-unstyled mb-0" id="contenidochat">
                                </ul>
                                <div><span id="final"></span></div>
                            </div>
                            
                           

                        
<!-- ------------------- -->

                            <div id="iniciodelchat">
                                <span>Selecciona un usuario o un grupo para iniciar chat</span>

                            </div>
                            <div class="p-3 border-top" id="contenidodeenvio" hidden>
                                <div class="row">
                                <div class="d-flex gap-2 flex-wrap">
                                <span id="add_labels"></span>

                                    <!-- Default dropup button -->
                                    <div class="btn-group dropup">
                                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" id="botonopciones" aria-expanded="false" disabled><i class="fas fa-paperclip"></i></button>
                                        <div class="dropdown-menu">

                                        
                                            <button type="button" id="inputima" class="btn btn-success waves-effect waves-light">
                                            <i class=" fas fa-image font-size-16 align-middle me-2"></i>Imagen
                                            </button>

                                            <button type="button" class="btn btn-warning waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#modalcrearticket">
                                            <i class=" fas fa-ticket-alt font-size-16 align-middle me-2"></i> Ticket </button>
            
                                            
                                        </div>
                                    </div>

                                    

                                       
                                    <input id="file-input" style="display:none" type="file" name="image" accept="image/png,image/jpeg">


                                    <div class="col">
                                        <div class="position-relative">
                                            <input type="text" name="msg" id="msg" class="form-control border bg-light-subtle" placeholder="Escribe tu mensaje..." autocomplete="off" disabled>
                                            <input type="hidden" id="imagen_codificada" name="imagen_codificada">

                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <button type="submit" class="btn btn-primary chat-send w-md waves-effect waves-light" id="enviar" disabled><span class="d-none d-sm-inline-block me-2">Enviar</span> <i class="mdi mdi-send float-end"></i></button>
                                    </div>

                                    <div id="texto_error">

                                    </div>
                                    <div id="imagen"></div>

                                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                      <h5 id="offcanvasRightLabel">Mensajes Etiquetas</h5>
                                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                      Aqui estaran las etiquetas y los mensajes...
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                        </form>
                        
                    </div>
                    <!-- end user chat -->
                </div>
                <!-- End d-lg-flex  -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    </div>
    <!-- end main content-->

 
            <?php if($_SESSION['rol']==1 || $_SESSION['rol']==2){?>
                                        <!-- Scrollable modal -->
                                        <form method="post" id="crear">
                                        <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Grupos</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <input type="text" id="nombre" placeholder="Nombre Grupo" class="form-control" require>
                                                    <div class="mb-3">
                                            
                                                <label for="area" class="form-label font-size-13 text-muted">Personas:</label>
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                <select class="form-control" data-trigger name="usuario" id="usuario" >
                                                    <?php foreach($usuarios as $user){?>
                                                        <option value="<?php echo $user['id']?>"><?php echo $user['n_user'] . " " . $user['l_user'] ?></option>
                                                    <?php }?>
                                                </select>
                                                    </div>
                                                    <div>
                                                    <button onclick="myfuncion()" type="button" class="btn btn-light"><i class=" fas fa-user-plus"></i></button>

                                                    </div>
                                            </div>
                                        </div>
                                <div>
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Integrantes del grupo</h5>
                                            </div>
                                            <ul class="list-unstyled chat-list" id="list-grupo">
                                                
                                            <!-- se llena solo   -->

                                            </ul>
                                        </div>
                                    </div>
                                    
                                   
                                </div>
                                <div id="mensaje"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                                        <button type="submit" id="botoncrear" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                    <div class="offcanvas-header">
                                      <h5 id="offcanvasRightLabel">Offcanvas Right</h5>
                                      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                    </div>
                                    <div class="offcanvas-body">
                                      ...
                                    </div>
                                </div>
<!-- -----------------------------------------------------------------Editar grupos -->
                                <!-- Scrollable modal -->
                        <form method="post" id="guardargrupos">
                                        <div class="modal fade" id="popupeditargrupos" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Editar Grupo</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                   
                                                    <div class="mb-3">
                                            
                                                
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                <select class="form-control" data-trigger name="usuario2" id="usuario2" >
                                                    <?php foreach($usuarios as $user){?>
                                                        <option value="<?php echo $user['id']?>"><?php echo $user['n_user'] . " " . $user['l_user'] ?></option>
                                                    <?php }?>
                                                </select>
                                                    </div>
                                                    <div>
                                                    <button onclick="myfuncion2()" type="button" class="btn btn-light"><i class=" fas fa-user-plus"></i></button>

                                                    </div>
                                            </div>
                                        </div>
                                <div>
                                    <div class="chat-message-list" data-simplebar>
                                        <div class="pt-3">
                                            <div class="px-3">
                                                <h5 class="font-size-14 mb-3">Integrantes del grupo</h5>
                                            </div>
                                            <ul class="list-unstyled chat-list" id="mensaje2">

                                            <!-- se llena solo   -->

                                            </ul>
                                        </div>
                                    </div>
                                    <span>*Si este campo lo dejas vacio el nombre sera el mismo*</span>
                                    <input type="text" id="nuevonombre" placeholder="Nuevo nombre del grupo" class="form-control">

                                    <span id="mensaje9"></span>
                                    
                                   
                                </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                        <button type="submit" id="botoncambiar" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>

                <?php } ?>
<!------------------------------------------------------------------CREAR TICKETS -->
                                <!-- Scrollable modal -->
                        <form method="post" id="formcrearticket">
                                        <div class="modal fade" id="modalcrearticket" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    
                                                    <div class="mb-3">
                                                        <label for="area" class="form-label font-size-13 text-muted">Area destino ticket:</label>
                                                        <select class="form-control" data-trigger name="area" id="area" onchange="areaselect(this.value)">
                                                            <option value="0" selected disabled>1. Elige un area</option>
                                                            <?php foreach($areas as $value){?>
                                                                <option value="<?php echo $value['id_area']?>"><?php echo $value['n_area']?></option>
                                                            <?php }?>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3" id="users_area">
                                                      
                                                    </div>
                                         
                                                    <div class="mb-3" id="etiqueta">
                                                        <select class="form-select" name="#" id="#">
                                                            <option value="-">< ------- ></option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="descripticket">Descripción</label>
                                                        <textarea class="form-control" name="descripticket" id="descripticket" rows="7"></textarea>
                                                    </div>

                                                    <div id="mensajeticket"></div>           

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodalticket">Cerrar</button>
                                                        <button type="button" id="botoncambiar" onclick="crearTicket()" class="btn btn-primary">Crear Ticket</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>


                            
</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include (__dir__."/../layouts/right-sidebar.php")?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include (__dir__."/../layouts/vendor-scripts.php")?>

<!-- choices js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<!-- color picker js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/@simonwep/pickr/pickr.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/@simonwep/pickr/pickr.es5.min.js"></script>

<!-- datepicker js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- init js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/form-advanced.init.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/crearGrupos.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/users.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/chat.js"></script>

<!-- Sweet Alerts js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/sweetalert.init.js"></script>

<!-- Alertify -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/alertify.min.js"></script>


</body>

</html>