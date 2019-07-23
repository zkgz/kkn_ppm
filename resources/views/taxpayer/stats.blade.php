@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Data Pajak Per Bulan dari Wajib Pajak di Kota Parepare
        </div>
        <div class="card-body">
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Region</th>
                        <th>Restaurant</th>
                        <th>Hotel</th>
                        <th>Property</th>
                        <th>Parking</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxpayers as $taxpayer)
                    <tr>
                        <td>{{$taxpayer['Region']}}</td>
                        <td>{{$taxpayer['Restaurant']}}</td>
                        <td>{{$taxpayer['Hotel']}}</td>
                        <td>{{$taxpayer['Property']}}</td>
                        <td>{{$taxpayer['Parking']}}</td>
                        <td>{{$taxpayer['Parking'] + $taxpayer['Hotel'] + $taxpayer['Property'] + $taxpayer['Restaurant']}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection