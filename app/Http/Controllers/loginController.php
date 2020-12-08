<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;


class loginController extends Controller
{    //validate
   /* public function validate(array $data){
        return Validate::make($data,[
            'email'=> 'required|email|max:255',
            'password'=>'required|min:0',
        ]);
     }*/
   public function index()
   {
       
     /*  if($request->isMethod('post'))
       {
        $email = $request->input("email");
        $password = $request->input("password");
        if(Auth::attempt(['email'=>$email,'password'=>$password])){
            Redirect::to("/");
        }else{
            return Redirect::to("/login")->withInput()->withErrors("Email hoặc Mật khẩu không đúng !");
        }
        return back()->withInput();
       }*/
       return view('login');
   } 
}
