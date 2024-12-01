@extends('layout')
@section('main-content')

<!-- Page Contain -->
<div class="page-contain">

    <!-- Main content -->
    <div id="main-content" class="main-content">

        <!--Block 01: Main slide-->
        <div class="main-slide block-slider">
            <ul class="biolife-carousel nav-none-on-mobile" data-slick='{"arrows": true, "dots": false, "slidesMargin": 0, "slidesToShow": 1, "infinite": true, "speed": 800}' >
                <li>
                    <div class="slide-contain slider-opt03__layout01">
                        <div class="media">
                            <div class="child-elememt">
                                <a href="{{URL::to('/show-all-product')}}" class="link-to">
                                    <img src="{{asset('public/frontend/assets/images/home-03/slide-02-child-02.png')}}" width="604" height="580" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="text-content">
                            <i class="first-line">Nhiều cây cảnh độc lạ</i>
                            <h3 class="second-line">Với giá cả phải chăng</h3>
                            <p class="third-line">Đã có sẵn tại shop</p>
                            <p class="buttons">
                                <a href="{{URL::to('/show-all-product')}}" class="btn btn-bold">Mua ngay</a>
                            </p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="slide-contain slider-opt03__layout01">
                        <div class="media">
                            <div class="child-elememt"><a href="{{URL::to('/show-all-product')}}" class="link-to"><img src="{{asset('public/frontend/assets/images/home-03/slide-02-child-02.png')}}" width="604" height="580" alt=""></a></div>
                        </div>
                        <div class="text-content">
                        <i class="first-line">Nhiều cây cảnh độc lạ</i>
                            <h3 class="second-line">Với giá cả phải chăng</h3>
                            <p class="third-line">Đã có sẵn tại shop</p>
                            <p class="buttons">
                                <a href="{{URL::to('/show-all-product')}}" class="btn btn-bold">Mua ngay</a>
                            </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>

        <!--Block 02: Banner-->
        <div class="special-slide">
            <div class="container">
                <div class="biolife-service type01 biolife-service__type01 sm-margin-top-0 xs-margin-top-45px">
                    <b class="txt-show-01">Bonsai</b>
                    <i class="txt-show-02">Tưng bừng khuyến mãi</i>
                    <ul class="services-list">
                    @foreach($all_coupon as $key => $cou)
                        <li>
                            <div class="service-inner">
                                <span class="number">{{ $cou->id}}</span>
                                <span class="biolife-icon icon-schedule"></span>
                                <a class="srv-name">{{ $cou->coupon_name}}</a>
                                <a class="srv-name">{{ $cou->code }}</a>
                            </div>
                        </li>

                    @endforeach                       
                    </ul>
                </div>
            </div>
        </div>

        <!--Block 03: Product Tab-->
        <div class="product-tab z-index-20 sm-margin-top-193px xs-margin-top-30px">
            <div class="container">
                <div class="biolife-title-box">
                    <span class="subtitle">Sản phẩm mới nhất</span>
                    <!--<h3 class="main-title">Sản phẩm liên quan</h3>-->
                </div>
            
                    <div class="tab-content">
                    
                        <div id="tab01_1st" class="tab-contain active">
                        
                            <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile eq-height-contain" data-slick='{"rows":2 ,"arrows":true,"dots":false,"infinite":true,"speed":400,"slidesMargin":10,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":25 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":15}}]}'>
                            @foreach($all_product as $key => $product)
                                <li class="product-item">
                                    <div class="contain-product layout-default">
                                        <div class="product-thumb">
                                            <a href="{{URL::to('/chi-tiet/'.$product->slug)}}" class="link-to-product">
                                                <img src="{{URL::to('public/uploads/product/'.$product->image)}}" alt="Vegetables" width="270" height="270" class="product-thumnail">
                                            </a>
                                            <a class="lookup btn_call_quickview" href="{{URL::to('/chi-tiet/'.$product->slug)}}"><i class="biolife-icon icon-search"></i></a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="{{URL::to('/chi-tiet/'.$product->slug)}}" class="pr-name">{{$product->name}}</a></h4>
                                            <div class="price ">
                                                <ins><span class="price-amount"><span class="currencySymbol">{{number_format($product->price,0,',','.').' '.'VNĐ'}}</ins>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn vệ sinh thực phẩm.</p>
                                                <div class="buttons">
                                                    <a href="{{URL::to('/chi-tiet/'.$product->slug)}}" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Xem chi tiết</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>

        <!--Block 04: Banner Promotion 01 -->
        <!--<div class="banner-promotion-01 xs-margin-top-50px sm-margin-top-11px">
            <div class="biolife-banner promotion biolife-banner__promotion">
                <div class="banner-contain">
                    <div class="media background-biolife-banner__promotion">
                        <div class="img-moving position-1">
                            <img src="{{asset('public/frontend/assets/images/home-03/img-moving-pst-1.png')}}" width="149" height="139" alt="img msv">
                        </div>
                        <div class="img-moving position-2">
                            <img src="{{asset('public/frontend/assets/images/home-03/img-moving-pst-2.png')}}" width="185" height="265" alt="img msv">
                        </div>
                        <div class="img-moving position-3">
                            <img src="{{asset('public/frontend/assets/images/home-03/img-moving-pst-3-cut.png')}}" width="384" height="151" alt="img msv">
                        </div>
                        <div class="img-moving position-4">
                            <img src="{{asset('public/frontend/assets/images/home-03/img-moving-pst-4.png')}}" width="198" height="269" alt="img msv">
                        </div>
                    </div>
                    <div class="text-content">
                        <div class="container text-wrap">
                            <i class="first-line">Healthy Fruit juice</i>
                            <span class="second-line">Vegetable Always fresh</span>
                            <p class="third-line">Food Heaven Made Easy sounds like the name of an amazingly delicious food delivery service, but don't be fooled...</p>
                            <div class="product-detail">
                                <p class="txt-price"><span>Only:</span>$8.00</p>
                                <a href="#" class="btn add-to-cart-btn">add to cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
        <!--Block 07: Brands-->
        <div class="brand-slide sm-margin-top-100px background-fafafa xs-margin-top-80px xs-margin-bottom-80px">
            <div class="container">
                <ul class="biolife-carousel nav-center-bold nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":4, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3}},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}},{"breakpoint":450, "settings":{ "slidesToShow": 1, "slidesMargin":10}}]}'>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-01.jpg')}}" width="214" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-02.jpg')}}" width="214" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-03.jpg')}}" width="153" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-04.jpg')}}" width="224" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-01.jpg')}}" width="214" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-02.jpg')}}" width="214" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-03.jpg')}}" width="153" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="biolife-brd-container">
                            <a href="#" class="link">
                                <figure><img src="{{asset('public/frontend/assets/images/home-03/brd-04.jpg')}}" width="224" height="163" alt=""></figure>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <!--Block 08: Blog Posts-->
        <!--<div class="blog-posts sm-margin-top-93px sm-padding-top-72px xs-padding-bottom-50px">
            <div class="container">
                <div class="biolife-title-box">
                    <span class="subtitle">The freshest and most exciting news</span>
                    <h3 class="main-title">From the Blog</h3>
                </div>
                <ul class="biolife-carousel nav-center nav-none-on-mobile xs-margin-top-36px" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":30,"slidesToShow":3, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 3}},{"breakpoint":992, "settings":{ "slidesToShow": 2}},{"breakpoint":768, "settings":{ "slidesToShow": 2}},{"breakpoint":600, "settings":{ "slidesToShow": 1}}]}'>
                    <li>
                        <div class="post-item effect-01 style-bottom-info layout-02 ">
                            <div class="thumbnail">
                                <a href="#" class="link-to-post"><img src="{{asset('public/frontend/assets/images/our-blog/post-thumb-01.jpg')}}" width="370" height="270" alt=""></a>
                                <div class="post-date">
                                    <span class="date">26</span>
                                    <span class="month">dec</span>
                                </div>
                            </div>
                            <div class="post-content">
                                <h4 class="post-name"><a href="#" class="linktopost">Ashwagandha: The #1 Herb in the World for Anxiety?</a></h4>
                                <div class="post-meta">
                                    <a href="#" class="post-meta__item author"><img src="{{asset('public/frontend/assets/images/home-03/post-author.png')}}" width="28" height="28" alt=""><span>Admin</span></a>
                                    <a href="#" class="post-meta__item btn liked-count">2<span class="biolife-icon icon-comment"></span></a>
                                    <a href="#" class="post-meta__item btn comment-count">6<span class="biolife-icon icon-like"></span></a>
                                    <div class="post-meta__item post-meta__item-social-box">
                                        <span class="tbn"><i class="fa fa-share-alt" aria-hidden="true"></i></span>
                                        <div class="inner-content">
                                            <ul class="socials">
                                                <li><a href="#" title="twitter" class="socail-btn"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="facebook" class="socail-btn"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="pinterest" class="socail-btn"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="youtube" class="socail-btn"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                                                <li><a href="#" title="instagram" class="socail-btn"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <p class="excerpt">Did you know that red-staining foods are excellent lymph-movers? In fact, many plants that were historically used as dyes...</p>
                                <div class="group-buttons">
                                    <a href="#" class="btn readmore">continue reading</a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>-->

    </div>

</div>
@endsection