@extends('Frontend.layouts.master')
@section('main-content')
    <!--Hero Section-->
    <div class="hero-section hero-background">
        <h1 class="page-title">Bonsai Store</h1>
    </div>

    <!--Navigation section-->
    <div class="container">
        <nav class="biolife-nav">
            <ul>
                <li class="nav-item"><a href="{{URL::to('/trang-chu')}}" class="permal-link">Trang chủ</a></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain login-page">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container">

                <div class="row">

                    <!--Form Register-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="{{URL::to('/add-customer')}}"  method="POST">
                            {{ csrf_field() }}
                                <p class="form-row">
                                    <label for="fid-name">Họ và Tên:<span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="customer_name" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Email:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="customer_email" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-name">Số điện thoại: <span class="requite">*</span></label>
                                    <input type="text" id="fid-name" name="customer_phone" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Mật khẩu:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="customer_password" value="" class="txt-input" required>
                                </p>
                                <!--<p class="form-row">
                                    <label for="fid-pass">Xác nhận mật khẩu:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="cf_password" value="" class="txt-input">
                                </p>-->
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit">Đăng ký</button>
                                    <!--<a href="#" class="link-to-help">Forgot your password</a>-->
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Login form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Bạn đã có tài khoản </h4>
                                <a href="{{URL::to('/login')}}" class="btn btn-bold">Đăng nhập ngay</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection