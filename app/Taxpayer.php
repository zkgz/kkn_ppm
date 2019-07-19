<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxpayer extends Model
{
    protected $table = 'taxpayers';    
    protected $fillable = ['name','region', 'street', 'longitude', 'latitude', 'pajak_per_bulan', 'potensi_pajak_per_bulan', 'information'];
    public $timestamps = false;
    //public $sortable = ['name', 'address'];
}
