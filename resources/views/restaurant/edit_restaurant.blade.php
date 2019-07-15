<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">
        <title>Edit Restaurant - KKN PPM</title>
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <div class="card-header text-center">
                    Edit Data Restoran
                </div>
                <div class="card-body">
                    <a href="/restaurant" class="btn btn-primary">Kembali</a>
                    
                    <br/>
                    <br/>

                    <form method="post" action="/restaurant/update/{{ $restaurant->id }}">

                        {{ csrf_field() }}
                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="name" class="form-control" placeholder="Nama pegawai .." value="{{ $restaurant->name }}">

                            @if($errors->has('name'))
                                <div class="text-danger">
                                    {{ $errors->first('name')}}
                                </div>
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="address" class="form-control" placeholder="Alamat">{{ $restaurant->address }}</textarea>

                             @if($errors->has('address'))
                                <div class="text-danger">
                                    {{ $errors->first('address')}}
                                </div>
                            @endif

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
    </body>
</html>