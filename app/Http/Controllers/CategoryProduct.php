<?php

namespace App\Http\Controllers;

session_start();
use Illuminate\Http\Request;
use DB;
use App\Exports\ExcelExports;
use App\Imports\ExcelImports;
use Excel;
use CategoryProductModel;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;


class CategoryProduct extends Controller
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

    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }

    public function all_category_product(){
        $this->AuthLogin();
        $all_category_product = DB::table('category')->paginate();
        $manager_category_product  = view('admin.all_category_product')->with('all_category_product',$all_category_product);
        return view('admin_layout')->with('admin.all_category_product', $manager_category_product);
    }

    public function save_category_product(Request $request){
        $data=array();
        $this->AuthLogin();
        $data['category_name'] = $request->category_product_name;
        $data['slug'] = $request->slug_category_product;
    	$data['cate_describe'] = $request->category_product_desc;
    	$data['status'] = $request->category_product_status;

        DB::table('category')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');
    }

    public function unactive_category_product($category_product_id){
        $this->AuthLogin(); 
        DB::table('category')->where('category_id',$category_product_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');

    }
    public function active_category_product($category_product_id){
        $this->AuthLogin();
        DB::table('category')->where('category_id',$category_product_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function edit_category_product($category_product_id){
        $this->AuthLogin();
        $edit_category_product = DB::table('category')->where('category_id',$category_product_id)->get();

        $manager_category_product  = view('admin.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('admin_layout')->with('admin.edit_category_product', $manager_category_product);
    }

    public function update_category_product(Request $request,$category_product_id){
        $this->AuthLogin();
        $data = array();
        $data['category_name'] = $request->category_product_name;
        $data['slug'] = $request->slug_category_product;
        $data['cate_describe'] = $request->category_product_desc;
        DB::table('category')->where('category_id',$category_product_id)->update($data);
        Session::put('message','Cập nhật danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }


    //Front end
    public function show_category_home(Request $request ,$slug_danhmuc){
        //slide
        // $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        
         $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 

         $all_product=DB::table('product')->where('status','0')->orderby(DB::raw('RAND()'))->paginate();
         
         $category_by_id = DB::table('product')->join('category','product.category_id','=','category.category_id')->where('category.slug',$slug_danhmuc)->paginate(6);
         
         $ten_danhmuc = DB::table('category')->where('category.slug',$slug_danhmuc)->limit(1)->get();       
 
         return view('Frontend.pages.category-list')->with('category',$cate_product)->with('product',$all_product)->with('category_by_id',$category_by_id)->with('ten_danhmuc',$ten_danhmuc);
     }
}
