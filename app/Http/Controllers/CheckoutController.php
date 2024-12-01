<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
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

    public function login(Request $request){


       $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get();

       return view('Frontend.pages.login')->with('category',$cate_product);
   }

   public function register(Request $request){


        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get();

        return view('Frontend.pages.register')->with('category',$cate_product);
    }

    public function login_customer(Request $request){

    	$email = $request->email_account;
    	$password = md5($request->password_account);
    	$result = DB::table('users')->where('email',$email)->where('password',$password)->where('role','0')->first();
    	
    	
    	if($result){          
    	Session::put('id',$result->id);
        Session::put('name',$result->name);
    		return Redirect::to('/trang-chu');
    	}else{
    		return Redirect::to('/login'); 
    	}
        Session::save();
    }

    public function add_customer(Request $request){

    	$data = array();
    	$data['name'] = $request->customer_name;
    	$data['phone'] = $request->customer_phone;
    	$data['email'] = $request->customer_email;
    	$data['password'] = md5($request->customer_password);
        $data['role']='0';

    	$customer_id = DB::table('users')->insertGetId($data);

    	Session::put('id',$customer_id);
    	Session::put('name',$request->customer_name);
    	return Redirect::to('/trang-chu');
    }

    public function checkout(Request $request){

        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get();

       return view('Frontend.pages.checkout')->with('category',$cate_product);
   }

   public function save_checkout_customer(Request $request){
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['phone'] = $request->shipping_phone;
        $data['note'] = $request->shipping_notes;
        $data['address'] = $request->shipping_address;



        $shipping_id = DB::table('shipping')->insertGetId($data);

        Session::put('id',$shipping_id);
        
        return Redirect::to('/payment');
    }

    public function payment(Request $request){

        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 
        return view('Frontend.pages.payment')->with('category',$cate_product);
    }

    public function logout_customer(){
    	Session::forget('id');
    	return Redirect::to('/login');
    }

    public function view_order($orderId){
        $this->AuthLogin();
        $order_by_id = DB::table('orders')
        ->join('users','orders.user_id','=','users.id')
        ->join('shipping','orders.shipping_id','=','shipping.id')
        ->join('orderdetail','orders.id','=','orderdetail.order_id')
        ->select('orders.*','users*','shipping.*','orderdetail.*')->first();

        $manager_order_by_id  = view('admin.view_order')->with('order_by_id',$order_by_id);
        return view('admin_layout')->with('admin.view_order', $manager_order_by_id);
        
    }

    public function order_place(Request $request){

        $total=Cart::total();
        //insert order
        $order_data = array();
        $order_data['user_id'] = Session::get('id');
        $order_data['shipping_id'] = Session::get('id');
        $order_data['coupon_id'] = null;
        //$order_data['payment_id'] = $payment_id;
        $order_data['total'] = $total;
        $order_data['status'] = 0;
        $order_data['feeship'] = 0;
        $order_id = DB::table('orders')->insertGetId($order_data);

        //insert order_details
        $content = Cart::content();
        foreach($content as $v_content){
            $order_d_data['order_id'] = $order_id;
            $order_d_data['product_id'] = $v_content->id;
            $order_d_data['product_name'] = $v_content->name;
            $order_d_data['price'] = $v_content->price;
            $order_d_data['quantity_sell'] = $v_content->qty;
            DB::table('orderdetail')->insert($order_d_data);
        }      
     
        Cart::destroy(); 
        return Redirect::to('/trang-chu');
    }
    
}
