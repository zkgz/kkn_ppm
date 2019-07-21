@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-5">
        <div class="card mt-5">
            <div class="card-header text-center">
                Tambah Data Restoran
            </div>
            <div class="card-body">
                
                {{ Form::open(['action' => 'TaxpayerController@store']) }}
                {{ Form::token() }}
                
                <div class="form-group">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nama']) }}                  
                    
                    @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('type','Type') }}
                    {{ Form::select('type', 
                        array(
                            'Property'  => 'Property Taxes', 
                            'Restaurant'=> 'Restaurant',
                            'Hotel'     => 'Hotel',
                            'Parking'   => 'Parking'
                        ), null, ['class' => 'form-control', 'id' => 'type'])
                    }}

                    @if($errors->has('type'))
                    <div class="text-danger">
                        {{ $errors->first('type')}}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('region', 'Region') }}
                    {{ Form::text('region', '', ['class' => 'form-control', 'placeholder' => 'Region']) }}

                    @if($errors->has('region'))
                    <div class="text-danger">
                        {{ $errors->first('region') }}
                    </div>
                    @endif
                </div>
                
                <div class="form-group">
                    {{ Form::label('alamat','Alamat') }}
                    {{ Form::textarea('address', '', ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => '4']) }}                  
                    
                    @if($errors->has('address'))
                    <div class="text-danger">
                        {{ $errors->first('address') }}
                    </div>
                    @endif
                    
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('latitude','Latitude') }}
                            @if(isset($_GET["latitude"]))
                            {{ Form::number('lat', $_GET["latitude"], ['class' => 'form-control', 'step' => 'any', 'placeholder' => 'Latitude', 'id' => 'latitude']) }}     
                            @else
                            {{ Form::number('lat', '', ['class' => 'form-control', 'placeholder' => 'Latitude',  'step' => 'any', 'id' => 'latitude']) }}                  
                            @endif                  
                            
                            @if($errors->has('lat'))
                            <div class="text-danger">
                                {{ $errors->first('lat')}}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('longitude','Longitude') }}
                            @if(isset($_GET["longitude"]))
                            {{ Form::number('long', $_GET["longitude"], ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'longitude', 'id' => 'longitude']) }}     
                            @else
                            {{ Form::number('long', '', ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'Longitude', 'id' => 'longitude']) }}                  
                            @endif                  
                            
                            @if($errors->has('long'))
                            <div class="text-danger">
                                {{ $errors->first('long') }}
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                
                <div id="mapid" class="rounded"></div>
                <hr>
                
                <div class="form-group">
                    {{ Form::label('information','Information') }}
                    {{ Form::textarea('information', '', ['class' => 'form-control', 'placeholder' => 'Keterangan', 'id' => 'information']) }}                  
                    
                    @if($errors->has('information'))
                    <div class="text-danger">
                        {{ $errors->first('information') }}
                    </div>
                    @endif
                    
                </div>
                
            </div>
            <div class="card-footer">
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    <a href="/taxpayer" class="btn btn-light">Cancel</a>
                </div>
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
</div>

@include('inc.ckeditor')
@include('inc.map')
@endsection