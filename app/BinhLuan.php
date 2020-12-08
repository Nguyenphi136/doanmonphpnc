<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    //
    protected $table = "BinhLuan";
    protected $fillable = [
        'NoiDung','created_at'
    ];
    public function baiviet()
    {
        return $this->belongsTo('App\BaiViet','idBaiViet','id');
    }
    public function user()
    {
        return $this->belongsTo('App\User','idUser','id');
    }
}
