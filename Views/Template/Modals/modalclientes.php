<!--  Modal content for the above example -->
<div class="modal fade " id="modalformpersonal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerregister">
        <h5 class="modal-title mt-0" id="titlemodal">Large modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>

      <div class="card">
        <div class="card-body">

          <form class="needs-validation" id="formpersonal" name="formpersonal" enctype="multipart/form-data" novalidate>
            <input id="idusuario" name="idusuario" type="hidden" value="">

            <div class="row">

              <!-- <div class="col-md-4">
                <div class="mb-3">
                  <label class="form-label" for="txtci">Cedula de Identidad </label>
                  <input type="text" class="form-control" id="txtci" name="txtci" minlength="2" maxlength="20" type="text" placeholder="" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div> -->

              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="txtnombre">Nombre</label>
                  <input type="text" class="form-control" id="txtnombre" name="txtnombre" minlength="2" maxlength="20" pattern="[a-zA-Z\u00C0-\u017F ]{2,20}" type="text" placeholder="" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtapellido">Apellidos</label>
                  <input type="text" class="form-control" id="txtapellido" name="txtapellido" minlength="4" maxlength="20" pattern="[a-zA-Z\u00C0-\u017F ]{2,20}" type="text" placeholder="" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>
            </div>

            <div class="row">

              <div class="col-md-6">
                <div class="mb-3">
                  <label class="form-label" for="txtcorreo">Correo</label>
                  <input type="email" class="form-control" id="txtcorreo" name="txtcorreo" minlength="8" maxlength="30" placeholder="" pattern="^[^\s@]+@gmail+.com$" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>

              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="txttelefono">Numero telefonico</label>
                  <input type="text" class="form-control" id="txttelefono" name="txttelefono" type="text" pattern="\d+"  placeholder="" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>

            </div>


            <div class="row">

  

              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="listestado">Estado</label>
                  <select class="form-control" id="listestado" name="listestado" placeholder="Estado">
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="submit" id="btnactionform" class="btn btn-primary"><span id="btntext">Guardar</span></button>
              <button type="button" class="btn btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
            </div>
          </form>
        </div>
      </div>



    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->

<!--  Modal content for the above example -->
<div class="modal fade " id="modalviewuser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerregister">
        <h5 class="modal-title mt-0" id="titlemodal">Detalles de Usuario</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>

      <div class="card">
        <div class="card-body">
        <table class="table table-bordered">
            <tbody>
              <!-- <tr>
                <td>Cedula de Identidad :</td>
                <td id="celci"></td>
              </tr> -->
              <!-- <tr>
                <td>Rol:</td>
                <td id="celrol"></td>
              </tr> -->
              <tr>
                <td>Nombres:</td>
                <td id="celnombre"></td>
              </tr>
              <tr>
                <td>Apellidos:</td>
                <td id="celapellido"></td>
              </tr>
              <tr>
                <td>Teléfono:</td>
                <td id="celtelefono"></td>
              </tr>
              <tr>
                <td>Email (Usuario):</td>
                <td id="celemail"></td>
              </tr>
              <tr>
                <td>Dirección:</td>
                <td id="celdireccion"></td>
              </tr>
              <tr>
                <td>Estado:</td>
                <td id="celestado"></td>
              </tr>


            </tbody>
          </table>

        </div>
      </div>



    </div>

  </div>
</div>
