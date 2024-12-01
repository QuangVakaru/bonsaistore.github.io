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
    </nav>
</div>

<div class="page-contain single-product">
    <div class="container">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            
            <!-- summary info -->
            @foreach($product_details as $key => $value)
            <div class="sumary-product single-layout">
                <div class="media">
                    <ul class="biolife-carousel slider-for" data-slick='{"arrows":false,"dots":false,"slidesMargin":30,"slidesToShow":1,"slidesToScroll":1,"fade":true,"asNavFor":".slider-nav"}'>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="500" height="500"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="500" height="500"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="500" height="500"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="500" height="500"></li>
                    </ul>
                    <ul class="biolife-carousel slider-nav" data-slick='{"arrows":false,"dots":false,"centerMode":false,"focusOnSelect":true,"slidesMargin":10,"slidesToShow":4,"slidesToScroll":1,"asNavFor":".slider-for"}'>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="88" height="88"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="88" height="88"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="88" height="88"></li>
                        <li><img src="{{URL::to('/public/uploads/product/'.$value->image)}}" alt="" width="88" height="88"></li>
                    </ul>
                </div>

                <div class="product-attribute">
                    <h3 class="title">{{$value->name}}</h3>
                    <div class="rating">
                        <span class="review-count">Mã ID: {{$value->product_id}}</span>
                        <span class="qa-text"><b>Trọng lượng: </b>{{$value->weight}} <b>kg</b></span>
                        <span class="qa-text"><b>Số lượng: </b>{{$value->quantity}} </span>
                        <b class="category"></b>
                    </div>
                    <!--<span class="sku"><b>Danh mục: </b>{{$value->name}}</span>-->
                    <p class="excerpt">{{$value->describe}}</p>

                </div>
            <form action="{{URL::to('/save-cart')}}" method="POST">
                {{csrf_field() }}
                <div class="action-form">                
                    <div class="quantity-box">
                        <span class="title">Số lượng:</span>
                        <div class="qty-input">
                            <input type="text" name="qty" value="1" data-max_value="{{$value->quantity}}" data-min_value="1" data-step="1">
                            <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                            <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                            <input type="hidden" name="product_id_hidden" value="{{$value->product_id}}" data-max_value="{{$value->quantity}}">
                        </div>
                    </div>
                    <div class="total-price-contain">
                        <span class="title">Giá:</span>
                        <p class="price">{{number_format($value->price,0,',','.').'VNĐ'}}</p>
                    </div>
                    <div class="buttons">
                        <button type="submit" class="btn add-to-cart-btn" >Thêm vào giỏ hàng</button>
                    </div>      
                </div>
            </form>
            @endforeach
            

            <!-- related products -->
            <div class="product-related-box single-layout">
                <div class="biolife-title-box lg-margin-bottom-26px-im">
                    <span class="biolife-icon icon-organic"></span>
                    <span class="subtitle">All the best item for You</span>
                    <h3 class="main-title">Related Products</h3>
                </div>
                <ul class="products-list biolife-carousel nav-center-02 nav-none-on-mobile" data-slick='{"rows":1,"arrows":true,"dots":false,"infinite":false,"speed":400,"slidesMargin":0,"slidesToShow":5, "responsive":[{"breakpoint":1200, "settings":{ "slidesToShow": 4}},{"breakpoint":992, "settings":{ "slidesToShow": 3, "slidesMargin":20 }},{"breakpoint":768, "settings":{ "slidesToShow": 2, "slidesMargin":10}}]}'>
                @foreach($relate as $key => $lienquan)
                    <li class="product-item">
                        <div class="contain-product layout-default">
                            <div class="product-thumb">
                                <a href="#" class="link-to-product">
                                    <img src="{{URL::to('public/uploads/product/'.$lienquan->image)}}" alt="dd" width="270" height="270" class="product-thumnail">
                                </a>
                            </div>
                            <div class="info">
                                <h4 class="product-title"><a href="#" class="pr-name">{{$lienquan->name}}</a></h4>
                                <div class="price">
                                    <ins><span class="price-amount"><span class="currencySymbol">{{number_format($lienquan->price,0,',','.').' '.'VNĐ'}}</ins>
                                </div>
                                <div class="slide-down-box">
                                    <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn vệ sinh thực phẩm.</p>
                                    <div class="buttons">
                                        <a href="#" class="btn wishlist-btn"><i class="fa fa-heart" aria-hidden="true"></i></a>
                                        <a href="#" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
                                        <a href="#" class="btn compare-btn"><i class="fa fa-random" aria-hidden="true"></i></a>
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
@endsection