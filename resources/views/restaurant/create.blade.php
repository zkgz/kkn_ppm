@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Tambah Data Restoran
                </div>
                <div class="card-body">
                    
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
                                {{Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => '4'])}}                  
                            
                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                        {{Form::label('latitude','Latitude')}}
                                        {{Form::text('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude'])}}                  
                                    
                                    @if($errors->has('lat'))
                                        <div class="text-danger">
                                            {{ $errors->first('lat')}}
                                        </div>
                                    @endif

                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{Form::label('longitude','Longitude')}}
                                    {{Form::text('long', '', ['class' => 'form-control', 'placeholder' => 'Longitude'])}}                  
                                    
                                    
                                    @if($errors->has('long'))
                                        <div class="text-danger">
                                            {{ $errors->first('long')}}
                                        </div>
                                    @endif
                                </div>
                            </div>
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
                        
                        <div id="mapid"></div>

                        <div class="form-group">
                            {!! Form::submit('Simpan', ['class' => 'btn btn-success']) !!}
                            <a href="/restaurant" class="btn btn-light">Cancel</a>
                        </div>

                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection