@extends('layouts.app')
@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card mt-5">
            <div class="card-header text-center">
                Add New Data
            </div>
            <div class="card-body">
                
                {{ Form::open(['action' => 'TaxpayerController@store', 'enctype' => 'multipart/form-data']) }}
                {{ Form::token() }}
                
                <div class="form-group">
                    {{ Form::label('name','Name') }}
                    {{ Form::text('name', isset($_GET["region"])? $_GET["region"]:null, ['class' => 'form-control', 'placeholder' => 'Name']) }}                  
                    
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
                {{ Form::select('region',[
                    'Bacukiki' => [
                                'Galung Maloang'    => 'Galung Maloang',
                                'Lemoe'             => 'Lemoe',
                                'Lompoe'            => 'Lompoe',
                                'Watang Bacukiki'   => 'Watang Bacukiki',
                                ],
                    'Bacukiki Barat' => [
                                'Bumi Harapan'      => 'Bumi Harapan',
                                'Cappa Galung'      => 'Cappa Galung',
                                'Kampung Baru'      => 'Kampung Baru',
                                'Lumpue'            => 'Lumpue',
                                'Sumpang Minangae'  => 'Sumpang Minangae',
                                'Tiro Sompe'        => 'Tiro Sompe'
                                ],
                    'Soreang' =>  [
                                'Bukit Harapan'     => 'Bukit Harapan',
                                'Bukit Indah'       => 'Bukit Indah',
                                'Kampung Pisang'    => 'Kampung Pisang',
                                'Lakessi'           => 'Lakessi',
                                'Ujung Baru'        => 'Ujung Baru',
                                'Ujung Lare'        => 'Ujung Lare',
                                'Watang Soreang'    => 'Watang Soreang'
                                ],
                    'Ujung' => [
                                'Labukkang'         => 'Labukkang',
                                'Lapadde'           => 'Lapadde',
                                'Mallusetasi'       => 'Mallusetasi',
                                'Ujung Bulu'        => 'Ujung Bulu',
                                'Ujung Sabbang'     => 'Ujung Sabbang'
                                ],
                    ], isset($_GET["region"])? $_GET["region"]:null, ['class' => 'form-control', 'placeholder' => 'Choose Region', 'id' => 'region']) }}
                
                    <script>
                        var e = document.getElementById("region");
                        var strUser = e.options[e.selectedIndex].value;
                        console.log(strUser);
                    </script>
                @if($errors->has('region'))
                <div class="text-danger">
                    {{ $errors->first('region') }}
                </div>
                @endif
            </div>
            
            
            <div class="form-group">
                {{ Form::label('alamat','Alamat') }}
                {{ Form::textarea('address', isset($_GET["region"])? $_GET["region"]:null, ['class' => 'form-control', 'placeholder' => 'Alamat', 'rows' => '4']) }}                  
                
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
                        {{ Form::number('lat', '-4.0', ['class' => 'form-control', 'placeholder' => 'Latitude',  'step' => 'any', 'id' => 'latitude']) }}                  
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
                        {{ Form::number('long', '119.6', ['class' => 'form-control',  'step' => 'any', 'placeholder' => 'Longitude', 'id' => 'longitude']) }}                  
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
            
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        {{ Form::label('Pajak Per Bulan') }}
                        {{ Form::number('pajak_per_bulan', '', ['class' => 'form-control', 'placeholder' => 'Pajak Per Bulan', 'step' => 'any']) }}
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
                        {{ Form::number('potensi_pajak_per_bulan', '', ['class' => 'formatuang form-control', 'placeholder' => 'Potensi Pajak Per Bulan', 'step' => 'any']) }}
                        @if($errors->has('potensi_pajak_per_bulan'))
                            <div class="text-danger">
                                {{ $errors->first('potensi_pajak_per_bulan') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <div class="form-group">
                {{ Form::label('information','Information') }}
                {{ Form::textarea('information', '', ['class' => ' form-control', 'placeholder' => 'Keterangan', 'id' => 'information']) }}                  
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
@include('inc.updateMarker')
@endsection