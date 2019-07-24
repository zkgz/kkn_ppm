<script>
    // Update Latitude and Longitude Form via clicking the map
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