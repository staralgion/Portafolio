var datatable;
document.addEventListener("DOMContentLoaded", function () {
    datatable = $('#datatable-roles').DataTable({
        initComplete: function () {
            new $.fn.dataTable.Buttons(datatable, {
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            datatable.buttons().container()
                .appendTo('#datatable-roles_wrapper .col-md-6:eq(0)');

            $(".dataTables_length select").addClass('form-select form-select-sm');

            fntdelrol();
            fntpermisosrol();
            fnteditrol();
        },
        language: {
            url: "Assets/js/pages/es-ES.json",
        },
        lengthChange: true,
        aProcessing: true,
        aSeverSide: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],


        ajax: {
            url: baseurl + "/Roles/getroles",
            dataSrc: ""
        },
        columns: [
            { "data": 'idrol' },
            { "data": 'tipo' },
            { "data": 'descripcion' },
            { "data": 'estado' },
            { "data": 'acciones' }
        ],

        responsive: true,
        bDestroy: true,
        iDisplayLength: 10,
        order: [[0, "desc"]],
        columnDefs: [
            { "type": "num", "targets": 0 }
        ],

    });

    //Insert
    var forminsert = document.querySelector("#formroles");
    forminsert.onsubmit = function (e) {
        e.preventDefault();

        var nombretipo = document.getElementById('txttipo').value.trim();


        var regex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/;
        if (!regex.test(nombretipo)) {
            Swal.fire("Error", "Por favor, ingrese solo texto válido en los campos de nombre y apellido", "error");
            return;
        }




        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Roles/setroles';
        var formdata = new FormData(forminsert);
        request.open("POST", ajaxUrl, true);
        request.send(formdata);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                //console.log(request.responseText);
                var objdata = parseJSONResponse(request.responseText);
                //console.log(objdata);
                if (objdata != null && objdata.status) {
                    $('#modalformroles').modal("hide");
                    forminsert.reset();
                    document.querySelector('#formroles').classList.remove("was-validated");
                    document.querySelector('#formroles').forEach(function (field) {
                        field.classList.remove('is-valid', 'is-invalid');
                    });
                    //Validar datos todos
                    Swal.fire("Administración de Roles", objdata.msg, "success");

                    datatable.ajax.reload(function () {

                    });

                } else {
                    // Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    //     location.reload();
                    // });
                    Swal.fire("Soporte", objdata.msg, "error");
                }
            }
        }
    }

}, false);


//Activacion del Modal
//Funciones Usuarios

function openmodal() {
    document.querySelector('#idrol').value = "";
    document.querySelector('#titlemodal').innerHTML = "Nuevo Rol";
    document.querySelector('.modal-header').classList.replace("headerupdate", "headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btntext').innerHTML = "Guardar";
    document.querySelector('#formroles').reset();
    document.querySelector('#formroles').classList.remove("was-validated");
    document.querySelector('#formroles').forEach(function (field) {
        field.classList.remove('is-valid', 'is-invalid');
    });
    $('#modalformroles').modal("show");

}



//Update

function fnteditrol() {

    $('#datatable-roles').on('click', '.btneditroles', function () {
        document.querySelector('#titlemodal').innerHTML = "Actualizar Rol";
        document.querySelector('.modal-header').classList.replace("headerregister", "headerupdate");
        document.querySelector('#btnactionform').classList.replace("btn-primary", "btn-info");
        document.querySelector('#btntext').innerHTML = "Actualizar";
        document.querySelector('#formroles').classList.remove("was-validated");
        document.querySelector('#formroles').forEach(function (field) {
            field.classList.remove('is-valid', 'is-invalid');
        });

        var idrol = encodeURIComponent(this.getAttribute("rl"));

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Roles/getrol/';
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var data = "idrol=" + idrol;
        request.send(data);

        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                //console.log(request.responseText);
                var objdata = parseJSONResponse(request.responseText);
                if (objdata != null && objdata.status) {
                    document.querySelector("#idrol").value = objdata.data.idrol;
                    document.querySelector("#txttipo").value = objdata.data.tipo;
                    document.querySelector("#txtdescripcion").value = objdata.data.descripcion;

                    $('#listestado').val(objdata.data.estado).trigger('change');


                    $('#modalformroles').modal("show");
                } else {
                    Swal.fire("Error", "Acceso denegado", "error").then(() => {
                        location.reload();
                    });
                }
            }
        }
    });


}

//Delete logic

function fntdelrol() {
    $('#datatable-roles').on('click', '.btndelroles', function () {

        var idrol = encodeURIComponent(this.getAttribute("rl"));
        Swal.fire({

            title: "Eliminar Rol",
            text: "¿Realmente Quiere eliminar el Rol?",
            type: "warning",
            showCancelButton: true,
            confirmButtonText: "Si, Eliminar",
            cancelButtonText: "No, Cancelar",
            closeOnConfirm: false,
            closeOnCancel: true,
            confirmButtonColor: '#7a6fbe', cancelButtonColor: "#f46a6a"
        }).then((result) => {
            if (result.isConfirmed) {
                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = baseurl + '/Roles/delrol/';
                var strdata = "idrol=" + idrol;
                request.open("POST", ajaxUrl, true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strdata);


                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {
                        //console.log(request.responseText);
                        var objdata = parseJSONResponse(request.responseText);
                        if (objdata != null && objdata.status) {
                            Swal.fire("Eliminar!", objdata.msg, "success");
                            datatable.ajax.reload(function () {

                            });

                        } else {
                            Swal.fire("Error", "Acceso denegado", "error").then(() => {
                                location.reload();
                            });
                        }
                    }
                }
            } else {
                // Tu código aquí para cancelación
                Swal.fire("Cancelado", "La eliminación ha sido cancelada.", "error");
            }
        });
    });


}


function fntpermisosrol() {
    $('#datatable-roles').on('click', '.btnpermisorol', function () {
        var idrol = encodeURIComponent(this.getAttribute("rl"));
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');

        var ajaxUrl = baseurl + '/Permisos/getpermisos/';
        var strdata = "idrol=" + idrol;
        request.open("POST", ajaxUrl, true);
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send(strdata);


        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {
                if (request.responseText != "") {

                    document.querySelector('#contentajax').innerHTML = request.responseText;
                    $('#modalpermisos').modal("show");
                    document.querySelector('#formpermisos').addEventListener('submit', fntsavepermisos, false);

                    var idrol = document.querySelector("#idrol").value; // Obtener el valor del input hidden con idrol

                    // Verificar si el idrol es 1 y activar los checkboxes para el idmodulo 3
                    if (idrol == 1) {
                        var checkboxes = document.querySelectorAll("input[name^='modulos']"); // Obtener todos los checkboxes
                        checkboxes.forEach(function (checkbox) {
                            var tr = checkbox.closest('tr'); // Obtener la fila que contiene el checkbox
                            var idmodulo = tr.querySelector("input[name$='[idmodulo]']").value; // Obtener el valor de idmodulo

                            if (idmodulo == 3) {
                                checkbox.checked = true; // Activar el checkbox si el idmodulo es 3

                                checkbox.parentElement.classList.add('disabled-checkbox');
                            }
                        });
                    }
                }else {
                    Swal.fire("Error", "Acceso denegado", "error").then(() => {
                        location.reload();
                    });
                }
            }
        }

    });

}

function fntsavepermisos(event) {
    event.preventDefault();
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Permisos/setpermisos';
    var formpermisos = document.querySelector("#formpermisos");
    var formdata = new FormData(formpermisos);

    request.open("POST", ajaxUrl, true);
    request.send(formdata);
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                Swal.fire("Permisos de Usuario", objdata.msg, "success");
                $('#modalpermisos').modal("hide");
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}

