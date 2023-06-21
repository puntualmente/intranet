
<?php 
      include(__dir__."/../layouts/session.php");  
      include(__dir__."/../layouts/head-main.php");  
      include_once(__dir__."/../../model/admintablas/sqls_admin.php");
      require (__dir__."/../../model/data/pdo.php");

    $consultarRegistros = $pdo->prepare("SELECT * FROM persona WHERE cedula = '{$_SESSION['cedula']}'");
    $consultarRegistros->execute();

      function cantidad($objetos){
        $contador = 0;
        foreach($objetos as $trabajo){
            $contador = $contador + 1;
        }
        return $contador;
      }

    $consultrabajos = $pdo->prepare("SELECT * FROM exp_laboral_persona WHERE cedula = '{$_SESSION['cedula']}'");
    $consultrabajos->execute();

    $consulacademico = $pdo->prepare("SELECT * FROM formacion_ac_persona WHERE cedula = '{$_SESSION['cedula']}'");
    $consulacademico->execute();


    $consulref = $pdo->prepare("SELECT * FROM referen_persona WHERE cedula = '{$_SESSION['cedula']}'");
    $consulref->execute();


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
                            <h4 class="mb-sm-0 font-size-18">Tus Datos</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Perfil</a></li>
                                    <li class="breadcrumb-item active">Tus Datos</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                    <div class="card-header">
                                
                            </div> <!-- end card header -->
                        <?php if(cantidad($consultarRegistros)>0){?>
                            <div class="alert alert-success" role="alert">
                                    Gracias!! Datos Enviados Con Exito... 👍
                                </div>
                        <?php }else{ ?>
                            
                            <div class="card-body">
                                <div class="accordion accordion-flush" id="accordionFlushExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button fw-medium" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseOne" aria-expanded="true" aria-controls="flush-collapseOne">
                                                Datos Basicos
                                            </button>
                                        </h2>
                                <form id="form_perfil" method="POST" enctype="multipart/form-data" autocomplete="off">
                                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body text-muted">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Nombre</label>
                                                        <input class="form-control" name="nombre" value="<?php echo $_SESSION['username']?>" type="text" id="nombre" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="celular" class="form-label">Celular</label>
                                                        <input class="form-control" name="celular" type="text" id="celular" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="direccion" class="form-label">Dirección</label>
                                                        <input class="form-control" name="direccion" type="text" id="direccion" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="con_info" class="form-label">Conocimientos Informáticos</label>
                                                        <textarea class="form-control" name="con_info" type="text" id="con_info" autocomplete="off"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label for="cedula" class="form-label">Cedula</label>
                                                            <input class="form-control" name="cedula" type="text" id="cedula" value="<?php echo $_SESSION['cedula']?>" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="correo" class="form-label">Correo</label>
                                                            <input class="form-control" name="correo" type="email" id="correo" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="idiomas" class="form-label">Idiomas</label>
                                                            <input class="form-control" name="idiomas" type="text" id="idiomas" placeholder="Ingresa los idiomas separados por comas" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="ap_hab" class="form-label">Aptitudes y Habilidades</label>
                                                            <textarea class="form-control" name="ap_hab" type="text" id="ap_hab" autocomplete="off"></textarea>
                                                        </div>
                                                    </div>

                                                </div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label for="perfil" class="form-label">Tu Perfil</label>
                                                        <textarea class="form-control" name="perfil" type="text" id="perfil" autocomplete="off"></textarea>
                                                    </div>
                                                <div>
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Ultimos Trabajos</h4>
                                                                <p class="card-title-desc">Maximo 3 Trabajos <button id="agregartrabajo" type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addtrabajo">
                                                                Agregar</button>
                                                                </p>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">

                                                                    <thead>
                                                                        <tr>
                                                                            <th>Empresa</th>
                                                                            <th>Cargo</th>
                                                                            <th>Inicio</th>
                                                                            <th>Fin</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="trabajos">
                                                                        <?php foreach($consultrabajos as $trabajo){?>
                                                                        <tr>
                                                                            <th scope="row"><?php echo $trabajo->empresa ?></th>
                                                                            <td><?php echo $trabajo->cargo?></td>
                                                                            <td><?php echo $trabajo->f_inicio?></td>
                                                                            <td><?php echo $trabajo->f_fin?></td>
                                                                        </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <!-- end card body -->
                                                    <!-- end card -->
                                                </div>

                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Escolaridad</h4>
                                                                <p class="card-title-desc">Maximo 3 Registros <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addescolaridad">
                                                                Agregar</a>
                                                                </p>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">

                                                                    <thead>
                                                                        <tr>
                                                                            <th>Institución</th>
                                                                            <th>Titulo</th>
                                                                            <th>Inicio</th>
                                                                            <th>Fin</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="escolaridad">
                                                                        <?php foreach($consulacademico as $trabajo){?>
                                                                            <tr>
                                                                                <th scope="row"><?php echo $trabajo->institucion?></th>
                                                                                <td><?php echo $trabajo->titulo?></td>
                                                                                <td><?php echo $trabajo->f_inicio?></td>
                                                                                <td><?php echo $trabajo->f_fin?></td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                                                    
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h4 class="card-title">Referencias Personales</h4>
                                                                <p class="card-title-desc">Maximo 2 Referencias <a type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#addreferencias">
                                                                Agregar</a>
                                                                </p>
                                                        </div>
                                                        <div class="card-body">

                                                            <div class="table-responsive">
                                                                <table class="table table-bordered mb-0">

                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nombre</th>
                                                                            <th>Telefono</th>
                                                                            <th>Parentesco</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="referencias">
                                                                        <?php foreach($consulref as $trabajo){?>
                                                                            <tr>
                                                                                <th scope="row"><?php echo $trabajo->nombre_ref?></th>
                                                                                <td><?php echo $trabajo->celular_ref?></td>
                                                                                <td><?php echo $trabajo->parentesco?></td>
                                                                            </tr>
                                                                        <?php }?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- end card body -->
                                                    </div>
                                                    <!-- end card -->
                    
                    

                                                </div>
                                                

                                            </div>
                                            
                                        </div>
                                    </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingThree">
                                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                                Carga Tus Documentos
                                            </button>
                                        </h2>
                                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body text-muted">
                                                <div class="row">
                                                    <div class="col-lg-10">
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Hoja de Vida</h5>

                                                            <p class="card-title-desc"><strong>** La información que tenga en la HV, debe estar actualizada y lo que en ella viaje debe coincidir con los certificados entregados, por ejemplo: si tiene experiencia en X empresa debe estar el certificado laboral de dicha empresa igual con los datos de estudio; la experiencia y la formación académica deben tener fechas de inicio y fin **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="hv" id="hv" accept=".pdf" onchange="validar(this.id)"required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Documento de Identidad</h5>

                                                            <p class="card-title-desc"><strong>** Debe ser fotocopia, ampliada al 150% y escaneada, no fotos, debe ser legible y verse todos los bordes del documento **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="di" id="di" accept=".pdf" onchange="validar(this.id)" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Antecedentes Policia</h5>
                                                            <p class="card-title-desc"><strong>** Descargados de la página, con fecha no mayor a 5 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="apoli" id="apoli" accept=".pdf" onchange="validar(this.id)" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Antecedentes Procuraduria</h5>
                                                            <p class="card-title-desc"><strong>** Descargados de la página, con fecha no mayor a 5 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="aprocu" id="aprocu" accept=".pdf" onchange="validar(this.id)" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificados Academicos</h5>
                                                            <p class="card-title-desc"><strong>** Deben ser los certificados que tiene en su HV **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_ac[]" id="certif_ac" accept=".pdf" multiple required onchange="validar(this.id)">
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificados Laborales</h5>
                                                            <p class="card-title-desc"><strong>** Deben ser los certificados que tiene en su HV y tienen que venir firmados **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_lab[]" id="certif_lab" accept=".pdf" multiple required onchange="validar(this.id)">
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificado EPS</h5>
                                                            <p class="card-title-desc"><strong>** Certificado de afiliación vigente en la EPS, con fecha de expedición no mayor a 15 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_eps" id="certif_eps" accept=".pdf" required onchange="validar(this.id)">
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificado Cuenta Bancaria</h5>
                                                            <p class="card-title-desc"><strong>** Certificado cuenta bancaria, con fecha de expedición no mayor a 15 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_banco" id="certif_banco" accept=".pdf" required onchange="validar(this.id)">
                                                        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" name="submit" id="buttoninput"class="btn btn-primary w-md" >Guardar</button>
                                                    <div class="spinner-border text-danger m-1" role="status" id="cargando" Style="Display:none;"> 
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                </div>

                                            </form>


                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion -->
                            </div><!-- end card-body -->
                        </div><!-- end card -->  
                        <?php } ?>
  
                    
                    

                
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include (__dir__."/../layouts/footer.php") ?>
    </div>
    <!-- end main content-->

</div>

<!-- END layout-wrapper -->


                                    <form method="post" id="formaddtrabajo">
                                        <div class="modal fade" id="addtrabajo" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Nueva Experiencia Laboral</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="empresa" >Empresa:</label>
                                                    <input class="form-control" type="text" id="empresa" name="empresa" autocomplete="off">
                                                    <label for="cargo" >Cargo:</label>
                                                    <input class="form-control" type="text" id="cargo" name="cargo" autocomplete="off">
                                                    <label for="f_ini_emp" >Fecha Inicio:</label>
                                                    <input class="form-control" type="date" id="f_ini_emp" name="f_ini_emp">
                                                    <label for="f_fin_emp" >Fecha Fin:</label>
                                                    <input class="form-control" type="date" id="f_fin_emp" name="f_fin_emp">
                                                    <br>
                                                    <label for="funciones" >Funciones:</label>
                                                    <textarea class="form-control" type="text" id="funciones" name="funciones" autocomplete="off"></textarea>
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodaltrabajo">Cerrar</button>
                                                        <button type="button" id="botoncambiar" onclick="agregarTrabajos()" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>

                                        <form method="post" id="formaddescolaridad">
                                        <div class="modal fade" id="addescolaridad" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Nuevo Registro</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="institucion" >Institucion:</label>
                                                    <input class="form-control" type="text" id="institucion" name="institucion" autocomplete="off">
                                                    <label for="titulo" >Titulo:</label>
                                                    <input class="form-control" type="text" id="titulo" name="titulo" autocomplete="off">
                                                    <label for="f_ini_escol" >Fecha Inicio:</label>
                                                    <input class="form-control" type="date" id="f_ini_escol" name="f_ini_escol">
                                                    <label for="f_fin_escol" >Fecha Fin:</label>
                                                    <input class="form-control" type="date" id="f_fin_escol" name="f_fin_escol">
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodalescolaridad">Cerrar</button>
                                                        <button type="button" id="botoncambiar" onclick="agregarEscolaridad()" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>

                                        <form method="post" id="formaddreferencias">
                                        <div class="modal fade" id="addreferencias" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-scrollable">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalScrollableTitle">Nueva Referencia</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                    <label for="nombre_ref" >Nombre:</label>
                                                    <input class="form-control" type="text" id="nombre_ref" name="nombre_ref" autocomplete="off">
                                                    <label for="telefono" >Telefono:</label>
                                                    <input class="form-control" type="text" id="telefono" name="telefono" autocomplete="off">
                                                    <label for="parentesco" >Parentesco:</label>
                                                    <input class="form-control" type="text" id="parentesco" name="parentesco" autocomplete="off">
                                                    
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodalreferen">Cerrar</button>
                                                        <button type="button" id="botoncambiar" onclick="agregarRef()" class="btn btn-primary">Guardar</button>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->

                                        </form>



<script src="<?php echo controlador::$rutaAPP?>app/views/home/js/perfil.js"></script>

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

<!-- dropzone js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/dropzone/min/dropzone.min.js"></script>


<!-- init js -->
<script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/form-advanced.init.js"></script>

<script src="<?php echo controlador::$rutaAPP?>app/assets/js/app.js"></script>

<!-- Alertify -->

<script src="<?php echo controlador::$rutaAPP?>app/assets/libs/alertifyjs/build/alertify.min.js"></script>


</body>

</html>