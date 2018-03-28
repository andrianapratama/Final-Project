<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'invoices';
    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";
}
