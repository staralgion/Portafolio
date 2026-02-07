<?php
headeradmin($data);
?>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-sm-6">
                <div class="page-title-box">
                    <h4>Administracion de <?= $data['page_tag'] ?></h4>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Cuenta</a></li>
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li> -->
                        <li class="breadcrumb-item active"><?= $data['page_tag'] ?></li>
                    </ol>
                </div>
            </div>

        </div>




        <div class="row align-items-center justify-content-center">
            <div class="col-10">
                <div class="card">
                    <div class="card-body">

                        <form class="needs-validation" id="formpersonal" name="formpersonal" enctype="multipart/form-data" novalidate>
                            <input id="idusuario" name="idusuario" type="hidden" value="">

                            <div class="row">



                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="txtnombre">Nombre</label>
                                        <input type="text" class="form-control" id="txtnombre" name="txtnombre" minlength="2" maxlength="20" pattern="[a-zA-Z\u00C0-\u017F ]{2,20}" type="text" placeholder="" required>
                                        <div class="valid-feedback">
                                            Correcto
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
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



                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="txtdireccion">Dirección (Opcional)</label>
                                        <input type="text" class="form-control" id="txtdireccion" name="txtdireccion" type="text" minlength="8" maxlength="50" placeholder="Ingrese su dirección">
                                        
                                    </div>
                                </div>

                            </div>

                            <div class="row">

                               

                                <div class="col-md-12">

                                    <div class="mb-3">
                                        <label class="form-label" for="txttelefono">Numero telefonico</label>
                                        <input type="text" class="form-control" id="txttelefono" name="txttelefono" type="text" pattern="\d+" placeholder="" required>
                                        <div class="valid-feedback">
                                            Correcto
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="mb-3 disabled-checkbox">
                                        <label class="form-label" for="txtcorreo">Correo</label>
                                        <input type="email" class="form-control" id="txtcorreo" name="txtcorreo" minlength="8" maxlength="30" placeholder="" pattern="^[^\s@]+@gmail+.com$" required>
                                        <div class="valid-feedback">
                                            Correcto
                                        </div>
                                    </div>
                                </div>

                            </div>



                            <div class="modal-footer">
                                <button type="submit" id="btnactionform" class="btn btn-primary"><span id="btntext">Guardar</span></button>
                           
                            </div>
                        </form>



                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>




<?php
footeradmin($data);
?>