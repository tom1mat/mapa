<?php
  require "Marcadores.php";

  $clase_marcadores = new Marcadores();

  $marcadores = $clase_marcadores->getMarcadores();
?>
<div class="row">
  <!-- ORIGEN -->
  <div class="col-sm-8">
      <div class="form-material">
          <select class="form-control" id="origen" name="origen" size="1">
              <option disabled selected value> -Seleccionar marcador- </option>
              <?php
                foreach ($marcadores as $marcador) {
                  echo "<option value='$marcador[id]'>$marcador[nombre]</option>";
                }
              ?>
          </select>
          <label for="origen">Origen</label>
      </div>
  </div>
  <!-- END ORIGEN -->
  <div class="col-sm-1">
    <button id="bot_origen" class="btn btn-info bot_modal" type="button">
      Buscar origen en mapa
    </button>
  </div>
</div>
<!-- END ROW -->

<div class="row">
  <!-- DESTINO -->
  <div class="col-sm-8">
      <div class="form-material">
          <select class="form-control" id="destino" name="destino" size="1">
              <option disabled selected value> -Seleccionar marcador- </option>
              <?php
                foreach ($marcadores as $marcador) {
                  echo "<option value='$marcador[id]'>$marcador[nombre]</option>";
                }
              ?>
          </select>
          <label for="destino">Destino</label>
      </div>
  </div>
  <!-- END DESTINO -->
  <div class="col-sm-1">
    <button id="bot_destino" class="btn btn-info bot_modal" type="button">
      Buscar destino en mapa
    </button>
  </div>
</div>
<!-- END ROW -->

<div class="row">
  <div class="col-sm-6">
    <h3>Origen</h3>
  </div>
  <div class="col-sm-6">
    <h3>Destino</h3>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <h4 id="h1-origen">Seleccionar marcador...</h4>
  </div>
  <div class="col-sm-6">
    <h4 id="h1-destino">Seleccionar marcador...</h4>
  </div>
</div>
<br>
<div class="row" style="margin: auto;">
    <button disabled id="bot_calcular" class="btn btn-success" type="button">
      Calcular
    </button>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <h3 id="h3-tit-distancia"></h3>
     </div>
     <div class="col-sm-12">
        <h4 id="h4-distancia"></h4>
     </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <h3 id="h3-tit-tiempo"></h3>
     </div>
     <div class="col-sm-12">
        <h4 id="h4-tiempo"></h4>
     </div>
</div>

<!-- MODAL MAP -->
<div class="modal fade" id="modal_mapa" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="block block-themed block-transparent remove-margin-b">
                <div class="block-header bg-primary-dark">
                    <ul class="block-options">
                        <li>
                            <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                        </li>
                    </ul>
                    <h3 class="block-title" id="titulo_mapa"></h3>
                </div>
                <div class="block-content">
                  <!-- MAPA -->
                  <div class="row">
                      <div class="col-md-12">
                          <div class="block-content">
                              <div class="row">
                                  <div class="col-lg-12">
                                      <div id="map" style="height: 500px;"></div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="form-group">
                          <div class="col-xs-12">
                              <div class="form-material form-material-success">
                                  <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Presioná enter para ver la dirección en el mapa">
                              </div>
                          </div>
                      </div>
                  </div>
                  <button id="bot_ingresar_marcador" class="btn btn-sm btn-primary pull-right" type="button" data-dismiss="modal"><i class="fa fa-check"></i>Ingresar marcador</button>
                  <br>
                  <br>
                  <!-- END MAPA -->
                </div>

            </div>

        </div>
    </div>
</div>
<!-- END MODAL MAP -->

<!-- Api Google maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBQFz2bfjb3GvN-06VULQEaUq8ci2QH5bE"></script>
<!-- Mapa -->
<script src="assets/map/gmaps.js"></script>
<script src="assets/map/script_gestionar_marcador.js"></script>
