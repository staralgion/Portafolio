<!--  Modal content for the above example -->
<div class="modal fade" id="modalpermisos" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header headerregister">
        <h5 class="modal-title mt-0" id="titlemodal">Administracion de Permisos</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
      </div>

      <div class="card">
        <div class="card-body">
      
            <div class="tile">
              <form action="" id="formpermisos" name="formpermisos">
                <h3 class="tile-title">Secciones del Sistema</h3>

                <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" required>
                <div class="table-rep-plugin">
                <div class="table-responsive mb-0" data-pattern="priority-columns">
                  <table  class="table  table-striped">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Modulo</th>
                        <th>Leer</th>
                        <th>Escribir</th>
                        <th>Modificar</th>
                        <th>Eliminar</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $no = 1;
                      $modulos = $data['modulos'];
                      for ($i = 0; $i < count($modulos); $i++) {
                        $permisos = $modulos[$i]['permisos'];
                        $rcheck = $permisos['r'] == 1 ? " checked " : "";
                        $wcheck = $permisos['w'] == 1 ? " checked " : "";
                        $ucheck = $permisos['u'] == 1 ? " checked " : "";
                        $dcheck = $permisos['d'] == 1 ? " checked " : "";
                        $idmod = $modulos[$i]['idmodulo'];
                        if($modulos[$i]['idmodulo'] == 0 || $modulos[$i]['idmodulo'] == 11){
                        ?>
                           <td>
                            <?= $no; ?>
                            <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod; ?>" required>
                          </td>
                          <td>
                            <?= $modulos[$i]['modtitulo']; ?>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rcheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                        <?php
                        }else{
                      ?>

                        <tr>
                          <td>
                            <?= $no; ?>
                            <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod; ?>" required>
                          </td>
                          <td>
                            <?= $modulos[$i]['modtitulo']; ?>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rcheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $wcheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $ucheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                          <td>
                            <div class="toggle-flip">
                              <label>
                                <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $dcheck ?>><span class="flip-indecator" data-toggle-on="ON" data-toggle-off="OFF"></span>
                              </label>
                            </div>
                          </td>
                        </tr>
                      <?php }
                        $no++;
                      } ?>
                    </tbody>
                  </table>
                </div>
                </div>
                <div class="modal-footer">
                  <button type="submit" id="btnactionform" class="btn btn-primary"><span id="">Guardar</span></button>
                  <button type="button" class="btn btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                </div>
              </form>
            </div>
   

        </div>
      </div>



    </div>
    <!-- /.modal-content -->
  </div>
</div>
<!-- /.modal-dialog -->