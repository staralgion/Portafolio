var datatable;

document.addEventListener("DOMContentLoaded", function () {

  
    fnteditpersonal();

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
        var ajaxUrl = baseurl + '/Perfil/setusuarios';
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
         
                    document.querySelector('#formpersonal').classList.remove("was-validated");
                    document.querySelector('#formpersonal').forEach(function(field) {
                        field.classList.remove('is-valid', 'is-invalid');
                    });

                    Swal.fire("Administración de Usuarios", objdata.msg, "success");

            

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





function fnteditpersonal() {
  


    
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        //El getusuario esta en Singular !Cuidado confunfir!
        var ajaxUrl = baseurl + '/Perfil/getusuario';
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
    


}


