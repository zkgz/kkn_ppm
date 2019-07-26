@extends('layouts.app')
@section('content')
<div class="form-group">
    {{ Form::open(['action' => 'TaxpayerController@importData']) }}
    {{ Form::token() }}
    
    {{ Form::label('Select one to import') }}
    {{ Form::select('choice', 
        array(
        'property', 
        'restaurant',
        'hotel',
        'parking'
        ), null, ['class' => 'form-control'])
    }}
</div>
<div class="card-footer">
    <div class="form-group">
        {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
        <a href="/taxpayer" class="btn btn-light">Cancel</a>
    </div>
    {{ Form::close() }}
</div>
@endsection