<script>
    var defaultLayout = new L.GeoJSON.AJAX();
    var regionLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}");
    var totalLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var restaurantLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var hotelLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var parkingLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    var propertyLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
    
    var layer = {
        "NONE"       : defaultLayout.addTo(map),
        "KELURAHAN"  : regionLayout,
        "TOTAL "     : totalLayout,
        "RESTAURANT" : restaurantLayout,
        "HOTEL"      : hotelLayout,
        "PARKIR"     : parkingLayout,
        "PBB"        : propertyLayout
    };
    L.control.layers(layer, overlayMaps).addTo(map);
    
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
        //infosidebar.updatesidebar(layer.feature.properties);
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("mapid").style.marginLeft = "250px";
        info.updatesidebar(layer.feature.properties); 
    }
    
    function highlightNear(e) {
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
    }
    
    function resetHighlight(e) {
        defaultLayout.resetStyle(e.target);
        regionLayout.resetStyle(e.target);
        totalLayout.resetStyle(e.target);
        restaurantLayout.resetStyle(e.target);
        hotelLayout.resetStyle(e.target);
        parkingLayout.resetStyle(e.target);
        taxpayerLayout.resetStyle(e.target);
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mapid").style.marginLeft = "0";
        info.updatesidebar();
    }
    
    function closesidebar(){
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("mapid").style.marginLeft = "0";
        info.updatesidebar();
    }
    
    function resetLine(e) {
        defaultLayout.resetStyle(e.target);
        regionLayout.resetStyle(e.target);
        totalLayout.resetStyle(e.target);
        restaurantLayout.resetStyle(e.target);
        hotelLayout.resetStyle(e.target);
        parkingLayout.resetStyle(e.target);
        taxpayerLayout.resetStyle(e.target);
    }
    
    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }
    
    function onEachFeature(feature, layer) {
        layer.on({
            mouseover : highlightNear,
            mouseout: resetLine,
            click: highlightFeature
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