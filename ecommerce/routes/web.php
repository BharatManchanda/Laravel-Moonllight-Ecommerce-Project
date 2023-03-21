<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\Admin\AdminController;
use  App\Http\Controllers\Admin\CategoryController;
use  App\Http\Controllers\Admin\CouponController;
use  App\Http\Controllers\Admin\SizeController;
use  App\Http\Controllers\Admin\ColorController;
use  App\Http\Controllers\Admin\ProductController;
use  App\Http\Controllers\Admin\BrandController;
use  App\Http\Controllers\Admin\TaxController;
use  App\Http\Controllers\Admin\CustomerController;
use  App\Http\Controllers\Admin\HomebannerController;
use  App\Http\Controllers\Admin\orderController;
use  App\Http\Controllers\Admin\reviewController;
use  App\Http\Controllers\Front\frontController;

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


Route::get('admin',[AdminController::class,'index']);
Route::post('admin/auth/',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>['user_auth']],function()
{
    // Route for categories
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);
    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/category/delete_category/{id}',[CategoryController::class,'delete_category']);
    Route::get('admin/category/manage_category',[CategoryController::class,'manage_category']);
    Route::get('admin/category/manage_category/{id}',[CategoryController::class,'manage_category']);
    Route::post('admin/category/manage_category_process',[CategoryController::class,'manage_category_process'])->name('manage_category_process');
    Route::get('admin/category/manage_category/{status}/{id}',[CategoryController::class,'update_status_category']);
    
    // Route for order
    Route::get('admin/order',[orderController::class,'index']);
    Route::get('admin/order/order_details/{id}',[orderController::class,'order_details']);
    Route::get('admin/order/order_details/update_order_status/{id}/{val}',[orderController::class,'update_order_status']);
    Route::get('admin/order/order_details/update_payment_status/{id}/{val}',[orderController::class,'update_payment_status']);
    Route::post('admin/order/order_details/update_tracking',[orderController::class,'update_tracking']);
    
    // Route for review
    Route::get('admin/review',[reviewController::class,'index']);
    Route::get('admin/review/status/{status}/{id}',[reviewController::class,'update_review_status']);
    Route::get('admin/review/delete/{id}',[reviewController::class,'delete_review']);


    // Route for coupons
    Route::get('admin/coupon',[CouponController::class,'index']);
    Route::get('admin/coupon/delete_coupon/{id}',[CouponController::class,'delete_coupon']);
    Route::get('admin/coupon/manage_coupon',[CouponController::class,'manage_coupon']);
    Route::get('admin/coupon/manage_coupon/{id}',[CouponController::class,'manage_coupon']);
    Route::post('admin/coupon/manage_coupon_process',[CouponController::class,'manage_coupon_process'])->name('manage_coupon_process');
    Route::get('admin/coupon/manage_coupon/{status}/{id}',[CouponController::class,'update_status_coupon']);

    //Route for sizes
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/size/delete_size/{id}',[SizeController::class,'delete_size']);
    Route::get('admin/size/manage_size',[SizeController::class,'manage_size']);
    Route::get('admin/size/manage_size/{id}',[SizeController::class,'manage_size']);
    Route::post('admin/size/manage_size_process',[SizeController::class,'manage_size_process'])->name('manage_size_process');
    Route::get('admin/size/manage_size/{status}/{id}',[SizeController::class,'update_status_size']);


    //Route for color
    Route::get('admin/color',[ColorController::class,'index']);
    Route::get('admin/color/delete_color/{id}',[ColorController::class,'delete_color']);
    Route::get('admin/color/manage_color',[ColorController::class,'manage_color']);
    Route::get('admin/color/manage_color/{id}',[ColorController::class,'manage_color']);
    Route::post('admin/color/manage_color_process',[ColorController::class,'manage_color_process'])->name('manage_color_process');
    Route::get('admin/color/manage_color/{status}/{id}',[ColorController::class,'update_status_color']);

    //Route for Product
    Route::get('admin/product',[ProductController::class,'index']);
    Route::get('admin/product/delete_product/{id}',[ProductController::class,'delete_product']);
    Route::get('admin/product/manage_product',[ProductController::class,'manage_product']);
    Route::get('admin/product/manage_product/{id}',[ProductController::class,'manage_product']);
    Route::post('admin/product/manage_product_process',[ProductController::class,'manage_product_process'])->name('manage_product_process');
    Route::get('admin/product/manage_product/{status}/{id}',[ProductController::class,'update_status_product']);
    Route::get('admin/product_attr/delete/{prod_id}/{attr_id}',[ProductController::class,'product_attribute_delete']);
    Route::get('admin/product_images/delete/{prod_id}/{pro_img_id}',[ProductController::class,'product_images_delete']);


    //Route for brand
    Route::get('admin/brand',[BrandController::class,'index']);
    Route::get('admin/brand/delete_brand/{id}',[BrandController::class,'delete_brand']);
    Route::get('admin/brand/manage_brand',[BrandController::class,'manage_brand']);
    Route::get('admin/brand/manage_brand/{id}',[BrandController::class,'manage_brand']);
    Route::post('admin/brand/manage_brand_process',[BrandController::class,'manage_brand_process'])->name('manage_brand_process');
    Route::get('admin/brand/manage_brand/{status}/{id}',[BrandController::class,'update_status_brand']);

    //Route for Tax
    Route::get('admin/tax',[TaxController::class,'index']);
    Route::get('admin/tax/delete_tax/{id}',[TaxController::class,'delete_tax']);
    Route::get('admin/tax/manage_tax',[TaxController::class,'manage_tax']);
    Route::get('admin/tax/manage_tax/{id}',[TaxController::class,'manage_tax']);
    Route::post('admin/tax/manage_tax_process',[TaxController::class,'manage_tax_process'])->name('manage_tax_process');
    Route::get('admin/tax/manage_tax/{status}/{id}',[TaxController::class,'update_status_tax']);

    //Route for customers
    Route::get('admin/customer',[CustomerController::class,'index']);
    Route::get('admin/customer/delete_customer/{id}',[CustomerController::class,'delete_customer']);
    Route::get('admin/customer/manage_customer/{status}/{id}',[CustomerController::class,'update_status_customer']);
    Route::get('admin/customer/view_customer/{id}',[CustomerController::class,'viewCustomer']);

    // Route for Homebanner
    Route::get('admin/homebanner',[HomebannerController::class,'index']);
    Route::get('admin/homebanner/delete_homebanner/{id}',[HomebannerController::class,'delete_homebanner']);
    Route::get('admin/homebanner/manage_homebanner',[HomebannerController::class,'manage_homebanner']);
    Route::get('admin/homebanner/manage_homebanner/{id}',[HomebannerController::class,'manage_homebanner']);
    Route::post('admin/homebanner/manage_homebanner_process',[HomebannerController::class,'manage_homebanner_process'])->name('manage_homebanner_process');
    Route::get('admin/homebanner/manage_homebanner/{status}/{id}',[HomebannerController::class,'update_status_homebanner']);

});
Route::get('admin/logout',function()
{
    session()->forget('EID');
    session()->forget('FNAME');
    session()->forget('LNAME');
    session()->forget('PHONE');
    session()->flash('error','Logout Sucessfully.........!!');
    return redirect('admin');
});


Route::get('/',[frontController::class,'index']);
Route::get('cart',[frontController::class,'cart']);
Route::get('wishlist',[frontController::class,'wishlist']);
Route::get('product/{slug}',[frontController::class,'product']);
Route::post('add_to_cart',[frontController::class,'add_to_cart']);
Route::get('category/{slug}',[frontController::class,'category']);
Route::get('register/',[frontController::class,'register']);
Route::post('register_process',[frontController::class,'register_process']);
Route::post('forget-password',[frontController::class,'forget_password']);
Route::post('login_process',[frontController::class,'login_process']);
Route::get('email_verification/{id}',[frontController::class,'email_verification']);
Route::get('change_password/{id}',[frontController::class,'change_password']);
Route::post('update_password',[frontController::class,'update_password']);
Route::get('checkout',[frontController::class,'checkout']);
Route::post('coupon_code_check',[frontController::class,'coupon_code_check']);
Route::post('order_submit',[frontController::class,'order_submit']);
Route::get('instamojo',[frontController::class,'instamojo']);
Route::get('order_details/{id}',[frontController::class,'order_details']);
Route::post('product/review_submit',[frontController::class,'review_submit']);
Route::get('contactus',[frontController::class,'contactus']);

Route::group(['middleware'=>['frontAuth']],function(){
    Route::get('order',[frontController::class,'order']);
});
Route::get('logout',function(){
    session()->forget('LOGIN_USER_ID');
    session()->forget('LOGIN_USER_NAME');
    session()->forget('LOGIN_USER_EMAIL');
    return redirect("/");
});