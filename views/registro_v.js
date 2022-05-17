$("#mensajeN").hide();
$(document.frmRegistro.nusuario).on("blur", function () {
  if (this.value.length > 0) {
    $.getJSON(BASE_URL + "Admin/leerUsuario/" + this.value, (datos) => {
      if (datos) {
        this.value = "";
        this.focus();
        $("#mensajeN").show();
      }
    });
  }
});
$("#mensajeE").hide();
$(document.frmRegistro.email).on("blur", function () {
  if (this.value.length > 0) {
    $.getJSON(BASE_URL + "Admin/leerEmail/" + this.value, (datos) => {
      if (datos) {
        this.value = "";
        this.focus();
        $("#mensajeE").show();
      }
    });
  }
});
$("#mostrar").on("click", function () {
  if ($("#clave").attr("type") == "text") {
    $("#clave").attr("type", "password");
  } else {
    $("#clave").attr("type", "text");
  }
});
