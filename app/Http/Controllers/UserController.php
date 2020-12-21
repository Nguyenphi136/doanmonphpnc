<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $user = User::all();
    return view('admin\user\DanhsachUser',['user'=>$user]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin\user\ThemUser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       /* $this->validate($request,
        [   
            'name'=>'required|min:3',
            'email'=> 'required|email|unique:user,email',
            'password'=>'required|min:3|max:32',
            'passwordAgain'=>'required|same:password'

        ],
        [
            'name.required'=>'Bạn chưa nhập name',
            'name.min'=>'Tên chuyên mục phải có độ dài từ 3 đến 100 kí tự',
            'email.required'=>'Bạn chưa nhập email',
            'email.email'=> 'Chưa nhập đúng định dạng email',
            'email.unique'=>'Email đã tồn tại',
            'password.required'=>'Bạn chưa nhập password',
            'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
            'password.max'=>'Mật khẩu chỉ tối đa 3 kí tự',
            'passwordAgain.required'=>'Ban chua nhập lai mat khau',
            'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'            
        ]
        );*/
        $user = new User;
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password =bcrypt($request->password);
        $user->quyen =$request->quyen;
        $user->save();
        return redirect('admin/user/them')->with('thongbao','them thanh công'); 

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
        $user = User::find($id);
        return view("admin/user/suauser",['user'=>$user]);
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
        $user =User::find($id);
        $this->validate($request,
        [    'password'=>'required|min:3|max:60',
        'passwordAgain'=>'required|same:password'

    ],
    [     'password.required'=>'Bạn chưa nhập password',
    'password.min'=>'Mật khẩu phải có ít nhất 3 kí tự',
    'password.max'=>'Mật khẩu chỉ tối đa 60 kí tự',
    'passwordAgain.required'=>'Ban chua nhập lai mat khau',
    'passwordAgain.same'=>'Mật khẩu nhập lại chưa khớp'            
]
);
        $user->name = $request->name;
        $user->password = Hash::make($request->password);
        
        $user->quyen =$request->quyen;
        $user->save();
        return redirect('admin/user/danhsach')->with('thongbao','update thanh công'); 
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('admin/user/danhsach')->with('thongbao','xoa thanh công'); 
    }
    public function getdangnhapAdmin(){
        return view('login');
    }
    public function postdangnhapAdmin(Request $request)
    {
        $this->validate($request,
        [    'email'=>'required',
        'password'=>'required|min:3|max:60'
    ],
    [     'email.required'=>'Bạn chưa nhập email',
    'password.required'=>'Bạn chưa nhập Password',
    'password.max'=>'Mật khẩu chỉ tối đa 60 kí tự',
    'password.min'=>'Mật khẩu chỉ tối thieu 3 kí tự'
              
]
);
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password]))
        {
            return redirect('admin/chuyenmuc/danhsach');
        }
        else
        {
            return redirect('admin/dangnhap');
        }
    }
    public function getdangxuatAdmin()
    {
        Auth::logout();
        return redirect('admin/dangnhap');
    }
}
