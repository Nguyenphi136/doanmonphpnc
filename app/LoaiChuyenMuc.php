<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoaiChuyenMuc extends Model
{
    //
    protected $table = "LoaiChuyenMuc";
    protected $fillable =[
      'Ten', 'TenKhongDau'
    ];
    public function chuyenmuc()
    {
        return $this->belongsTo('App\ChuyenMuc','idChuyenMuc','id');
    }
    public function baiviet()
    {
         return $this->hasMany('App\BaiViet','idLoaiChuyenMuc','id');
    }
}
