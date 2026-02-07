var app;
var messaging;
const listnotificacionespage = document.querySelector('#notificacionespanel');
const listnotificacionesbuton = document.querySelector('#page-header-notifications-dropdown');

const firebaseConfig = {
    apiKey: "AIzaSyDZlxHKo0R5M5zsRW3qS49iUfAFFuVlqfs",
    authDomain: "notificaciones-aba37.firebaseapp.com",
    projectId: "notificaciones-aba37",
    storageBucket: "notificaciones-aba37.appspot.com",
    messagingSenderId: "1357130145",
    appId: "1:1357130145:web:aecb53f4fdd1087237c3e0"
};

app = firebase.initializeApp(firebaseConfig);
messaging = firebase.messaging();



console.log("Firebase app:", app);
console.log("Firebase messaging:", messaging);



function notificacionesrealtime() {
    if ('serviceWorker' in navigator) {
        navigator.serviceWorker.register('/firebase-messaging-sw.js')
            .then((registration) => {
                console.log('Service Worker registrado con éxito:', registration);


            }).catch((err) => {
                console.error('Error al registrar Service Worker:', err);
            });
    }

    // Verificar si las notificaciones ya están activas
    if (Notification.permission === 'granted') {
        // Las notificaciones están activas, puedes hacer lo que necesites aquí

        Swal.fire({
            title: 'Notificaciones activadas',
            text: 'Las Notificaciones ya fueron activadas',
            icon: 'success',
            confirmButtonText: 'OK'
        });
        const deviceType = determineDeviceType();

        console.log(`Sending ${deviceType} token to server ...`);
        $('.btnnotificaciones').html("Notificaciones ya están activas");

        messaging.getToken({ vapidKey: "BBedko8hWXxNyqBbxDVClJ12SbuSmaiq32BKihp2BrGOZ84fuLDTurelIb_rv9Mfx-6xK4wl_7Ojj289KtjD7DI" })
            .then((currentToken) => {
                console.log(`token:`+ currentToken);
                sendTokenToServer(currentToken);
                
                if (deviceType === "pc") {

                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionpc/' + currentToken;
                    request.open("GET", ajaxUrl, true);
                    request.send();

                }
                else {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionmovil/' + currentToken;
                    request.open("GET", ajaxUrl, true);
                    request.send();
                }
            })
            .catch((err) => {
                console.log(err);
                setTokenSentToServer(false);
            });

        mensajerecepcion(messaging);


    } else {
        // Las notificaciones no están activas, mostrar el Swal
        Swal.fire({
            title: '¿Quieres recibir notificaciones?',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Sí, permitir',
            cancelButtonText: 'No, gracias',
        }).then((result) => {
            if (result.isConfirmed) {
                $('.btnnotificaciones').html("Notificaciones ya están activas");
                // Si el usuario acepta, solicitar permisos de notificación
                Notification.requestPermission().then((permission) => {
                    if (permission === 'granted') {
                        // Ahora puedes solicitar el token para las notificaciones
                        messaging.getToken({ vapidKey: "BBedko8hWXxNyqBbxDVClJ12SbuSmaiq32BKihp2BrGOZ84fuLDTurelIb_rv9Mfx-6xK4wl_7Ojj289KtjD7DI" })
                            .then((currentToken) => {

                                sendTokenToServer(currentToken);

                                if (deviceType === "pc") {
                                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionpc/' + currentToken;
                                    request.open("GET", ajaxUrl, true);
                                    request.send();
                                } else {
                                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionmovil/' + currentToken;
                                    request.open("GET", ajaxUrl, true);
                                    request.send();
                                }
                            })
                            .then(() => {
                                mensajerecepcion(messaging);
                            })
                            .catch((err) => {
                                setTokenSentToServer(false);
                            });
                    } else if (permission === 'denied') {
                        // Si el permiso está denegado, muestra un mensaje indicando que las notificaciones están bloqueadas
                        $('.btnnotificaciones').html("Activar Notificaciones en Tiempo Real");
                        Swal.fire({
                            title: 'Notificaciones bloqueadas',
                            text: 'Por favor, habilite las notificaciones en la configuración de su navegador.',
                            icon: 'warning',
                            showCancelButton: true,
                            cancelButtonText: 'Cerrar',
                            confirmButtonText: 'Ir a configuración',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                edgealert()
                            } else {
                                $('.btnnotificaciones').html("Activar Notificaciones en Tiempo Real");
                                console.log('Usuario cerró el mensaje de notificaciones bloqueadas');
                                setTokenSentToServer(false);
                            }
                        });

                        setTokenSentToServer(false);
                    }
                });
            } else {
                $('.btnnotificaciones').html("Activar Notificaciones en Tiempo Real");
                setTokenSentToServer(false);
            }
        });

    }
}

function edgealert() {
    Swal.fire({
        title: 'Notificaciones bloqueadas',
        html: 'Para recibir notificaciones, sigue estos pasos:<br><br>' +
            '1. Haz clic en el candado en la barra de direcciones.<br>' +
            '2. Asegúrate de que las notificaciones estén configuradas en "Permitir".<br>' +
            '3. Refresca la página después de realizar cambios.',
        icon: 'warning',
        showCancelButton: true,
        cancelButtonText: 'Cerrar',
    })
}


function mensajerecepcion(messaging) {
    messaging.onMessage((payload) => {
        //alert();
        fntnotificacionespanel().then(function () {
            fntredireccion();
            fntnotificacionespanelcount();
        });

    });
}





function sendTokenToServer(currentToken) {
    if (!isTokenSentToServer()) {
        console.log('Sending token to server ...dsds', currentToken);
        setTokenSentToServer(true);
        // Aquí puedes hacer la llamada AJAX para enviar token si quieres centralizarla
    } else {
        console.log('Token already available in the serverdsd');
        
        
    }
}



function resetFCMToken() {
    messaging.getToken({ vapidKey: 'BBedko8hWXxNyqBbxDVClJ12SbuSmaiq32BKihp2BrGOZ84fuLDTurelIb_rv9Mfx-6xK4wl_7Ojj289KtjD7DI' }).then((currentToken) => {
        if (currentToken) {
            messaging.deleteToken(currentToken).then(() => {
                console.log('🔁 Token FCM eliminado. Solicitando uno nuevo...');
                obtenerNuevoToken();
            }).catch((err) => {
                console.error('❌ Error al eliminar el token:', err);
            });
        } else {
            console.log('⚠️ No se encontró token para eliminar.');
            obtenerNuevoToken();
        }
    }).catch((err) => {
        console.error('❌ Error al obtener el token actual:', err);
    });
}


function obtenerNuevoToken() {
    messaging.getToken({ vapidKey: 'BBedko8hWXxNyqBbxDVClJ12SbuSmaiq32BKihp2BrGOZ84fuLDTurelIb_rv9Mfx-6xK4wl_7Ojj289KtjD7DI' }).then((newToken) => {
        console.log('✅ Nuevo token:', newToken);
        sendTokenToServer(newToken);

        const deviceType = determineDeviceType();
        const url = deviceType === "pc"
            ? `${baseurl}/Notificacion/setnotificacionpc/${newToken}`
            : `${baseurl}/Notificacion/setnotificacionmovil/${newToken}`;

        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        request.open("GET", url, true);
        request.send();

    }).catch((err) => {
        console.error('❌ Error al obtener nuevo token:', err);
    });
}




function isTokenSentToServer() {
    return window.localStorage.getItem('sentToServer') === '1';
}

function setTokenSentToServer(sent) {
    window.localStorage.setItem('sentToServer', sent ? '1' : '0');
}

// function deleteToken() {
//     messaging.getToken().then((currentToken) => {
//         messaging.deleteToken(currentToken).then(() => {
//             console.log('Token deleted');
//             // También puedes realizar cualquier otra lógica después de eliminar el token
//         }).catch((err) => {
//             console.log('Error deleting token:', err);
//         });
//     }).catch((err) => {
//         console.log('Error getting current token:', err);
//     });
// }


function determineDeviceType() {
    const isMobile = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);

    return isMobile ? 'celular' : 'pc';
}





function waitForPageLoad() {
    return new Promise(function (resolve) {
        if (document.readyState === "complete") {
            // La página ya está completamente cargada, resuelve la promesa
            resolve();
        } else {
            // Agrega un event listener para el evento 'load'
            window.addEventListener('load', function () {
                // Cuando se dispare el evento 'load', resuelve la promesa
                resolve();
            });
        }
    });
}

// Uso de la función waitForPageLoad
waitForPageLoad().then(function () {

    if (Notification.permission === 'granted') {
        // Las notificaciones están activas, puedes hacer lo que necesites aquí
        $('.btnnotificaciones').html("Notificaciones ya están activas");
        console.log('Notificaciones ya están activas.');
        const deviceType = determineDeviceType();
        console.log(`Sending ${deviceType} token to server ...`);


        messaging.getToken({ vapidKey: "BBedko8hWXxNyqBbxDVClJ12SbuSmaiq32BKihp2BrGOZ84fuLDTurelIb_rv9Mfx-6xK4wl_7Ojj289KtjD7DI" })
            .then((currentToken) => {
                sendTokenToServer(currentToken);

                if (deviceType === "pc") {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionpc/' + currentToken;
                    request.open("GET", ajaxUrl, true);
                    request.send();

                }
                else {
                    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                    var ajaxUrl = baseurl + '/Notificacion/setnotificacionmovil/' + currentToken;
                    request.open("GET", ajaxUrl, true);
                    request.send();
                }
            })
            .catch((err) => {
                console.log(err);
                setTokenSentToServer(false);
            });

        mensajerecepcion(messaging);



    } else {
        $('.btnnotificaciones').html("Activar Notificaciones en Tiempo Real");
    }

    fntnotificacionespanel().then(function () {
        fntredireccion();
        fntnotificacionespanelcount();
    });
});


function fntnotificacionespanel() {
    return new Promise(function (resolve, reject) {
        $.ajax({
            url: baseurl + "/Notificacion/getnotificacionespanel",
            type: "GET",
            dataType: "json",
            success: function (data) {
                var mensajes = data;
                listnotificacionespage.innerHTML = ''; // Limpiar el contenido existente antes de agregar nuevos elementos
                var html = "";

                if (mensajes.length > 0) {
                    mensajes.forEach(function (mensaje) {
                        html += `
                            <a  class="text-reset notification-item btnredireccion" id="listnotificaciones" rl="${btoa(mensaje.idsolicitud)}" rlnt="${btoa(mensaje.idnotificacion)}">
                                <div class="media">
                                    <div class="avatar-xs me-3">
                                        <span class="avatar-title border-warning rounded-circle ">
                                            <i class="mdi mdi-message"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="mt-0 mb-1">Nueva Asignación Recibida</h6>
                                        <div class="text-muted">
                                            <p class="mb-1">${mensaje.mensaje}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        `;
                    });
                } else {
                    // Mensaje cuando no hay mensajes
                    html = ` <a class="text-reset notification-item">
                            <div class="media">
                                <div class="avatar-xs me-3">
                                    <span class="avatar-title border-warning rounded-circle ">
                                        <i class="mdi mdi-message"></i>
                                    </span>
                                </div>
                                <div class="media-body">
                                    <h6 class="mt-0 mb-1">Vacío</h6>
                                    <div class="text-muted">
                                        <p class="mb-1">No se recibieron notificaciones</p>
                                    </div>
                                </div>
                            </div>
                        </a>`;
                }

                // Asignar el HTML generado al contenedor
                listnotificacionespage.innerHTML = html;

                resolve();
            },
            error: function (xhr, status, error) {
                console.log("Error al cargar los mensajes:", error);
                reject(error);
            }
        });
    });
}


function fntnotificacionespanelcount() {


    var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
    var ajaxUrl = baseurl + '/Notificacion/getnotificacionespanelcantidad';
    request.open("GET", ajaxUrl, true);
    request.send();
    request.onreadystatechange = function () {
        if (request.readyState == 4 && request.status == 200) {
            //console.log(request.responseText);
            var objdata = parseJSONResponse(request.responseText);
            document.querySelector('#nronotificacion').innerHTML = objdata.notfcount;
            document.querySelector('#cantidadntf').innerHTML = "Notificaciones(" + objdata.notfcount + ")";
        }
    }

}


function fntredireccion() {
    $('#notificacionespanel').on('click', '.btnredireccion', function () {

        var idsolicitud = atob(this.getAttribute("rl"));
        var idnotificacion = atob(this.getAttribute("rlnt"));


        fntdeletenotificacion(idsolicitud).then(function () {
            fntverificarsolicitud(idsolicitud).then(function () {
                window.location = baseurl + '/Mensajes/mensajesaddvar/' + idsolicitud;
            });

        });


    });
}

function fntverificarsolicitud(idsolicitud) {
    return new Promise(function (resolve, reject) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Notificacion/getsolicitudes/' + idsolicitud;
        request.open("GET", ajaxUrl, true);
        request.send();

        request.onload = function () {

            if (request.readyState == 4 && request.status == 200) {
                var objdata = parseJSONResponse(request.responseText);
                if (objdata != null && objdata.status) {
                    resolve();

                } else {
                    reject();
                    Swal.fire("Error", "Acceso denegado", "error").then(() => {
                        location.reload();
                    });
                }
            }
        }

    })
}

function fntdeletenotificacion(idnot) {
    var idnotf = idnot
    return new Promise(function (resolve, reject) {
        var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
        var ajaxUrl = baseurl + '/Notificacion/delnotificacion/' + idnotf;
        request.open("GET", ajaxUrl, true);
        request.send();
        request.onload = function () {
            if (request.status >= 200 && request.status < 300) {
                resolve();
            } else {
                reject('Error en la solicitud AJAX');
            }
        };
    });
}
//redireccion
// function delseccion(idsolicitud) {
//     return new Promise(function (resolve, reject) {
//         var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
//         var ajaxUrl = baseurl + '/Mensajes/mensajesaddvar/' + idsolicitud;
//         request.open("GET", ajaxUrl, true);
//         resolve(request.send())

//         request.onload = function () {
//             if (request.status >= 200 && request.status < 300) {
//                 resolve();
//             } else {
//                 reject('Error en la solicitud AJAX');
//             }
//         };


//     });

// }


function activarNotificaciones() {
    notificacionesrealtime();
    resetFCMToken();
}

