/* Marcar como leidos los mensajes al abrir la página */
$(document).ready(function () {
  $.post(BASE_URL + "Chat/leerMensajes", function (datos) {
    $("#chat").html(datos);
  });
});
function buscar() {
  $.post(
    BASE_URL + "Chat/enviarMensaje",
    {
      mensaje: $("#mensaje").val(),
    },
    function (datos) {
      $("#chat").html(datos);
    }
  );
}
/* Llamado a la funcion que hace la llamada AJAX para enviar mensaje */
$("body").on("click", "#btnEnviar", function () {
  buscar();
  $("#mensaje").val("");
});
