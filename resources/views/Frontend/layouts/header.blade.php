
    <!-- Preloader -->
    <div id="biof-loading">
        <div class="biof-loading-center">
            <div class="biof-loading-center-absolute">
                <div class="dot dot-one"></div>
                <div class="dot dot-two"></div>
                <div class="dot dot-three"></div>
            </div>
        </div>
    </div>

    <!-- HEADER -->
    <header id="header" class="header-area style-01 layout-03">
        <div class="header-top bg-main hidden-xs">
            <div class="container">
                <div class="top-bar left">
                    <ul class="horizontal-menu">
                        <li><a href="https://mail.google.com/mail/u/0/#inbox?compose=CllgCJlJVdhJdfhTLvXncxBVMGRdswTZhTdKXsHVdzmnhCnCFcgdhBfDGqcSrvPJfZntbwdvJxV"><i class="fa fa-envelope" aria-hidden="true"></i>truongdaihoccongnghesaigon@gmail.com</a></li>
                    </ul>
                </div>
                <div class="top-bar right">
                    <ul class="social-list">
                        <li><a href="https://twitter.com/i/flow/login/"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.facebook.com/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                        <li><a href="https://www.pinterest.com/"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                    </ul>
                    <ul class="horizontal-menu">
                        <?php
                                   $customer_id = Session::get('id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/logout-customer')}}" class="login-link"><i class="biolife-icon icon-login"></i>Đăng xuất</a></li>
                                
                                <?php
                            }else{
                                 ?>
                                 <li><a href="{{URL::to('/login')}}" class="login-link"><i class="biolife-icon icon-login"></i>Đăng nhập</a></li>
                                 <?php 
                             }
                                 ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-middle biolife-sticky-object ">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-2 col-md-6 col-xs-6">
                        <a href="{{URL::to('/trang-chu')}}" class="biolife-logo"><img src="{{asset('public/frontend/assets/images/organic-3-green.png')}}" alt="biolife logo" width="135" height="34"></a>
                    </div>
                    <div class="col-lg-6 col-md-7 hidden-sm hidden-xs">
                        <div class="primary-menu">
                        <ul class="menu biolife-menu clone-main-menu clone-primary-menu" id="primary-menu" data-menuname="main menu">
                            <li class="menu-item"><a href="{{URL::to('/trang-chu')}}">Trang chủ</a></li>
                        
                            <li class="menu-item">
                                <a href="{{URL::to('/show-all-product')}}" class="menu-name" data-title="Products">Sản phẩm</a>                                
                            </li>
                            <li class="menu-item">
                                <a href="{{URL::to('/blog')}}" class="menu-name" data-title="Blog">Tin tức</a>
                            </li>
                            <li class="menu-item">
                                <a href="{{URL::to('/contact')}}">Liên hệ</a>
                            </li>
                            <li class="menu-item">
                            <?php
                                   $customer_id = Session::get('id');
                                   $shipping_id = Session::get('id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <a href="{{URL::to('/checkout')}}"> Thanh toán</a>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <<a href="{{URL::to('/payment')}}">Thanh toán</a>
                                 <?php 
                                }else{
                                ?>
                                 <a href="{{URL::to('/login')}}">Thanh toán</a>
                                <?php
                                 }
                                ?>
                            </li>
                        </ul>
                    </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-md-6 col-xs-6">
                        <div class="biolife-cart-info">
                            <div class="mobile-search">
                                <a href="javascript:void(0)" class="open-searchbox"><i class="biolife-icon icon-search"></i></a>
                                <div class="mobile-search-content">
                                    <form action="#" class="form-search" name="mobile-seacrh" method="get">
                                        <a href="#" class="btn-close"><span class="biolife-icon icon-close-menu"></span></a>
                                        <input type="text" name="s" class="input-text" value="" placeholder="Nhập từ khóa tìm kiếm tại đây...">
                                        <select name="category">
                                            <option value="-1" selected>Tất cả danh mục</option>
                                        </select>
                                        <button type="submit" class="btn-submit">Tìm</button>
                                    </form>
                                </div>
                            </div>
                            <div class="minicart-block">
                                <div class="minicart-contain">
                                    <a href="{{URL::to('/show-cart')}}" class="link-to">
                                    <?php
                                        $content=Cart::content();
                                    ?>
                                            <span class="icon-qty-combine">
                                                <i class="icon-cart-mini biolife-icon"></i>
                                                <span class="qty">{{Cart::count()}}</span>
                                            </span>
                                        <!--<span class="title">My Cart -</span>-->
                                        <span class="sub-total">{{Cart::total().' '.'vnđ'}}</span>
                                    </a>
                                    <div class="cart-content">
                                        <div class="cart-inner">
                                            <ul class="products">
                                            @foreach($content as $v_content)
                                                <li>
                                                    <div class="minicart-item">
                                                        <div class="thumb">
                                                            <a ><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="90" height="90" alt="National Fresh"></a>
                                                        </div>
                                                        <div class="left-info">
                                                            <div class="product-title"><a class="product-name">{{$v_content->name}}</a></div>
                                                            <div class="price">
                                                                <ins><span class="price-amount"><span class="currencySymbol"></span>{{number_format($v_content->price).' '.'vnđ'}}</span></ins>
                                                            </div>
                                                            <div class="qty">
                                                                <label for="cart[id123][qty]">Số lượng:</label>
                                                                <input type="number" class="input-qty" name="cart[id123][qty]" id="cart[id123][qty]" value="{{$v_content->qty}}" disabled>
                                                            </div>
                                                        </div>
                                                        <div class="action">
                                                            <!--<a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>-->
                                                            <!--<a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>-->
                                                        </div>
                                                    </div>
                                                </li>
                                            @endforeach
                                            </ul>
                                            <p class="btn-control">
                                                <a href="{{URL::to('/show-cart')}}" class="btn view-cart">Xem giỏ hàng</a>
                                                <?php
                                                    $customer_id = Session::get('id');
                                                    $shipping_id = Session::get('id');
                                                    if($customer_id!=NULL && $shipping_id==NULL){ 
                                                    ?>
                                                    <a href="{{URL::to('/checkout')}}"  class="btn"> Thanh toán</a>
                                                    
                                                    <?php
                                                    }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                                    ?>
                                                    <a href="{{URL::to('/payment')}}"  class="btn">Thanh toán</a>
                                                    <?php 
                                                    }else{
                                                    ?>
                                                    <a href="{{URL::to('/login')}}" class="btn">Thanh toán</a>
                                                    </a>
                                                    <?php
                                                    }
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-toggle">
                                <a class="btn-toggle" data-object="open-mobile-menu" href="javascript:void(0)">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom hidden-sm hidden-xs">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-4">
                        <div class="vertical-menu vertical-category-block">
                            <div class="block-title">
                                <span class="menu-icon">
                                    <span class="line-1"></span>
                                    <span class="line-2"></span>
                                    <span class="line-3"></span>
                                </span>
                                <span class="menu-title">Loại sản phẩm</span>
                                <span class="angle" data-tgleclass="fa fa-caret-down"><i class="fa fa-caret-up" aria-hidden="true"></i></span>
                            </div>
                            <div class="wrap-menu">
                                <ul class="menu clone-main-menu">
                                    <li class="menu-item">
                                         @foreach($category as $key => $danhmuc)
                                        <a href="{{URL::to('/danh-muc/'.$danhmuc->slug)}}" class="menu-name" >{{$danhmuc->category_name}}</a>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 padding-top-2px">
                        <div class="header-search-bar layout-01">
                            <form action="{{URL::to('/search')}}" class="form-search" name="desktop-seacrh" method="POST">
                                {{csrf_field()}}
                                <input type="text" name="keywords_submit" class="input-text" value="" placeholder="Tìm kiếm tại đây">
                                <button type="submit" class="btn-submit"><i class="biolife-icon icon-search"></i></button>
                            </form>
                        </div>
                        <div class="live-info">
                            <p class="telephone"><i class="fa fa-phone" aria-hidden="true"></i><b class="phone-number">(+900) 123 456 7891</b></p>
                            <p class="working-time">Thứ 2- Thứ 7: 8:30am-7:30pm</p>
                            <p class="working-time">Thứ 7- Chủ nhật: 9:30am-4:30pm</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>