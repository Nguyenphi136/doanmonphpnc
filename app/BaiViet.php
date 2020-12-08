<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BaiViet extends Model
{
    use SoftDeletes;
    protected $softDelete = true;
    protected $table = "BaiViet";
    protected $fillable =[
        'TieuDe','TieuDeKhongDau','TomTat','NoiDung','Hinh','NoiBat','SoLuotXem','idLoaiChuyenMuc'
    ];
    public function loaichuyenmuc()
    {
        return $this->belongsTo('App\LoaiChuyenMuc','idLoaiChuyenMuc','id');
    }
    public function binhluan()
    {
        return $this->hasMany('App\BinhLuan','idBaiViet','id');
    }
}
