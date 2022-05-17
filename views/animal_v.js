$("body").on("click", ".btnFicha", function () {
  let animal = this.dataset.id;
  location.href = BASE_URL + "Animal/verFicha/" + animal;
});
/* Para abrir y cerrar los filtros de búsqueda */
$(".filtros").hide();
$(".btnFiltros").on("click", function () {
  if ($(".btnFiltros").hasClass("btnCerrar")) {
    $(".filtros").hide();
    $(this).removeClass("btnCerrar");
  } else {
    $(".filtros").show();
    $(this).addClass("btnCerrar");
  }
});
/* Según el valor del radio sacamos unas razas u otras */
let razasP = ["Husky", "Galgo", "Pastor alemán", "Labrador"];
let razasG = ["Persa", "Siamés", "Maine Coon", "Gato esfinge"];
cadena = "";
$.each(razasP, function (indice, valor) {
  cadena +=
    "<div class='perro form-check'><input class='form-check-input' type='radio' name='raza' id='" +
    valor +
    "' value='" +
    valor +
    "'><label class='form-check-label' for='" +
    valor +
    "'>" +
    valor +
    "</label></div>";
});
$.each(razasG, function (indice, valor) {
  cadena +=
    "<div class='gato form-check'><input class='form-check-input' type='radio' name='raza' id='" +
    valor +
    "' value='" +
    valor +
    "'><label class='form-check-label' for='" +
    valor +
    "'>" +
    valor +
    "</label></div>";
});
$(".razas").html(cadena);
$(".perro").hide();
$(".gato").hide();
$("input[name=tipo]").change(function () {
  if (this.value == "P") {
    $(".perro").show();
    $(".gato").hide();
  }
  if (this.value == "G") {
    $(".gato").show();
    $(".perro").hide();
  }
});
/* Llamada ajax para generar los animales con la busqueda */
function buscar() {
  $.post(
    BASE_URL + "Animal/verBusqueda",
    {
      tipo: $("input[name=tipo]:checked").val() === undefined ? "%%" : $("input[name=tipo]:checked").val(),
      raza: $("input[name=raza]:checked").val() === undefined ? "%%" : $("input[name=raza]:checked").val(),
      sexo: $("input[name=sexo]:checked").val() === undefined ? "%%" : $("input[name=sexo]:checked").val(),
      edad: $("input[name=edad]:checked").val() === undefined ? 20 : $("input[name=edad]:checked").val(),
    },
    function (datos) {
      $("#cuerpo").html(datos);
    }
  );
}
$(":input").change(function () {
  buscar();
});
$("#btnReset").on("click", function () {
  $(":input").prop("checked", false);
  buscar();
});
