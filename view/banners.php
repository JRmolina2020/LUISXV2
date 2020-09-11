<?php
require 'header.php';
?>
<style>
.principal {
  float: none;
  margin: 0 auto;
}
</style>
<div class="content-wrapper">
  <section class="content">
    <div class="row">
      <div class="col-lg-6 principal">
        <div class="panel-body">
          <div class="nav-tabs-custom">
            <div class="tab-content no-padding">
              <div class="chart tab-pane active" id="listax" style="position: relative;height: 100%;">
                <div class="panel-body table-responsive" id="divlistado">
                  <button type="button" onclick="limpiar()" class="btn btn-primary btn-md btn-flat" data-toggle="modal"
                    data-target="#modal">
                    Nuevo banner
                  </button>
                  <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                    aria-hidden="true">
                    <div class="modal-dialog modal-sm"" role=" document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Registrar imagen banner</h5>
                        </div>
                        <div class="modal-body">
                          <form name="form" id="form" method="POST">
                            <input type="hidden" id="id" name="id">
                            <div class="row">
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Activa</label>
                                  <select class="form-control" name="active" id="active">
                                    <option value="active">SI ACTIVA</option>
                                    <option value="">NO ACTIVA</option>
                                  </select>
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Link</label>
                                  <input type="text" class="form-control" name="link" id="link">
                                </div>
                              </div>
                              <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                  <label class="control-label">Imagen perfil</label>
                                  <input type="file" class="form-control" name="image" id="image">
                                </div>
                              </div>
                            </div>
                            <input type="hidden" name="imagenactual" id="imagenactual">
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                              <button type="submit" class="btn btn-success pull-right">Guardar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  <table id="listado" class="table  table-bordered">
                    <thead>
                      <th>Opciones</th>
                      <th>Activa</th>
                      <th>Imagen</th>
                      <th>Link</th>
                    </thead>
                    <tbody>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<?php
require 'footer.php';
?>
<script type="text/javascript" src="scripts/banner.js"></script>
</body>

</html>