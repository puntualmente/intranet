                
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

                                <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100" style="width:100%; " >
                                    <thead>
                                        <tr>
                                            <th>ID Ticket</th>
                                            <th>Usuario</th>
                                            <th>Fecha y Hora</th>
                                            <th>Etiqueta</th>
                                            <!-- <th>Descrip</th> -->
                                            <th>Estado</th>
                                            <th></th>
                                            <!-- <th>Detalles</th> -->
                                        </tr>
                                    </thead>


                                    <tbody id="mensaje_etiqueta">

                                    <?php 

                                    foreach($redirigidosporarea as $redirigidos){

                                        $tickets1 = mysqli_query($conn, "SELECT * FROM tickets WHERE id_ticket = '{$redirigidos['id_ticket']}'");

                                        $ticket1 = mysqli_fetch_assoc($tickets1);

                                        $usuario1 = mysqli_query($conn, "SELECT * FROM users Where id ='{$ticket1['id_propietario_tck']}'");
                                        $dato1 = mysqli_fetch_assoc($usuario1);

                                        $etiquita1 = mysqli_query($conn, "SELECT * FROM etiquetas Where id_etiqueta='{$ticket1['id_etiqueta']}'");
                                        $etiq1 = mysqli_fetch_assoc($etiquita1);

                                        if($redirigidos['estado']==1){
                                            $class="text-warning";
                                            $estado= "Pendiente";
                                            $disabled="";
                                        }elseif($redirigidos['estado']==2){
                                            $class="text-danger";
                                            $estado="Redireccionado";
                                            $disabled="Redireccionado";
                                        }elseif($redirigidos['estado']==3){
                                            $class="text-success";
                                            $estado="Resuelto";
                                            $disabled="Resuelto";
                                        }
                                        
                                        ?>

                                        <tr>
                                            <td><?php echo $ticket1['id_ticket']?></td>
                                            <td><?php echo $dato1['n_user'] ." ". $dato1['l_user'] ?></td>
                                            <td><?php echo $ticket1['fecha_hora']?></td>
                                            <td style="width: 10px"><?php echo $etiq1['descrip_etiq']?></td>
                                            <!-- <td><?php //echo $ticket['descrip']?></td> -->
                                            <td class="<?php echo $class?>"> <?php echo $estado?></td>

                                            <?php 

                                                if($redirigidos['estado']==1){ ?>
                                                    <td>
                                                        <button type="button" id="<?php echo $ticket1['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#resolver" onclick="traerReasignartk(this.id)" <?php echo $disabled?> >
                                                        <i class="far fa-check-circle"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $ticket1['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#reasignar" onclick="traeridreasignar(this.id)" <?php echo $disabled?> >
                                                        <i class=" fas fa-share"></i>
                                                        </button>
                                                    </td>
                                            <?php }elseif($redirigidos['estado']==2){ ?>
                                                    <td>
                                                        <button type="button" id="<?php echo $ticket1['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mostrarRedirects" onclick="verReasigna(this.id)" <?php echo $disabled?> >
                                                        <i class="fas fa-eye"></i>
                                                        </button>
                                                        
                                                    </td>

                                            <?php }elseif($redirigidos['estado']==3){ ?>
                                                <td>
                                                        <button type="button" id="<?php echo $ticket1['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#resuelto" onclick="traerresuelto(this.id)" <?php echo $disabled?> >
                                                        <i class="fas fa-eye"></i>
                                                        </button>
                                                        
                                                    </td>
                                            <?php } ?>
                                            
                                        </tr>
                                    <?php } ?>
                                   


                                
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
                                            $class="text-danger";
                                            $estado="Redireccionado";
                                            $disabled="Redireccionado";
                                        }elseif($ticket['estado']==3){
                                            $class="text-success";
                                            $estado="Resuelto";
                                            $disabled="Resuelto";
                                        }
                                        
                                        ?>

                                        <tr>
                                            <td><?php echo $ticket['id_ticket']?></td>
                                            <td><?php echo $dato['n_user'] ." ". $dato['l_user'] ?></td>
                                            <td><?php echo $ticket['fecha_hora']?></td>
                                            <td><?php echo $etiq['descrip_etiq']?></td>
                                            <!-- <td><?php //echo $ticket['descrip']?></td> -->
                                            <td class="<?php echo $class?>"> <?php echo $estado?></td>

                                            <?php 

                                                if($ticket['estado']==1){ ?>
                                                    <td>
                                                        <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#resolver" onclick="traerReasignartk(this.id)" <?php echo $disabled?> >
                                                        <i class="far fa-check-circle"></i>
                                                        </button>
                                                        <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#reasignar" onclick="traeridreasignar(this.id)" <?php echo $disabled?> >
                                                        <i class=" fas fa-share"></i>
                                                        </button>
                                                    </td>
                                            <?php }elseif($ticket['estado']==2){ ?>
                                                    <td>
                                                        <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#mostrarRedirects" onclick="verReasigna(this.id)" <?php echo $disabled?> >
                                                        <i class="fas fa-eye"></i>
                                                        </button>
                                                        
                                                    </td>

                                            <?php }elseif($ticket['estado']==3){ ?>
                                                <td>
                                                        <button type="button" id="<?php echo $ticket['id_ticket']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#resuelto" onclick="traerresuelto(this.id)" <?php echo $disabled?> >
                                                        <i class="fas fa-eye"></i>
                                                        </button>
                                                        
                                                    </td>
                                            <?php } ?>
                                            
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
                                                <div class="modal-body" id="idticket">

                                                

                                                
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cancelar</button>
                                                        <button type="button" onclick="resolver()"  class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                </form>


                                
                <!-- Mostrar Redirect -->

                <form method="post" id="formetiqueta">
                                        <div class="modal fade" id="mostrarRedirects" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle"> Tabla de Reasignaciones del Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body" id="mostrarReasig">

                                                

                                                
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cerrar</button>
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
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Reasignar Ticket</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                                                        

                                                    </div>
                                                <div class="modal-body">
                                                <div id="idtkredireccion"></div>
                                                <div id="mostrarReasig"></div>
                                                    
                                                <div class="mb-3">

                                                <label for="area" class="form-label font-size-13 text-muted">Area a la que quieres reasignar el ticket:</label>
                                                <select class="form-control" data-trigger name="area_redireccion" id="area_redireccion">
                                                    <option value="0" selected disabled require>1. Elige un area</option>
                                                    <?php foreach($areas as $value){?>
                                                        <option value="<?php echo $value['id_area']?>"><?php echo $value['n_area']?></option>
                                                    <?php }?>
                                                </select>
                                                    
                                                <div id="response_reasig">

                                                </div>
                                                
                                                <label for="descrip_reasig">Descripción:</label>
                                                <textarea name="descrip_reasig" id="descrip_reasig" rows="5" class="form-control"></textarea>
                                                </div>
                                                

                                         <div id="mensaje"></div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" onclick="limpiar()">Cancelar</button>
                                                        <button type="button" onclick="reasignar()"  class="btn btn-primary">Reasignar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>

                                        <!-- MODAL TICKET RESUELTO -->

                                        <form method="post" id="formetiqueta">
                                        <div class="modal fade" id="resuelto" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Detalles Ticket Cerrado</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                <div class="modal-body" id="idticketresuelto">

                                                

                                                
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
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