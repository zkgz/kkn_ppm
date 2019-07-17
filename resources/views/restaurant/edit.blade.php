@extends('layouts.app')
@section('content')
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Edit Data Restoran
                </div>
                <div class="card-body">
                    <a href="/restaurant" class="btn btn-primary">Kembali</a>
                    <br/>
                    <br/>
                    {{ Form::open(['action' => ['RestaurantController@update', $restaurant->id], 'method' => 'put'])}}
                        
                        {{Form::token()}}
                        
                        <div class="form-group">
                                {{Form::label('name','Name')}}
                                {{Form::text('name', $restaurant->name, ['class' => 'form-control', 'placeholder' => 'Nama'])}}                  

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                                {{Form::label('alamat','Alamat')}}
                                {{Form::textarea('address', $restaurant->address, ['class' => 'form-control', 'placeholder' => 'Alamat', 'value' => $restaurant->address])}}                  
                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                                {{Form::label('latitude','Latitude')}}
                                {{Form::text('lat', $restaurant->lat, ['class' => 'form-control', 'placeholder' => 'Latitude', 'value' => $restaurant->lat])}}                                              
                             @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            {{Form::label('longitude','Longitude')}}
                            {{Form::text('long', $restaurant->long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'value' => $restaurant->long])}}                                              
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