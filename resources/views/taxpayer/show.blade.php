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
                            <tr><td>Region</td><td>{{ $taxpayer->region }}</td></tr>
                            <tr><td>Address</td><td>{{ $taxpayer->address }}</td></tr>
                            <tr><td>Latitude</td><td>{{ $taxpayer->lat }}</td></tr>
                            <tr><td>Longitude</td><td>{{ $taxpayer->long }}</td></tr>
                            <tr><td>Pajak Per Bulan</td><td><label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label><label class="uang">{{ $taxpayer->pajak_per_bulan }}00</label></td></tr>
                            <tr><td>Potensi Pajak Per Bulan</td><td><label for="colFormLabelSm" class="col-form-label col-form-label-sm">Rp. </label><label class="uang">{{ $taxpayer->potensi_pajak_per_bulan }}00</label ></td></tr>
                            <tr><td>Informations</td><td>{!! $taxpayer->information !!}</td></tr>
                            <tr><td>Photo</td><br>
                            @if( ( $taxpayer->photo == NULL ) || ( $taxpayer->photo == "" ) )
                            <td><img class="rounded mx-auto d-block img-fluid" width="350px" height="6px" src="{!! url('/data_file/No_picture.png') !!}"></td></tr>
                            @else
                            <td><img class="rounded mx-auto d-block img-fluid" width="350px" src="{!! url('/data_file/'.$taxpayer->photo) !!}"></td></tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                
                <div class="card-footer">
                    @auth
                        {{ Form::open(['action' => ['TaxpayerController@destroy', $taxpayer->id]]) }}
                        {{ Form::hidden('_method','DELETE') }}
                        <a href="/taxpayer/{{$taxpayer->id}}/edit/" class="btn btn-warning">Edit</a>
                        <button type="submit" class="btn btn-danger" >Delete</button>
                    
                    @endauth
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