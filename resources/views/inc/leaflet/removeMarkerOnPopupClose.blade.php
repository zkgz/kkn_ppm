<script>
    map.on('popupclose', function(e) {
        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };
    });
</script>