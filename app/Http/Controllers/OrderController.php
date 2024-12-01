<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class OrderController extends Controller
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

    public function all_order(){
        $this->AuthLogin(); 
        $all_order = DB::table('orders')
        //->join('shipping','shipping.id','=','orders.shipping_id')
        //->join('users','users.id','=','orders.user_id')
        //->join('coupon','coupon.id','=','orders.coupon_id')->orderby('orders.id','desc')
        ->paginate(10);
    	$manager_order  = view('admin.all_order')->with('all_order',$all_order);
    	return view('admin_layout')->with('admin.all_order', $manager_order);
        
	}

	public function unactive_order($order_id){
        $this->AuthLogin(); 
        DB::table('orders')->where('id',$order_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt đơn hàng thành công');
        return Redirect::to('all-order');

    }
    public function active_order($order_id){
        $this->AuthLogin();
        DB::table('orders')->where('id',$order_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt đơn hàng thành công');
        return Redirect::to('all-order');
    }

    public function order_detail($order_id){

        $order_detail = DB::table('orderdetail')
        ->join('orders','orders.id','=','orderdetail.order_id')->where('orderdetail.order_id','=',$order_id)
        ->paginate(10);
    	$manager_order_detail  = view('admin.order_detail')->with('order_detail',$order_detail);
    	return view('admin_layout')->with('admin.order_detail', $manager_order_detail);
        
	}
}
