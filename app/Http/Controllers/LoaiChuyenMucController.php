<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ChuyenMuc;
use App\LoaiChuyenMuc;

class LoaiChuyenMucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loaichuyenmuc = LoaiChuyenMuc::all();
        return view('admin\loaichuyenmuc\listloaichuyenmuc',['loaichuyenmuc'=>$loaichuyenmuc]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chuyenmuc =ChuyenMuc::all();
        return view('admin\loaichuyenmuc\addloaichuyenmuc',['chuyenmuc'=>$chuyenmuc]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'Ten'=>'required|unique:LoaiChuyenMuc,Ten|min:1|max:100',
            'chuyenmuc'=>'required'],[
            'Ten.required'=>'Bạn chưa nhập Loại chuyên mục',
            'Ten.unique'=>'Loại chuyên mục đã tồn tại',
            'Ten.min'=>'Tên loại chuyên mục phải có độ dài từ 1 đến 100 kí tự',
            'Ten.max'=>'Tên loại chuyên mục phải có độ dài từ 1 đến 100 kí tự',
            'Chuyenmuc.required'=>'Bạn chưa chọn chuyên mục'
            
        ]);
        $loaichuyenmuc = new LoaiChuyenMuc;
        $loaichuyenmuc->Ten=$request->Ten;
        $loaichuyenmuc->TenKhongDau=str_slug($request->Ten,'-');
        $loaichuyenmuc->idChuyenMuc=$request->chuyenmuc;
        $loaichuyenmuc->save();
        return redirect('admin\loaichuyenmuc\them');
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
    {   $chuyenmuc =ChuyenMuc::all();
        $loaichuyenmuc =LoaiChuyenMuc::find($id);
        return view('admin\loaichuyenmuc\editloaichuyenmuc',['loaichuyenmuc'=>$loaichuyenmuc],['chuyenmuc'=>$chuyenmuc]); 
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
        
        $this->validate($request,
        [   
            'Ten'=>'required|unique:ChuyenMuc,Ten|min:3|max:100',
            'chuyenmuc'=>'required'
        ],
        [
            'Ten.required'=>'Bạn chưa nhập tên loại chuyên mục',
            'Ten.unique'=>'Tên Loại Chuyên Mục đã tồn tại',
            'Ten.min'=>'Tên Loại chuyên mục phải có độ dài từ 3 đến 100 kí tự',
            'Ten.max'=>'Tên Loại chuyên mục phải có độ dài từ 3 đến 100 kí tự',
            'chuyenmuc.required'=>'Bạn chưa chọn chuyên mục'
        ]
        );
        $loaichuyenmuc =LoaiChuyenMuc::find($id);
        $loaichuyenmuc->idChuyenmuc=$request->chuyenmuc;
        $loaichuyenmuc->Ten=$request->Ten;
        $loaichuyenmuc->TenKhongDau=str_slug($request->Ten,'-');
        $loaichuyenmuc->save();
        return redirect('admin\loaichuyenmuc\sua/'.$id)->with('thongbao','Bạn đã sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $loaichuyenmuc = LoaiChuyenMuc::find($id);
        $loaichuyenmuc->delete();
        return redirect('admin\loaichuyenmuc\danhsach');
    }
}