/* Creamos un array con las razas y lo utilizamos para rellenar los select. Dependiendo de si selecciona Perro o Gato sacaremos unas razas u otras */
let razasP = ["Husky", "Galgo", "Pastor alemán", "Labrador"];
let razasG = ["Persa", "Siamés", "Maine Coon", "Gato esfinge"];
$("#tipoA").change(function () {
  cadena = "";
  if (this.value == "P") {
    $.each(razasP, function (indice, valor) {
      cadena += "<option value='" + valor + "'>" + valor + "</option>";
    });
  }
  if (this.value == "G") {
    $.each(razasG, function (indice, valor) {
      cadena += "<option value='" + valor + "'>" + valor + "</option>";
    });
  }
  $("#razaA").html(cadena);
});
$("#tipoE").change(function () {
  cadena = "";
  if (this.value == "P") {
    $.each(razasP, function (indice, valor) {
      cadena += "<option value='" + valor + "'>" + valor + "</option>";
    });
  }
  if (this.value == "G") {
    $.each(razasG, function (indice, valor) {
      cadena += "<option value='" + valor + "'>" + valor + "</option>";
    });
  }
  $("#razaE").html(cadena);
});
/* Lo precargamos para poder poner la raza directamente al editar con los datos recibidos */
$(document).ready(function () {
  cadena = "";
  $.each(razasP, function (indice, valor) {
    cadena += "<option value='" + valor + "'>" + valor + "</option>";
  });
  $.each(razasG, function (indice, valor) {
    cadena += "<option value='" + valor + "'>" + valor + "</option>";
  });
  $("#razaE").html(cadena);
});
/* Modificar animal */
$(".table").on("click", ".btnEditar", function () {
  let animal = this.dataset.animal;
  $.getJSON(BASE_URL + "Admin/leerAnimal/" + animal, function (datos) {
    for (let animal in datos) {
      if (document.frmEditar[animal]) {
        console.log(frmEditar[animal]);
        document.frmEditar[animal].value = datos[animal];
      }
    }
  });
});
/* Eliminar animal */
$(".table").on("click", ".btnBorrar", function () {
  let animal = this.dataset.id;
  location.href = BASE_URL + "Admin/borrarAnimal/" + animal;
});
