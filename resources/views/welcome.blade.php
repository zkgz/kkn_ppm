@extends('layouts.app')
@section('content')

<main class="py-4 container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Maps</div>
                <div class="card-body" id="mapid"></div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">Information</div>
                <div class="card-body" id="mapid"></div>
            </div>
        </div>
    </div>

    <style>
        #mapid { 
            min-height: 500px; 
            transition: margin-left .5s;
        }
    </style>
    @include('inc.leaflet.imports')
    @include('inc.leaflet.base')
    @include('inc.leaflet.layers')
    @include('inc.leaflet.icons')
    @include('inc.leaflet.maps')
    @include('inc.leaflet.sidebar')
    @include('inc.leaflet.gesture')
    @include('inc.leaflet.removeMarkerOnPopupClose')
    @include('inc.leaflet.style')
    @include('inc.leaflet.popupCreateTaxpayer')
    @include('inc.leaflet.legend')
    @include('inc.leaflet.hover')

    <script>
        
        nonLabeledWorldStreet.addTo(map);

        axios.get('{{ route('api.taxpayer.index') }}')
        .then(function (response) {
            console.log(response.data);
            L.geoJSON(response.data, {
                pointToLayer: function(geoJsonPoint, latlng) {
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
        
    </script>
    
</main>

@endsection