@extends('layouts.app')
@section('content')

<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Taxpayer Details</div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr><td>Name</td><td>{{ $taxpayer->name }}</td></tr>
                            <tr><td>Type</td><td>{{ $taxpayer->type }}</td></tr>
                            <tr><td>Address</td><td>{{ $taxpayer->address }}</td></tr>
                            <tr><td>Latitude</td><td>{{ $taxpayer->lat }}</td></tr>
                            <tr><td>Longitude</td><td>{{ $taxpayer->long }}</td></tr>
                            <tr><td>Pajak Per Bulan</td><td>{{ $taxpayer->pajak_per_bulan }}</td></tr>
                            <tr><td>Potensi Pajak Per Bulan</td><td>{{ $taxpayer->potensi_pajak_per_bulan }}</td></tr>
                            <tr><td>Informations</td><td>{!! $taxpayer->information !!}</td></tr>
                            <tr><td>Photo</td><td><img class="rounded mx-auto d-block" width="350px" src="{!! url('/data_file/'.$taxpayer->photo) !!}"></td></tr>
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {{ Form::open(['action' => ['TaxpayerController@destroy', $taxpayer->id]]) }}
                    {{ Form::hidden('_method','DELETE') }}
                    <a href="/taxpayer/{{$taxpayer->id}}/edit/" class="btn btn-warning">Edit</a>
                    <button type="submit" class="btn btn-danger" >Delete</button>
                    <a href="/taxpayer" class="btn btn-link">Back to Index</a>
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