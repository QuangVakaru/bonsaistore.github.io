<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index(){
        return view('admin_login');
    }

    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }

    public function dashboard(Request $request){
        //$data = $request->all();
        //$data = $request->validate([
            //validation laravel 
            //'admin_email' => 'required',
            //'admin_password' => 'required',
            //'g-recaptcha-response' => new Captcha(),    //dòng kiểm tra Captcha
        //]);

        $admin_email = $request->admin_email;
        $admin_password = md5($request->admin_password);

        $login = DB::table('users')->where('email',$admin_email)->where('password',$admin_password)->where('role','1')->first();
        if($login){
            Session::put('name',$login->name);
            Session::put('id',$login->id);
            return Redirect::to('/dashboard');
        } else {
            Session::put('message','mật khẩu hoặc tài khoản không đúng. Hãy nhập lại');
            return Redirect::to('/admin');
        }
    }

    public function logout(){
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);
        return Redirect::to('/admin');
    }
}
