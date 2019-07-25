@extends('layouts.app')
@section('content')

<main class="py-4 container">
    
    <div class="card">
        <div class="card-body" id="mapid"></div>
    </div>
    <style>
        #mapid { min-height: 500px; }
    </style>
    @include('inc.leaflet.imports')
    @include('inc.leaflet.icons')
    <script>
        var restaurantMarkers = [];
        var propertyMarkers = [];
        var parkingMarkers = [];
        var hotelMarkers = [];
        //marker distributions
        axios.get('{{ route('api.taxpayer.index') }}')
        .then(function (response) {
            var data = L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {
                    var marker;
                    if(geoJsonPoint.properties.type == "Restaurant")
                    marker = L.marker(latlng, {icon: restaurantIcon});
                    else if(geoJsonPoint.properties.type == "Hotel")
                    marker = L.marker(latlng, {icon: hotelIcon});
                    else if(geoJsonPoint.properties.type == "Property")
                    marker = L.marker(latlng, {icon: propertyIcon});
                    else if(geoJsonPoint.properties.type == "Parking")
                    marker = L.marker(latlng, {icon: parkingIcon});
                    else
                    marker = L.marker(latlng);
                    
                    marker.bindPopup(function (layer) {
                        var popupContent = "<b>" + geoJsonPoint.properties.name + "</b>" + "<br>" + geoJsonPoint.properties.type + "."+ "<br>" + geoJsonPoint.properties.region;
                        popupContent = popupContent.concat('<br><a href="/taxpayer/', geoJsonPoint.properties.id , '">View Details</a>');
                        return popupContent;
                    });
                    
                    if(geoJsonPoint.properties.type == "Restaurant")
                    restaurantMarkers.push(marker);
                    else if(geoJsonPoint.properties.type == "Hotel")
                    hotelMarkers.push(marker);
                    else if(geoJsonPoint.properties.type == "Property")
                    propertyMarkers.push(marker);
                    else if(geoJsonPoint.properties.type == "Parking")
                    parkingMarkers.push(marker);
                    //marker.addTo(map);
                }
                
            });
            
            restaurantMarkers = L.layerGroup(restaurantMarkers);
            propertyMarkers = L.layerGroup(propertyMarkers);
            hotelMarkers = L.layerGroup(hotelMarkers);
            parkingMarkers = L.layerGroup(parkingMarkers);
            
            var nonLabeledWorldStreet = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
                maxZoom: 19,
                attribution: 'Tiles &copy; Esri &mdash; Source: Esri, DeLorme, NAVTEQ, USGS, Intermap, iPC, NRCAN, Esri Japan, METI, Esri China (Hong Kong), Esri (Thailand), TomTom, 2012'
            });
            var labeledWorldStreet = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            });
            
            var mapCenter = [{{  $taxpayer->lat ?? (request('latitude') ?? -4.0185)  }}, {{ $taxpayer->long ?? (request('longitude') ?? 119.6710) }}];
            var map = L.map('mapid', {
                layers: [nonLabeledWorldStreet, restaurantMarkers, propertyMarkers, parkingMarkers, hotelMarkers]
            }).setView(mapCenter, 12);
            
            var totalLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
            
            //radio button
            var baseMaps = {
                "Non-labeled Streets": nonLabeledWorldStreet,
                "Streets": labeledWorldStreet
            };
            //checkboxes
            var overlayMaps = {
                "Restaurant": restaurantMarkers,
                "Property": propertyMarkers,
                "Parking": parkingMarkers,
                "Hotel": hotelMarkers,
                "Total": totalLayout
            };
            
            L.control.layers(baseMaps, overlayMaps).addTo(map);
            
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
            }
            function resetHighlight(e) {
                totalLayout.resetStyle(e.target);
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
            var legend = L.control({position: 'bottomright'});
            legend.onAdd = function (map) {
                
                var div = L.DomUtil.create('div', 'info legend');
                
                // loop through our density intervals and generate a label with a colored square for each interval
                for (var i = 0; i < grades.length; i++) {
                    div.innerHTML +=
                    '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                    grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
                }
                
                return div;
            };
            legend.addTo(map);
        })
        .catch(function (error) {
            console.log(error);
        });
        //end of marker distributions
        
        //From Lighter to Darker color
        var colors = ['#fff7ec', '#fee8c8', '#fdd49e', '#fdbb84', '#fc8d59', '#ef6548', '#d7301f', '#990000'];
        //From Low to High
        var grades = [0, 500000, 1000000, 2500000, 5000000, 10000000, 25000000, 50000000]
        
        function getColor(pajak) {
            return  pajak > grades[7] ? colors[7] :
            pajak > grades[6] ? colors[6] :
            pajak > grades[5] ? colors[5] :
            pajak > grades[4] ? colors[4] :
            pajak > grades[3] ? colors[3] :
            pajak > grades[2] ? colors[2] :
            pajak > grades[1] ? colors[1] :
            colors[0] ;
        }
        
        
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