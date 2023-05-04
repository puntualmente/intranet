                
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
                                <h4 class="card-title">Buttons example</h4>
                            </div>
                            <div class="card-body">
                                <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                    <thead>
                                        <tr>
                                            <th>ID Usuario</th>
                                            <th>Nombre</th>
                                            <th>Apellido</th>
                                            <th>Telefono</th>
                                            <th>Cedula</th>
                                            <th>F. Nacimiento</th>
                                            <th>Area</th>
                                            <th>Empresa</th>
                                            <th>F. Ingreso Empresa</th>
                                            <th>Grupo</th>
                                            <th>Rol</th>
                                            <th>Img</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                    <?php foreach($usuarios as $usuario){?>

                                        <tr>
                                            <td><?php echo $usuario['id']?></td>
                                            <td><?php echo $usuario['n_user']?></td>
                                            <td><?php echo $usuario['l_user']?></td>
                                            <td><?php echo $usuario['tel_user']?></td>
                                            <td><?php echo $usuario['cedula']?></td>
                                            <td><?php echo $usuario['f_nacimiento']?></td>
                                            <td><?php echo $usuario['id_area']?></td>
                                            <td><?php echo $usuario['id_empresa']?></td>
                                            <td><?php echo $usuario['f_ingreso_empre']?></td>
                                            <td><?php echo $usuario['id_grupo']?></td>
                                            <td><?php echo $usuario['rol']?></td>
                                            <td><?php echo $usuario['img']?></td>
                                        </tr>
                                    <?php }?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- end cardaa -->
                    </div> <!-- end col -->
                </div> <!-- end row -->
                </div>
                                        </div>
                                    </div>
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


<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>



</body>

</html>    