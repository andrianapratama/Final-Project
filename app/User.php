<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    public $timestamps = false;
    protected $table = 'users';
    protected $fillable = ['name' , 'email' , 'province', 'city', 'district', 'zip', 'phone', 'gender'];
    protected $hidden = ['password'];

    public function Invoice()
    {
        return $this->hasMany(Invoice::class);
    }


    public function User()
    {
        return $this->belongsTo(User::class);
    }

}
