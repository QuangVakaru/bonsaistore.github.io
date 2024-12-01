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
            <li class="nav-item"><span class="current-page">Giỏ hàng</span></li>
        </ul>
    </nav>
</div>

<div class="page-contain shopping-cart">

    <!-- Main content -->
    <div id="main-content" class="main-content">
        <div class="container">
            <!--Cart Table-->
            <div class="shopping-cart-container">
                <div class="row">
                    <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                        <h3 class="box-title">Giỏ hàng của bạn</h3>
                        <form class="shopping-cart-form" action="#" method="post">
                                    <?php
                                        $content=Cart::content();
                                    ?>
                            <table class="shop_table cart-form">
                                <thead>
                                <tr>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-price">Giá</th>
                                    <th class="product-quantity">Số lượng</th>
                                    <th class="product-subtotal">Tổng</th>
                                </tr>
                                </thead>
                                @foreach($content as $v_content)
                                <tbody>
                                
                                <tr class="cart_item">
                                    <td class="product-thumbnail" data-title="Product Name">
                                        <a class="prd-thumb" href="{{URL::to('/chi-tiet/'.$v_content->slug)}}">
                                            <figure><img width="113" height="113" src="{{URL::to('public/uploads/product/'.$v_content->options->image)}}" alt="shipping cart"></figure>
                                        </a>
                                        <a class="prd-name">{{$v_content->name}}</a>
                                        <div class="action">
                                            <!--<a href="#" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>-->
                                            <a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}" class="remove"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </div>
                                    </td>
                                    <td class="product-price" data-title="Price">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">{{number_format($v_content->price).' '.'vnđ'}}</ins>
                                        </div>
                                    </td>
                                    <td class="product-quantity" data-title="Quantity">
                                        <div class="quantity-box type1">
                                        <form action="{{URL::to('/update-cart-quantity')}}" method="POST">
									        {{ csrf_field() }}
                                            <div class="qty-input">
                                                <input type="text" name="qty" value="{{$v_content->qty}}" data-max_value="100" data-min_value="1" data-step="1">
                                                <a href="#" class="qty-btn btn-up"><i class="fa fa-caret-up" aria-hidden="true"></i></a>
                                                <a href="#" class="qty-btn btn-down"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                            </div>
                                            <div class="qty-input">
                                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart">
                                                <input type="submit" value="Cập nhật" name="update_qty">                                       
                                            </div>
                                        </form>
                                        </div>
                                    </td>
                                    <td class="product-subtotal" data-title="Total">
                                        <div class="price price-contain">
                                            <ins><span class="price-amount"><span class="currencySymbol">									
                                                <?php
									                $subtotal = $v_content->price * $v_content->qty;
									                echo number_format($subtotal).' '.'vnđ';
									            ?>
                                            </ins>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </form>
                    </div>
                    <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                        <div class="shpcart-subtotal-block">
                            <div class="subtotal-line">
                                <b class="stt-name">Tổng <span class="sub"></span></b>
                                <span class="stt-price">
                                {{Cart::total().' '.'vnđ'}}
                                </span>
                            </div>
                            <div class="tax-fee">
                                <p class="title">Thành tiền</p>
                                <p class="desc">{{Cart::total().' '.'vnđ'}}</p>
                            </div>
                            <?php
                                   $customer_id = Session::get('id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                  
                                <div class="btn-checkout">
                                    <a href="{{URL::to('/checkout')}}" class="btn checkout">Thanh toán</a>
                                </div>
                                <?php
                            }else{
                                 ?>                                
                                 <div class="btn-checkout">
                                    <a href="{{URL::to('/login')}}" class="btn checkout">Thanh toán</a>
                                </div>
                                 <?php 
                             }
                                 ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection