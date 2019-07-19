<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxpayer extends Model
{
    protected $table = 'taxpayers';    
    protected $fillable = ['name', 'type', 'region', 'address', 'lat', 'long', 'information'];
    public $timestamps = false;
    //public $sortable = ['name', 'address'];
}
