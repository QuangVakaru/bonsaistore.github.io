<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DeliveryController extends Controller
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

    public function all_delivery(){

        $all_delivery = DB::table('shipping')->paginate();
    	$manager_delivery  = view('admin.delivery.all_delivery')->with('all_delivery',$all_delivery);
    	return view('admin_layout')->with('admin.delivery.all_delivery', $manager_delivery);
	}
}
