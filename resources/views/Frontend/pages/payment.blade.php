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

    <div class="page-contain checkout">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">

                    <!--checkout progress box-->

                    <!--Order Summary-->
                    <div class="">
                        <div class="order-summary sm-margin-bottom-80px">
                            <div class="title-block">
                                <h3 class="title">Giỏ hàng gồm:</h3>
                                    <?php
                                        $content=Cart::content();
                                    ?>
                                <a href="#" class="link-forward">Sửa thẻ</a>
                            </div>
                            
                            <div class="cart-list-box short-type">
                                <!--<span class="number">2 items</span>-->
                                @foreach($content as $v_content)
                                <ul class="cart-list">
                                    <li class="cart-elem">
                                        <div class="cart-item">
                                            <div class="product-thumb">
                                                <a class="prd-thumb" href="#">
                                                    <figure><img src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" width="113" height="113" alt="shop-cart" ></figure>
                                                </a>
                                            </div>
                                            <div class="info">
                                                <span class="txt-quantity">{{$v_content->qty}}</span>
                                                <a href="#" class="pr-name">{{$v_content->name}}</a>
                                            </div>
                                            <div class="price price-contain">
                                                <ins><span class="price-amount"><span class="currencySymbol">{{number_format($v_content->price).' '.'vnđ'}}</ins>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                                @endforeach
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Thành tiền:</b>
                                            <span class="stt-price">{{Cart::subtotal().' '.'vnđ'}}</span>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Promo/Gift Certificate</a>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Tổng:</b>
                                            <span class="stt-price">{{Cart::total().' '.'vnđ'}}</span>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            
                        </div>
                    </div>
			<form method="POST" action="{{URL::to('/order-place')}}">
				{{ csrf_field() }}
			<div class="payment-options">
					<input type="submit" value="Đặt hàng" name="order_place" class="btn btn-primary btn-sm">
			</div>
			</form>
                </div>
            </div>
        </div>
    </div>

@endsection
