<?php include_once(__dir__ . "/../layouts/session.php");  ?>

<?php include(__dir__ . "/../layouts/head-main.php");  ?>

<?php
include_once(__dir__ . "/../../model/admintablas/sqls_admin.php");
?>

<head>
    <style>
        /* Estilos para el popup */

        .popupmostrarimagen {
            display: none;
            position: fixed;
            overflow: auto;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 9999;
            align-items: start;
            /* Agregada esta línea */
            justify-content: center;
            /* Agregada esta línea */
        }

        .popupmostrarimagen .content {
            text-align: center;
        }


        .popupmostrarimagen .close {
            position: fixed;
            top: 20px;
            right: 30px;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
        }

        .popupmostrarimagen .download {
            position: fixed;
            top: 20px;
            right: 90px;
            font-size: 30px;
            color: #fff;
            cursor: pointer;
        }

        .popupmostrarimagen .image {
            max-width: 90%;
            max-height: 90%;
        }

        .popupmostrarimagen .prev-btn,
        .popupmostrarimagen .next-btn {
            position: fixed;
            top: 50%;
            font-size: 30px;
            color: #fff;
            background: transparent;
            border: none;
            cursor: pointer;
        }

        .popupmostrarimagen .prev-btn {
            left: 30px;
        }

        .popupmostrarimagen .next-btn {
            right: 30px;
        }
    </style>


    <?php include(__dir__ . "/../layouts/head.php");  ?>
    <?php include(__dir__ . "/../layouts/head-style.php");  ?>



</head>

<?php include(__dir__ . "/../layouts/body.php");  ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include(__dir__ . "/../layouts/menu.php");  ?>

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
                                    <img src="<?php echo controlador::$rutaAPP ?>app/assets/images/users/<?php echo $_SESSION['img'] ?>" class="avatar-sm rounded-circle" alt="">
                                </div>

                                <div class="flex-grow-1">
                                    <h5 class="font-size-16 mb-1"><a href="#" class="text-dark"><?php echo $_SESSION['username'] ?> <i class="mdi mdi-circle text-success align-middle font-size-10 ms-1"></i></a></h5>
                                    <p class="text-muted mb-0"><?php echo $_SESSION['status'] ?></p>
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


                                                        <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
                                                            <div class="dropdown chat-noti-dropdown">
                                                                <button class="btn dropdown-toggle p-0" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fas fa-plus"></i>
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-end">
                                                                    <a type="button" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModalScrollable">Crear Grupo</a>
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
                                        <div class="pt-3">
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

                                    <input type="text" id="id_enviar" name="id_enviar" hidden dissabled value="nada">
                                    <input type="text" id="tipo_chat" name="tipo_chat" hidden dissabled value="nada">
                                    <input type="text" id="es_mi_jefe" name="es_mi_jefe" hidden dissabled value ="0">


                                </div>
                                <div class="chat-conversation p-3 px-2" data-simplebar>
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

                                            <input type="hidden" id="permiso" value="<?php echo $_SESSION['permisochat'] ?>" disabled>

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



                                            <div id="imagen"></div>



                                            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
                                                <div class="offcanvas-header">
                                                    <h5 id="offcanvasRightLabel">Mensajes Etiquetas</h5>
                                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">

                                                    <label for="area" class="form-label font-size-13 text-muted">Etiquetas:</label>
                                                    <select class="form-control" data-trigger name="eti_msg" id="eti_msg" onchange="traer_msg(this.value)">
                                                        <option value="0" selected disabled>1. Elige una etiqueta</option>
                                                        <?php
                                                        $sql = mysqli_query($conn, "SELECT * FROM etiquetas_list");
                                                        foreach ($sql as $value) { ?>
                                                            <option value="<?php echo $value['id'] ?>"><?php echo $value['n_etiqueta'] ?></option>
                                                        <?php } ?>
                                                    </select>


                                                    <div data-simplebar>
                                                        <div class="pt-3">
                                                            <div class="px-3">
                                                                <h5 class="font-size-14 mb-3">Mensajes Etiquetados:</h5>
                                                            </div>
                                                            <hr>
                                                            <ul id="destacados">

                                                                <!-- se llena solo   -->

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </form>
                        <?php if ($_SESSION['rol'] == 3) { ?>
                            <div id="texto_error"><span class="text-danger"> Solo puedes enviarle mensajes a tus lideres y a los grupos que seas parte 👌</span>
                                <div>
                                <?php } else { ?>
                                    <div id="texto_error">
                                        <div>
                                        <?php } ?>

                                        </div>
                                        <!-- end user chat -->
                                    </div>
                                    <!-- End d-lg-flex  -->

                                </div> <!-- container-fluid -->
                            </div>
                            <!-- End Page-content -->
                    </div>
                    <!-- end main content-->
                    <div class="popupmostrarimagen">
                        <a class="download" download><span>&darr;</span></a>
                        <span class="close">&times;</span>
                        <div class="content">
                            <img class="image">
                            <button class="prev-btn">&#8249;</button>
                            <button class="next-btn">&#8250;</button>
                        </div>
                    </div>




                    <?php if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) { ?>
                        <!-- Scrollable modal -->
                        <form method="post" id="crear">
                            <div class="modal fade" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Grupos</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <input type="text" id="nombre" placeholder="Nombre Grupo" class="form-control" autocomplete="off" require>
                                            <div class="mb-3">

                                                <label for="area" class="form-label font-size-13 text-muted">Personas:</label>
                                                <div class="d-flex">
                                                    <div class="w-100">
                                                        <select class="form-control" data-trigger name="usuario" id="usuario">
                                                            <?php foreach ($usuarios as $user) { ?>
                                                                <option value="<?php echo $user['id'] ?>"><?php echo $user['n_user'] . " " . $user['l_user'] ?></option>
                                                            <?php } ?>
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
                            <div class="modal fade" id="popupeditargrupos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
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
                                                        <select class="form-control" data-trigger name="usuario2" id="usuario2">
                                                            <?php foreach ($usuarios as $user) { ?>
                                                                <option value="<?php echo $user['id'] ?>"><?php echo $user['n_user'] . " " . $user['l_user'] ?></option>
                                                            <?php } ?>
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

                    <form method="post" id="form_etiq_msg">
                        <div class="modal fade" id="modal_etiq_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Asigna Una Etiqueta</h5>
                                        <button id="closemodaltkt" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
                                    </div>
                                    <div class="modal-body" style="height: 300px">

                                        <div class="mb-3">
                                            <label for="area" class="form-label font-size-13 text-muted">Etiquetas:</label>
                                            <select class="form-control" data-trigger name="etiquetar_msg" id="etiquetar_msg">
                                                <option value="0" selected disabled>1. Elige una etiqueta</option>
                                                <?php
                                                $sql = mysqli_query($conn, "SELECT * FROM etiquetas_list");
                                                foreach ($sql as $value) { ?>
                                                    <option value="<?php echo $value['id'] ?>"><?php echo $value['n_etiqueta'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="mostrarmsgaetiquetar"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarTicket69">Cerrar</button>
                                        <button type="button" onclick="etiquetarelmsg()" class="btn btn-primary">Etiquetar</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </form>

                    <form method="post" id="form_reenviar_msg">
                        <div class="modal fade" id="modal_reenviar_msg" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Reenviar Mensaje a</h5>
                                        <button id="closemodaltkt" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
                                    </div>
                                    <div class="modal-body" style="height: 300px">

                                        <div class="mb-3">
                                            <label for="area" class="form-label font-size-13 text-muted">Enviar a:</label>
                                            <select class="form-control" data-trigger name="id_enviar" id="id_enviar">
                                                <option value="0" selected disabled>1. Elige un Usuario</option>
                                                <?php foreach ($usuarios as $value) { ?>
                                                    <option value="<?php echo  $value['id'] ?>"><?php echo $value['n_user'] . " " . $value['l_user'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div id="informacion_adicional"></div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarTicket69">Cerrar</button>
                                        <button type="button" id="reenviar" class="btn btn-primary">Enviar</button>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    </form>




                    <div>

                    </div>



                </div>


                <!-- END layout-wrapper -->


                <!-- Right Sidebar -->
                <?php include(__dir__ . "/../layouts/right-sidebar.php") ?>
                <!-- /Right-bar -->

                <!-- JAVASCRIPT -->

                <?php include(__dir__ . "/../layouts/vendor-scripts.php") ?>


                <!-- init js -->
                <script src="<?php echo controlador::$rutaAPP ?>app/assets/js/pages/form-advanced.init.js"></script>
                <script src="<?php echo controlador::$rutaAPP ?>app/assets/js/app.js"></script>

                <script src="<?php echo controlador::$rutaAPP ?>app/views/home/js/crearGrupos.js"></script>

                <script src="<?php echo controlador::$rutaAPP ?>app/views/home/js/users.js"></script>
                <script src="<?php echo controlador::$rutaAPP ?>app/views/home/js/chat.js"></script>


                </body>

                </html>