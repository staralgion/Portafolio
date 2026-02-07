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
            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Personal</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="personalsum"></font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Personal total</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Clientes</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="clientesum"></font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Clientes totales</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Productos</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="productossum"></font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Productos Totales</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Marcas</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="marcasum"></font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Marcas Totales</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Solicitudes Activas</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="solicitudsum">0</font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Solicitudes Pendientes</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon"><i class="mdi mdi-buffer float-end"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Modelo de Aprendizaje</font>
                                </font>
                            </h6>
                            <h2 class="mb-4 text-white">
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto" id="modelosum"></font>
                                </font>
                            </h2>
                            <span>
                                <font style="vertical-align: inherit;" dir="auto">
                                    <font style="vertical-align: inherit;" dir="auto">Aprendizaje Actual del Modelo</font>
                                </font>
                            </span>
                        </div>
                    </div>
                </div>
            </div>

             



        </div>

    </div> <!-- container-fluid -->
</div>


<?php
footeradmin($data);
?>