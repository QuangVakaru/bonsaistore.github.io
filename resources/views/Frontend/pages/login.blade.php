@extends('layout')
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

                    <!--Form Sign In-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="signin-container">
                            <form action="{{URL::to('/login-customer')}}" method="POST">
                            {{csrf_field()}}
                                <p class="form-row">
                                    <label for="fid-name">Email:<span class="requite">*</span></label>
                                    <input type="email" id="fid-name" name="email_account" value="" class="txt-input" required>
                                </p>
                                <p class="form-row">
                                    <label for="fid-pass">Mật khẩu:<span class="requite">*</span></label>
                                    <input type="password" id="fid-pass" name="password_account" value="" class="txt-input" required>
                                </p>
                                <p class="form-row wrap-btn">
                                    <button class="btn btn-submit btn-bold" type="submit">Đăng nhập</button>
                                    <!--<a href="#" class="link-to-help">Forgot your password</a>-->
                                </p>
                            </form>
                        </div>
                    </div>

                    <!--Go to Register form-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="register-in-container">
                            <div class="intro">
                                <h4 class="box-title">Bạn là khách hàng mới ?</h4>
                                <p class="sub-title">Tạo một tài khoản với chúng tôi và bạn sẽ có thể:</p>
                                <ul class="lis">
                                    <li>Thanh toán nhanh hơn</li>
                                    <li>Tiết kiệm chi phí vận chuyển</li>
                                    <li>Theo dõi sản phẩm mới</li>
                                    <li>Nhiều thông tin mới nhất đang chờ bạn</li>
                                </ul>
                                <a href="{{URL::to('/register')}}" class="btn btn-bold">Tạo tài khoản</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection