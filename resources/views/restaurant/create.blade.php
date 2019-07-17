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
                    
                    {{ Form::open(['action' => 'RestaurantController@store'])}}
                    
                        {{Form::token()}}
                        
                        <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nama'])}}                  
                                
                                

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                                {{Form::label('alamat','Alamat')}}
                                {{Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Alamat'])}}                  
                            
                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                                {{Form::label('latitude','Latitude')}}
                                
                                @if(isset($_GET["latitude"]))
                                    {{Form::text('lat', $_GET["latitude"], ['class' => 'form-control', 'placeholder' => 'Latitude'])}}                  
                                @else
                                    {{Form::text('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude'])}}                  
                                @endif
                             @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            {{Form::label('longitude','Longitude')}}

                            @if(isset($_GET["longitude"]))
                                {{Form::text('long', $_GET["longitude"], ['class' => 'form-control', 'placeholder' => 'Longitude'])}}                  
                            @else
                                {{Form::text('long', '', ['class' => 'form-control', 'placeholder' => 'Longitude'])}}                  
                            @endif
                            
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