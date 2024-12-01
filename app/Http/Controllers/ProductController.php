<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
session_start();

class ProductController extends Controller
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

    public function add_product(){
        $this->AuthLogin();
        $cate_product = DB::table('category')->orderby('category_id','desc')->get(); 
               return view('admin.add_product')->with('cate_product', $cate_product);
    	

    }
    public function all_product(){
        $this->AuthLogin();
    	$all_product = DB::table('product')
        ->join('category','category.category_id','=','product.category_id')
        ->orderby('product.product_id','desc')->paginate(5);
    	$manager_product  = view('admin.all_product')->with('all_product',$all_product);
    	return view('admin_layout')->with('admin.all_product', $manager_product);

    }
    public function save_product(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->ten_sanpham;
        $data['quantity'] = $request->soluong_sanpham;
        $data['quantity_sell'] = 0;
        $data['slug'] = $request->slug_sanpham;
    	$data['price'] = $request->gia_sanpham;
    	$data['describe'] = $request->mota_sanpham;
        $data['category_id'] = $request->product_cate;
        $data['status'] = $request->trangthai_sanpham;
        $data['weight'] = $request->trongluong_sanpham;
        $data['image'] = $request->trangthai_sanpham;
        $data['view'] = 0;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/product',$new_image);
            $data['image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }
        $data['image'] = '';
    	DB::table('product')->insert($data);
    	Session::put('message','Thêm sản phẩm thành công');
    	return Redirect::to('all-product');
    }
    public function unactive_product($product_id){
        $this->AuthLogin(); 
        DB::table('product')->where('product_id',$product_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-product');

    }
    public function active_product($product_id){
        $this->AuthLogin();
        DB::table('product')->where('product_id',$product_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function edit_product($id_sanpham){
        $this->AuthLogin();
        $cate_product = DB::table('category')->orderby('category_id','desc')->get(); 

        $edit_product = DB::table('product')->where('product_id',$id_sanpham)->get();

        $manager_product  = view('admin.edit_product')->with('edit_product',$edit_product)->with('cate_product',$cate_product);

        return view('admin_layout')->with('admin.edit_product', $manager_product);
    }
    public function update_product(Request $request,$id_sanpham){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->ten_sanpham;
        $data['quantity'] = $request->soluong_sanpham;
        $data['slug'] = $request->slug_sanpham;
        $data['price'] = $request->gia_sanpham;
        $data['describe'] = $request->mota_sanpham;
        $data['category_id'] = $request->product_cate;
        $data['weight'] = $request->trongluong;
        $data['status'] = $request->trangthai_sanpham;
        $get_image = $request->file('image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/product',$new_image);
                    $data['image'] = $new_image;
                    DB::table('product')->where('product_id',$id_sanpham)->update($data);
                    Session::put('message','Cập nhật sản phẩm thành công');
                    return Redirect::to('all-product');
        }
            
        DB::table('product')->where('product_id',$id_sanpham)->update($data);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($id_sanpham){
        $this->AuthLogin();
        DB::table('product')
        ->join('orderdetail','orderdetail.product_id','!=','product.product_id')
        ->where('product_id',$id_sanpham)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect::to('all-product');
    }

    public function details_product($slug_sanpham , Request $request){

       $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get();      

       $details_product = DB::table('product')
       ->join('category','category.category_id','=','product.category_id')
       ->where('product.slug',$slug_sanpham)->get();

       foreach($details_product as $key => $value){
           $id_danhmuc = $value->category_id;
               //seo 
               $meta_desc = $value->describe;
               $meta_keywords = $value->slug;
               $meta_title = $value->name;
               $url_canonical = $request->url();
               //--seo
           }
      
       $related_product = DB::table('product')
       ->join('category','category.category_id','=','product.category_id')
       ->where('category.category_id',$id_danhmuc)->whereNotIn('product.slug',[$slug_sanpham])->orderby(DB::raw('RAND()'))->paginate(3);

       $data=array();
       $viewSp=DB::table('product')->where('slug',$slug_sanpham)->get();
       //$idSP=$value->id_sanpham;
       $view=(int)['product.view'];
       
       
       DB::table('product')->where('product_id',$value->product_id)->update(['view'=>(int)$value->view+1]); 
           
       return view('Frontend.pages.single')->with('category',$cate_product)->with('product_details',$details_product)->with('relate',$related_product)->with('meta_desc',$meta_desc)->with('meta_title',$meta_title)->with('url_canonical',$url_canonical);
   }

   public function show_all_product(Request $request){

    $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 
    //$all_product = DB::table('product')->where('status','0')->orderby(DB::raw('RAND()'))->paginate();
    
    $min_price=Product::min('price');
    $max_price=Product::max('price');

    if(isset($_GET['start_price']) && $_GET['end_price']){
        $min_price=$_GET['start_price'];
        $max_price=$_GET['end_price'];

        $all_product=DB::table('product')->whereBetween('price',[$min_price,$max_price])->orderBy('price','ASC')->paginate();
    } 
    else{
        $all_product=DB::table('product')->where('status','0')->orderby(DB::raw('RAND()'))->paginate();
    }
    return view('Frontend.pages.category-list')->with('category',$cate_product)->with('all_product',$all_product)->with('min_price',$min_price)->with('max_price',$max_price);
   }

   public function viewcaonhat(Request $request){
    $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 

       $max_view = Product::max('view');
       $search_product = DB::table('product')->where('view',$max_view)->get();
       return view('Frontend.pages.viewcaonhat')->with('category',$cate_product)->with('search_product',$search_product);
    }

    public function loctheogia(Request $request,$from_price,$to_price){
        if(isset($_GET['to'])&& $_GET['from']){
            $from_price=$_GET['from'];
            $to_price=$_GET['to'];
        }

       $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 

       $search_product = DB::table('product')->where('price','>=',$from_price)->where('price','<=',$to_price)->order_by('price','desc')->get(); 

       return view('Frontend.pages.category-list')->with('category',$cate_product)->with('search_product',$search_product);

    }
}
