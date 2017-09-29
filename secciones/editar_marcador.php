 <?php
  require "Marcadores.php";

  $clase_marcadores = new Marcadores();

  $marcadores = $clase_marcadores->getMarcadores();

?>
<div class="row">    
    <div class="col-sm-12">
          <div class="form-material">
              <select class="form-control" id="marcadores" name="origen" size="1">
                  <option disabled selected value> -Seleccionar marcador- </option>
                  <?php
                    foreach ($marcadores as $marcador) {
                      echo "<option value='$marcador[id]'>$marcador[nombre]</option>";
                    }
                  ?>
              </select>
              <label for="marcadores">Marcadores</label>
          </div>
    </div>
</div>
 <form class="js-validation-register form-horizontal push-50-t push-50" id="form_editar_marcador" action="" method="post">
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled required class="form-control" type="text" id="register-username" name="nombre" placeholder="Ingresar nombre del marcador">
                    <label for="register-username">Nombre</label>
                </div>
            </div>


            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="direccion" name="direccion" placeholder="Presioná enter para ver la dirección en el mapa">
                    <label for="direccion">Dirección</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="col-xs-6">
                <div class="form-material floating open">
                    <select disabled required class="form-control" id="tipo" name="tipo" size="1">
                        <option disabled selected value> -Seleccionar tipo- </option>
                        <option value="proveedor">Proveedor</option>
                        <option value="cliente">Cliente</option>
                    </select>
                    <label for="tipo">Tipo</label>
                    <br>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="mail" name="mail" placeholder="Ingresar mail">
                    <label for="mail">Mail</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="cuit" name="cuit" placeholder="Ingresar el CUIT">
                    <label for="cuit">CUIT</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-material floating open">
                    <select disabled class="form-control" id="condicion_afip" name="condicion_afip" size="1">
                        <option disabled selected value> -Seleccionar tipo- </option>
                        <option value="consumidor_final">Consumidor Final</option>
                        <option value="excento">Exento</option>
                        <option value="responsable_inscripto">Responsable Inscripto</option>
                        <option value="responsable_monotributo">Responsable Monotributo</option>
                    </select>
                    <label for="condicion_afip">Condición AFIP</label>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
           <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="nombre_contacto" name="nombre_contacto" placeholder="Ingresar el nombre de la persona de contacto">
                    <label for="nombre_contacto">Nombre contacto</label>
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="actividad_comercial" name="actividad_comercial" placeholder="Ingresar la actividad comercial">
                    <label for="actividad_comercial">Actividad comercial</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="col-xs-6">
                <div class="form-material form-material-success">
                    <input disabled class="form-control" type="text" id="telefono" name="telefono" placeholder="Ingresar teléfono">
                    <label for="telefono">Teléfono</label>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-xs-12">
            <div class="col-xs-6">
                <button  disabled class="btn btn-block btn-success" id="bot_editar"><i class="fa fa-plus pull-right"></i> Editar marcador</button>
            </div>
            <div class="col-xs-6">
                <button disabled class="btn btn-block btn-danger" id="bot_eliminar">Eliminar marcador</button>
            </div>
        </div>
    </div>
    <input type="hidden" id="latitud" name="latitud" value="0">
    <input type="hidden" id="longitud" name="longitud" value="0">
</form>
<script src="assets/map/script_editar_marcador.js"></script>