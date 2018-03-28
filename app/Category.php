<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'categories';
    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";

    public function ProductDetail()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
