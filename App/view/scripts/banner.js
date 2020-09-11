var tabla;

function init() {
  store();
  index();
}
function limpiar() {
  $("#id").val("");
  $("#link").val("");
  $("#active").val("");
  $("#imagenmuestra").attr("src", "");
  $("#imagenactual").val("");
  $("#form").bootstrapValidator("resetForm", true);
}
function index() {
  tabla = $("#listado")
    .dataTable({
      aProcessing: true,
      aServerSide: true,
      dom: "Bfrtip",
      buttons: [],
      ajax: {
        url: "../controller/BannerControllers.php?op=index",
        type: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      iDisplayLength: 5,
      order: [[0, "desc"]],
    })
    .DataTable();
}
function mayus(e) {
  e.value = e.value.toUpperCase();
}
function store(e) {
  $("#form")
    .bootstrapValidator({
      message: "This value is not valid",
      fields: {
        image: {
          validators: {
            file: {
              extension: "jpeg,jpg,png",
              type: "image/jpeg,image/png",
              maxSize: 2097152,
              message: "Archivo denegado,Inserte una imagen valida",
            },
          },
        },
      },
    })
    .on("success.form.bv", function (e) {
      e.preventDefault();
      $("#btnsave").prop("disabled", false);
      var formData = new FormData($("#form")[0]);
      $.ajax({
        url: "../controller/BannerControllers.php?op=store",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          swal({
            position: "top-end",
            type: "success",
            title: datos,
            showConfirmButton: false,
            timer: 1500,
          });
          limpiar();
          $("#form").bootstrapValidator("resetForm", true);
          tabla.ajax.reload();
          $("#modal").modal("hide");
        },
      });
    });
}
function show(id) {
  $.post("../controller/BannerControllers.php?op=show", { id: id }, function (
    data
  ) {
    data = JSON.parse(data);
    $("#id").val(data.id);
    $("#active").val(data.active);
    $("#link").val(data.link);
    $("#imagenactual").val(data.image);
    $("#modal").modal("show");
  });
}
function destroy(id) {
  swal({
    title:
      "Desea eliminar esta categoria?, Recuerde una vez eliminada no se podrá recuperar la información!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/BannerControllers.php?op=destroy",
        { id: id },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
