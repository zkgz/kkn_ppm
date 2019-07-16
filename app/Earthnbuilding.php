<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Earthnbuilding extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'region',
        'address',
        'building',
        'soil',
        'lat',
        'long',
        'information'
    ];

    protected $dates = [
        'deleted_at'
    ];
}
