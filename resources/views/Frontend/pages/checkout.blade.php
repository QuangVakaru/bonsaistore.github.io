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
                <li class="nav-item"><a href="{{URL::to('/trang-chu')}}" class="permal-link">Home</a></li>
            </ul>
        </nav>
    </div>

    <div class="page-contain checkout">

        <!-- Main content -->
        <div id="main-content" class="main-content">
            <div class="container sm-margin-top-37px">
                <div class="row">

                    <!--checkout progress box-->
                    <div class="col-lg-7 col-md-7 col-sm-6 col-xs-12">
                        <div class="checkout-progress-wrap">
                            <ul class="steps">
                            <form action="{{URL::to('/save-checkout-customer')}}" method="POST">
									{{@csrf_field()}}
                                <li class="step 1st">
                                    <div class="checkout-act active">
                                        <h3 class="title-box"><span class="number">1</span>Điền thông tin người nhận</h3>
                                        <div>
                                        <p class="form-row"><input type="text" name="shipping_name" class="shipping_name" size="100" placeholder="Họ và tên người gửi" required></p>
                                        <p class="form-row"><input type="text" name="shipping_address" class="shipping_address" size="100" placeholder="Địa chỉ gửi hàng" required></p>
                                        <p class="form-row"><input type="text" name="shipping_phone" class="shipping_phone" size="100" placeholder="Số điện thoại" required></P>
                                        <p class="form-row"><textarea name="shipping_notes" class="shipping_notes" cols="100" placeholder="Ghi chú đơn hàng của bạn" rows="5" required></textarea></p>
                                            <p class="form-row wrap-btn"> <button href="{{URL::to('/payment')}}" class="btn btn-submit btn-bold"  value="gui" name="send_order" type="submit">Thanh toán</button></p>
                                        <div id="paypal-button"></div>
                                    <div>
                                    </div>
                                </li>
                                
                               <!-- <li class="step 3rd">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">3</span>Billing</h3></div>
                                </li>-->
                                <li class="step 4th">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">3</span>Payment</h3></div>
                                </li>
                                </form>
                                <li class="step 2nd">
                                    <div class="checkout-act"><h3 class="title-box"><span class="number">2</span>Nhập mã khuyến mãi
                                    @if(Session::get('cart'))
								    <tr><td>

										<form method="POST" action="{{url::to('/check-coupon')}}">
											@csrf
												<input type="text" class="form-control" name="coupon" placeholder="Nhập mã giảm giá"><br>
				                          		<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá">
				                          	
			                          		</form>
			                          	</td>
								    </tr>
								    @endif
                                </h3></div>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!--Order Summary-->
                    <div class="col-lg-5 col-md-5 col-sm-6 col-xs-12 sm-padding-top-48px sm-margin-bottom-0 xs-margin-bottom-15px">
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
                                @if(Session::get('cart')==true)
									@php
											$total = 0;
									@endphp
                                @endif
                                @foreach($content as $v_content)
                                    @php
											$subtotal = ($v_content->price)*($v_content->qty);
											$total+=$subtotal;
									@endphp
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
                                <td><a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a></td>
										<td>
											@if(Session::get('coupon'))
				                          	<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
											@endif
                                </td>
                                <ul class="subtotal">
                                    <li>
                                        <div class="subtotal-line">
                                            <b class="stt-name">Thành tiền:</b>
                                            <span class="stt-price">{{Cart::subtotal().' '.'vnđ'}}</span>
                                            
                                        </div>
                                    </li>
                                    <li>
                                        <div class="subtotal-line">
                                            <a href="#" class="link-forward">Mã giảm giá</a>
                                            @if(Session::get('coupon'))
										<li>
											
												@foreach(Session::get('coupon') as $key => $cou)
													@if($cou['condition']==1)
														Mã giảm : {{$cou['value']}} %
														<p>
															@php 
															$total_coupon = ($total*$cou['value'])/100;                   
															@endphp
														</p>
                                                        echo'<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'VNĐ</li></p>';
														<p>
														@php 
															$total_after_coupon = $total-$total_coupon;
														@endphp
														</p>
													@elseif($cou['condition']==2)
														Mã giảm : {{number_format($cou['value'],0,',','.')}} VNĐ
														<p>
															@php 
															$total_coupon = $total - $cou['value'];
                                                            
															@endphp
														</p>
                                                        echo'<p><li>Tổng giảm:'.number_format($total_coupon,0,',','.').'VNĐ</li></p>';
														@php 
															$total_after_coupon = $total_coupon;
														@endphp
													@endif
												@endforeach
                                                </li>
										@endif
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

                </div>
            </div>
        </div>
    </div>
  
@endsection
