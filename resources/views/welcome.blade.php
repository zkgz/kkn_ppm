@extends('layouts.app')
@section('content')

<div class="row">
    <div class="col-md-6">
        <div class="card main-card shadow-sm">
            <h5 class="card-header text-center font-weight-bold">Maps</h5>
            <div class="card-body" id="mapid"></div>
        </div>
    </div>
    
    <div class="col-md-6" id="palatino">
        <div class="card main-card shadow-sm">
            <h5 class="card-header text-center font-weight-bold">Information</h5>
            <canvas id="myChart"></canvas>
            <div class="row">
                <div class="col-md-7">
                    <div class="card-body" id="taxpayer-info"></div>
                </div>
                <div class="col-md-5">
                    <div class="card-body pt-4 mt-4" id="taxpayer-logo"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('inc.leaflet.imports')
@include('inc.leaflet.icons')
@include('inc.leaflet.gesture')

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
                marker.info = geoJsonPoint.properties;
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
        
        restaurantMarkers = L.featureGroup(restaurantMarkers).on('mouseover', markerClick);
        propertyMarkers = L.featureGroup(propertyMarkers).on('mouseover', markerClick);
        hotelMarkers = L.featureGroup(hotelMarkers).on('mouseover', markerClick);
        parkingMarkers = L.featureGroup(parkingMarkers).on('mouseover', markerClick);
        
        var nonLabeledWorldStreet = L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager_nolabels/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
            subdomains: 'abcd',
            gestureHandling: true,
            maxZoom: 19
        });
        
        var labeledWorldStreet = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            gestureHandling: true,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        });
        
        var totalLayout = new L.GeoJSON.AJAX("{{URL::asset('taxpayer.json')}}",{style: style, onEachFeature: onEachFeature});
        var mapCenter = [{{  $taxpayer->lat ?? (request('latitude') ?? -4.0185)  }}, {{ $taxpayer->long ?? (request('longitude') ?? 119.6710) }}];
        var map = L.map('mapid', {
            layers: [labeledWorldStreet, restaurantMarkers, propertyMarkers, parkingMarkers, hotelMarkers, totalLayout],
        }).setView(mapCenter, 12);
        
        
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
            // Hover only
            info.update(layer.feature.properties);
            
            regionCreateChart(layer.feature.properties);
        }
        
        function resetHighlight(e) {
            totalLayout.resetStyle(e.target);
            // Hover only
            info.update();
        }
        
        var theMarker;
    
        function addMarker(e) {
            console.log(e.target.feature.properties);
            let latitude = e.latlng.lat.toString().substring(0, 15);
            let longitude = e.latlng.lng.toString().substring(0, 15);
            
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
            var kelurahan = e.target.feature.properties.NAME_4;
            var popupContent = "Your location : " + latitude + ", " + longitude + ".";
            popupContent += '<br><a href="{{ route('taxpayer.create') }}?latitude=' + latitude + '&longitude=' + longitude + '&region='+kelurahan+'">Add new taxpayer here</a>';
            theMarker = L.marker([latitude, longitude]).addTo(map);
            theMarker.bindPopup(popupContent)
            .openPopup();
        }
      
       
        function onEachFeature(feature, layer) {
            layer.on({
                mouseover: highlightFeature,
                mouseout: resetHighlight,
                click: addMarker
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
        
        var info = L.control();
        
        info.onAdd = function (map) {
            return this.update();
        };
        
        map.on('popupclose', function(e) {
            if (theMarker != undefined) {
                map.removeLayer(theMarker);
            };
        });
        
        // method that we will use to update the control based on feature properties passed
        info.update = function (props) {
            document.getElementById("taxpayer-info").innerHTML = '<h4>Kelurahan ' +  (props ?
                props.NAME_4 + "</h4>" +
                "Pajak per bulan : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.pajak_per_bulan).format('0,0.00') + "<br/>" +
                "Hotel : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.hotel).format('0,0.00') + "<br/>" +
                "Restoran : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.restaurant).format('0,0.00') + "<br/>" +
                "Parkir : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.parking).format('0,0.00') + "<br/>" +
                "PBB : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.property).format('0,0.00') + "<br/>" +
                "Potensi pajak per bulan : " + '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> ' +
                numeral(props.potensi_pajak_per_bulan).format('0,0.00') + "<br/>"
                : 'belum dipilih <br> Arahkan kursor ke suatu wilayah');
            };
            
            info.addTo(map);
        })
        .catch(function (error) {
            console.log(error);
        });
        //end of marker distributions
        
        //From Lighter to Darker color
        var colors = ['#fff7ec', '#fee8c8', '#fdd49e', '#fdbb84', '#fc8d59', '#ef6548', '#d7301f', '#990000'];
        //From Low to High
        var grades = [0, 1000000, 2500000, 5000000, 10000000, 25000000, 50000000, 100000000]
        
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
        
        function markerClick(event) {
            var marker = event.layer;
            document.getElementById("taxpayer-info").innerHTML = '<h4>Wajib Pajak</h4>' +  
            marker.info.name + "<br/>" + 
            marker.info.type + "<br/>" + 
            "Kelurahan : " + marker.info.region + "<br/>" + 
            "Pajak Per Bulan : " +
            '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label> '
            + numeral(marker.info.pajak_per_bulan).format('0,0.00') + "</label><br/>" +
            "Potensi pajak Per Bulan : " + 
            '<label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label>'
            + numeral(marker.info.potensi_pajak_per_bulan).format('0,0.00') + "</label><br/>";
            markerCreateChart(marker.info);
        }
        var myChart;
        function regionCreateChart(props) {
            var logo = document.getElementById('taxpayer-logo');
            logo.innerHTML='';
            var ctx = document.getElementById('myChart');
            
            if(myChart != undefined) {
                myChart.destroy();
            }
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Hotel", "Restaurant", "Property", "Parking"],
                    datasets: [
                    {
                        label: "Pajak",
                        backgroundColor: "rgba(255, 99, 132, 0.5)",
                        borderColor: ["rgba(255, 99, 132, 1)"],
                        data: [props.hotel, props.restaurant, props.property, props.parking]
                    }, {
                        label: "Potensi Pajak",
                        backgroundColor: "rgba(54, 162, 235, 0.5)",
                        borderColor: ["rgba(54, 162, 235, 1)"],
                        data: [props.potensiHotel, props.potensiRestaurant, props.potensiProperty, props.potensiParking]
                    }],
                     
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    if(parseInt(value) >= 1000){
                                        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'.00';
                                    } else {
                                        return 'Rp. ' + value+'.00';
                                    }
                                }
                            }
                        }]
                    },tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                                })+".00";
                            }
                        }
                    }
                }
            });
            
            
        }
        function markerCreateChart(props) {
            console.log(props);
            var logo = document.getElementById('taxpayer-logo');
            if(props.type=="Restaurant"){
                logo.innerHTML='<img src="{{URL::asset('/map-marker/restaurant-64.png')}}" class="rounded" alt="Restaurant logo">';
            } else if(props.type=="Hotel"){
                logo.innerHTML='<img src="{{URL::asset('/map-marker/hotel-64-4.png')}}" class="rounded" alt="Restaurant logo">';
            } else if(props.type=="Property"){
                logo.innerHTML='<img src="{{URL::asset('/map-marker/property-64-3.png')}}" class="rounded" alt="Restaurant logo">';
            } else if(props.type=="Parking"){
                logo.innerHTML='<img src="{{URL::asset('/map-marker/parking-64-2.png')}}" class="rounded" alt="Restaurant logo">';
            }
            var ctx = document.getElementById('myChart');
            if(myChart != undefined) {
                myChart.destroy();
            }
            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Pajak per bulan', 'Potensi pajak per bulan'],
                    datasets: [{
                        label: 'Pajak',
                        data: [props.pajak_per_bulan, props.potensi_pajak_per_bulan],
                        backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)'
                        ],
                        borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true,
                                callback: function(value, index, values) {
                                    if(parseInt(value) >= 1000){
                                        return 'Rp. ' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",")+'.00';
                                    } else {
                                        return 'Rp. ' + value+'.00';
                                    }
                                }
                            }
                        }]
                    },tooltips: {
                        callbacks: {
                            label: function(tooltipItem, data) {
                                return "Rp. " + Number(tooltipItem.yLabel).toFixed(0).replace(/./g, function(c, i, a) {
                                return i > 0 && c !== "." && (a.length - i) % 3 === 0 ? "," + c : c;
                                })+".00";
                            }
                        }
                    }
                }
            });
            
        }
</script>


@endsection