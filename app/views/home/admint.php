<?php include_once(__dir__."/../layouts/session.php");  ?>
<?php include_once(__dir__."/../../model/admintablas/sqls_admin.php"); ?>


<?php include(__dir__."/../layouts/head-main.php");  ?>

<head>

    <title>Admin tablas | Puntualmnte</title>
    <?php include(__dir__."/../layouts/head.php");  ?>
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

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Administrador de Tablas</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                                    <li class="breadcrumb-item active">Admin Tablas</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Areas</h4>
                                <p class="card-title-desc">Administra las Areas</p>
                            </div>
                            <div class="card-body">
                                <div>
                                    <span>Agregar area:   </span> 
                                    <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    <i class="fas fa-plus-circle"></i></a>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="areatabla">
                                            <!-- SE LLENAN LAS AREAS -->
                                            <?php foreach($areas as $area){?> 
                                            <tr data-id="1">
                                                <td id="id" style="width: 80px"><?php echo $area['id_area'] ?></td>
                                                <td id="name"><?php echo $area['n_area']?></td>
                                                <td style="width: 100px">
                                                    <a type="button" id="<?php echo $area['id_area']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificararea(this.id) >
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Sedes</h4>
                                <p class="card-title-desc">Administra las Sedes</p>
                            </div>
                            <div class="card-body">
                            
                                <div>
                                    <span>Agregar Sede:   </span> 
                                    <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#agregarsede">
                                    <i class="fas fa-plus-circle"></i></a>
                                </div>
                               
                            <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="sedetabla">
                                            <!-- SE LLENAN LAS AREAS -->
                                            <?php foreach($sedes as $sede){?> 
                                            <tr data-id="1">
                                                <td id="id" style="width: 80px"><?php echo $sede['id_sede'] ?></td>
                                                <td id="name"><?php echo $sede['n_sede']?></td>
                                                <td style="width: 100px">
                                                    <a type="button" id="<?php echo $sede['id_sede']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificarsede(this.id) >
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->

                </div> <!-- end row -->
<!-- -------------------------------------------------------------------- -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Grupos</h4>
                                <p class="card-title-desc">Administra las Grupos</p>
                            </div>
                            <div class="card-body">
                            <div>
                                    <span>Agregar Grupos:  </span> 
                                    <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#agregargrupo">
                                    <i class="fas fa-plus-circle"></i></a>
                                </div>
                            <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="grupotabla">
                                            <!-- SE LLENAN LAS AREAS -->
                                            <?php foreach($grupos as $grupo){?> 
                                            <tr data-id="1">
                                                <td id="id" style="width: 80px"><?php echo $grupo['id_grupo'] ?></td>
                                                <td id="name"><?php echo $grupo['n_grupo']?></td>
                                                <td style="width: 100px">
                                                    <a type="button" id="<?php echo $grupo['id_grupo']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificargrupo(this.id) >
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                        </div>
                    </div> <!-- end col -->
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Empresas</h4>
                                <p class="card-title-desc">Administra las Areas</p>
                            </div>
                            <div class="card-body">

                            <div>
                                    <span>Agregar Empresas:  </span> 
                                    <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#agregarempresa">
                                    <i class="fas fa-plus-circle"></i></a>
                                </div>
                            <div class="table-responsive">
                                    <table class="table table-editable table-nowrap align-middle table-edits">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody id="empresatabla">
                                            <!-- SE LLENAN LAS AREAS -->
                                            <?php foreach($empresas as $empresa){?> 
                                            <tr data-id="1">
                                                <td id="id" style="width: 80px"><?php echo $empresa['id_empresa'] ?></td>
                                                <td id="name"><?php echo $empresa['n_empresa']?></td>
                                                <td style="width: 100px">
                                                    <a type="button" id="<?php echo $empresa['id_empresa']?>" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal1" data-bs-target="#staticBackdrop2" onclick=modificarempresa(this.id) >
                                                        <i class="fas fa-pencil-alt"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->

                </div> <!-- end row -->
                
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include (__dir__."/../layouts/footer.php")?>
    </div>
    <!-- end main content-->
<!-- Static Backdrop Modal -->
                                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document" id="modificarmodal">
                                            <div class="modal-content">
                                            <form method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Area</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <label for="n_grupo" >Nombre Area:</label>
                                                    <input class="form-control" type="text" id="nombrearea" name="nombrearea">
                                                    <input type="text" hidden disabled value="1">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="agregararea()">Guardar</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
<!-- MODAL PLANTILLA -->
                                    <div class="modal fade" id="agregarsede" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Sede</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <label for="n_grupo" >Nombre Sede:</label>
                                                    <input class="form-control" type="text" id="nombresede" name="nombresede">
                                                    <input type="text" hidden disabled value="1">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="agregarsede()">Guardar</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- --MODAL GRUPO--- -->
                                    <div class="modal fade" id="agregargrupo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Grupo</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <label for="n_grupo" >Nombre Grupo:</label>
                                                    <input class="form-control" type="text" id="nombregrupo" name="nombregrupo">
                                                    <input type="text" hidden disabled value="1">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="agregargrupos()">Guardar</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- MODAL EMPRESAS -->
                                    <div class="modal fade" id="agregarempresa" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                            <form method="POST">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="staticBackdropLabel">Agregar Empresas</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                
                                                <div class="modal-body">
                                                    <label for="n_grupo" >Nombre Empresa:</label>
                                                    <input class="form-control" type="text" id="nombrempresa" name="nombrempresa">
                                                    <input type="text" hidden disabled value="1">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" onclick="agregarempresa()">Guardar</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>
</div>
<!-- END layout-wrapper -->


<!-- Right Sidebar -->
<?php include (__dir__."/../layouts/right-sidebar.php")?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->

<?php include (__dir__."/../layouts/vendor-scripts.php")?>

<!-- Table Editable plugin -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/table-edits/build/table-edits.min.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/table-editable.int.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/admintablas.js"></script>


</body>

</html>