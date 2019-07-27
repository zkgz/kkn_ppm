<script>
    var nonLabeledWorldStreet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
        maxZoom: 19,
        gestureHandling: true,
        attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
    });
    
    var labeledWorldStreet = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        gestureHandling: true,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });

    var mapCenter = [{{  $taxpayer->lat ?? (request('latitude') ?? -4.0185)  }}, {{ $taxpayer->long ?? (request('longitude') ?? 119.6710) }}];
    
    var map = L.map('mapid', {
        gestureHandling: true, 
        layers: [nonLabeledWorldStreet]
    })

    .setView(mapCenter, 12);
    var baseUrl = "{{ url('/') }}";
    var baseMaps = {
        "Grayscale": nonLabeledWorldStreet,
        "Streets": labeledWorldStreet
    };

</script>