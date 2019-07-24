@extends('layouts.app')
@section('content')

<main class="py-4 container">
    
    <div class="card">
        <div class="card-body" id="mapid"></div>
    </div>
    
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>
    
    <style>
        #mapid { min-height: 500px; }
    </style>
    
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet-ajax/2.1.0/leaflet.ajax.js"></script>
    
    @include('inc.marker')
    
    <!-- Gesture Handling -->
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <script src="//unpkg.com/leaflet-gesture-handling"></script>
    
    <script>
        // https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png
        var map = L.map('mapid', {gestureHandling: true}).setView([-4.0185, 119.6710], 13);
        var baseUrl = "{{ url('/') }}";
        var regionLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}");
        L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
            attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
        }).addTo(map);
        
        var Icons = L.Icon.extend({
            options: {
                shadowUrl: '{{URL::asset("/map-marker/shadow-64.png")}}',
                iconSize:     [32, 32],
                shadowSize:   [32, 32],
                iconAnchor:   [16, 32],
                shadowAnchor: [16, 32],
                popupAnchor:  [-3, -76]
            }
        });
        var restaurantIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/restaurant-64.png")}}'}),
            propertyIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/property-64.png")}}'}),
            parkingIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/parking-64.png")}}'}),
            hotelIcon = new Icons({iconUrl: '{{URL::asset("/map-marker/hotel-64.png")}}'});

        axios.get('{{ route('api.taxpayer.index') }}')
        .then(function (response) {
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {
                    console.log(geoJsonPoint.properties.type);
                    if(geoJsonPoint.properties.type == "Property")
                        return L.marker(latlng, {icon: propertyIcon});
                    else if(geoJsonPoint.properties.type == "Restaurant")
                        return L.marker(latlng, {icon: restaurantIcon});
                    else if(geoJsonPoint.properties.type == "Parking")
                        return L.marker(latlng, {icon: parkingIcon});
                    else if(geoJsonPoint.properties.type == "Hotel")
                        return L.marker(latlng, {icon: hotelIcon});
                    else
                        return L.marker(latlng);
                }
            })
            .bindPopup(function (layer) {
                console.log(layer);
                var popupContent = "<b>" + layer.feature.properties.name + "</b>" + "<br>" + layer.feature.properties.address + ".";
                popupContent = popupContent.concat('<br><a href="/taxpayer/', layer.feature.properties.id , '">View Details</a>');
                return popupContent;
            }).addTo(map);
        })
        .catch(function (error) {
            console.log(error);
        });
        
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
        
        var totalLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        var restaurantLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        var hotelLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        var parkirLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        var taxpayerLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        
        var theMarker;
        
        map.on('popupclose', function(e) {
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
        });
        map.on('click', function(e) {
            console.log(e);
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
        
        function getColor(pajak) {
            return  pajak > 50000000 ? '#8c2d04' :
                    pajak > 25000000 ? '#d94801' :
                    pajak > 10000000 ? '#f16913' :
                    pajak > 5000000  ? '#fd8d3c' :
                    pajak > 2500000  ? '#fdae6b' :
                    pajak > 1000000  ? '#fdd0a2' :
                    pajak > 500000   ? '#fee6ce' :
                                       '#fff5eb' ;
        }
        
        var layer = {
            "KELURAHAN"  : regionLayout,
            "TOTAL "     : totalLayout,
            "RESTAURANT" : restaurantLayout,
            "HOTEL"      : hotelLayout,
            "PARKIR"     : parkirLayout,
            "PBB"        :taxpayerLayout
        };
        
        L.control.layers(layer).addTo(map);
        
        
        
        var legend = L.control({position: 'bottomright'});
        legend.onAdd = function (map) {
            
            var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 500000, 1000000, 2500000, 5000000, 10000000, 25000000, 50000000],
            labels = [];
            
            // loop through our density intervals and generate a label with a colored square for each interval
            for (var i = 0; i < grades.length; i++) {
                div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
            }
            
            return div;
        };
        legend.addTo(map);
        
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
        
        var info = L.control();
        
        info.onAdd = function (map) {
            this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
            this.update();
            return this._div;
        };
        
        // method that we will use to update the control based on feature properties passed
        info.update = function (props) {
            this._div.innerHTML = '<h4>Pajak Per Bulan</h4>' +  (props ?
            '<b>' + props.NAME_4 + '</b><br />' + props.pajak_per_bulan + ' pajak per bulan'
            : 'Hover over a region');
        };
        
        info.addTo(map);
        
    </script>
    <style>
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
        .info {
            padding: 6px 8px;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }
        .leaflet-popup-pane, .leaflet-control {
            cursor: auto;
        }
    </style>
</main>

@endsection