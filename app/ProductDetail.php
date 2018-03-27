<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $table = 'product_details';

    public function ProductDesc()
    {
        return $this->hasMany(ProductDesc::class);
    }

    public function ProductDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}
