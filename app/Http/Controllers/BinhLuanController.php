<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiViet;
use App\User;
use App\BinhLuan;

class BinhLuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $binhluan = BinhLuan::all();
        return view('admin\binhluan\duyetbinhluan',['binhluan'=>$binhluan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $binhluan = BinhLuan::find($id);
        $binhluan->delete();
        return redirect()->route('binhluan.index');
    }
    public function xoabinhluan($id )
 {
   // $baiviet = BaiViet::find($id);
     $binhluan = BinhLuan::find($id);
     $binhluan->delete();
     return redirect('admin/baiviet/binhluan');
 }
    public function duyet($id)
    {
        $binhluan = BinhLuan::find($id);
        $binhluan->DaDuyet=1;
        
        $binhluan->save();
        return redirect()->route('binhluan.index');
    }

}
