<!--  Modal content for the above example -->
<div class="modal fade " id="modalformroles" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerregister">
        <h5 class="modal-title mt-0" id="titlemodal">Large modal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>

      <div class="card">
        <div class="card-body">

          <form class="needs-validation" id="formroles" name="formroles" enctype="multipart/form-data" novalidate>
            <input id="idrol" name="idrol" type="hidden" value="">

            <div class="row">

              <div class="col-md-12">
                <div class="mb-3">
                  <label class="form-label" for="txttipo">Tipo</label>
                  <input type="text" class="form-control" id="txttipo" name="txttipo" minlength="2" maxlength="20" pattern="[a-zA-Z\u00C0-\u017F ]{2,20}" placeholder="" required>
                  <div class="valid-feedback">
                    Correcto
                  </div>
                </div>
              </div>

              <div class="mb-3">
                <label class="form-label" for="txtdescripcion">Descripcion</label>

                <textarea class="form-control" id="txtdescripcion" name="txtdescripcion" placeholder="" rows="5" minlength="3" maxlength="100"  required></textarea>

                <div class="valid-feedback">
                  Correcto
                </div>
              </div>

        
            </div>


            <div class="row">



              <div class="col-md-6">

                <div class="mb-3">
                  <label class="form-label" for="listestado">Estado</label>
                  <select class="form-control" id="listestado" name="listestado" placeholder="Estado" required>
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

