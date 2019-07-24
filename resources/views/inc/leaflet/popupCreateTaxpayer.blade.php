<script>
    var theMarker;
    map.on('click', function(e) {
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
            
            var popupContent = "Your location : " + latitude + ", " + longitude + ".";
            popupContent += '<br><a href="{{ route('taxpayer.create') }}?latitude=' + latitude + '&longitude=' + longitude + '">Add new taxpayer here</a>';
            
            theMarker = L.marker([latitude, longitude]).addTo(map);
            theMarker.bindPopup(popupContent)
            .openPopup();
        });
</script>