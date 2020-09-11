var tabla;

function init() {
  store();
  index();
  $.post("../controller/ProductControllers.php?op=selectCategorie", function (
    r
  ) {
    $("#category_id").html(r);
  });
  $.post("../controller/ProductControllers.php?op=selectBrands", function (r) {
    $("#brand_id").html(r);
  });
}
function mayus(e) {
  e.value = e.value.toUpperCase();
}
function limpiar() {
  $("#id").val("");
  $("#name").val("");
  $("#price").val("");
  $("#price_e").val(0);
  $("#discount").val(0);
  $("#ref").val("");
  $("#embed").val("");
  $("#description").val("");
  $("#specs").val("");
  $("#imagenactual").val("");
  $("#imagenactual2").val("");
  $("#imagenactual3").val("");
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
        url: "../controller/ProductControllers.php?op=index",
        type: "GET",
        dataType: "json",
        error: function (e) {
          console.log(e.responseText);
        },
      },
      bDestroy: true,
      iDisplayLength: 2,
      order: [[0, "desc"]],
    })
    .DataTable();
}

function store(e) {
  $("#form")
    .bootstrapValidator({
      message: "This value is not valid",
      fields: {
        ref: {
          message: "Referencia invalida",
          validators: {
            notEmpty: {
              message: "La refencia es obligatoria",
            },
          },
        },
        name: {
          message: "Nombre invalido",
          validators: {
            notEmpty: {
              message: "El nombre  es obligatorio.",
            },
          },
        },

        price: {
          message: "Precio invalido",
          validators: {
            notEmpty: {
              message: "El precio es obligatorio.",
            },
            integer: {
              message: "Digite un número valido",
              thousandsSeparator: "",
              decimalSeparator: ".",
            },
            between: {
              min: 0,
              max: 9999999999999,
              message: "El primer digito debe ser  mayor o igual a 0",
            },
          },
        },
        price_e: {
          message: "Precio invalido",
          validators: {
            notEmpty: {
              message:
                "El precio especial es obligatorio, si no tiene coloque 0",
            },
            integer: {
              message: "Digite un número valido",
              thousandsSeparator: "",
              decimalSeparator: ".",
            },
            between: {
              min: 0,
              max: 9999999999999,
              message: "El primer digito debe ser  mayor o igual a 0",
            },
          },
        },

        discount: {
          message: "Descuento invalido",
          validators: {
            notEmpty: {
              message: "El descuento  es obligatorio, si no tiene coloque 0",
            },
            between: {
              min: 0,
              max: 9999999999999,
              message: "El primer digito debe ser  mayor o igual a 0",
            },
          },
        },
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
        image2: {
          validators: {
            file: {
              extension: "jpeg,jpg,png",
              type: "image/jpeg,image/png",
              maxSize: 2097152,
              message: "Archivo denegado,Inserte una imagen valida",
            },
          },
        },
        image3: {
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
      swal({
        position: "center",
        type: "success",
        title: "cargando recurso",
        showConfirmButton: false,
        timer: 2000,
      });
      $("#btnsave").prop("disabled", false);
      var formData = new FormData($("#form")[0]);
      $.ajax({
        url: "../controller/ProductControllers.php?op=store",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (datos) {
          $("#modal").modal("hide");
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
        },
      });
    });
}
function show(id) {
  $.post("../controller/ProductControllers.php?op=show", { id: id }, function (
    data
  ) {
    data = JSON.parse(data);
    $("#id").val(data.id);
    $("#category_id").val(data.category_id);
    $("#ref").val(data.ref);
    $("#name").val(data.name);
    $("#brand_id").val(data.brand_id);
    $("#price").val(data.price);
    $("#price_e").val(data.price_e);
    $("#discount").val(data.discount);
    $("#description").val(data.description);
    $("#specs").val(data.specs);
    $("#embed").val(data.embed);
    $("#imagenactual").val(data.image);
    $("#imagenactual2").val(data.image2);
    $("#imagenactual3").val(data.image3);
    $("#modal").modal("show");
  });
}
function destroy(id) {
  swal({
    title:
      "Desea eliminar este producto?, Recuerde una vez eliminado no se podrá recuperar la información!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Eliminar!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/ProductControllers.php?op=destroy",
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
    title: "Desea Bloqueaa ha este producto?",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Si, Acepto!",
  }).then((result) => {
    if (result.value) {
      $.post(
        "../controller/ProductControllers.php?op=status",
        { id: id, status: status },
        function (e) {
          swal(e);
          tabla.ajax.reload();
        }
      );
    }
  });
}

init();
