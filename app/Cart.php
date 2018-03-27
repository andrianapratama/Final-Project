<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'carts';

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

    public function Cart()
    {
        return $this->belongsTo(Cart::class);
    }
}
