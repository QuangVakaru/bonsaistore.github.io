<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
//use App\Coupon;
//use Session;
//use DB;
//use Illuminate\Support\Facades\Redirect;
//session_start();

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CouponController extends Controller
{

	public function AuthLogin(){
        $admin_id = Session::get('id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

	public function unset_coupon(){
		$coupon = Session::get('coupon');
        if($coupon==true){
          
            Session::forget('coupon');
            return redirect()->back()->with('message','Xóa mã khuyến mãi thành công');
        }
	}
    public function insert_coupon(){
    	return view('admin.coupon.insert_coupon');
    }
    public function delete_coupon($coupon_id){
    	$coupon = DB::table('coupon')::find($coupon_id);
    	$coupon->delete();
    	Session::put('message','Xóa mã giảm giá thành công');
        return Redirect::to('list-coupon');
    }
    public function list_coupon(){
    	$coupon = DB::table('coupon')->orderby('id','DESC')->paginate(3);
    	return view('admin.coupon.list_coupon')->with(compact('coupon'));
    }
    public function insert_coupon_code(Request $request){

		//$this->AuthLogin();
    	$data = array();

    	//$data = $request->all();

    	//$coupon = new Coupon;

    	// $coupon->coupon_name = $data['ten_makhuyenmai'];
    	// $coupon->coupon_number = $data['giatri_khuyenmai'];
    	// $coupon->coupon_code = $data['matma_khuyenmai'];
    	// $coupon->coupon_time = $data['thoigian_khuyenmai'];
    	// $coupon->coupon_condition = $data['dieukien_khuyenmai'];
    	// $coupon->save();

		$data['name'] = $request->coupon_name;
		$data['value'] = $request->coupon_number;
		$data['code'] = $request->coupon_code;
		$data['time'] = $request->coupon_time;
		$data['status'] = $request->coupon_status;
		$data['condition'] = $request->coupon_condition;

		DB::table('coupon')->insert($data);
    	Session::put('message','Thêm mã giảm giá thành công');
        return Redirect::to('insert-coupon');

    }

	public function unactive_coupon($coupon_id){
        $this->AuthLogin(); 
        DB::table('coupon')->where('id',$coupon_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('list-coupon');

    }
    public function active_coupon($coupon_id){
        $this->AuthLogin();
        DB::table('coupon')->where('id',$coupon_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('list-coupon');
    }

}
