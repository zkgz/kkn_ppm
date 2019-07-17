@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card mt-5 mb-5">
        <div class="card-header text-center">
            Tambah Data PBB
        </div>
        <div class="card-body">
            <a href="/pbb" class="btn btn-primary">kembali</a>
            <br/>
            <br/>

            {{ Form::open(['action' => 'EarthnbuildingController@store'])}}
                    
                {{Form::token()}}
                <div class="form-group">
                    {{Form::label('name','Name')}}
                    {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}
                </div>

                <div class="form-group">
                    {{Form::label('region','Kelurahan')}}
                    {{Form::text('region', '', ['class' => 'form-control', 'placeholder' => 'Kelurahan'])}}
                    @if($errors->has('region'))
                        <div class="text-danger">
                            {{ $errors->first('region')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{Form::label('alamat','Alamat')}}
                    {{Form::text('address', '', ['class' => 'form-control', 'placeholder' => 'Alamat'])}}
                    @if($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address')}}
                        </div>
                    @endif
                </div>
                
                <div class="input-group mb-3">
                    {{Form::text('building', '', ['class' => 'form-control', 'placeholder' => 'Luas Bangunan'])}}

                    @if($errors->has('building'))
                        <div class="text-danger">
                        {{ $errors->first('building') }}
                        </div>
                    @endif

                    <div class="input-group-append">
                        <span class="input-group-text">m2</span>
                    </div>
                </div>

                <div class="input-group mb-3">
                    
                    {{Form::text('soil', '', ['class' => 'form-control', 'placeholder' => 'Luas Tanah'])}}
                    @if($errors->has('soil'))
                    <div class="text-danger">
                    {{ $errors->first('soil') }}
                    </div>
                    @endif

                    <div class="input-group-append">
                        <span class="input-group-text">m2</span>
                    </div>
                </div>

                <div class="form-group">
                    {{Form::label('latitude','Latitude')}}
                    {{Form::text('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude'])}}
                    @if($errors->has('lat'))
                        <div class="text-danger">
                            {{ $errors->first('lat')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    {{Form::label('longitude','Longitude')}}
                    {{Form::text('long', '', ['class' => 'form-control', 'placeholder' => 'Longitude'])}}
                    @if($errors->has('long'))
                        <div class="text-danger">
                            {{ $errors->first('long')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    {{Form::label('information','Information')}}
                    {{Form::textarea('information', '', ['class' => 'form-control', 'placeholder' => 'Keterangan'])}}
                
                    @if($errors->has('information'))
                        <div class="text-danger">
                            {{ $errors->first('information')}}
                        </div>
                    @endif

                </div>

                <div class="form-group">
                    {!! Form::submit('Simpan', ['class' => 'btn btn-primary']) !!} 
                </div>
            
            {{ Form::close() }}
        </div>
    </div>
</div>

@endsection