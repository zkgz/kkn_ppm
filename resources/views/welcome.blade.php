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
    @include('inc.geojson')
    <!-- Gesture Handling -->
    <link rel="stylesheet" href="//unpkg.com/leaflet-gesture-handling/dist/leaflet-gesture-handling.min.css" type="text/css">
    <script src="//unpkg.com/leaflet-gesture-handling"></script>


    <script>
        
        var map = L.map('mapid', {gestureHandling: true}).setView([-4.0185, 119.6710], 13);
        var baseUrl = "{{ url('/') }}";
        var regionLayout = L.geoJson(statesData);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        axios.get('{{ route('api.taxpayer.index') }}')
        .then(function (response) {
            console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {
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

        var noneState = {};

        var none = L.geoJson()
        var totalLayout =L.geoJson(statesData, {style: style});
        var restaurantLayout =L.geoJson(statesData, {style: style});
        var hotelLayout =L.geoJson(statesData, {style: style});
        var parkirLayout =L.geoJson(statesData, {style: style});
        var taxpayerLayout =L.geoJson(statesData, {style: style});
       

        
        var theMarker;
        
        // Untuk bin popup
        // function onEachFeature(feature, layer) {
        //     // does this feature have a property named popupContent?
        //     if (feature.properties && feature.properties.popupContent) {
        //         layer.bindPopup(feature.properties.popupContent);
        //     }
        // }

        

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
        function getColor(pajak) {
            return  pajak > 50000000 ? '#8c2d04' :
                    pajak > 25000000  ? '#d94801' :
                    pajak > 10000000  ? '#f16913' :
                    pajak > 5000000  ? '#fd8d3c' :
                    pajak > 2500000   ? '#fdae6b' :
                    pajak > 1000000   ? '#fdd0a2' :
                    pajak > 500000   ? '#fee6ce' :
                                   '#fff5eb';
        }


        var layer = {
            "KELURAHAN" : regionLayout,
            "TOTAL " : totalLayout,
            "RESTAURANT" : restaurantLayout,
            "HOTEL" : hotelLayout,
            "PARKIR" : parkirLayout,
            "PBB":taxpayerLayout
        };

        L.control.layers(layer).addTo(map);
        


    </script>
</main>

@endsection