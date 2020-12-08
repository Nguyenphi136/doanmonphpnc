<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChuyenMuc extends Model
{
    //
    protected $table = "ChuyenMuc";
    protected $fillable = [
        'Ten','TenKhongDau'
    ];

    public function loaichuyenmuc()
    {
        return $this->hasMany('App\LoaiChuyenMuc','idChuyenMuc','id');
    }
    public function tintuc()
        {
            return $this->hasManyThrough('App\TinTuc','App\LoaiChuyenMuc','idChuyenMuc','idLoaiChuyenMuc','id');
        }

    }
