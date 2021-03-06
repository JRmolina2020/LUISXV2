var tabla;

function init() {
  store();
  index();
}
function limpiar() {
  $("#id").val("");
  $("#name").val("");
  $("#categorie").val("");
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
        url: "../controller/CategoryControllers.php?op=index",
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
        name: {
          message: "Nombre invalido",
          validators: {
            notEmpty: {
              message: "El nombre  es obligatorio,no puede estar vacio.",
            },

            stringLength: {
              min: 3,
              max: 25,
              message: "Minimo 3 carácteres y Máximo 25 carácteres ",
            },
          },
        },
        categorie: {
          message: "Categoria invalida",
          validators: {
            notEmpty: {
              message: "La subcategoria es obligatoria.",
            },
          },
        },
        image: {
          validators: {
            file: {
              extension: "jpg,png",
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
        url: "../controller/CategoryControllers.php?op=store",
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
  $.post("../controller/CategoryControllers.php?op=show", { id: id }, function (
    data
  ) {
    data = JSON.parse(data);
    $("#id").val(data.id);
    $("#name").val(data.name);
    $("#categorie").val(data.categorie);
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
        "../controller/CategoryControllers.php?op=destroy",
        { id: id },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}
function statu(id, status) {
  swal({
    title: "Desea cambiar el estado de la categoria?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Acepto!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/CategoryControllers.php?op=status",
        { id: id, status: status },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}
function statusroute(id, route) {
  swal({
    title: "Desea cambiar el estado de la sección?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Acepto!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/CategoryControllers.php?op=statusroute",
        { id: id, route: route },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
