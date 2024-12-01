<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\BrandProduct;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DeliveryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Collection;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//FE
Route::get('/',[HomeController::class,'index'])->name('index');

//Home page
Route::get('/trang-chu',[HomeController::class,'index'])->name('index');
Route::post('/search',[HomeController::class,'search'])->name('search');

//Danh muc page
Route::get('/danh-muc/{category_product_id}',[CategoryProduct::class,'show_category_home'])->name('show-category-home');
Route::get('/chi-tiet/{product_slug}',[ProductController::class,'details_product'])->name('details-product');
Route::get('/viewcaonhat',[ProductController::class,'viewcaonhat'])->name('viewcaonhat');


//
//Route::get('/single',[HomeController::class,'single'])->name('single');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/404',[HomeController::class,'notfound_404'])->name('404');
Route::get('/blog-post',[HomeController::class,'blog_post'])->name('blog-post');
//Route::get('/category-grid',[HomeController::class,'category_grid'])->name('category-grid');

//Checkout page
Route::get('/checkout',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/save-checkout-customer',[CheckoutController::class,'save_checkout_customer'])->name('save-checkout-customer');
Route::get('/payment',[CheckoutController::class,'payment'])->name('payment');
Route::post('/order-place',[CheckoutController::class,'order_place'])->name('order-place');

//Login page
Route::get('/login',[CheckoutController::class,'login'])->name('login');
Route::post('/login-customer',[CheckoutController::class,'login_customer'])->name('login-customer');
//Logout page
Route::get('/logout-customer',[CheckoutController::class,'logout_customer'])->name('logout_customer');

//Register page
Route::get('/register',[CheckoutController::class,'register'])->name('register');
Route::post('/add-customer',[CheckoutController::class,'add_customer'])->name('add-customer');

//Product page
Route::get('/show-all-product',[ProductController::class,'show_all_product'])->name('show-all-product');


//Coupon page
Route::get('/show-all-coupon',[CouponController::class,'show_all_coupon'])->name('show-all-coupon');

//Cart page
Route::post('/save-cart',[CartController::class,'save_cart'])->name('save-cart');
Route::get('/show-cart',[CartController::class,'show_cart'])->name('show-cart');
Route::get('/delete-to-cart/{rowId}',[CartController::class,'delete_to_cart'])->name('delete-to-cart');
Route::post('/update-cart-quantity',[CartController::class,'update_cart_quantity'])->name('update-cart-quantity');


//BE/////////////////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/admin',[AdminController::class,'index'])->name('admin_login');
Route::get('/dashboard',[AdminController::class,'show_dashboard'])->name('show_dashboard');
Route::post('/admin-dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::get('/logout',[AdminController::class,'logout'])->name('logout');

//CategoryProduct admin
Route::get('/add-category-product',[CategoryProduct::class,'add_category_product'])->name('add-category-product');
Route::get('/edit-category-product/{category_product_id}',[CategoryProduct::class,'edit_category_product'])->name('edit-category-product');
Route::get('/delete-category-product/{category_product_id}',[CategoryProduct::class,'delete_category_product'])->name('delete-category-product');
Route::get('/all-category-product',[CategoryProduct::class,'all_category_product'])->name('all-category-product');

Route::post('/save-category-product',[CategoryProduct::class,'save_category_product'])->name('save-category-product');

Route::get('/active-category-product/{category_product_id}',[CategoryProduct::class,'active_category_product'])->name('active-category-product');
Route::get('/unactive-category-product/{category_product_id}',[CategoryProduct::class,'unactive_category_product'])->name('unactive-category-product');

Route::post('/update-category-product/{category_product_id}',[CategoryProduct::class,'update_category_product'])->name('update-category-product');


//Product admin
Route::get('/add-product',[ProductController::class,'add_product'])->name('add-product');
Route::get('/edit-product/{product_id}',[ProductController::class,'edit_product'])->name('edit-product');




Route::get('/delete-product/{product_id}',[ProductController::class,'delete_product'])->name('delete-product');
Route::get('/all-product',[ProductController::class,'all_product'])->name('all-product');
Route::get('/unactive-product/{product_id}',[ProductController::class,'unactive_product'])->name('unactive-product');
Route::get('/active-product/{product_id}',[ProductController::class,'active_product'])->name('active-product');
Route::post('/save-product',[ProductController::class,'save_product'])->name('save-product');
Route::post('/update-product/{product_id}',[ProductController::class,'update_product'])->name('update-product');



//Coupon admin
Route::post('/check-coupon',[CartController::class,'check_coupon'])->name('check-coupon');
Route::get('/unset-coupon',[CouponController::class,'unset_coupon'])->name('unset-coupon');
Route::get('/insert-coupon',[CouponController::class,'insert_coupon'])->name('insert-coupon');
Route::get('/delete-coupon/{coupon_id}',[CouponController::class,'delete_coupon'])->name('delete-coupon');
Route::get('/list-coupon',[CouponController::class,'list_coupon'])->name('list-coupon');
Route::post('/insert-coupon-code',[CouponController::class,'insert_coupon_code'])->name('insert-coupon-code');
Route::get('/unactive-coupon/{coupon_id}',[CouponController::class,'unactive_coupon'])->name('unactive-coupon');
Route::get('/active-coupon/{coupon_id}',[CouponController::class,'active_coupon'])->name('active-coupon');


//User admin
//Route::get('users',['uses'=>[UserController::class,'index'],'as'=> 'Users','middleware'=> 'roles'
			// 'roles' => ['admin','author']
//])->name('users');
Route::get('index',[UserController::class,'index'])->name('index');
Route::post('store-users',[UserController::class,'store_users'])->name('store-user');
Route::get('add-users',[UserController::class,'add_users'])->name('add-users');
Route::post('assign-roles',[UserController::class,'assign_roles'])->name('assign-roles');

//Blog admin
//BrandProduct admin
Route::get('/add-blog',[BlogController::class,'add_blog'])->name('add-blog');
Route::get('/edit-blog/{blog_id}',[BlogController::class,'edit_blog'])->name('edit-blog');
Route::get('/delete-blog/{blog_id}',[BlogController::class,'delete_blog'])->name('delete-blog');
Route::get('/unactive-blog/{blog_id}',[BlogController::class,'unactive_blog'])->name('unactive-blog');
Route::get('/active-blog/{blog_id}',[BlogController::class,'active_blog'])->name('active-blog');
Route::get('/all-blog',[BlogController::class,'all_blog'])->name('all-blog');

Route::post('/save-blog',[BlogController::class,'save_blog'])->name('save-blog');

Route::post('/update-blog/{blog_id}',[BlogController::class,'update_blog'])->name('update-blog');

Route::get('/blog',[BlogController::class,'blog'])->name('blog');


//Order
//Route::get('/delete-order/{order_code}',[OrderController::class,'order_code'])->name('delete-order');
//Route::get('/print-order/{checkout_code}',[OrderController::class,'print_order'])->name('print-order');
//Route::get('/manage-order',[OrderController::class,'manage_order'])->name('manage-order');
//Route::get('/view-order/{order_code}',[OrderController::class,'view_order'])->name('view-order');
//Route::post('/update-order-qty',[OrderController::class,'update_order_qty'])->name('update-order-qty');
//Route::post('/update-qty',[OrderController::class,'update_qty'])->name('update-qty');
Route::get('/all-order',[OrderController::class,'all_order'])->name('all-order');
Route::get('/order-detail/{order_id}',[OrderController::class,'order_detail'])->name('order-detail');
Route::get('/unactive-order/{order_id}',[OrderController::class,'unactive_order'])->name('unactive-order');
Route::get('/active-order/{order_id}',[OrderController::class,'active_order'])->name('active-order');
//Shipping
//
Route::get('/all-delivery',[DeliveryController::class,'all_delivery'])->name('all-delivery');