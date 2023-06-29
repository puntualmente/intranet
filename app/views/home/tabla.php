<?php include_once(__dir__ . "/../layouts/session.php");  ?>
<?php include_once(__dir__ . "/../../model/admintablas/sqls_admin.php"); ?>
<?php include(__dir__ . "/../layouts/head-main.php");  ?>
<?php require(__dir__ . "/../../model/data/pdo.php"); ?>


<head>

    <title>Coordinadores | Puntualmente</title>
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

                            </select>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card-body">
                                    <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                        <thead>
                                            <tr>
                                                <th>Cedula</th>
                                                <th>Nombre</th>
                                                <th>Fecha y Hora de Logueo</th>
                                                <th>Observaciones</th>
                                                <th>Campaña</th>
                                            </tr>
                                        </thead>
                                        <tbody id="vistaObservaciones">
                                            <?php
                                            date_default_timezone_set('America/Bogota');
                                            $hoy = date("Y-m-d ");

                                            // Obtengo los datos de la tabla observacion_coordinadores y les hago un assoc para guardarlos
                                            $query = $pdo->query("SELECT cedula,n_user, l_user, f_h, observaciones,campana FROM observacion_coordinadores WHERE DATE(f_h)  = '{$hoy}'");
                                            $observaciones = $query->fetchAll(PDO::FETCH_ASSOC);
                                            foreach ($observaciones as $observacion) { ?>
                                                <tr>
                                                    <td><?php echo $observacion['cedula']; ?></td>
                                                    <td><?php echo $observacion['n_user'] . " " . $observacion['l_user']; ?></td>
                                                    <td><?php echo $observacion['f_h']; ?></td>
                                                    <td><?php echo $observacion['observaciones']; ?></td>
                                                    <td><?php echo $observacion['campana']; ?></td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>

                                    <!-- <button type="submit" onchange="observaciones()" class="btn btn-primary" id="btn_actualizar" name=actualizar>Actualizar</button> -->

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
<script>
    var baseurl = <?php echo controlador::$rutaAPP ?>;
</script>
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