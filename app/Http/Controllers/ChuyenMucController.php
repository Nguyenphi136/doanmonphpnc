<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;
class ChuyenMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chuyenmuc = ChuyenMuc::all();
        return view('admin\chuyenmuc\listchuyenmuc',['chuyenmuc'=>$chuyenmuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\chuyenmuc\addchuyenmuc');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $chuyenmuc =new ChuyenMuc ;
       $chuyenmuc->Ten=$request->Ten;
       $chuyenmuc->TenKhongDau=str_slug($request->Ten,'-');
       $chuyenmuc->save();
       return redirect()->route('chuyenmuc.index');
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
        $chuyenmuc = ChuyenMuc::find($id);
        return view('admin\chuyenmuc\editchuyenmuc',['chuyenmuc'=>$chuyenmuc]);
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
        $chuyenmuc = ChuyenMuc::find($id);
        $this->validate($request,
        [   
            'Ten'=>'
            required|unique:ChuyenMuc,Ten|min:3|max:100'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên chuyên mục',
            'Ten.unique'=>'Tên chuyên mục đã tồn tại',
            'Ten.min'=>'Tên chuyên mục phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên chuyên mục phải có độ dài từ 3 đến 100 kí tự'
        ]
        );
        $chuyenmuc->Ten=$request->Ten;
        $chuyenmuc->TenKhongDau=str_slug($request->Ten,'-');
        $chuyenmuc->save();
        return redirect('admin\chuyenmuc\sua/'.$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $chuyenmuc = ChuyenMuc::find($id);
        $chuyenmuc->delete();
        return redirect()->route('chuyenmuc.index');
    }
}
