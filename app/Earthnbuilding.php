<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earthnbuilding extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'kelurahan',
        'address',
        'buildingarea',
        'surfacearea',
        'lat',
        'long',
        'information'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
