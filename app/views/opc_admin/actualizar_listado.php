
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
    
    <!-- datepicker css -->
    <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.css">
    <?php include(__dir__."/../layouts/head.php");  ?>
    <?php include(__dir__."/../layouts/head-style.php");?>

    <!-- alertifyjs Css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />

    <!-- alertifyjs default themes  Css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet" type="text/css" />

    <!-- dropzone css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/dropzone/min/dropzone.min.css" rel="stylesheet" type="text/css" />

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
                            <h4 class="mb-sm-0 font-size-18">Actializar Listado de Usuarios</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Admin</a></li>
                                    <li class="breadcrumb-item active">Actualizar listado</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Actualiza los usuarios desde un archivo</h4>
                                <p class="card-title-desc">Carga unicamente archivos .csv
                                </p>
                            </div>
                            <div class="card-body">

                                <div>
                                    <form action="#" id="udt_users" class="" method="post" enctype="multipart/form-data" >
                                        <div class="fallback">
                                            <input name="file_upl" class="form-control" id="file_upl" type="file" accept=".csv" required onchange="validar()">
                                        </div>
                                        <!-- <div class="dz-message needsclick">
                                            <div class="mb-3">
                                                <i class="display-4 text-muted bx bx-cloud-upload"></i>
                                            </div>

                                            <h5> Pon el documento aqui !!.</h5>

                                        </div> -->
                                    </form>
                                </div>

                                <div class="text-center mt-4">
                                    <button type="button" onclick="subirArchivo()" class="btn btn-primary waves-effect waves-light">Subir</button>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include (__dir__."/../layouts/footer.php") ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include (__dir__."/../layouts/right-sidebar.php")?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include (__dir__."/../layouts/vendor-scripts.php") ?>




<!-- dropzone js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/dropzone/min/dropzone.min.js"></script>


<!-- init js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/form-advanced.init.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>

<!-- Alertify -->

<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/alertify.min.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/views/opc_admin/js/upd_users.js"></script>



</body>

</html>