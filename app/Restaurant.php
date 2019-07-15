<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use SoftDeletes;
    protected $fillable = ['name','address', 'lat', 'long', 'information'];
    protected $dates = ['deleted_at'];
}
