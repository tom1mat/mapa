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
<div class="block">
    <div class="block-header">
        <h3 class="block-title">Marcadores</h3>
    </div>
    <div class="block-content">
        <table class="table table-bordered table-striped js-dataTable-full-pagination dataTable no-footer" id="DataTables_Table_2" role="grid" aria-describedby="DataTables_Table_2_info">
        <thead>
            <tr role="row">
                <th class="text-center" rowspan="1" colspan="1" style="width: 79px;">
                    ID
                </th>
                <th rowspan="1" colspan="1" style="width: 329px;">
                    Nombre
                </th>
                <th rowspan="1" colspan="1"style="width: 469px;">
                    Dirección
                </th>
                <th rowspan="1" colspan="1">
                    Teléfono
                </th>
                <th style="width: 113px;" rowspan="1" colspan="1">
                    Acciones
                </th>
            </tr>
        </thead>
        <tbody>
        <?php
        require "Marcadores.php";
        $clase_marcadores = new Marcadores();
        $marcadores = $clase_marcadores->getMarcadores();
        foreach ($marcadores as $marcador) {
            echo'
                <tr role="row" class="odd">
                    <td class="text-center sorting_1">'.$marcador["id"].'</td>
                    <td class="font-w600"><p class="editable">'.$marcador["nombre"].'</p></td>
                    <td class="hidden-xs input_direccion"><p class="editable">'.$marcador["direccion"].'</p></td>
                    <td class="hidden-xs"><p class="editable">'.$marcador["telefono"].'</p></td>
                    <td class="latitud" style="display:none;">'.$marcador["latitud"].'</td>
                    <td class="longitud" style="display:none;">'.$marcador["longitud"].'</td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="boton_edit btn btn-xs btn-default" type="button" value="'.$marcador["id"].'"><i class="fa fa-pencil"></i></button>
                            <button class="boton_eliminar btn btn-xs btn-default" type="button" value="'.$marcador["id"].'"><i class="fa fa-times"></i></button>
                        </div>
                    </td>';
        }
        ?>
        </tbody>
        </table>
    </div>
</div>

<!-- Api Google maps -->
<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyBQFz2bfjb3GvN-06VULQEaUq8ci2QH5bE"></script>
<!-- Mapa -->
<script src="assets/map/gmaps.js"></script>
<script src="assets/map/script_mapa.js"></script>
<!-- Javascript propio -->
<script src="assets/map/script_editar_marcador.js"></script>
