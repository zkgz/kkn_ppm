<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Kyslik\ColumnSortable\Sortable;

class Restaurant extends Model
{
    use SoftDeletes;
    //use Sortable;
    protected $fillable = ['name','address', 'lat', 'long', 'information'];
    protected $dates = ['deleted_at'];
    //public $sortable = ['name', 'address'];
}
