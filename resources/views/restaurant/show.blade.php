@extends('layouts.app')
@section('content')
<div class="py-4 container">
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Restaurant Detail</div>
            <div class="card-body">
                <table class="table table-sm">
                    <tbody>
                        <tr><td>Name</td><td>{{ $restaurant->name }}</td></tr>
                        <tr><td>Address</td><td>{{ $restaurant->address }}</td></tr>
                        <tr><td>Latitude</td><td>{{ $restaurant->lat }}</td></tr>
                        <tr><td>Longitude</td><td>{{ $restaurant->long }}</td></tr>
                        <tr><td>Information</td><td>{{ $restaurant->information }}</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                <a href="/restaurant/{{$restaurant->id}}/edit/" class="btn btn-warning">Edit</a>
                {{ Form::open(['action' => ['RestaurantController@destroy', $restaurant->id]])}}
                {{Form::hidden('_method','DELETE')}}
                    <button type="submit" class="btn btn-danger btn-sm" >Hapus</button>   
                {{ Form::close()}}
                <a href="/restaurant" class="btn btn-link">Back to index</a>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">Location</div>
            <div class="card-body" id="mapid"></div>
        </div>
    </div>
</div>
</div>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin=""/>

<style>
    #mapid { 
        height: 400px;
    }
</style>

<!-- Make sure you put this AFTER Leaflet's CSS -->
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>

<script>
    var map = L.map('mapid').setView([{{ $restaurant->lat }}, {{ $restaurant->long }}], 16);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([{{ $restaurant->lat }}, {{ $restaurant->long }}]).addTo(map).bindPopup('{!! $restaurant->name !!}');
</script>
@endsection