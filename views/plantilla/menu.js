let activar = $("a[href='" + location.href + "']");
if (activar.length > 0) {
  activar.addClass("active");
} else {
  $(".nav .nav-link").eq[0].addClass("active");
}
