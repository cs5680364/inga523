var input = document.getElementById("dni");
input.addEventListener("input", function () {
  if (this.value.length > 8) this.value = this.value.slice(0, 8);
});

$("#buscar").click(function () {
  dni = $("#dni").val();
  console.log(dni);
  $.ajax({
    url: "consultaDNI.php",
    type: "post",
    data: "dni=" + dni,
    dataType: "json",
    success: function (r) {
      if (r.numeroDocumento == dni) {
        $("#apellidoPaterno").val(r.apellidoPaterno);
        $("#apellidoMaterno").val(r.apellidoMaterno);
        $("#nombres").val(r.nombres);
      } else {
        alert('No encontrado');
      }
    },
  });
});
