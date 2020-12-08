<?php

namespace App\Http\Controllers;
use App\ChuyenMuc;
use App\LoaiChuyenMuc;
use Illuminate\Http\Request;


class AjaxController extends Controller
{
    public function index($idChuyenMuc)
    {
        $loaichuyenmuc =LoaiChuyenMuc::where('idChuyenMuc',$idChuyenMuc)->get();
        foreach($loaichuyenmuc as $lcm)
        {
            echo "<option value='".$lcm->id."'>".$lcm->Ten."</option>";
        }
    }
}
?>