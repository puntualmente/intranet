
<?php 
      include(__dir__."/../layouts/head-main.php");  
?>

<head>

    <title>Intranet | Puntualmente S.A.S</title>
    <?php 
        include(__dir__."/../layouts/head.php");?>

    <?php 
    include(__dir__."/../layouts/head-style.php");?>

</head>

<?php 
    include(__dir__."/../layouts/body.php");?>
<div class="auth-page">
    <div class="container-fluid p-0">
        <div class="row g-0">
            <div class="col-xxl-3 col-lg-4 col-md-5">
                <div class="auth-full-page-content d-flex p-sm-5 p-4">
                    <div class="w-100">
                        <div class="d-flex flex-column h-100">
                            <div class="d-flex justify-content-center">
                            <img src="<?php echo controlador::$rutaAPP?>app/assets/images/logo.jpeg" alt="" height="150">
                            </div>
                            <div class="auth-content my-auto">
                                <div class="text-center">
                                    <h5 class="mb-0">Bienvenido!</h5>
                                    <p class="text-muted mt-2">Inicia sesión para continuar.</p>
                                </div>
                                <form class="custom-form mt-4 pt-2" id="loginform" method="post" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label" for="cedula">Cedula</label>
                                        <input type="text" class="form-control" id="cedula" placeholder="Cedula" name="cedula">
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <label class="form-label" for="contraseña">Contraseña</label>
                                            </div>
                                        </div>

                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" class="form-control" placeholder="Ingresa tu contraseña" name="contraseña" aria-label="Password" aria-describedby="password-addon">
                                        </div>
                                    </div>
                                    <div id="error-text"></div>
                                    <div class="mb-3">
                                        <button id="buttoninput" class="btn btn-primary w-100 waves-effect waves-light" type="submit" name="submit">Ingresar</button>
                                    </div>
                                </form>

                            </div>
                            <div class="mt-4 mt-md-5 text-center">
                                <p class="mb-0">© <script>
                                        document.write(new Date().getFullYear())
                                    </script> Puntualmente. </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end auth full page content -->
            </div>
            <!-- end col -->
            <div class="col-xxl-9 col-lg-8 col-md-7">
                <div class="auth-bg pt-md-5 p-4 d-flex">
                    <div class="bg-overlay bg-primary"></div>
                    <ul class="bg-bubbles">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                    <!-- end bubble effect -->
                    <div class="d-flex justify-content-end align-items-start">
                        <div class="col-xl-6">
                            <div class="p-0">
                                <div id="reviewcarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                    <div class="carousel-indicators carousel-indicators-rounded justify-content-start ms-0 mb-0">
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <!-- <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#reviewcarouselIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
                                    </div>
                                    <!-- end carouselIndicators -->
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <div class="testi-contain text-black">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-0 fw-medium lh-base text-black fs-5">“Estamos innovando para ti, este será un espacio colaborativo organizacional donde podremos comunicarnos de una manera mas efectiva. Puntualmente, ¡ lo hacemos por ti !”
                                                </h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    
                                                </div>
                                            </div>
                                        </div>
<!-- 
                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“Our task must be to
                                                    free ourselves by widening our circle of compassion to embrace
                                                    all living
                                                    creatures and
                                                    the whole of quis consectetur nunc sit amet semper justo. nature
                                                    and its beauty.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="carousel-item">
                                            <div class="testi-contain text-white">
                                                <i class="bx bxs-quote-alt-left text-success display-6"></i>

                                                <h4 class="mt-4 fw-medium lh-base text-white">“I've learned that
                                                    people will forget what you said, people will forget what you
                                                    did,
                                                    but people will never forget
                                                    how donec in efficitur lectus, nec lobortis metus you made them
                                                    feel.”</h4>
                                                <div class="mt-4 pt-3 pb-5">
                                                    
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <!-- end carousel-inner -->
                                </div>
                                <!-- end review carousel -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container fluid -->
</div>


<!-- JAVASCRIPT -->

<?php
    include (__dir__."/../layouts/vendor-scripts.php")?>
<!-- password addon init -->
    <script src="<?php echo controlador::$rutaAPP?>app/assets/js/pages/pass-addon.init.js"></script>

    <script src="<?php echo controlador::$rutaAPP?>app/views/auth/js/login.js"></script>
    


</body>

</html>