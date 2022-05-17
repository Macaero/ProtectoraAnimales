/* Ponemos a todos los input el atributo readonly para que no se puedan modificar y al botón submit le ponemos disabled */
$(document).ready(function () {
  $(":input").attr("readonly", "readonly");
  $(".btnEnviar").attr("disabled", "disabled");
});
/* Cuando activa el check se activan los campos */
$("#checkEditar").change(function () {
  if ($(".btnEnviar").attr("disabled") == "disabled") {
    $(":input").attr("readonly", false);
    $(".btnEnviar").attr("disabled", false);
  } else {
    $(":input").attr("readonly", "readonly");
    $(".btnEnviar").attr("disabled", "disabled");
  }
});
