@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card mt-5 mb-5">
            <div class="card-header text-center">
                Edit Data PBB
            </div>
            <div class="card-body">
                <a href="/pbb" class="btn btn-primary btn-sm">Kembali</a>
                
                <br/>
                <br/>

                <form action="/pbb/update/{{ $earthnbuilding->id }}" method="post">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Bangunan .." value="{{ $earthnbuilding->name }}">

                        @if($errors->has('name'))
                        <div class="text-danger">
                        {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" name="region" class="form-control" placeholder="Nama Kelurahan .." value="{{ $earthnbuilding->region }}">

                        @if($errors->has('region'))
                        <div class="text-danger">
                        {{ $errors->first('region') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" name="address" class="form-control" placeholder="Jl Jend Sudirman .." value="{{ $earthnbuilding->address }}">

                        @if($errors->has('address'))
                        <div class="text-danger">
                        {{ $errors->first('address') }}
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Kelurahan</label>
                        <input type="text" name="region" class="form-control" placeholder="Nama Kelurahan .." value="{{ $earthnbuilding->region }}">

                        @if($errors->has('name'))
                        <div class="text-danger">
                        {{ $errors->first('name') }}
                        </div>
                        @endif
                    </div>

                    <div class="input-group">
                        <label>Luas Bangunan</label>
                        <input type="text" name="building" class="form-control" aria-label="input berdasarkan ukuran meter kubik" value="{{ $earthnbuilding->building }}">

                        @if($errors->has('building'))
                        <div class="text-danger">
                        {{ $errors->first('building') }}
                        </div>
                        @endif

                        <div class="input-group-append">
                            <span class="input-group-text">m^3</span>
                        </div>
                    </div>

                    <div class="input-group">
                        <label>Luas Tanah</label>
                        <input type="text" name="soil" class="form-control" aria-label="input berdasarkan ukuran meter kubik" value="{{ $earthnbuilding->soil }}">

                        @if($errors->has('soil'))
                        <div class="text-danger">
                        {{ $errors->first('soil') }}
                        </div>
                        @endif

                        <div class="input-group-append">
                            <span class="input-group-text">m^3</span>
                        </div>
                    </div>

                    <div class="form-group">
                            <label>Latitude</label>
                            <input name="lat" class="form-control" placeholder="Latitude" value="{{ $restaurant->lat }}">

                             @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Longitude</label>
                            <input name="long" class="form-control" placeholder="Longitude" value="{{ $restaurant->long }}">

                             @if($errors->has('long'))
                                <div class="text-danger">
                                    {{ $errors->first('long')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Information</label>
                            <textarea name="information" class="form-control" placeholder="Keterangan">{{ $restaurant->information }}</textarea>

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