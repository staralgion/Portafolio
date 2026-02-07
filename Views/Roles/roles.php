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
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li>
                        <!-- <li class="breadcrumb-item"><a href="javascript: void(0);">Usuarios</a></li> -->
                        <li class="breadcrumb-item active"><?= $data['page_tag'] ?></li>
                    </ol>
                </div>
            </div>
          
        </div>
        <!-- end page title -->



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    <?php  if($_SESSION['permisosmod']['w']){ ?>
                        <button class="btn btn-primary btn-sm" type="button" onclick="openmodal()">Nuevo</button><br><br>
                    <?php }?>
                        <div>
                            <div>
                                <table id="datatable-roles" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th>Descripcion</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>

                                    <tbody>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->
<div id="contentajax"></div>
<?php
getmodal('modalroles', $data);
footeradmin($data);
?>