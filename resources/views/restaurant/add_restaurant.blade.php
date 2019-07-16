@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Tambah Data Restoran
                </div>
                <div class="card-body">
                    <a href="/restaurant" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    
                    <form method="post" action="/restaurant/store">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama">

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control" placeholder="Alamat"></textarea>

                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Latitude</label>
                            <input name="lat" class="form-control" placeholder="Latitude">

                             @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Longitude</label>
                            <input name="long" class="form-control" placeholder="Longitude">

                             @if($errors->has('long'))
                                <div class="text-danger">
                                    {{ $errors->first('long')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Information</label>
                            <textarea name="information" class="form-control" placeholder="Keterangan"></textarea>

                             @if($errors->has('information'))
                                <div class="text-danger">
                                    {{ $errors->first('information')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <input type="submit" class="btn btn-success" value="Simpan">
                        </div>

                    </form>

                </div>
            </div>
        </div>
@endsection