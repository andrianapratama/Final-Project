<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDesc extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'productdesc';
    protected $casts = [
        'id' => 'string'
    ];
}
