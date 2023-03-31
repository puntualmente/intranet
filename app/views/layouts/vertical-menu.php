

<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box">
                <a href="home" class="logo logo-dark">
                    <span class="logo-sm">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Hk_P-plate.svg/600px-Hk_P-plate.svg.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Hk_P-plate.svg/600px-Hk_P-plate.svg.png" alt="" height="24"> <span class="logo-txt">Puntualmente</span>
                        
                    </span>
                </a>

                <a href="home" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Hk_P-plate.svg/600px-Hk_P-plate.svg.png" alt="" height="24">
                    </span>
                    <span class="logo-lg">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/78/Hk_P-plate.svg/600px-Hk_P-plate.svg.png" alt="" height="24"> <span class="logo-txt">Puntualmente</span>
                    </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item" id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

        </div>

        <div class="d-flex">


            <div class="dropdown d-none d-sm-inline-block">
                <button type="button" class="btn header-item" id="mode-setting-btn">
                    <i data-feather="moon" class="icon-lg layout-mode-dark"></i>
                    <i data-feather="sun" class="icon-lg layout-mode-light"></i>
                </button>
            </div>

            
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item noti-icon position-relative" id="page-header-notifications-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i data-feather="bell" class="icon-lg"></i>
                    <span class="badge bg-danger rounded-pill" id="notify"> 
                        <!-- SE LLENA CON LA DB  -->
                    </span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0"
                    aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-3">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="m-0"> Notificaciones </h6>
                            </div>
                          
                        </div>
                    </div>
                    <div data-simplebar style="max-height: 230px;">
                        
                        <a href="chat" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class="fas fa-comment-dots"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Mensajes Nuevos</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1" id="notify2"> </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?php echo $language["3_min_ago"]; ?></span></p>
                                    </div>
                                </div>
                                
                            </div>
                        </a>
                        <a href="chat" class="text-reset notification-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 avatar-sm me-3">
                                    <span class="avatar-title bg-success rounded-circle font-size-16">
                                        <i class=" fas fa-users"></i>
                                    </span>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-1">Mensajes Grupos Nuevos</h6>
                                    <div class="font-size-13 text-muted">
                                        <p class="mb-1" id="notify3"> </p>
                                        <p class="mb-0"><i class="mdi mdi-clock-outline"></i> <span><?php echo $language["3_min_ago"]; ?></span></p>
                                    </div>
                                </div>
                                
                            </div>
                        </a>
                    </div>
                    <div class="p-2 border-top d-grid">
                        <a class="btn btn-sm btn-link font-size-14 text-center" href="javascript:void(0)">
                            <i class="mdi mdi-arrow-right-circle me-1"></i> <span><?php echo $language["View_More"]; ?></span> 
                        </a>
                    </div>
                </div>
            </div>


            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item topbar-light bg-light-subtle border-start border-end" id="page-header-user-dropdown"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle header-profile-user" src="<?php echo controlador::$rutaAPP?>app/assets/images/users/<?php echo $_SESSION['img']?>"
                        alt="Header Avatar">
                    <span class="d-none d-xl-inline-block ms-1 fw-medium"><?php echo $_SESSION["username"]; ?>.</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end">
                    <!-- item-->
                    <!-- <a class="dropdown-item" href="apps-contacts-profile.php"><i class="mdi mdi-face-man font-size-16 align-middle me-1"></i> <?php // echo $language["Profile"]; ?></a> -->

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo controlador::$rutaAPP?>/cerrar"><i class="mdi mdi-logout font-size-16 align-middle me-1"></i> Cerrar Sesion</a>
                </div>
            </div>

        </div>
    </div>
</header>

<!-- ========== Left Sidebar Start ========== -->
<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">

            <?php if($_SESSION['rol']==1){?>

                <li class="menu-title" data-key="t-menu"><?php echo $language["Menu"]; ?></li>
                <li>
                    <a href="home">
                        <i data-feather="home"></i>
                        <span data-key="t-dashboard"><?php echo $language["Dashboard"]; ?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Admin</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="registrar">
                                <span data-key="t-regisuser">Registrar usuario</span>
                            </a>
                        </li>
                        <li>
                            <a href="adminusers">
                                <span data-key="t-admin">Tabla Usuarios</span>
                            </a>
                        </li>
                        <li>
                            <a href="admint">
                                <span data-key="t-admin">Admin Tablas LogIn</span>
                            </a>
                        </li>
                        <li>
                            <a href="adetiquetas">
                                <span data-key="t-admin">Tabla Etiquetas</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="chat">
                        <i class="fas fa-comments"></i>
                        <span data-key="t-horizontal">Chat</span>
                    </a>
                </li>

                <?php }elseif($_SESSION['rol']==2){ ?>

                    <li>
                    <a href="javascript: void(0);" class="has-arrow">
                        <i data-feather="grid"></i>
                        <span data-key="t-apps">Usuarios</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="registrar">
                                <span data-key="t-regisuser">Registrar usuario</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="chat">
                        <i class="fas fa-comments"></i>
                        <span data-key="t-horizontal">Chat</span>
                    </a>
                </li>
                

                <?php }elseif($_SESSION['rol']==3){ ?> 
                    
                    <li>
                    <a href="chat">
                        <i class="fas fa-comments"></i>
                        <span data-key="t-horizontal">Chat</span>
                    </a>
                </li>
                    
                    <?php }?>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
    <script src="<?php echo controlador::$rutaAPP?>app/views/layouts/js/notify.js"></script>
</div>
<!-- Left Sidebar End -->