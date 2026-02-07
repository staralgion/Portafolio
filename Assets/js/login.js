const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

if (sign_up_btn) {
  sign_up_btn.addEventListener("click", () => {
    container.classList.add("sign-up-mode");
  });
}

if (sign_in_btn) {
sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});
}


function parseJSONResponse(responseText) {
  try {
      return JSON.parse(responseText);
  } catch (error) {
      console.log("Error en el parse");
      Swal.fire("Error", "Acceso denegado", "error").then(() => {
          location.reload();
      });
      return null; // Otra opción: podrías lanzar una excepción aquí en lugar de devolver null
  }
}