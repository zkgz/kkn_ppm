@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
<div class="col-md-5">
    <div class="card mt-5">
        <div class="card-header text-center">
            Tambah Data PBB
        </div>
        <div class="card-body">
            <a href="/pbb" class="btn btn-primary">kembali</a>
            <br/>
            <br/>

            {{ Form::open(['action' => 'EarthnbuildingController@store'])}}
                    
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('Nama')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}
                </div>

                <div class="form-group">
                    {{Form::label('Kelurahan')}}
                    {{Form::select('region', $list_kelurahan, null, ['class' => 'form-control', 'placeholder' => 'Pilih Kelurahan..'])}}                    
                    @if($errors->has('region'))
                        <div class="text-danger">
                            {{ $errors->first('region')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{Form::label('Alamat')}}
                    {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Alamat'])}}
                    @if($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address')}}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    {{Form::label('Luas Bangunan')}}
                    <div class="input-group">
                        
                        {{Form::number('building', '', ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'Luas Bangunan'])}}

                        @if($errors->has('building'))
                            <div class="text-danger">
                            {{ $errors->first('building') }}
                            </div>
                        @endif

                        <div class="input-group-append">
                            <span class="input-group-text">m2</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    {{Form::label('Luas Tanah')}}
                    <div class="input-group">                    
                        {{Form::number('soil', '', ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'Luas Tanah'])}}
                        @if($errors->has('soil'))
                        <div class="text-danger">
                        {{ $errors->first('soil') }}
                        </div>
                        @endif
    
                        <div class="input-group-append">
                            <span class="input-group-text">m2</span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('latitude','Latitude')}}
                                @if(isset($_GET["latitude"]))
                                    {{Form::number('lat', $_GET["latitude"], ['class' => 'form-control', 'placeholder' => 'Latitude', 'id' => 'latitude'])}}     
                                    @else
                                        {{Form::number('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude', 'id' => 'latitude'])}}                  
                                @endif                  
                                    
                                @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                                @endif

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            {{Form::label('longitude','Longitude')}}
                            @if(isset($_GET["longitude"]))
                                {{Form::number('long', $_GET["longitude"], ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'longitude', 'id' => 'longitude'])}}     
                                @else
                                    {{Form::number('long', '', ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'Longitude', 'id' => 'longitude'])}}                  
                                @endif                  
                                    
                                @if($errors->has('long'))
                                <div class="text-danger">
                                    {{ $errors->first('long')}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <div id="mapid" class="rounded"></div>
                        <hr>

                        <div class="form-group">
                            {{Form::label('information','Information')}}
                            {{Form::textarea('information', '', ['class' => 'form-control', 'placeholder' => 'Keterangan'])}}                  
                            
                             @if($errors->has('information'))
                            <div class="text-danger">
                                {{ $errors->first('information')}}
                            </div>
                        @endif

                    </div>

                </div>                

                <div class="card-footer">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!} 
                    <a href="/pbb" class="btn btn-light">Cancer</a>
                </div>
            
            {{ Form::close() }}
        </div>
    </div>
</div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css"
    integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ=="
    crossorigin=""/>

<style>
    #mapid { height: 300px; }
</style>

<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"
    integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw=="
    crossorigin=""></script>
<script>
    var mapCenter = [{{ request('latitude', '-4.0185') }}, {{ request('longitude', '119.6710') }}];
    var map = L.map('mapid').setView(mapCenter, 12);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    var marker = L.marker(mapCenter).addTo(map);
    
    function updateMarker(lat, lng) {
        marker
        .setLatLng([lat, lng])
        .bindPopup("Your location :  " + marker.getLatLng().toString())
        .openPopup();
        return false;
    };

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
@endsection