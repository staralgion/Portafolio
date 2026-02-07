var datatable;

document.addEventListener("DOMContentLoaded", function () {

    //Buttons examples
    datatable = $('#datatable-user').DataTable({
        initComplete: function () {
            new $.fn.dataTable.Buttons(datatable, {
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });
            datatable.buttons().container()
                .appendTo('#datatable-user_wrapper .col-md-6:eq(0)');

            $(".dataTables_length select").addClass('form-select form-select-sm');
            fnteditpersonal();
            fntdelpersonal();

        },
        language: {
            url: "Assets/js/pages/es-ES.json",
        },
        lengthChange: true,
        aProcessing: true,
        aSeverSide: true,
        buttons: ['copy', 'excel', 'pdf', 'colvis'],


        ajax: {
            url: baseurl + "/Clientes/getusuarios",
            dataSrc: ""
        },
        columns: [
            { "data": 'idusuario' },
            { "data": 'nombre' },
            { "data": 'apellidos' },
            { "data": 'correo' },
            { "data": 'tipo' },
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

    var forminsert = document.querySelector("#formpersonal");
    forminsert.onsubmit = function (e) {
        e.preventDefault();



        var nombreValue = document.getElementById('txtnombre').value.trim();
        var apellidoValue = document.getElementById('txtapellido').value.trim();
        var telefonoValue = document.getElementById('txttelefono').value.trim();
        var correoValue = document.getElementById('txtcorreo').value.trim();
      
        var regex = /^[a-zA-ZáéíóúÁÉÍÓÚüÜñÑ\s]+$/;
        if (!regex.test(nombreValue) || !regex.test(apellidoValue)) {
            Swal.fire("Error", "Por favor, ingrese solo texto válido en los campos de nombre y apellido", "error");
            return; // Detener el envío del formulario si la validación falla
        }
        if (!/^\d+$/.test(telefonoValue)) {
            Swal.fire("Error", "Por favor, ingrese solo números en el campo de teléfono", "error");
            return;
        }
        var emailRegex = /^[^\s@]+@gmail+.com$/;

        // Verificar si el valor del correo cumple con el formato de correo electrónico
        if (!emailRegex.test(correoValue)) {
            Swal.fire("Error", "Por favor, ingrese una dirección de correo electrónico de Gmail válida", "error");
            return; // Detener el envío del formulario si la validación falla
        }



        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Clientes/setusuarios';
        var formdata = new FormData(forminsert);
        request.open("POST", ajaxUrl, true);
        request.send(formdata);
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                //console.log(request.responseText);
               var objdata = parseJSONResponse(request.responseText);
                //console.log(objdata);
                if (objdata != null && objdata.status) {
                    $('#modalformpersonal').modal("hide");
                    forminsert.reset();
                    document.querySelector('#formpersonal').classList.remove("was-validated");
                    document.querySelector('#formpersonal').forEach(function(field) {
                        field.classList.remove('is-valid', 'is-invalid');
                    });

                    Swal.fire("Administración de Usuarios", objdata.msg, "success");

                    datatable.ajax.reload(function () { });

                } else {
                //  Swal.fire("Error", "Acceso denegado", "error").then(() => {
                //         location.reload();
                //     });
                Swal.fire("Soporte", objdata.msg, "error");

                }
            }
        }
    }


}, false);




function openmodal() {
    document.querySelector('#idusuario').value = "";
    document.querySelector('#titlemodal').innerHTML = "Nuevo Usuario";
    document.querySelector('.modal-header').classList.replace("headerupdate", "headerregister");
    document.querySelector('#btnactionform').classList.replace("btn-info", "btn-primary");
    document.querySelector('#btntext').innerHTML = "Guardar";
    document.querySelector('#formpersonal').reset();
    document.querySelector('#formpersonal').classList.remove("was-validated");
    document.querySelector('#formpersonal').forEach(function(field) {
        field.classList.remove('is-valid', 'is-invalid');
    });
    $('#modalformpersonal').modal("show");

}


function fnteditpersonal() {
    $('#datatable-user').on('click', '.btneditusuario', function () {

        document.querySelector('#titlemodal').innerHTML = "Actualizar Usuario";
        document.querySelector('.modal-header').classList.replace("headerregister", "headerupdate");
        document.querySelector('#btnactionform').classList.replace("btn-primary", "btn-info");
        document.querySelector('#formpersonal').classList.remove("was-validated");
        document.querySelector('#btntext').innerHTML = "Actualizar";
        document.querySelector('#formpersonal').forEach(function(field) {
            field.classList.remove('is-valid', 'is-invalid');
        });
        //Recupera
        var idkey = this.getAttribute("rl");
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        //El getusuario esta en Singular !Cuidado confunfir!
        var ajaxUrl = baseurl + '/Clientes/getusuario/' + idkey;
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onreadystatechange = function () {
            if (request.readyState == 4 && request.status == 200) {

                var objdata = parseJSONResponse(request.responseText);

                if (objdata != null && objdata.status) {
                    document.querySelector("#idusuario").value = objdata.data.idusuario;
                    //document.querySelector("#txtci").value = objdata.data.ci;
                    document.querySelector("#txtnombre").value = objdata.data.nombre;
                    document.querySelector("#txtapellido").value = objdata.data.apellidos;
                    document.querySelector("#txtcorreo").value = objdata.data.correo;
                    document.querySelector("#txttelefono").value = objdata.data.telefono;


                    $('#txtrol').val(objdata.data.idrol).trigger('change');


                    $('#listestado').val(objdata.data.estado).trigger('change');

                    $('#modalformpersonal').modal("show");
                } else {
                 Swal.fire("Error", "Acceso denegado", "error").then(() => {
                        location.reload();
                    });
                }
            }
        }
    });


}

function fntdelpersonal() {

    $('#datatable-user').on('click', '.btndelusuario', function () {
        var idusuarios = this.getAttribute("rl");
        Swal.fire({
            title: "Eliminar Usuario",
            text: "¿Realmente Quiere eliminar el Usuario?",
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
                var ajaxUrl = baseurl + '/Clientes/delusuario/';
                var strdata = "idusuario=" + idusuarios;
                request.open("POST", ajaxUrl, true);
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                request.send(strdata);
                request.onreadystatechange = function () {
                    if (request.readyState == 4 && request.status == 200) {

                        var objdata = parseJSONResponse(request.responseText);
                        if (objdata != null && objdata.status) {
                            Swal.fire("Eliminar!", objdata.msg, "success");

                            datatable.ajax.reload(function () { });

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

function fntviewpersonal(idpersona) {
    var idpersona = idpersona;
    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxurl = baseurl + '/Clientes/getusuario/' + idpersona;
    request.open("GET", ajaxurl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                var estadoUsuario = objdata.data.Estado == 1 ?
                    '<span class="badge bg-primary">Activo</span>' :
                    '<span class="badge bg-danger">Activo</span>';

                //var ci = objdata.data.ci;
                //var tipo = objdata.data.tipo;
                var nombre = objdata.data.nombre;
                var apellido = objdata.data.apellidos;
                var telefono = objdata.data.telefono;
                var direccion = objdata.data.direccion;
                var correo = objdata.data.correo;
                var pendiente = "Datos Pendientes";

                //document.querySelector("#celci").innerHTML = (ci != null) ? ci : pendiente;
                //document.querySelector("#celrol").innerHTML = (tipo != null) ? tipo : pendiente;
                document.querySelector("#celnombre").innerHTML = (nombre != null) ? nombre : pendiente;
                document.querySelector("#celapellido").innerHTML = (apellido != null) ? apellido : pendiente;
                document.querySelector("#celtelefono").innerHTML = (telefono != null) ? telefono : pendiente;
                document.querySelector("#celdireccion").innerHTML = (direccion != null) ? telefono : pendiente;
                document.querySelector("#celemail").innerHTML = (correo != null) ? correo : pendiente;
                document.querySelector("#celestado").innerHTML = estadoUsuario;

                $('#modalviewuser').modal('show');
            } else {
             Swal.fire("Error", "Acceso denegado", "error").then(() => {
                        location.reload();
                    });
            }
        }
    }
}