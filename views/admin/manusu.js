/* Modificar usuario */
$(".table").on("click", ".btnEditar", function () {
  let usuario = this.dataset.nusuario;
  $.getJSON(BASE_URL + "Admin/leerUsuario/" + usuario, function (datos) {
    for (let usuario in datos) {
      if (document.frmEditar[usuario]) {
        document.frmEditar[usuario].value = datos[usuario];
      }
    }
  });
});
/* Eliminar usuario */
$(".table").on("click", ".btnBorrar", function () {
  let usuario = this.dataset.id;
  location.href = BASE_URL + "Admin/borrarUsuario/" + usuario;
});
/* Validaciones de nombre de usuario y email */
$("#mensajeAgregarN").hide();
$(document.frmAgregar.nusuario).on("blur", function () {
  if (this.value.length > 0) {
    $.getJSON(BASE_URL + "Admin/leerUsuario/" + this.value, (datos) => {
      if (datos) {
        this.value = "";
        this.focus();
        $("#mensajeAgregarN").show();
      }
    });
  }
});
$("#mensajeAgregarE").hide();
$(document.frmAgregar.email).on("blur", function () {
  if (this.value.length > 0) {
    $.getJSON(BASE_URL + "Admin/leerEmail/" + this.value, (datos) => {
      if (datos) {
        this.value = "";
        this.focus();
        $("#mensajeAgregarE").show();
      }
    });
  }
});
