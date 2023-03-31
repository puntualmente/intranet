
<?php 
      include(__dir__."/../layouts/session.php");  
      ?>
      <?php 
      include(__dir__."/../layouts/head-main.php");  
      ?>
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
    <title>Registro | Admin-Puntualmente</title>
    <?php include(__dir__."/../layouts/head.php");  ?>
    <?php include(__dir__."/../layouts/head-style.php");?>

</head>



<?php include(__dir__."/../layouts/body.php");   ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php  include(__dir__."/../layouts/menu.php"); ?>

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
                            <h4 class="mb-sm-0 font-size-18">Registro de Usuarios</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                                    <li class="breadcrumb-item active">Registro de Usuarios</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body p-4">
                            <form action="#" id="signupform" method="POST" enctype="multipart/form-data" autocomplete="off">

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellido" class="form-label">Apellido</label>
                                                <input class="form-control" name="apellido" type="text" id="apellido">
                                            </div>
                                            <div class="mb-3">
                                                <label for="cedula" class="form-label">Cedula</label>
                                                <input class="form-control" name="cedula" type="number" id="cedula" autocomplete="off">
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="telefono" class="form-label">Telefono</label>
                                                <input class="form-control" name="telefono" type="number" id="telefono" autocomplete="off">
                                            </div>
                                   
                                            <div>
                                         
                                            <div class="mb-3">
                                                <label for="area" class="form-label font-size-13 text-muted">Area:</label>
                                                <select class="form-control" data-trigger name="area" id="area">
                                                    <option value="0" selected disabled>1. Elige un area</option>
                                                    <?php foreach($areas as $value){?>
                                                        <option value="<?php echo $value['id_area']?>"><?php echo $value['n_area']?></option>
                                                    <?php }?>
                                                </select>
                                          
                                        </div>
                                            </div>
                                            
                                            <div>
                                                <label for="foto" class="form-label">Foto</label>
                                                <input type="file" class="form-control" name="foto" id="foto" accept="image/x-png,image/gif,image/jpeg,image/jpg" required>
                                            </div>
                                            <br>
                                            <div class="mb-3">
                                                <label for="sede" class="form-label font-size-13 text-muted">Sede:</label>
                                                <select class="form-control" data-trigger name="sede" id="sede">
                                                    <option value="0" selected disabled>1. Elige una sede</option>
                                                    <?php foreach($sedes as $sede){?>
                                                        <option value="<?php echo $sede['id_sede']?>"><?php echo $sede['n_sede']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                           
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="mt-3 mt-lg-0">
                                        <div class="mb-3">
                                                <label for="empresa" class="form-label font-size-13 text-muted">Empresas:</label>
                                                <select class="form-control" data-trigger name="empresa" id="empresa">
                                                    <option value="0" disabled selected>1. Elige una empresa</option>
                                                    <?php foreach($empresas as $empresa){?>
                                                        <option value="<?php echo $empresa['id_empresa']?>"><?php echo $empresa['n_empresa']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nacimiento" class="form-label">Fecha de Nacimiento</label>
                                                <input class="form-control" name="nacimiento" type="date" id="nacimiento">
                                            </div>
                                            <div class="mb-3">
                                                <label for="example-password-input" class="form-label">Contraseña</label>
                                                <input class="form-control" name="password" type="password" id="contraseña">
                                            </div>
                                            <div class="mb-3">
                                                <label for="f_ingreso" class="form-label">Fecha Ingreso a Puntualmente</label>
                                                <input class="form-control" name="f_ingreso" type="date" id="f_ingreso">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Rol</label>
                                                <select name="rol" class="form-select">
                                                    <option value="1" >Admin</option>
                                                    <option value="2" >Usuario con privilegios</option>
                                                    <option value="3" >Usuario Regular</option>

                                                </select>
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label for="grupo" class="form-label font-size-13 text-muted">Grupo:</label>
                                                <select class="form-control" data-trigger name="grupo" id="grupo">
                                                    <option value="0" selected disabled>1. Elige un grupo</option>
                                                    <?php foreach($grupos as $grupo){?>
                                                        <option value="<?php echo $grupo['id_grupo']?>"><?php echo $grupo['n_grupo']?></option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                            <div id="error-text"></div>
                                           
                                        </div>
                                        
                                    </div>
                                    <div class="mt-2">
                                                    <button type="submit" name="submit" id="buttoninput"class="btn btn-primary w-md">Guardar</button>
                                            </div>
                                           
                                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include (__dir__."/../layouts/footer.php") ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<script src="<?php echo controlador::$rutaAPP?>app/views/opc_admin/js/signup.js"></script>

<!-- Right Sidebar -->
<?php include (__dir__."/../layouts/right-sidebar.php")?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include (__dir__."/../layouts/vendor-scripts.php") ?>


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

</body>

</html>