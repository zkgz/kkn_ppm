<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Taxpayer extends Model
{
    protected $table = 'taxpayers';    
    protected $fillable = ['name', 'type', 'region', 'address', 'lat', 'long', 'pajak_per_bulan', 'potensi_pajak_per_bulan', 'information', 'photo'];
    public $timestamps = false;
    
}
