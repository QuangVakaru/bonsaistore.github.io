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
                <li class="nav-item"><a href="#" class="permal-link">Danh mục sản phẩm</a></li>
                @foreach($ten_danhmuc as $key => $name)
                <li class="nav-item"><span class="current-page">{{$name->ten_danhmuc}}</span></li>
                @endforeach
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
                            <div class="flt-item to-left group-on-mobile">
                                <span class="flt-title">Chọn chế độ lọc</span>
                                <a href="#" class="icon-for-mobile">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                <div class="wrap-selectors">
                                    <form action="#" name="frm-refine" method="get">
                                        <span class="title-for-mobile"></span>
                                        <div data-title="Price:" class="selector-item">
                                            <select name="price" class="selector">
                                                <option value="class-1st">Dưới 200k</option>
                                                <option value="class-2nd">Từ trên 200k- dưới 500k</option>
                                                <option value="class-3rd"> Trên 500k</option>
                                            </select>
                                        </div>
                                    </form>
                                    

                                </div>

                            <div class="wrap-selectors">
                                <form action="{{URL::to('/viewcaonhat')}}" name="frm-refine" method="GET">
                                        <div data-title="Brand:" class="selector-item">
                                            <select name="brad" class="selector">
                                                <option href="{{URL::to('/viewcaonhat')}}" value="all">Cây cảnh được yêu thích nhất</option>
                                            </select>
                                        </div>
                                        
                                    </form>
                                </div>
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
                            @foreach($category_by_id as $key => $product)
                                <li class="product-item col-lg-3 col-md-3 col-sm-4 col-xs-6">
                                    <div class="contain-product layout-default">
                                    
                                        <div class="product-thumb">
                                            <a href="{{URL::to('/chi-tiet/'.$product->slug_sanpham)}}" class="link-to-product">
                                                <img src="{{URL::to('public/uploads/product/'.$product->hinhanh_sanpham)}}" alt="dd" width="270" height="270" class="product-thumnail">
                                            </a>
                                        </div>
                                        <div class="info">
                                            <h4 class="product-title"><a href="#" class="pr-name">{{$product->ten_sanpham}}</a></h4>
                                            <div class="price">
                                                <ins><span class="price-amount"><span class="currencySymbol">{{number_format($product->gia_sanpham,0,',','.').' '.'VNĐ'}}</ins>
                                            </div>
                                            <div class="slide-down-box">
                                                <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn vệ sinh.</p>
                                                <div class="buttons">
                                                    <a href="{{URL::to('/chi-tiet/'.$product->slug_sanpham)}}" class="btn add-to-cart-btn"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i>Thêm vào giỏ hàng</a>
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