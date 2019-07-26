<!-- Import leaflet.js untuk maps -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>
<script src="{{ asset('js/leaflet.js') }}"></script>

<!-- Gesture Handling -->
<link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
<script src="//unpkg.com/leaflet-gesture-handling"></script>

<!-- Style untuk maps (tinggi) -->
<style> #mapid { height: 300px; } </style>

<script>
    
    var mapCenter = [{{  $taxpayer->lat ?? (request('latitude') ?? -4.0185)  }}, {{ $taxpayer->long ?? (request('longitude') ?? 119.6710) }}];
    var map = L.map('mapid', {gestureHandling: true}).setView(mapCenter, 12);
    
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        gestureHandling: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);
    
    var marker = L.marker(mapCenter).addTo(map);
    
    map.on('click', function(e) {
        let lat = e.latlng.lat.toString().substring(0, 15);
        let long = e.latlng.lng.toString().substring(0, 15);
        
        $('#latitude').val(lat);
        $('#longitude').val(long);
        updateMarker(lat, long);
    });
    
    var updateMarkerByInputs = function() {
        return updateMarker( $('#latitude').val() , $('#longitude').val());
    }
    
    $('#latitude').on('input', updateMarkerByInputs);
    $('#longitude').on('input', updateMarkerByInputs);
</script>