                
 <?php include_once(__dir__."/../layouts/session.php");  ?>
<?php include_once(__dir__."/../../model/admintablas/sqls_admin.php"); ?>


<?php include(__dir__."/../layouts/head-main.php");  ?>

<head>

    <title> Tickets | Puntualmente</title>
    <?php include(__dir__."/../layouts/head.php");  ?>

    <!-- choices css -->
    <link href="<?php echo controlador::$rutaAPP?>app/assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
       <!-- datepicker css -->
       <link rel="stylesheet" href="<?php echo controlador::$rutaAPP?>app/assets/libs/flatpickr/flatpickr.min.css">
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
                                <h4 class="card-title">Tickets Asignados a tu Area: </h4>
                            </div>
                            <div class="card-body">

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID Ticket</th>
                                            <th>Usuario</th>
                                            <th>Fecha y Hora</th>
                                            <th>Etiqueta</th>
                                            <!-- <th>Descrip</th> -->
                                            <th>Estado</th>
                                            <th>Accion</th>
                                            <!-- <th>Detalles</th> -->
                                        </tr>
                                    </thead>


                                    <tbody id="mensaje_etiqueta">
                                
                                    <?php foreach($ticketsPorArea as $ticket){

                                        $usuario = mysqli_query($conn, "SELECT * FROM users Where id ='{$ticket['id_propietario_tck']}'");
                                        $dato = mysqli_fetch_assoc($usuario);

                                        $etiquita = mysqli_query($conn, "SELECT * FROM etiquetas Where id_etiqueta='{$ticket['id_etiqueta']}'");
                                        $etiq = mysqli_fetch_assoc($etiquita);

                                        if($ticket['estado']==1){
                                            $class="text-warning";
                                            $estado= "Pendiente";
                                            $disabled="";
                                        }elseif($ticket['estado']==2){
                                            $class="text-success";
                                            $estado="Resuelto";
                                            $disabled="disabled";
                                        }
                                        
                                        ?>

                                        <tr>
                                            <td><?php echo $ticket['id_ticket']?></td>
                                            <td><?php echo $dato['n_user']?></td>
                                            <td><?php echo $ticket['fecha_hora']?></td>
                                            <td><?php echo $etiq['descrip_etiq']?></td>
                                            <!-- <td><?php //echo $ticket['descrip']?></td> -->
                                            <td class="<?php echo $class?>"> <?php echo $estado?></td>

                                            <td>
                                                <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#resolver" <?php echo $disabled?> >
                                                <i class="far fa-check-circle"></i>
                                                </button>
                                                <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#reasignar" <?php echo $disabled?> >
                                                <i class=" fas fa-share"></i>
                                                </button>
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
                                        <div class="modal fade" id="resolver" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Resolver Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body">
                                                    
                                                <div class="mb-3">
                                                <label for="area" class="form-label font-size-13 text-muted">Selecciona la acción que deseas realizar para resolver el ticket:</label>
                                                <select class="form-control" id="accionarealizar" onchange="aparecerselect(this.value)">
                                                    <option value="0" selected disabled require>Selecciona una accion</option>
                                                    <option value="2">Resolver</option>
                                                    <option value="1">Reasignar Ticket</option>
                                                    
                                                <div id="selectapar">

                                                </div>
                                                
                                                <label for="descripetic">Descripción:</label>
                                                <textarea name="descripetic" id="descripetic" class="form-control"></textarea>
                                                </div>
                                                

                                <div id="mensaje"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                                        <button type="button" onclick=""  class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>


                                        <form method="post" id="formetiqueta">
                                        <div class="modal fade" id="reasignar" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Resolver Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body">
                                                    
                                                <div class="mb-3">
                                                <label for="area" class="form-label font-size-13 text-muted">Selecciona la acción que deseas realizar para resolver el ticket:</label>
                                                <select class="form-control" id="accionarealizar" onchange="aparecerselect(this.value)">
                                                    <option value="0" selected disabled require>Selecciona una accion</option>
                                                    <option value="2">Resolver</option>
                                                    <option value="1">Reasignar Ticket</option>
                                                    
                                                <div id="selectapar">

                                                </div>
                                                
                                                <label for="descripetic">Descripción:</label>
                                                <textarea name="descripetic" id="descripetic" class="form-control"></textarea>
                                                </div>
                                                

                                <div id="mensaje"></div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
                                                        <button type="button" onclick=""  class="btn btn-primary">Guardar</button>
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

<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/tickets.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>


</body>

</html>    