@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5 mb-5 text-center">
        Data Pajak Bumi dan Bangunan Kota Parepare
    </div>
    <div class="card-body">
        <a href="/pbb/add" class="btn btn-primary btn-sm">Input PBB Baru</a>
        <br/>
        <br/>
        <table class="table table-hover table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelurahan</th>
                    <th>Alamat</th>
                    <th>Luas Bangunan</th>
                    <th>Luas Tanah</th>
                    <th>Latitude</th>
                    <th>Longtitude</th>
                    <th>Informasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($earthnbuilding as $enb)
                <tr>
                    <td>{{ $enb->name }}</td>
                    <td>{{ $enb->region }}</td>
                    <td>{{ $enb->address }}</td>
                    <td>{{ $enb->building }}</td>
                    <td>{{ $enb->soil }}</td>
                    <td>{{ $enb->lat }}</td>
                    <td>{{ $enb->long }}</td>
                    <td>{{ $enb->information }}</td>
                    <td>
                        <a href="/pbb/edit/{{ $enb->id }}" class="btn btn-warning btn-sm">edit</a>
                        <a href="/pbb/delete/{{ $enb->id }}" class="btn btn-danger btn-sm">hapus</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    </div>
    @endsection