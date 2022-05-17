/* Llamada ajax para poner las incidencias */
$("body").on("click", ".btnEnviar", function () {
  let destino = this.dataset.dest;
  let id = this.dataset.id;
  $.post(
    BASE_URL + "Animal/incidencias",
    {
      mensaje: $("." + id).val(),
      idAdopcion: id,
    },
    function (datos) {
      $("." + destino).html(datos);
      $("." + id).val("");
    }
  );
});
