@extends('layouts.app')
@section('content')
<div class="py-4 container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">PBB Detail</div>
                <div class="card-body">
                    <div class="table table-sm">
                        <table class="table table-sm">
                            <tbody>
                                <tr><td>Name</td><td>{{ $earthnbuilding->name }}</td></tr>
                                <tr><td>Kelurahan</td><td>{{ $earthnbuilding->region }}</td></tr>
                                <tr><td>Alamat</td><td>{{ $earthnbuilding->address }}</td></tr>
                                <tr><td>Luas Tanah</td><td>{{ $earthnbuilding->building }}</td></tr>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>