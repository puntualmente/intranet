<body>
<style>
    input[type=number]::-webkit-inner-spin-button, 
    input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

input[type=number] { -moz-appearance:textfield; }

</style>


              <!-- Scrollable modal -->
  <form method="post" id="formcrearticket">
    <div class="modal fade" id="modalcrearticke" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalScrollableTitle">Cambio de Contraseña</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" onclick="limpiar()"></button>
          </div>
            <div class="modal-body">

              <strong>
                <div>
                  <p class="text-center">
                    **Por politicas de seguridad cada 3 meses se solicitará el cambio de contraseña**
                  </p>
                </div>
              </strong>

              <div class="mb-3">
                <label for="a_pass" class="form-label font-size-13 text-muted">Contraseña Actual:</label>
                 <input type="password" class="form-control" id="a_pass">
              </div>

              <div class="mb-3">
                <label for="n_pass1" class="form-label font-size-13 text-muted">Nueva Contraseña:</label>
                <input type="password" class="form-control" id="a_pass1">
              </div>
              
              <div class="mb-3"> 
                <label for="n_pass2" class="form-label font-size-13 text-muted">Repite la nueva Contraseña:</label>
                <input type="password" class="form-control" id="n_pass2">
              </div>

              <span id="mensajeticket"></span>            

            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal" id="cerrarmodalticket">Cerrar</button>
                <button type="button" id="cambiarpass" onclick="" class="btn btn-primary">Cambiar Contraseña</button>
              </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

   </form>
