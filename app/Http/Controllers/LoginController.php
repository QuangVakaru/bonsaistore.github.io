<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    //
    public function postLogin(Request $request){
        $data=$request->all();
        if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'status'=>'0'])){

            Session::put('user',$data['email']);
            request()->session()->flash('success','Đăng nhập thành công');
            return redirect()->route('home');
        } else{
            request()->session()->flash('error','Đăng nhập thất bại');
            return back();
        }
    }
}
