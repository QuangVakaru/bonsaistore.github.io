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

    <div class="page-contain category-page no-sidebar">
        <div class="container">
            <div class="row">

                <!-- Main content -->
                <div id="main-content" class="main-content col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-category grid-style">
                        <div id="top-functions-area" class="top-functions-area" >
                        <div class="wrap-selectors">
                                <form action="{{URL::to('/viewcaonhat')}}" name="frm-refine" method="GET">
                                        <!--<div data-title="Brand:" class="selector-item">
                                            <select name="brad" class="selector">
                                                <option href="{{URL::to('/viewcaonhat')}}" value="all">Cây cảnh được yêu thích nhất</option>
                                            </select>
                                        </div>-->
                                        <button href="{{URL::to('/viewcaonhat')}}" value="all">Cây cảnh được yêu thích nhất</button>
                                        
                                    </form>
                                </div>
                            </div>
                                <form method="GET">
                                    <div>
                                        <p>
                                            <label for="amount">Lọc theo giá:</label>
                                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                            <input type="hidden" name="start_price" id="start_price" >
                                            <input type="hidden" name="end_price" id="end_price" >
                                            <button type="submit" name="filter_price" value="Lọc giá" class="btn btn-primary filter-price" >Lọc</button>
                                        </p>                                   
                                        <div id="slider-range"></div>
                                    </div>
                                </form>
                            </div>
                            <!--<div class="flt-item to-right">
                                <span class="flt-title">Sort</span>
                                <div class="wrap-selectors">
                                    <div class="selector-item orderby-selector">
                                        <select name="orderby" class="orderby" aria-label="Shop order">
                                            <option value="menu_order" selected="selected">Default sorting</option>
                                            <option value="popularity">popularity</option>
                                            <option value="rating">average rating</option>
                                            <option value="date">newness</option>
                                            <option value="price">price: low to high</option>
                                            <option value="price-desc">price: high to low</option>
                                        </select>
                                    </div>
                                    <div class="selector-item viewmode-selector">
                                        <a href="category-grid-left-sidebar.blade.php" class="viewmode grid-mode active"><i class="biolife-icon icon-grid"></i></a>
                                        <a href="category-list-left-sidebar.blade.php" class="viewmode detail-mode"><i class="biolife-icon icon-list"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>-->

                        <div class="row">
                            <ul class="products-list">
                            @foreach($search_product as $key => $product)
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                    
                                        <div class="product-thumb">
                                            <a href="{{URL::to('/chi-tiet/'.$product->slug)}}" class="link-to-product">
                                                <img src="{{URL::to('public/uploads/product/'.$product->image)}}" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="#" class="pr-name">{{$product->name}}</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">{{number_format($product->price,0,',','.').' '.'VNĐ'}}</ins>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn vệ sinh thực phẩm.</p>
                                                <div class="buttons">
                                                    <a href="{{URL::to('/chi-tiet/'.$product->slug)}}" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="biolife-panigations-block">
                            <ul class="panigation-contain">
                                <li><span class="current-page">1</span></li>
                                <li><a href="#" class="link-page">2</a></li>
                                <li><a href="#" class="link-page">3</a></li>
                                <li><span class="sep">....</span></li>
                                <li><a href="#" class="link-page">20</a></li>
                                <li><a href="#" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
@endsection