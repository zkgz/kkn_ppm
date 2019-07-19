@extends('layouts.app')
@section('content')

<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Restaurant Details</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr><td>Name</td><td>{{ $restaurant->name }}</td></tr>
                            <tr><td>Address</td><td>{{ $restaurant->address }}</td></tr>
                            <tr><td>Latitude</td><td>{{ $restaurant->lat }}</td></tr>
                            <tr><td>Longitude</td><td>{{ $restaurant->long }}</td></tr>
                            <tr><td>Informations</td><td>{!! $restaurant->information !!}</td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ Form::open(['action' => ['RestaurantController@destroy', $restaurant->id]]) }}
                    {{ Form::hidden('_method','DELETE') }}
                    <a href="/restaurant/{{$restaurant->id}}/edit/?longitude={{$restaurant->long}}&latitude={{$restaurant->lat}}" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger" >Delete</button>
                    <a href="/restaurant" class="btn btn-link">Back to Index</a>
                    <a href="/" class="btn btn-light">Home</a>
                    {{ Form::close() }}
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

@include('inc.map')
@endsection