<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{

    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'carts';
    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";

    public function ProductDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }

    public function Invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
