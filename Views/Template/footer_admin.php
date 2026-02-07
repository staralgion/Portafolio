</div>

<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                ©
                <script>
                    // document.write(new Date().getFullYear())
                </script> AutoRed SRL
            </div>
        </div>
</footer>
</div>

<!-- Right Sidebar -->
<div class="right-bar">
    <div data-simplebar class="h-100">

        <div class="rightbar-title d-flex align-items-center px-3 py-4">

            <h5 class="m-0 me-2">Ajustes</h5>

            <a href="javascript:void(0);" class="right-bar-toggle ms-auto">
                <i class="mdi mdi-close noti-icon"></i>
            </a>
        </div>

        <!-- Settings -->
        <hr class="mt-0" />
        <h6 class="text-center mb-0">Elije Diseño</h6>

        <div class="p-4">
            <div class="mb-2">
                <img src="Assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="light-mode-switch" />
                <label class="form-check-label" for="light-mode-switch">Modo Light</label>
            </div>

            <div class="mb-2">
                <img src="Assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="form-check form-switch mb-3">
                <input type="checkbox" class="form-check-input theme-choice" id="dark-mode-switch" checked />
                <label class="form-check-label" for="dark-mode-switch">Modo Dark</label>
            </div>




        </div>

    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<!-- JAVASCRIPT -->
<script>
    const baseurl = "<?= base_url(); ?>";
    localStorage.setItem('redirectUrl', window.location.href);
 
</script>


<script src="https://code.jquery.com/jquery-3.7.0.js" crossorigin="anonymous"></script>
<script src="Assets/libs/jquery/jquery.min.js"></script>
<script src="Assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="Assets/libs/metismenu/metisMenu.min.js"></script>
<script src="Assets/libs/simplebar/simplebar.min.js"></script>
<script src="Assets/libs/node-waves/waves.min.js"></script>
<script src="Assets/libs/jquery-sparkline/jquery.sparkline.min.js"></script>
<!-- Poper reciente -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.10.2/umd/popper.min.js"></script>
<!-- App js -->

<!-- App js -->

<!--datatable-->

<!-- Required datatable js -->
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
<!--serachpane-->


<!-- searchPanes   -->
<script src="Assets/js/dataTables.searchPanes.min.js"></script>
<!-- select -->
<script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js" ></script>
<!--serachpane-->
<script src="Assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- Buttons examples -->
<script src="Assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="Assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="Assets/libs/jszip/jszip.min.js"></script>
<script src="Assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="Assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="Assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="Assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="Assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<!-- Responsive examples -->
<script src="Assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="Assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

<!-- Sweet Alerts js -->
<script src="Assets/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="Assets/js/pages/sweet-alerts.init.js"></script>

<!-- Datatable init js -->

<script src="Assets/js/pages/datatables.init.js"></script>

<!-- Responsive Table js -->
<script src="Assets/libs/admin-resources/rwd-table/rwd-table.min.js"></script>

<!-- Init js -->
<script src="Assets/js/pages/table-responsive.init.js"></script>



<!--end datatable-->


<!--form validation-->
<script src="Assets/libs/parsleyjs/parsley.min.js"></script>

<script src="Assets/js/pages/form-validation.init.js"></script>
<!--end form validatio-->
<!--chat immpoup-->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<!--chat-->

<script src="Assets/js/app.js"></script>
<script src="Assets/js/ajax.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>


<script src="https://www.gstatic.com/firebasejs/9.14.0/firebase-app-compat.js"></script>
<script src="https://www.gstatic.com/firebasejs/9.14.0/firebase-messaging-compat.js"></script>


<script src="Assets/js/functions/<?= $data['page_js'] ?>"></script>

<script src="Assets/js/notificaciones.js"></script>

<script src="Assets/libs/select2/js/select2.min.js"></script>
<script src="Assets/js/select2/select2.js"></script>

</body>

</html>