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
                    
<<<<<<< HEAD
                    {{ Form::open(['action' => ['RestaurantController@update', $restaurant->id], 'method' => 'put'])}}
                        
=======
                    {{ Form::open(['action' => ['RestaurantController@update', $restaurant->id]])}}
                    
>>>>>>> b64e1fc620652770946b4ba97da502c751525857
                        {{Form::token()}}
                        
                        <div class="form-group">
                                {{Form::label('name','Name')}}
<<<<<<< HEAD
                                {{Form::text('name', $restaurant->name, ['class' => 'form-control', 'placeholder' => 'Nama'])}}                  
=======
                                {{Form::text('name', $restaurant->namespace, ['class' => 'form-control', 'placeholder' => 'Nama'])}}                  
>>>>>>> b64e1fc620652770946b4ba97da502c751525857

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                                {{Form::label('alamat','Alamat')}}
<<<<<<< HEAD
                                {{Form::textarea('address', $restaurant->address, ['class' => 'form-control', 'placeholder' => 'Alamat', 'value' => $restaurant->address])}}                  
=======
                                {{Form::textarea('address', $restaurant->address, ['class' => 'form-control', 'placeholder' => 'Alamat'])}}                  
>>>>>>> b64e1fc620652770946b4ba97da502c751525857
                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                                {{Form::label('latitude','Latitude')}}
<<<<<<< HEAD
                                {{Form::text('lat', $restaurant->lat, ['class' => 'form-control', 'placeholder' => 'Latitude', 'value' => $restaurant->lat])}}                  
=======
                                {{Form::text('lat', $restaurant->lat, ['class' => 'form-control', 'placeholder' => 'Latitude'])}}                  
>>>>>>> b64e1fc620652770946b4ba97da502c751525857
                            
                             @if($errors->has('lat'))
                                <div class="text-danger">
                                    {{ $errors->first('lat')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            {{Form::label('longitude','Longitude')}}
<<<<<<< HEAD
                            {{Form::text('long', $restaurant->long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'value' => $restaurant->long])}}                  
=======
                            {{Form::text('long', $restaurant->long, ['class' => 'form-control', 'placeholder' => 'Longitude'])}}                  
>>>>>>> b64e1fc620652770946b4ba97da502c751525857
                            
                            
                             @if($errors->has('long'))
                                <div class="text-danger">
                                    {{ $errors->first('long')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            {{Form::label('information','Information')}}
<<<<<<< HEAD
                            {{Form::textarea('information', $restaurant->information, ['class' => 'form-control', 'placeholder' => 'Keterangan', 'value' => $restaurant->information])}}                  
=======
                            {{Form::textarea('information', $restaurant->information, ['class' => 'form-control', 'placeholder' => 'Keterangan'])}}                  
>>>>>>> b64e1fc620652770946b4ba97da502c751525857
                            
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