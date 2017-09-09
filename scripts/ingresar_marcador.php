<div class="row">
    <div class="col-md-12">
        <div class="block block-rounded">
            <div class="block-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="map"></div>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="">
    <!-- Register Block -->
    <div class="animated fadeIn">
        <div class="block-header bg-success">
            <h3 class="block-title" style="color:white;">Ingresar marcador</h3>
        </div>
        <form class="js-validation-register form-horizontal push-50-t push-50" action="process/prcs_ingresar_marcador.php" method="post">
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material form-material-success">
                        <input class="form-control" type="text" id="register-username" name="nombre" placeholder="Ingresar nombre del marcador">
                        <label for="register-username">Nombre</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material form-material-success">
                        <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Presioná enter para ver la dirección en el mapa">
                        <label for="register-username">Dirección</label>
                    </div>
                </div>
            </div>
            <div class="form-material floating open">
                <select required class="form-control" id="tipo" name="tipo" size="1">
                    <option disabled selected value> -Seleccionar tipo- </option>
                    <option value="proveedor">Proveedor</option>
                    <option value="cliente">Cliente</option>
                </select>
                <label for="material-select2">Tipo</label>
            </div>
            <div class="form-group">
                <div class="col-xs-12">
                    <div class="form-material form-material-success">
                        <input class="form-control" type="text" id="telefono" name="telefono" placeholder="Ingresar teléfono">
                        <label for="register-username">Teléfono</label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-xs-12 col-sm-6 col-md-5">
                    <button class="btn btn-block btn-success" type="submit" id="bot_submit"><i class="fa fa-plus pull-right"></i> Ingresar marcador</button>
                </div>
            </div>
            <input type="hidden" id="latitud" name="latitud" value="0">
            <input type="hidden" id="longitud" name="longitud" value="0">
        </form>
        <!-- END Register Form -->
</div>

<!-- Api Google maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBQFz2bfjb3GvN-06VULQEaUq8ci2QH5bE"></script>
<!-- Mapa -->
<script src="assets/map/gmaps.js"></script>
<script src="assets/map/script_mapa.js"></script>

 <!-- OneUI Core JS: jQuery, Bootstrap, slimScroll, scrollLock, Appear, CountTo, Placeholder, Cookie and App.js -->
<script src="assets/js/core/jquery.min.js"></script>
<script src="assets/js/core/bootstrap.min.js"></script>
<script src="assets/js/core/jquery.slimscroll.min.js"></script>
<script src="assets/js/core/jquery.scrollLock.min.js"></script>
<script src="assets/js/core/jquery.appear.min.js"></script>
<script src="assets/js/core/jquery.countTo.min.js"></script>
<script src="assets/js/core/jquery.placeholder.min.js"></script>
<script src="assets/js/core/js.cookie.min.js"></script>
<script src="assets/js/app.js"></script>

<!-- Page JS Plugins -->
<script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

<!-- Page JS Code -->
<script src="assets/js/pages/base_pages_register.js"></script>

<!-- Ingresar marcador al mapa -->
<script src="assets/map/script_ingresar_marcador.js"></script>