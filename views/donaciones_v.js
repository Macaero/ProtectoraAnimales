$("#contenedor").hide();
function pago() {
  var importe = $("#importe").val();

  if (importe > 0) {
    $("#contenedor").show();

    paypal
      .Buttons({
        createOrder: function (data, actions) {
          return actions.order.create({
            purchase_units: [
              {
                amount: {
                  value: importe,
                },
              },
            ],
          });
        },
        onApprove: function (data, actions) {
          $("#contenedor").hide();
          $.post(
            BASE_URL + "Donaciones/nuevaDonacion",
            {
              donacion: importe,
            },
            function (datos) {
              $("#importe").val("");
              $("#mensaje").show();
              $("#mensaje").html("Donación efectuada correctamente, ¡Muchas gracias!");
              $("#historial").html(datos);
            }
          );
        },
      })
      .render("#contenedor");
  } else {
    $("#mensaje").html("Debes añadir un importe");
  }
}
$("body").on("click", "#btnPaypal", function () {
  pago();
});
