<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    //
    public function index(){

        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 
        $all_product = DB::table('product')->where('status','0')->orderby(DB::raw('RAND()'))->paginate();
        $all_coupon = DB::table('coupon')->orderby('id')->paginate();

        return view('Frontend.index')->with('category',$cate_product)->with('all_product',$all_product)->with('all_coupon',$all_coupon);
    }


    public function contact()
    {
        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get();

        return view('Frontend.pages.contact')->with('category',$cate_product);
    }
    public function notfound_404()
    {
        return view('Frontend.pages.404');
    }
    
    public function search(Request $request){

       $keywords = $request->keywords_submit;

       $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 

       $search_product = DB::table('product')->where('name','like','%'.$keywords.'%')->get(); 

       return view('Frontend.pages.search')->with('category',$cate_product)->with('search_product',$search_product);

   }

   /*public function findSlug(){

    $idView=tbl_sanpham::where('slug_sanpham',$slugView)->get();
    $postView=tbl_sanpham::with('ten_sanpham')->where('id_sanpham',$idView[0]->id)->orderBy('ten_sanpham','desc')->get();
    return view('default.pages.category-list',compact('postView','postclick'));
   }*/



   
}
