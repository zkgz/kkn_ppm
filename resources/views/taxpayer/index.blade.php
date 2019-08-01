@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Data Restoran di Kota Parepare
        </div>
        <div class="card-body">
            @auth
                <a href="/taxpayer/create" class="btn btn-primary">New Taxpayer</a>
                <br/>
                <br/>
            @endauth
            <table id="table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Region</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($taxpayer as $rs)
                    <tr>
                        <td>{{ $rs->name }}</td>
                        <td>{{ $rs->type }}</td>
                        <td>{{ $rs->region }}</td>
                        <td>
                            <a href="/taxpayer/{{ $rs->id }}">Details</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
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
