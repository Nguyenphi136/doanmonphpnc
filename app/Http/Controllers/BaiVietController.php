<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BaiViet;
use App\ChuyenMuc;
use App\LoaiChuyenMuc;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {

//        BaiViet::withTrashed()->find('1')->restore(); /** restore BaiViet deleted*/
        $baiviet = BaiViet::orderBy('id','DESC')->get();

        return view('admin\baiviet\listbaiviet',['baiviet'=>$baiviet]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $chuyenmuc= ChuyenMuc::all();
        $loaichuyenmuc =LoaiChuyenMuc::all();
        return view('admin\baiviet\addbaiviet',['chuyenmuc'=>$chuyenmuc,'loaichuyenmuc'=>$loaichuyenmuc]);
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
           // 'LoaiChuyenMuc' => 'required',
           // 'TieuDe' => 'required|min:3|unique:BaiViet,TieuDe',
          //  'TomTat' => 'required',
           // 'NoiDung' => 'required',
            'product_image' => 'mimes:jpeg,jpg,png,gif|required|max:10000'
        ],[
          //  'LoaiChuyenMuc.required'=>'Bạn chưa chọn loai chuyen muc',
           // 'TieuDe.required'=>'Bạn chưa nhập Tieu de',
           // 'TieuDe.min'=> 'Tiêu đề phải có ít nhất 3 ký tự',
           // 'TieuDe.unique'=>'Tieu Đề đã tồn tại',
           // 'TomTat.required'=>'Bạn chưa nhập tóm tắt',
           // 'NoiDung.required' => 'Bạn chưa nhập nội dung'
        ]);
        if($request->hasFile('product_image'))
        {
            $image_name = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$image_ext;
            $path =  $request->file('product_image')->storeAs('',$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noimage.jpg';
        }
        $baiviet = new BaiViet;
        $baiviet->idLoaiChuyenMuc= $request->chuyenmuc;
        $baiviet->TieuDe = $request->tieude;
        $baiviet->TieuDeKhongDau=str_slug($request->tieude,'-');
        $baiviet->TomTat = $request->tomtat;
        $baiviet->NoiDung = $request->noidung;
        $baiviet->Hinh = $fileNameToStore;
        $baiviet->NoiBat = $request->noibat;
        
        $baiviet->save();
        return redirect()->route('baiviet.index')->with('thongbao','Bạn đã sửa thành công');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {   $chuyenmuc= ChuyenMuc::all();
        $loaichuyenmuc =LoaiChuyenMuc::all();
        $baiviet = BaiViet::find($id);
        return view('admin\baiviet\editbaiviet',['baiviet'=>$baiviet,'chuyenmuc'=>$chuyenmuc,'loaichuyenmuc'=>$loaichuyenmuc]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        
//        dd($request);
        $this->validate($request,[
            'product_image' => 'mimes:jpeg,jpg,png,gif|max:10000'
        ]);
        if($request->hasFile('product_image'))
        {
            $image_name = $request->file('product_image')->getClientOriginalName();
            $filename = pathinfo($image_name,PATHINFO_FILENAME);
            $image_ext = $request->file('product_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$image_ext;
           // unlink("storage/upload/tintuc/".$baiviet->Hinh);
            $path =  $request->file('product_image')->storeAs('',$fileNameToStore);
        }
    
        else{
            $fileNameToStore = 'noimage.jpg';
        
        }
    
       

        $baiviet = BaiViet::findOrFail($id);
//        dd($baiviet);
        $baiviet->TieuDe = $request['tieude'];
        $baiviet->TieuDeKhongDau=str_slug($request->tieude,'-');
        $baiviet->TomTat = $request['tomtat'];
        $baiviet->NoiDung = $request['noidung'];
        $baiviet->Hinh = $fileNameToStore;
        $baiviet->NoiBat = $request['noibat'];
        $baiviet->idLoaiChuyenMuc = $request['loaichuyenmuc'];
        $baiviet->save();
        return redirect()->route('baiviet.index');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $baiviet=BaiViet::find($id);
        $baiviet->delete();
        return redirect()->route('baiviet.index');
        

    }
    
}
