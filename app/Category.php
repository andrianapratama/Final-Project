<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public function ProductDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
