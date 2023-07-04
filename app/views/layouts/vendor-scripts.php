<!------------------------------------------------------------------CREAR TICKETS -->
<!-- Scrollable modal -->
<form method="post" id="formcrearticket">
    <div class="modal fade" id="modalcrearticket" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalScrollableTitle">Crear Ticket</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div>
                        <div class="btn-group btn-group-example mb-3 d-flex justify-cotent-center" role="group">
                            <button id="tkt_persona" type="button" class="btn btn-primary w-xs" disabled><i class="fas fa-id-badge"></i> Persona</button>
                            <button id="tkt_grupo" type="button" class="btn btn-danger w-xs"><i class="fas fa-user-friends"> Grupo</i></button>
                        </div>
                        <div class="d-flex justify-content-center">
                            <span id="tkt_a_quien" style="text-align:center"><b>***Tu ticket será dirigido a una persona***</b></span>
                            <input type="hidden" id="es_grupo_persona" value="persona">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="area" class="form-label font-size-13 text-muted">Area destino ticket:</label>
                        <select class="form-control" data-trigger name="area" id="area" onchange="areaselect(this.value)">
                            <option value="0" selected disabled>1. Elige un area</option>
                            <?php foreach ($areas as $value) { ?>
                                <option value="<?php echo $value['id_area'] ?>"><?php echo $value['n_area'] ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3" id="users_area">

                    </div>

                    <div class="mb-3" id="etiqueta">
                        <select class="form-select" name="#" id="#">
                            <option value="-">
                                < ------->
                            </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descripticket">Descripción</label>
                        <textarea class="form-control" name="descripticket" id="descripticket" rows="7"></textarea>
                    </div>

                    <div id="mensajeticket"></div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodalticket">Cerrar</button>
                    <button type="button" id="botoncambiar" onclick="crearTicket()" class="btn btn-primary">Crear Ticket</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</form>


<!-- JAVASCRIPT -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/jquery/jquery.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/node-waves/waves.min.js"></script>
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/feather-icons/feather.min.js"></script>
<!-- alertifyjs Css -->
<link href="<?php echo controlador::$rutaAPP ?>app/assets/libs/alertifyjs/build/css/alertify.min.css" rel="stylesheet" type="text/css" />

<!-- alertifyjs default themes  Css -->
<link href="<?php echo controlador::$rutaAPP ?>app/assets/libs/alertifyjs/build/css/themes/default.min.css" rel="stylesheet" type="text/css" />

<!-- Sweet Alerts js -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/js/pages/sweetalert.init.js"></script>

<!-- Alertify -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/alertifyjs/build/alertify.min.js"></script>

<!-- choices js -->
<script src="<?php echo controlador::$rutaAPP ?>app/assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>

<script>
    tkt_persona = document.getElementById('tkt_persona');
    tkt_grupo = document.getElementById('tkt_grupo');
    tkt_a_quien = document.getElementById('tkt_a_quien');
    es_grupo_persona =document.getElementById('es_grupo_persona');

    tkt_persona.onclick = () => {
        tkt_persona.disabled = true;
        tkt_grupo.disabled = false;
        tkt_a_quien.innerHTML = `<b>***Tu ticket será dirigido a una persona***</b>`;
        es_grupo_persona.value="persona";
        mostrar_users_areas = document.getElementById('users_area');
        mostrar_users_areas.innerHTML="";
        mostrar_etiqueta = document.getElementById('etiqueta');
        mostrar_etiqueta.innerHTML="";

        let select = document.getElementById("area");
        select.value = "0";  

    }

    tkt_grupo.onclick = () => {
        tkt_grupo.disabled = true;
        tkt_persona.disabled = false;
        tkt_a_quien.innerHTML = `<b>***Tu ticket será enviado a un grupo, Cualquier miembro del grupo lo puede resolver***</b>`;
        es_grupo_persona.value="grupo";
        mostrar_users_areas = document.getElementById('users_area');
        mostrar_users_areas.innerHTML="";
        mostrar_etiqueta = document.getElementById('etiqueta');
        mostrar_etiqueta.innerHTML="";

        let select = document.getElementById("area");
        select.value = "0";  

    }

    function crearTicket() {

        areaDestTkt = document.getElementById('area').value;
        descrip = document.getElementById('descripticket').value;
        mensajetkt = document.getElementById('mensajeticket');
        const es_grupo_persona = document.getElementById('es_grupo_persona').value;


        mensajetkt.innerHTML = " <span> Campos Obligatorios</span> ";

        if (areaDestTkt == 0) {
            alertify.error("Los Campos son obligatorios", "", 0);

        } else {
            select_etk = document.getElementById('sel_etiqueta').value;
            user_destino = document.getElementById('sel_user').value;

            if (select_etk == 0 || user_destino == 0) {
                alertify.error("Los Campos son obligatorios");
            } else {
                obj = [{
                    "area_dest_tkt": areaDestTkt,
                    "etiqueta": select_etk,
                    "descrip": descrip,
                    "user_destino": user_destino,
                    "es_grupo_persona": es_grupo_persona,
                    "estado": 0
                }];
                console.log(obj)
                dbParam = JSON.stringify(obj);
                let enviarticket = new XMLHttpRequest();
                enviarticket.open("POST", "chat/tkt/creartkt", true);
                enviarticket.onload = () => {
                    if (enviarticket.readyState === XMLHttpRequest.DONE) {
                        if (enviarticket.status === 200) {
                            let data = enviarticket.response;

                            areaDestTkt.value = 0;
                            descrip.value = "";


                            Swal.fire({
                                title: 'Ticket Creado con Exito!',
                                text: data,
                                icon: 'success',
                                confirmButtonColor: '#5156be'

                            })

                            setTimeout(() => {
                                window.location.reload()
                            }, 3000);


                        }
                    }
                }
                enviarticket.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                enviarticket.send("x=" + dbParam);

            }


        }
    }

    function areaselect(id) {

        mostrar_etiqueta = document.getElementById('etiqueta');
        mostrar_users_areas = document.getElementById('users_area');
        const es_grupo_persona = document.getElementById('es_grupo_persona').value;

        
        console.log(id);

        obj = [{
            "id_area": id,
            "tipo": 1,
            "es_grupo_persona": es_grupo_persona,
        }];
        console.log(obj)
        dbParam = JSON.stringify(obj);
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "chat/otrasconsultastick", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    mostrar_etiqueta.innerHTML = data;
                    var genericExamples = document.querySelectorAll('[data-trigger]');
                    for (i = 0; i < genericExamples.length; ++i) {
                        var element = genericExamples[i];
                        new Choices(element, {
                            placeholderValue: 'This is a placeholder set in the config',
                            searchPlaceholderValue: 'This is a search placeholder',
                        });
                    }

                    // singleNoSearch
                    var singleNoSearch = new Choices('#choices-single-no-search', {
                        searchEnabled: false,
                        removeItemButton: true,
                        choices: [{
                                value: 'One',
                                label: 'Label One'
                            },
                            {
                                value: 'Two',
                                label: 'Label Two',
                                disabled: true
                            },
                            {
                                value: 'Three',
                                label: 'Label Three'
                            },
                        ],
                    }).setChoices(
                        [{
                                value: 'Four',
                                label: 'Label Four',
                                disabled: true
                            },
                            {
                                value: 'Five',
                                label: 'Label Five'
                            },
                            {
                                value: 'Six',
                                label: 'Label Six',
                                selected: true
                            },
                        ],
                        'value',
                        'label',
                        false
                    );

                    // singleNoSorting
                    var singleNoSorting = new Choices('#choices-single-no-sorting', {
                        shouldSort: false,
                    });


                    // multiple Remove CancelButton
                    var multipleCancelButton = new Choices(
                        '#choices-multiple-remove-button', {
                            removeItemButton: true,
                        }
                    );

                    //choices-multiple-groups
                    var multipleDefault = new Choices(
                        document.getElementById('choices-multiple-groups')
                    );

                    // text inputs example
                    var textRemove = new Choices(
                        document.getElementById('choices-text-remove-button'), {
                            delimiter: ',',
                            editItems: true,
                            maxItemCount: 5,
                            removeItemButton: true,
                        }
                    );

                    // choices-text-unique-values
                    var textUniqueVals = new Choices('#choices-text-unique-values', {
                        paste: false,
                        duplicateItemsAllowed: false,
                        editItems: true,
                    });

                    //choices-text-disabled
                    var textDisabled = new Choices('#choices-text-disabled', {
                        addItems: false,
                        removeItems: false,
                    }).disable();
                    
                } else {}
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("x=" + dbParam);
    }
</script>


<!-- pace js -->
<!-- <script src="<?php //echo controlador::$rutaAPP
                    ?>app/assets/libs/pace-js/pace.min.js"></script> -->