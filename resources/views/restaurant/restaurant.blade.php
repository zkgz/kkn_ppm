@extends('layouts.app')
    @section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Data Restoran di Kota Parepare
                </div>
                <div class="card-body">
                    <a href="/restaurant/add" class="btn btn-primary">Input Restoran Baru</a>
                    <br/>
                    <br/>
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Latitude</th>
                                <th>Longitudes</th>
                                <!-- <th>Information</th> -->
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($restaurant as $rs)
                            <tr>
                                <td>{{ $rs->name }}</td>
                                <td>{{ $rs->address }}</td>
                                <td>{{ $rs->lat }}</td>
                                <td>{{ $rs->long }}</td>
                                <!-- <td>{{ $rs->information }}</td> -->
                                <td>
                                    <a href="/restaurant/edit/{{ $rs->id }}" class="btn btn-warning btn-sm">Edit</a>
                                    <!-- <a href="/restaurant/delete/{{ $rs->id }}" class="btn btn-danger btn-sm">Hapus</a> -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @endsection
