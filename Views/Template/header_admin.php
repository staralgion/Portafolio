<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="utf-8" />
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title><?= $data['page_title'] ?></title>
   <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">

   <!-- App favicon -->
   <link rel="shortcut icon" href="Assets/images/favicon.ico">



   <link type="text/css" href="Assets/js/select2/select2.css" rel="stylesheet">
   <link href="Assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

   <!-- Sweet Alert-->
   <link href="Assets/libs/sweetalert2/sweetalert2.min.css" rel="stylesheet" type="text/css" />
   <!-- Select2-->

   <!-- Bootstrap Css -->
   <link href="Assets/css/bootstrap-dark.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
   <!-- Icons Css -->
   <link href="Assets/css/icons.min.css" rel="stylesheet" type="text/css" />
   <!-- App Css -->
   <link href="Assets/css/app-dark.min.css" id="app-style" rel="stylesheet" type="text/css" />
   <link href="Assets/css/dark.css" id="app-style-black" rel="stylesheet" type="text/css" />
   <!-- Custom Css -->
   <link href="Assets/css/custom.css" rel="stylesheet" type="text/css" />

   <link href="Assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
   <link href="Assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   <!-- Responsive datatable examples -->
   <link href="Assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

   <link href="Assets/libs/admin-resources/rwd-table/rwd-table.min.css" rel="stylesheet" type="text/css" />

   <!-- Responsive Loader  -->
   <link href="Assets/css/loader.css" rel="stylesheet" type="text/css" />
   <script src="Assets/js/loader.js"></script>

   <!-- linea de tiempo  -->
   <link href="Assets/css/activity.min.css" rel="stylesheet" type="text/css" />

   <!-- filtrador serachpane  -->
   <!--  Datatables  -->

   <!-- searchPanes -->
   <link rel="stylesheet" href="Assets/css/searchPanes.dataTables.min.css">
   <!-- select -->
   <link href="https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css">
   <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
   <!-- filtrador serachpane  -->

   <!-- img poup-->

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
</head>

<body data-sidebar="dark">
   <div id="load_screen">
      <div class="loader">
         <div class="loader-content">
            <div class="spinner-grow align-self-center"></div>
         </div>
      </div>
   </div>

   <!-- Begin page -->
   <div id="layout-wrapper">

      <header id="page-topbar">
         <div class="navbar-header">
            <div class="d-flex">
               <!-- LOGO -->
               <div class="navbar-brand-box">
                  <a href="#" class="logo logo-dark">
                     <span class="logo-sm">
                        <img src="Assets/images/logo-sm.png" alt="" height="22">
                     </span>
                     <span class="logo-lg">
                        <img src="Assets/images/logo-sm.png" alt="" height="17">
                     </span>
                  </a>

                  <a href="#" class="logo logo-light">
                     <span class="logo-sm">
                        <img src="Assets/images/logo-sm.png" alt="" height="22">
                     </span>
                     <span class="logo-lg" style="font-size: 18px; color: white;">
                        <img src="Assets/images/logo-sm.pn" alt="" height="18"> AutoRed SRL
                     </span>
                  </a>
               </div>

               <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect vertical-menu-btn">
                  <i class="mdi mdi-menu"></i>
               </button>


            </div>

            <div class="d-flex">




               <div class="dropdown d-none d-lg-inline-block">
                  <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                     <i class="mdi mdi-fullscreen font-size-24"></i>
                  </button>
               </div>

               <div class="dropdown d-inline-block ms-1">

                  <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">

                     <i class="ti-bell"></i>
                     <span class="badge bg-danger rounded-pill" id="nronotificacion">3</span>
                  </button>

                  <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">
                     <div class="p-3">
                        <div class="row align-items-center">
                           <div class="col">
                              <h5 class="m-0" id="cantidadntf"> Notifications (258) </h5>

                           </div>
                        </div>
                     </div>
                     <div data-simplebar style="max-height: 230px;">


                        <div id="notificacionespanel">

                        </div>



                     </div>
                     <div class="p-2 border-top">
                        <div class="d-grid">
                           <button type="button" onclick="activarNotificaciones()" class="btn btn-secondary btn-sm waves-effect btnnotificaciones">Activar Notificaciones en Tiempo Real</button>
                        </div>
                     </div>
                  </div>


                  <div class="dropdown d-inline-block">
                     <button type="button" class="btn header-item noti-icon  waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img class="rounded-circle header-profile-user" src="Assets/images/users/user-4.png" alt="Header Avatar">
                     </button>
                     <div class="dropdown-menu dropdown-menu-end">
                        <!-- item-->
                        <a class="dropdown-item" href="<?= base_url() ?>/Perfil"><i class="mdi mdi-account-circle font-size-17 text-muted align-middle me-1"></i> Perfil</a>

                      
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="<?= base_url() ?>/logout"><i class="mdi mdi-power font-size-17 text-muted align-middle me-1 text-danger"></i>
                           Cerrar Sesión</a>
                     </div>
                  </div>





                  <div class="dropdown d-inline-block">
                     <button type="button" class="btn header-item noti-icon right-bar-toggle waves-effect">
                        <i class="mdi mdi-spin mdi-cog"></i>
                     </button>
                  </div>


               </div>
            </div>
      </header>


      <?php require_once("nav_admin.php") ?>