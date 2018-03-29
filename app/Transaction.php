<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'transactions';
    protected $casts = [
        'id' => 'string'
    ];
    protected $primaryKey = "id";
}
