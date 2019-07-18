@extends('layouts.app')
@section('content')
<div class="container">
    <div class="card mt-5">
        <div class="card-header text-center">
            Data Pajak Bumi dan Bangunan Kota Parepare
        </div>
        <div class="card-body">
            <a href="/pbb/create" class="btn btn-primary btn-sm">Input PBB Baru</a>
            <br/>
            <br/>
            <table id="table" class="table table-hover table-bordered table-striped">
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
                        <th>Action</th>
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
                            
                            <a href="/pbb/{{ $enb->id }}/edit?longitude={{$enb->long}}&latitude={{$enb->lat}}" class="btn btn-warning btn-sm">Edit</a>
                            {{ Form::open(['action' => ['EarthnbuildingController@destroy', $enb->id]])}}
                            {{Form::hidden('_method','DELETE')}}
                            {{ Form::submit('Hapus', ['class' => 'btn btn-danger btn-sm']) }}
                            {{ Form::close()}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection