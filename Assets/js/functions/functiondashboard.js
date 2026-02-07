document.addEventListener("DOMContentLoaded", function () {
    fntclientes();
    fntpersonal();
    fntproductos();
    fntmarcas();
    fntaprendisaje();
    fntsolicitudes();
})


function fntclientes() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getclientes';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#clientesum').innerHTML = objdata.data.total_usuarios;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}


function fntpersonal() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getpersonal';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#personalsum').innerHTML = objdata.data.total_usuarios;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}


function fntproductos() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getproductos';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#productossum').innerHTML = objdata.data.total_productos;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}

function fntmarcas() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getmarcas';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#marcasum').innerHTML = objdata.data.total_marcas;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}


function fntaprendisaje() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getaprendisaje';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#modelosum').innerHTML = objdata.data.total_modelo;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}

function fntsolicitudes() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Dashboard/getsolicitudes';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            if (objdata != null && objdata.status) {
                document.querySelector('#solicitudsum').innerHTML = objdata.data.total_modelo;
            } else {
                Swal.fire("Error", "Acceso denegado", "error").then(() => {
                    location.reload();
                });
            }
        }
    }
}