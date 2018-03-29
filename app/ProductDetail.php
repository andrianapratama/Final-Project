<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'product_details';
    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";

    public function ProductDesc()
    {
        return $this->hasMany(ProductDesc::class);
    }

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function ProductDetail()
    {
        return $this->belongsTo(ProductDetail::class);
    }
}