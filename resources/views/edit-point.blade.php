@extends('layouts.template')

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css">
    <style>
        html,
        body {
            height: 100%;
            width: 100%;
        }

        #map {
            height: calc(100vh - 56px);
            width: 100%;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <div id="map"></div>

    <!-- Modal Create Point -->
    <div class="modal fade" id="PointModal" tabindex="-1" aria-labelledby="PointModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Create Point</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('update-point', $id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="name" id="name" name="name"
                                placeholder="Fill polyline name">
                        </div>
                        <div class="mb-3">
                            <label for="Description" class="form-label">Alamat</label>
                            <textarea class="form-control" id="Description" name="Description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="rating" class="form-label">Rating</label>
                            <textarea class="form-control" id="rating" name="rating" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="jambuka" class="form-label">Jam Buka</label>
                            <textarea class="form-control" id="jambuka" name="jambuka" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="notelpon" class="form-label">No Telpon</label>
                            <textarea class="form-control" id="notelpon" name="notelpon" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="socialmedia" class="form-label">Social Media</label>
                            <textarea class="form-control" id="socialmedia" name="socialmedia" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Image</label>
                            <input type="file" class="form-control" id="image_point" name="image"
                                onchange="document.getElementById('preview-image-point').src = window.URL.createObjectURL(this.files[0])">
                                <input type="hidden" class="form-control" id="image_old" name="image_old">
                        </div>
                        <div class="mb-3">
                            <img src=""alt="Preview" id="preview-image-point" class="img-thumbnail" width="400">
                        </div>
                        <div class="mb-3">
                            <label for="Geometry" class="form-label">Geometry</label>
                            <textarea class="form-control" id="Geometry" name="Geometry" readonly></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- J Query --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <script src="https://unpkg.com/@terraformer/wkt"></script>
    <script>
        var map = L.map('map').setView([-7.772727426259866, 110.37742654022925], 13);

        // Basemap
        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        /*Marker
        L.marker([-7.774461552953178, 110.37452841845395]).addTo(map)
            .bindPopup('Sekolah Vokasi UGM')
            .openPopup(); */

        /* Digitize Function */
        var drawnItems = new L.FeatureGroup();
        map.addLayer(drawnItems);

        var drawControl = new L.Control.Draw({
            draw: {
                position: 'topleft',
                polyline: false,
                polygon: false,
                rectangle: false,
                circle: false,
                marker: false,
                circlemarker: false
            },
            edit: {
                featureGroup: drawnItems,
                edit: true,
                remove: false,
            }
        });

        map.addControl(drawControl);



        map.on('draw:edited', function(e) {
            var layer = e.layers;

           layer.eachLayer(function(layer) {
            var geojson = layer.toGeoJSON();

            var wkt = Terraformer.geojsonToWKT(geojson.geometry);

            $('#name').val(layer.feature.properties.name);
            $('#deskripsi').val(layer.feature.properties.deskripsi);
            $('#Description').val(layer.feature.properties.description);
            $('#rating').val(layer.feature.properties.rating);
            $('#jambuka').val(layer.feature.properties.jambuka);
            $('#notelpon').val(layer.feature.properties.notelpon);
            $('#socialmedia').val(layer.feature.properties.socialmedia);
            $('#Geometry').val(wkt);
            $('#image_old').val(layer.feature.properties.image);
            $('#preview-image-point').attr('src', '{{ asset('storage/images/') }}/' + layer.feature.properties.image);
            $('#PointModal').modal('show');
           });
        });


        /* GeoJSON Point */
        var point = L.geoJson(null, {
            onEachFeature: function(feature, layer) {

                drawnItems.addLayer(layer);

                var popupContent = "<h4> " + "<b>" + feature.properties.name + "</h4>"+ "</b>" + "<br>" + "<b>" +
                    "Alamat: " + "</b>" + feature.properties.description + "<br>" +
                 "<b>" +"Rating: " + "</b>" +  feature.properties.rating + "<br>" +
                    "<b>" +"Jam Buka: " + "</b>" + feature.properties.jambuka + "<br>" +
                    "<b>" +"No Telpon: " + "</b>" +  feature.properties.notelpon + "<br>" +
                    "<b>" +"Social Media: " + "</b>" +  feature.properties.socialmedia + "<br>" +

                   "<b>" + "<br> <img src='{{ asset('storage/images/') }}/" + feature.properties.image +
                    "'class='' alt='' width='200'> "


                    "</div>"

                layer.on({
                    click: function(e) {
                        point.bindPopup(popupContent);
                    },
                    mouseover: function(e) {
                        point.bindTooltip(feature.properties.name);
                    },
                });
            },
        });
        $.getJSON("{{ route('api.point', $id) }}", function(data) {
            point.addData(data);
            map.addLayer(point);
            map.fitBounds(point.getBounds());
        });
    </script>
@endsection

</body>

</html>

