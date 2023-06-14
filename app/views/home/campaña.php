<?php include_once(__dir__ . "/../layouts/session.php");  ?>
<?php include_once(__dir__ . "/../../model/admintablas/sqls_admin.php"); ?>


<?php include(__dir__ . "/../layouts/head-main.php");  ?>

<head>

    <title>Admin Etiquetas | Puntualmente</title>
    <?php include(__dir__ . "/../layouts/head.php");  ?>

    <!-- DataTables -->
    <link href="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <?php include(__dir__ . "/../layouts/head-style.php");  ?>

</head>

<?php include(__dir__ . "/../layouts/body.php");  ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include(__dir__ . "/../layouts/menu.php");  ?>

    <html>
    <form id="reg_observa" method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="main-content">


            <div class="page-content">
                <div class="container-fluid">
                    <div class="mt-3 mt-lg-0">
                        <div class="mb-3">
                            <label for="empresa" class="form-label font-size-13 text-muted">Campaña</label>
                            <select onchange="observar_grupos(this.value)" class="form-control" data-trigger name="empresa" id="empresa">
                                <option value="0" disabled selected>1. Elige una Campaña</option>
                                <?php foreach ($grupos as $grupo) { ?>
                                    <option value="<?php echo $grupo['id_grupo'] ?>"><?php echo $grupo['n_grupo'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table id="datos_impresos" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Fecha y Hora de Logueo</th>
                                                <th>Observaciones</th>
                                                <th>Campaña</th>
                                            </tr>
                                        </thead>

                                        <tbody id="vista_grupos">

                                        </tbody>

                                    </table>
                                    <button type="button" class="btn btn-primary" id="btn_observa">Guardar cambios</button>
                                </div>
                            </div>
                            <!-- end cardaa -->
                        </div> <!-- end col -->
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </form>
</div>

<!-- Right Sidebar -->
<?php include(__dir__ . "/../layouts/right-sidebar.php") ?>
<!-- JAVASCRIPT -->

<?php include(__dir__ . "/../layouts/vendor-scripts.php") ?>

<!-- Required datatable js -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/jszip/jszip.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/js/pages/datatables.init.js"></script>


<script src="<?php echo controlador::$rutaAPP ?>app/assets/js/app.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/views/home/js/observaciones.js"></script>

</html>