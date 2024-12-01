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
                            <div class="flt-item to-left group-on-mobile">
                                <!--<span class="flt-title">Chọn chế độ lọc</span>
                                <a href="#" class="icon-for-mobile">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </a>
                                <div class="wrap-selectors">
                                
                                <p>
                                    <label for="amount">Price range:</label>
                                    <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                </p>
                                
                                <div id="slider-range"></div>
                            
                                </div>-->

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
                                <form action="{{URL::to('/loctheogia')}}" method="GET">
                                    <div>
                                        <p>
                                            <label for="amount">Lọc theo giá:</label>
                                            <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                                            <input type="hidden" name="from"  class="price_from" >
                                            <input type="hidden" name="to" class="price_to" >
                                            <input type="submit" mame="filer_price" value="Lọc giá" class="btn btn-primary filter-price" >
                                        </p>                                   
                                        <div id="slider-range"></div>
                                    </div>
                                </form>
                            </div>

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
                                                <h4 class="product-title"><a href="#" class="pr-name">Lượt xem : {{$product->view}}</a></h4>
                                                <div class="price">
                                                    <ins><span class="price-amount"><span class="currencySymbol">{{number_format($product->price,0,',','.').' '.'VNĐ'}}</ins>
                                                </div>
                                                <div class="slide-down-box">
                                                    <p class="message">Tất cả các sản phẩm đều được lựa chọn kỹ lưỡng để đảm bảo an toàn vệ sinh thực phẩm..</p>
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