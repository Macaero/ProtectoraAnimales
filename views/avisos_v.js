$("body").on("click", ".btnEnviar", function () {
  $.post(
    BASE_URL + "Admin/darAviso",
    {
      mensaje: $("#aviso").val(),
    },
    function (datos) {
      $(".contenedor").html(datos);
      $("#aviso").val("");
    }
  );
});
$("body").on("click", ".btnResolver", function () {
  $.post(BASE_URL + "Admin/resolverAviso", {
    id: this.dataset.id,
  });
  $.post(BASE_URL + "Admin/darAviso", function (datos) {
    $(".contenedor").html(datos);
  });
});
