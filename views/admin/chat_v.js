/* Manejador para enviar mensajes */
$("body").on("click", ".btnEnviar", function () {
  let valor = this.dataset.valor;
  let destino = this.dataset.destino;
  let id = this.dataset.id;
  $.post(
    BASE_URL + "Chat/enviarMensaje",
    {
      mensaje: $("." + valor).val(),
      idusu: id,
    },
    function (datos) {
      $("." + destino).html(datos);
      $("." + valor).val("");
    }
  );
});
/* Marcar mensajes como leidos al abrir el chat */
$("body").on("click", ".btnAbrir", function () {
  let id = this.dataset.id;
  let destino = this.dataset.destino;
  $.post(BASE_URL + "Chat/leerMensajes", { idusu: id }, function (datos) {
    $("." + destino).html(datos);
  });
});
