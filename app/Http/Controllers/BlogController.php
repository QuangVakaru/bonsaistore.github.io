<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class BlogController extends Controller
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

    public function add_blog(){
        $this->AuthLogin();
    	return view('admin.add_blog');
    }

    public function all_blog(){

        $all_blog = DB::table('blog')->paginate();
    	$manager_blog  = view('admin.all_blog')->with('all_blog',$all_blog);
    	return view('admin_layout')->with('admin.all_blog', $manager_blog);


    }
    public function save_blog(Request $request){
        $this->AuthLogin();
    	$data = array();
    	$data['name'] = $request->ten_tintuc;;
    	$data['describe'] = $request->noidung_tintuc;
        $data['status'] = $request->trangthai_tintuc;
        $data['image'] = $request->hinhanh_tintuc;
        $get_image = $request->file('image');
      
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/blog',$new_image);
            $data['image'] = $new_image;
            DB::table('blog')->insert($data);
            Session::put('message','Thêm tin tức thành công');
            return Redirect::to('add-blog');
        }
        $data['image'] = '';
    	DB::table('blog')->insert($data);
    	Session::put('message','Thêm tin tức thành công');
    	return Redirect::to('all-blog');
    }

    public function edit_blog($blog_id){
        $this->AuthLogin();
        $edit_blog = DB::table('blog')->where('id',$blog_id)->get();
        $manager_blog  = view('admin.edit_blog')->with('edit_blog',$edit_blog);

        return view('admin_layout')->with('admin.edit_blog', $manager_blog);
    }

    public function unactive_blog($blog_id){
        $this->AuthLogin(); 
        DB::table('blog')->where('id',$blog_id)->update(['status'=>1]);
        Session::put('message','Không kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-blog');

    }
    public function active_blog($blog_id){
        $this->AuthLogin();
        DB::table('blog')->where('id',$blog_id)->update(['status'=>0]);
        Session::put('message','Kích hoạt danh mục sản phẩm thành công');
        return Redirect::to('all-blog');
    }

    public function update_blog(Request $request,$blog_id){
        $this->AuthLogin();
        $data = array();
        $data['name'] = $request->ten_tintuc;
        $data['describe'] = $request->noidung_tintuc;
        $get_image = $request->file('image');
        
        if($get_image){
                    $get_name_image = $get_image->getClientOriginalName();
                    $name_image = current(explode('.',$get_name_image));
                    $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                    $get_image->move('public/uploads/blog',$new_image);
                    $data['image'] = $new_image;
                    DB::table('blog')->where('id',$blog_id)->update($data);
                    Session::put('message','Cập nhật tin tức thành công');
                    return Redirect::to('all-blog');
        }
            
        DB::table('blog')->where('id',$blog_id)->update($data);
        Session::put('message','Cập nhật tin tức thành công');
        return Redirect::to('all-blog');
    }
    public function delete_blog($blog_id){
        $this->AuthLogin();
        DB::table('blog')->where('id',$blog_id)->delete();
        Session::put('message','Xóa thương hiệu tin tức thành công');
        return Redirect::to('all-blog');
    }

    public function blog(Request $request){

        $cate_product = DB::table('category')->where('status','0')->orderby('category_id','desc')->get(); 
        $details_blog = DB::table('blog')->get(); 
    
        return view('Frontend.pages.blog-v03')->with('category',$cate_product)->with('blog_details',$details_blog);
       }
}
