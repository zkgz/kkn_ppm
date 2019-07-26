@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header text-center">
                Edit Data Restoran
            </div>
            <div class="card-body">
                <a href="/taxpayer/{{$taxpayer->id}}" class="btn btn-primary">Kembali</a>
                <br/>
                <br/>

                {{ Form::open(['action' => ['TaxpayerController@update', $taxpayer->id], 'enctype' => 'multipart/form-data', 'method' => 'put'])}}
                {{ Form::token() }}
                
                <div class="form-group">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name', $taxpayer->name, ['class' => 'form-control', 'placeholder' => 'Nama']) }}                  
                    
                    @if($errors->has('name'))
                    <div class="text-danger">
                        {{ $errors->first('name') }}
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
                        ), $taxpayer->type, ['class' => 'form-control', 'id' => 'type'])
                    }}

                    @if($errors->has('type'))
                    <div class="text-danger">
                        {{ $errors->first('type') }}
                    </div>
                    @endif
                </div>

                <div class="form-group">
                    {{ Form::label('region', 'Region') }}
                    {{ Form::select('region',[
                        'Bacukiki' => ['Galung Maloang' => 'Galung Maloang',
                                        'Lemoe' => 'Lemoe',
                                        'Lumpue' => 'Lumpue',
                                        'Watang Bacukiki' => 'Watang Bacukiki',],
                        'Bacukiki Barat' => ['Bumi Harapan' => 'Bumi Harapan',
                                        'Cappa Galung' => 'Cappa Galung',
                                        'Kampung Baru' => 'Kampung Baru',
                                        'Lumpue' => 'Lumpue',
                                        'Sumpang Minangae' => 'Sumpang Minangae',
                                        'Tiro Sompe' => 'Tiro Sompe'],
                        'Soreang' =>  ['Bukit Harapan' => 'Bukit Harapan',
                                        'Bukit Indah' => 'Bukit Indah',
                                        'Kampung Pisang' => 'Kampung Pisang',
                                        'Lakessi' => 'Lakessi',
                                        'Ujung Baru' => 'Ujung Baru',
                                        'Ujung Lare' => 'Ujung Lare',
                                        'Watang Soreang' => 'Watang Soreang'],
                        'Ujung' => ['Labukkang' => 'Labukkang',
                                    'Lapadde' => 'Lapadde',
                                    'Mallusetasi' => 'Mallusetasi',
                                    'Ujung Bulu' => 'Ujung Bulu',
                                'Ujung Sabbang' => 'Ujung Sabbang'],
                        ], $taxpayer->region, ['class' => 'form-control', 'placeholder' => '--Pilih Kelurahan--']) }}

                    @if($errors->has('region'))
                    <div class="text-danger">
                        {{ $errors->first('region')}}
                    </div>
                    @endif
                </div>
                
                <div class="form-group">
                    {{ Form::label('alamat','Alamat') }}
                    {{ Form::textarea('address', $taxpayer->address, ['class' => 'form-control', 'placeholder' => 'Alamat', 'value' => $taxpayer->address]) }}                  
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
                            {{ Form::number('lat', $taxpayer->lat, ['class' => 'form-control', 'placeholder' => 'Latitude', 'value' => $taxpayer->lat, 'id' => 'latitude', 'step' => 'any']) }}                                              
                            @if($errors->has('lat'))
                            <div class="text-danger">
                                {{ $errors->first('lat') }}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Longitude') }}
                            {{ Form::number('long', $taxpayer->long, ['class' => 'form-control', 'placeholder' => 'Longitude', 'value' => $taxpayer->long, 'id' => 'longitude', 'step' => 'any']) }}                                              
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
                

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Pajak Per Bulan') }}
                            {{ Form::number('pajak_per_bulan', $taxpayer->pajak_per_bulan, ['class' => 'form-control', 'placeholder' => 'Pajak Per Bulan', 'value' => $taxpayer->pajak_per_bulan, 'step' => 'any']) }}                                              
                            @if($errors->has('pajak_per_bulan'))
                            <div class="text-danger">
                                {{ $errors->first('pajak_per_bulan') }}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('Potensi Pajak Per Bulan') }}
                            {{ Form::number('potensi_pajak_per_bulan', $taxpayer->potensi_pajak_per_bulan, ['class' => 'form-control', 'placeholder' => 'Potensi Pajak Per Bulan', 'value' => $taxpayer->potensi_pajak_per_bulan, 'step' => 'any']) }}
                            @if($errors->has('potensi_pajak_per_bulan'))
                            <div class="text-danger">
                                {{ $errors->first('potensi_pajak_per_bulan') }}
                            </div>
                            @endif
                            
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    {{ Form::label('Information') }}
                    {{ Form::textarea('information', $taxpayer->information, ['class' => 'form-control', 'placeholder' => 'information', 'value' => $taxpayer->information, 'id' => 'editor', 'rows' => '6']) }} 
                    @if($errors->has('information'))
                    <div class="text-danger">
                        {{ $errors->first('information') }}
                    </div>
                    @endif
                    
                </div>
                

                <div class="form-group">
                    {{ Form::label('photo', 'Photo') }}
                    {!! Form::file('photo') !!}

                    @if($errors->has('photo'))
                    <div class="text-danger">
                        {{ $errors->first('photo') }}
                    </div>
                    @endif
                </div>

            </div>
            <div class="card-footer">
                <div class="form-group">
                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                </div>
                
                {{ Form::close() }}
                
            </div>
        </div>
    </div>
</div>

@include('inc.ckeditor')
@include('inc.map')
@include('inc.updateMarker')
@endsection