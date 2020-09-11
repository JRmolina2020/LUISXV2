<?php include 'header.php';
?>
<style>
.principal {
  float: none;
  margin: 0 auto;
}
</style>
<div class="container back">
  <br><br>
  <div class="row principal">
    <div class="col-lg-3 col-xs-12 col-sm-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Cesar</h3>
        </div>
        <div class="panel-body">
          <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table"
            placeholder="Buscar destiono" />
        </div>
        <table class="table table-hover" id="dev-table">
          <thead>
            <tr>
              <th>Destino</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Valledupar</td>
            </tr>
            <tr>
              <td>Aguachica</td>
            </tr>
            <tr>
              <td>Agustín Codazzi</td>
            </tr>
            <tr>
              <td>Astrea</td>
            </tr>
            <tr>
              <td>Becerril</td>
            </tr>
            <tr>
              <td>Bosconia</td>
            </tr>
            <tr>
              <td>Chimichagua</td>
            </tr>
            <tr>
              <td>Chiriguaná</td>
            </tr>
            <tr>
              <td>Curumani</td>
            </tr>
            <tr>
              <td>El copey</td>
            </tr>
            <tr>
              <td>El paso</td>
            </tr>
            <tr>
              <td>Gamarra</td>
            </tr>
            <tr>
              <td>La gloria</td>
            </tr>
            <tr>
              <td>Gamarra</td>
            </tr>
            <tr>
              <td>La Jagua de Ibirico</td>
            </tr>
            <tr>
              <td>La paz </td>
            </tr>
            <tr>
              <td>Manaure</td>
            </tr>
            <tr>
              <td>Pailitas</td>
            </tr>
            <tr>
              <td>Pueblo Bello</td>
            </tr>
            <tr>
              <td>Pelaya</td>
            </tr>
            <tr>
              <td>San diego</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12 col-sm-12 col-md-12">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Guajira y Magdalena</h3>
        </div>
        <div class="panel-body">
          <input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table"
            placeholder="Buscar destino" />
        </div>
        <table class="table table-hover" id="dev-table">
          <thead>
            <tr>
              <th>Destino</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Rioacha</td>
            </tr>
            <tr>
              <td>Albania</td>
            </tr>
            <tr>
              <td>Barrancas</td>
            </tr>
            <tr>
              <td>Dibulla</td>
            </tr>
            <tr>
              <td>Distracción</td>
            </tr>
            <tr>
              <td>El molino</td>
            </tr>
            <tr>
              <td>Fonseca</td>
            </tr>
            <tr>
              <td>Hatonuevo</td>
            </tr>
            <tr>
              <td>Maicao</td>
            </tr>
            <tr>
              <td>Uribia</td>
            </tr>
            <tr>
              <td>Urumita</td>
            </tr>
            <tr>
              <td>Villanueva</td>
            </tr>
            <tr>
              <td>La Jagua del Pilar</td>
            </tr>
            <tr>
              <td>San juan del cesar</td>
            </tr>
            <tr>
              <td>Aracataca</td>
            </tr>
            <tr>
              <td>El banco</td>
            </tr>
            <tr>
              <td>Fundación</td>
            </tr>
            <tr>
              <td>Guamal</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    <br>
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
(function() {
  'use strict';
  var $ = jQuery;
  $.fn.extend({
    filterTable: function() {
      return this.each(function() {
        $(this).on('keyup', function(e) {
          $('.filterTable_no_results').remove();
          var $this = $(this),
            search = $this.val().toLowerCase(),
            target = $this.attr('data-filters'),
            $target = $(target),
            $rows = $target.find('tbody tr');

          if (search == '') {
            $rows.show();
          } else {
            $rows.each(function() {
              var $this = $(this);
              $this.text().toLowerCase().indexOf(search) === -1 ? $this.hide() : $this.show();
            })
            if ($target.find('tbody tr:visible').size() === 0) {
              var col_count = $target.find('tr').first().find('td').size();
              var no_results = $('<tr class="filterTable_no_results"><td colspan="' + col_count +
                '">No results found</td></tr>')
              $target.find('tbody').append(no_results);
            }
          }
        });
      });
    }
  });
  $('[data-action="filter"]').filterTable();
})(jQuery);

$(function() {
  // attach table filter plugin to inputs
  $('[data-action="filter"]').filterTable();

  $('.container').on('click', '.panel-heading span.filter', function(e) {
    var $this = $(this),
      $panel = $this.parents('.panel');

    $panel.find('.panel-body').slideToggle();
    if ($this.css('display') != 'none') {
      $panel.find('.panel-body input').focus();
    }
  });
  $('[data-toggle="tooltip"]').tooltip();
});
</script>


<?php include 'footer.php' ?>
<title>Envios - Almacén luisxv</title>