<script>
    var regionLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}");
    var totalLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var restaurantLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var hotelLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var parkirLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var taxpayerLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    
    var layer = {
        "KELURAHAN"  : regionLayout,
        "TOTAL "     : totalLayout,
        "RESTAURANT" : restaurantLayout,
        "HOTEL"      : hotelLayout,
        "PARKIR"     : parkirLayout,
        "PBB"        :taxpayerLayout
    };
    L.control.layers(layer).addTo(map);
    
    function highlightFeature(e) {
        var layer = e.target;
        
        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });
        
        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }
        info.update(layer.feature.properties);
    }
    function resetHighlight(e) {
        regionLayout.resetStyle(e.target);
        totalLayout.resetStyle(e.target);
        restaurantLayout.resetStyle(e.target);
        hotelLayout.resetStyle(e.target);
        parkirLayout.resetStyle(e.target);
        taxpayerLayout.resetStyle(e.target);
        info.update();
    }
    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }
    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }
    function style(feature) {
        return {
            fillColor: getColor(feature.properties.pajak_per_bulan),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }
</script>