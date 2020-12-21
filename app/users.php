<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\users as Authenticatable;

class users extends Authenticatable
{
    use Notifiable;

    

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
    public function binhluan()
    {
        return $this->hasMany('App\BinhLuan','idUser','id');
    }
}
