<?php include_once(__dir__ . "/../layouts/session.php");  ?>
<?php include_once(__dir__ . "/../../model/admintablas/sqls_admin.php"); ?>
<?php include(__dir__ . "/../layouts/head-main.php");  ?>
<?php require(__dir__ . "/../../model/data/pdo.php");?>


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

                                                <th>Nombre</th>
                                                <th>Fecha y Hora de Logueo</th>
                                                <th>Observaciones</th>
                                                <th>Campaña</th>

                                            </tr>
                                        </thead>

                                        <tbody id="vista_grupos">
                                            <?php if ($_SESSION['rol'] == 2) {
                                                error_reporting(E_ERROR | E_PARSE);
                                                date_default_timezone_set('America/Bogota');
                                                $hoy = date("Y-m-d ");




                                                function ingreso($hora)
                                                {
                                                    $timestamp = strtotime($hora); // Convertir la fecha en un timestamp    
                                                    $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

                                                    return $hora;
                                                }

                                                $hora_ingreso_1 = "7:01:00";
                                                $hora_ingreso_2 = "7:10:59";
                                                $hora_ingreso_3 = "7:11:00";



                                                if (isset($_SESSION['unique_id'])) {
                                                    $output = '';

                                                    $data = json_decode($_POST['x']);
                                                    if ($data[0]->tipo == 0) {
                                                        $incoming_id = $data[0]->id_grupo;
                                                        $campana = mysqli_query($conn, "SELECT  u.*,l.*,l.id AS id_login FROM users u, log_session l
                                                    WHERE l.id_user =u.cedula                                                    
                                                    AND DATE(f_h)  = '{$hoy}' 
                                                    AND u.id_grupo = $_SESSION[id_grupo]
                                                    AND l.accion='login'
                                                    GROUP BY l.id_user
                                                    ORDER BY l.f_h DESC;");


                                                        foreach ($campana as $user) {
                                                            $grupos = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo='{$user['id_grupo']}'");
                                                            $group = mysqli_fetch_assoc($grupos);



                                                            $timestamp = strtotime($user['f_h']); // Convertir la fecha en un timestamp    
                                                            $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

                                                            if ($hora < ingreso($hora_ingreso_1)) {
                                                                $class = "text-success";
                                                            } elseif ($hora <= ingreso($hora_ingreso_2)) {
                                                                $class = "text-warning";
                                                            } elseif ($hora >= ingreso($hora_ingreso_3)) {
                                                                $class = "text-danger";
                                                            } else {
                                                                echo "error";
                                                            }

                                            ?>
                                                            <tr>
                                                                <input type="hidden" name="ids_login[]" value="<?php echo $user['id_login'] ?>">
                                                                <input type="hidden" name="user_<?php echo $user['id_login'] ?>" value="<?php echo $user['id_user'] ?>">
                                                                <input type="hidden" name="grupo_<?php echo $user['id_login'] ?>" value="<?php echo $group['n_grupo'] ?>">
                                                                <input type="hidden" name="n_user_<?php echo $user['id_login'] ?>" value="<?php echo $user['n_user'] ?>">
                                                                <input type="hidden" name="l_user_<?php echo $user['id_login'] ?>" value="<?php echo $user['l_user'] ?>">
                                                                <input type="hidden" name="fecha_<?php echo $user['id_login'] ?>" value="<?php echo $user['f_h'] ?>">

                                                                <td scope="row" class="<?php echo $class ?>" id=""> <?php echo $user['n_user'] . " " .  $user['l_user'] ?> </td>
                                                                <td> <?php echo $user['f_h'] ?> </td>
                                                                <td>
                                                                    <select class="form-control" name="ausencia_<?php echo $user['id_login'] ?>">
                                                                        <option value="0"> Elige una opción </option>
                                                                        <option value="1">Ausencia Justificada</option>
                                                                        <option value="2">Ausencia Injustificada</option>
                                                                        <option value="3">Incapacidad</option>
                                                                        <option value="4">Permiso</option>
                                                                        <option value="5">Sanción</option>
                                                                        <option value="6">Vacaciones</option>
                                                                        <option value="7">Licencia de Maternidad</option>
                                                                        <option value="8">Licencia de Paternidad</option>
                                                                        <br>

                                                                </td>
                                                                <td> <?php echo $group['n_grupo'] ?> </td>
                                                            </tr>
                                            <?php }
                                                    }
                                                }
                                            }
                                            /*        }
                                            } */

                                            ?>

                                            <!-- // rol 1 admin  -->
                                            <?php if ($_SESSION['rol'] == 1) {
                                                error_reporting(E_ERROR | E_PARSE);
                                                date_default_timezone_set('America/Bogota');
                                                $hoy = date("Y-m-d ");




                                                function ingreso($hora)
                                                {
                                                    $timestamp = strtotime($hora); // Convertir la fecha en un timestamp    
                                                    $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

                                                    return $hora;
                                                }

                                                $hora_ingreso_1 = "7:01:00";
                                                $hora_ingreso_2 = "7:10:59";
                                                $hora_ingreso_3 = "7:11:00";



                                                if (isset($_SESSION['unique_id'])) {
                                                    $output = '';

                                                    $data = json_decode($_POST['x']);
                                                    if ($data[0]->tipo == 0) {
                                                        $incoming_id = $data[0]->id_grupo;
                                                        $campana = mysqli_query($conn, "SELECT  u.*,l.*,l.id AS id_login FROM users u, log_session l
                                                    WHERE l.id_user =u.cedula                                                    
                                                    AND DATE(f_h)  = '{$hoy}' 
                                                    AND l.accion='login'
                                                    GROUP BY l.id_user
                                                    ORDER BY l.f_h DESC;");


                                                        foreach ($campana as $user) {
                                                            $grupos = mysqli_query($conn, "SELECT * FROM grupos WHERE id_grupo='{$user['id_grupo']}'");
                                                            $group = mysqli_fetch_assoc($grupos);



                                                            $timestamp = strtotime($user['f_h']); // Convertir la fecha en un timestamp    
                                                            $hora = date("H:i", $timestamp); // Obtener la hora en formato "HH:MM"

                                                            if ($hora < ingreso($hora_ingreso_1)) {
                                                                $class = "text-success";
                                                            } elseif ($hora <= ingreso($hora_ingreso_2)) {
                                                                $class = "text-warning";
                                                            } elseif ($hora >= ingreso($hora_ingreso_3)) {
                                                                $class = "text-danger";
                                                            } else {
                                                                echo "error";
                                                            }

                                            ?>
                                                            <tr>
                                                                <input type="hidden" name="ids_login[]" value="<?php echo $user['id_login'] ?>">
                                                                <input type="hidden" name="user_<?php echo $user['id_login'] ?>" value="<?php echo $user['id_user'] ?>">
                                                                <input type="hidden" name="grupo_<?php echo $user['id_login'] ?>" value="<?php echo $group['n_grupo'] ?>">
                                                                <input type="hidden" name="n_user_<?php echo $user['id_login'] ?>" value="<?php echo $user['n_user'] ?>">
                                                                <input type="hidden" name="l_user_<?php echo $user['id_login'] ?>" value="<?php echo $user['l_user'] ?>">
                                                                <input type="hidden" name="fecha_<?php echo $user['id_login'] ?>" value="<?php echo $user['f_h'] ?>">

                                                                <td scope="row" class="<?php echo $class ?>" id=""> <?php echo $user['n_user'] . " " .  $user['l_user'] ?> </td>
                                                                <td> <?php echo $user['f_h'] ?> </td>
                                                                <td>
                                                                    <select class="form-control" name="ausencia_<?php echo $user['id_login'] ?>">
                                                                        <option value="0"> Elige una opción </option>
                                                                        <option value="1">Ausencia Justificada</option>
                                                                        <option value="2">Ausencia Injustificada</option>
                                                                        <option value="3">Incapacidad</option>
                                                                        <option value="4">Permiso</option>
                                                                        <option value="5">Sanción</option>
                                                                        <option value="6">Vacaciones</option>
                                                                        <option value="7">Licencia de Maternidad</option>
                                                                        <option value="8">Licencia de Paternidad</option>
                                                                        <br>

                                                                </td>
                                                                <td> <?php echo $group['n_grupo'] ?> </td>
                                                            </tr>
                                            <?php }
                                                    }
                                                }
                                            }

                                            /*        }
                                            } */

                                            ?>



                                        </tbody>
                                    </table>
                                    <button type="button" onclick="guardarRespuesta()" class="btn btn-primary" id="btn_observa" name=btn_observa>Guardar cambios</button>
                                    <div id="alerta" class="alert" role="alert" style="margin-top: 10px;"></div>



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