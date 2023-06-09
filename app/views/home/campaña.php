<?php include_once(__dir__."/../layouts/session.php");  ?>
<?php include_once(__dir__."/../../model/admintablas/sqls_admin.php"); ?>


<?php include(__dir__."/../layouts/head-main.php");  ?>

<head>

    <title>Admin Etiquetas | Puntualmente</title>
    <?php include(__dir__."/../layouts/head.php");  ?>

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

      <html>
      <form id="reg_observa" method="POST" enctype="multipart/form-data" autocomplete="off"> 
      <div class="main-content">
    
    <div class="page-content">
        <div class="container-fluid">               
            
            <div class="row">
                <div class="col-12">
      <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Fecha y Hora de Logueo</th>
                                            <th>Observaciones</th>
                                        
                                    
                                            
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach($campana as $user){?>

                                        
                                        <tr>
                                            <td><?php echo $user['n_user']." ".$user['l_user']?></td>
                                            <td><?php echo $user['f_h']?></td>                           
                                            <td> <div class="mb-3">
                                                <select class="form-control"  data-trigger name="<?php echo $user['cedula'] ?>" id="<?php echo $user['cedula'] ?>" >
                                                    <option value="0" selected disabled>Elige una opción.</option>
                                                                                                            <option value="1">Ausencia Justificada</option>
                                                                                                            <option value="2">Ausencia Injustificada</option>
                                                                                                            <option value="3">Incapacidad</option>
                                                                                                            <option value="4">Permiso</option>
                                                                                                            <option value="5">Sanción</option>
                                                                                                            <option value="6">Vacaciones</option>
                                                                                                            <option value="7">Licencia de Maternidad</option>
                                                                                                            <option value="8">Licencia de Paternidad</option>
                                                                                                            <option value="9">Sanción</option>
                                                                                                    </select>
                                            </div>
                                          </td> 
                                        </tr>                                    
                                    <?php }?>
                                    </tbody>
      
                              </table>
                              <button type="button" class="btn btn-primary" id="btn_observa" >Guardar cambios</button>
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


<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>
<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/observaciones.js"></script>




      </html>

      