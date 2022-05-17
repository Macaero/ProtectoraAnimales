$("body").on("click", ".btnAdoptar", function () {
  let animal = this.dataset.id;
  //Comprobar si tiene todos los datos rellenos
  location.href = BASE_URL + "Animal/adoptar/" + animal;
});
