
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
                                                        <label for="nombre" class="form-label">Celular</label>
                                                        <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nombre" class="form-label">Dirección</label>
                                                        <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mt-3 mt-lg-0">
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Cedula</label>
                                                            <input class="form-control" name="nombre" type="text" id="nombre" value="<?php echo $_SESSION['cedula']?>" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                        <label for="nombre" class="form-label">Correo</label>
                                                        <input class="form-control" name="nombre" type="email" id="nombre" autocomplete="off">
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingTwo">
                                            <button class="accordion-button fw-medium collapsed" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                                                Perfil
                                            </button>
                                        </h2>
                                        <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                                            data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body text-muted">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                    <h4>Formación academica</h4>
                                                        <div class="mb-3">
                                                            <label for="institucion" class="form-label">Institución</label>
                                                            <input class="form-control" name="institucion" type="text" id="institucion" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Celular</label>
                                                            <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="nombre" class="form-label">Dirección</label>
                                                            <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mt-3 mt-lg-0">
                                                            <div class="mb-3">
                                                                <label for="nombre" class="form-label">Cedula</label>
                                                                <input class="form-control" name="nombre" type="text" id="nombre" value="<?php echo $_SESSION['cedula']?>" autocomplete="off">
                                                            </div>
                                                            <div class="mb-3">
                                                            <label for="nombre" class="form-label">Correo</label>
                                                            <input class="form-control" name="nombre" type="text" id="nombre" autocomplete="off">
                                                        </div>
                                                        </div>
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
                                                            <input type="file" class="form-control" name="hv" id="hv" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Documento de Identidad</h5>

                                                            <p class="card-title-desc"><strong>** Debe ser fotocopia, ampliada al 150% y escaneada, no fotos, debe ser legible y verse todos los bordes del documento **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="di" id="di" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Antecedentes Policia</h5>
                                                            <p class="card-title-desc"><strong>** Descargados de la página, con fecha no mayor a 5 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="apoli" id="apoli" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Antecedentes Procuraduria</h5>
                                                            <p class="card-title-desc"><strong>** Descargados de la página, con fecha no mayor a 5 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="aprocu" id="aprocu" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificados Academicos</h5>
                                                            <p class="card-title-desc"><strong>** Deben ser los certificados que tiene en su HV **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_ac" id="certif_ac" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificados Laborales</h5>
                                                            <p class="card-title-desc"><strong>** Deben ser los certificados que tiene en su HV y tienen que venir firmados **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_lab" id="certif_lab" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificado EPS</h5>
                                                            <p class="card-title-desc"><strong>** Certificado de afiliación vigente en la EPS, con fecha de expedición no mayor a 15 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_eps" id="certif_eps" accept="application/pdf" required>
                                                        </div>
                                                        <hr>
                                                        <div class="mb-3">
                                                            <h5>Certificado Cuenta Bancaria</h5>
                                                            <p class="card-title-desc"><strong>** Certificado cuenta bancaria, con fecha de expedición no mayor a 15 días **</strong></p>
                                                            <br>
                                                            <input type="file" class="form-control" name="certif_banco" id="certif_banco" accept="application/pdf" required>
                                                        </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                </div>
                                                <div class="mt-2">
                                                    <button type="submit" name="submit" id="buttoninput"class="btn btn-primary w-md" >Guardar</button>
                                                    <span id="error-text"></span>
                                                </div>

                                            </form>


                                            </div>
                                        </div>
                                    </div>
                                </div><!-- end accordion -->
                            </div><!-- end card-body -->
                        </div><!-- end card -->    
                    
                    

                
            </div> <!-- container-fluid -->
        </div>
        <!-- End Page-content -->


        <?php include (__dir__."/../layouts/footer.php") ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

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