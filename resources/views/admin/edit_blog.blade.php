@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Cập nhật tin tức
                        </header>
                         <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($edit_blog as $key => $pro)
                                <form role="form" action="{{URL::to('/update-blog/'.$pro->id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên tin tức</label>
                                    <input type="text" name="ten_tintuc" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$pro->name}}">
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh tin tức</label>
                                    <input type="file" name="hinhanh_tintuc" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/blog/'.$pro->image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung tin tức</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="noidung_tintuc" id="ckeditor2">{{$pro->describe}}</textarea> 
                                </div>
                               
                                <button type="submit" name="add_blog" class="btn btn-info">Cập nhật tin tức</button>
                                </form>
                                @endforeach
                            </div>

                        </div>
                    </section>

            </div>
@endsection