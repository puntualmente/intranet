                
 <?php include_once(__dir__."/../layouts/session.php");  ?>
<?php include_once(__dir__."/../../model/admintablas/sqls_admin.php"); ?>


<?php include(__dir__."/../layouts/head-main.php");  ?>

<head>

    <title>Admin Etiquetas | Puntualmente</title>
    <?php include(__dir__."/../layouts/head.php");  ?>

    <!-- choices css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
       <!-- datepicker css -->
       <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.css">
    <title>Registro | Admin-Puntualmente</title>
     <!-- DataTables -->
     <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


    <?php include(__dir__."/../layouts/head-style.php");  ?>

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
                
            <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Administración de Etiquetas</h4>
                            </div>
                            <button type="button" class="btn btn-success waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#crearetiqueta">
                                        <i class=" fas fa-plus font-size-16 align-middle me-2"></i> Nueva Etiqueta
                                    </button>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID Etiqueta</th>
                                            <th>Area</th>
                                            <th>Descripción Etiqueta</th>
                                            <th>Tiempo Estimado</th>
                                            <th>Tipo</th>
                                            <th></th>
                                        </tr>
                                    </thead>


                                    <tbody>

                                    <?php foreach($etiquetas as $etiqueta){?>

                                        <tr>
                                            <td><?php echo $etiqueta['id_etiqueta']?></td>
                                            <td><?php echo $etiqueta['id_area']?></td>
                                            <td><?php echo $etiqueta['descrip_etiq']?></td>
                                            <td><?php echo $etiqueta['t_estimado']?></td>
                                            <td><?php echo $etiqueta['tipo_t']?></td>
                                            <td>
                                                <a type="button" id="<?php //echo $empresa['id_etiqueta']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                                                <i class="fas fa-pencil-alt"></i>
                                                </a>
                                                <a type="button" id="<?php //echo $empresa['id_etiqueta']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2">
                                                <i class=" fas fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                </div>
                                        </div>
                                    </div>
                <!-- Scrollable modal -->
                                <form method="post" id="formetiqueta">
                                        <div class="modal fade" id="crearetiqueta" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Etiqueta</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body">
                                                    
                                                    <div class="mb-3">
                                                <label for="area" class="form-label font-size-13 text-muted">Area:</label>
                                                <select class="form-control" data-trigger name="area_etiqueta" id="area_etiqueta">
                                                    <option value="0" selected disabled require>1. Elige un area</option>
                                                    <?php foreach($areas as $value){?>
                                                        <option value="<?php echo $value['id_area']?>"><?php echo $value['n_area']?></option>
                                                    <?php }?>
                                                </select>
                                                <label for="descripetic">Descripción:</label>
                                                <textarea name="descripetic" id="descripetic" class="form-control"></textarea>
                                                </div>
                                                <label class="form-label font-size-13 text-muted">Tiempo Estimado: </label>
                                                <div class="d-flex justify-content-center" >
                                                    <div>
                                                        <input type="number" id="t_estimado" class="form-control">
                                                    </div>
                                                    <div>
                                                        <select class="form-select" name="tipo_t" id="tipo_t">
                                                            <option value="Minutos">Minutos</option>
                                                            <option value="Horas">Horas</option>
                                                            <option value="Dias">Dias</option>
                                                        </select>
                                                    </div>
                                                <div id="mensaje_etiqueta"></div>
                                                    
                                                </div>

                                <div id="mensaje"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                                        <button type="button" onclick="agregaretiqueta()"  class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>

</div>
<!-- END layout-wrapper -->



<!-- Right Sidebar -->
<?php include (__dir__."/../layouts/right-sidebar.php")?>
<!-- JAVASCRIPT -->

<?php include (__dir__."/../layouts/vendor-scripts.php")?>

<!-- Required datatable js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/jszip/jszip.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>

<!-- Responsive examples -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<!-- Datatable init js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/datatables.init.js"></script>

<!-- choices js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>


<!-- datepicker js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.js"></script>

<!-- init js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/form-advanced.init.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/adminetiquetas.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>



</body>

</html>    