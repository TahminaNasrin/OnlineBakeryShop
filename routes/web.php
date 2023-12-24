<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\OrderDetailsController;
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\SslCommerzPaymentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//website routes
Route::get('/',[FrontendHomeController::class,'home'])->name('frontend.home');

Route::get('/registration',[FrontendCustomerController::class,'registration'])->name('customer.registration');
Route::post('/registration/store',[FrontendCustomerController::class,'store'])->name('customer.registration.store');

Route::get('/login',[FrontendCustomerController::class,'login'])->name('customer.login');
Route::post('/login/post',[FrontendCustomerController::class,'loginPost'])->name('customer.login.post');

Route::get('/search-product',[FrontendProductController::class,'search'])->name('product.search');

Route::get('/all-product',[FrontendProductController::class,'allProduct'])->name('product.all');
Route::get('/single-product/{id}',[FrontendProductController::class,'singleProductView'])->name('single.product.view');

Route::get('/about-us',[AboutUsController::class,'aboutUs'])->name('about.us');
//cart codes

Route::get('cart-view',[FrontendCartController::class,'cartView'])->name('cart.view');
Route::get('add-to-cart/{product_id}',[FrontendCartController::class,'addToCart'])->name('add.to.cart');
Route::get('/cart/delete/{id}',[FrontendCartController::class,'delete'])->name('cart.delete');
Route::get('/cart/quantity/decrease/{id}',[FrontendCartController::class,'quantityDecrease'])->name('cart.quantity.decrease');
Route::get('/cart/quantity/increase/{id}',[FrontendCartController::class,'quantityIncrease'])->name('cart.quantity.increase');
Route::get('whole/cart/remove/',[FrontendCartController::class,'removeWholeCart'])->name('whole.cart.remove');

// Route::get('decrement/{id}',[FrontendCartController::class,'decrementQuantity'])->name('quantity.decrement');
// Route::get('increment/{id}',[FrontendCartController::class,'incrementQuantity'])->name('quantity.increment');

Route::get('/wishlist/view/',[WishlistController::class,'wishlistView'])->name('wishlist.view');
Route::get('/wishlist/{id}',[WishlistController::class,'wishlist'])->name('wishlist.now');
Route::get('/wishlist/delete/{id}',[WishlistController::class,'delete'])->name('wishlist.delete');


Route::group(['middleware'=>'auth'],function(){

    Route::get('/profile',[FrontendCustomerController::class,'profile'])->name('profile.view');
    Route::get('/profile-edit/{id}',[FrontendCustomerController::class, 'profileEdit'])->name('profile.edit');
    Route::put('/profile-update/{id}',[FrontendCustomerController::class,'update'])->name('profile.update');

    Route::get('/logout',[FrontendCustomerController::class,'logout'])->name('customer.logout');
    Route::get('/checkout',[FrontendCartController::class,'checkout'])->name('checkout');

    Route::post('/order-place',[FrontendOrderController::class,'orderPlace'])->name('order.place');
    

    Route::get('/cancel-order/{product_id}',[FrontendOrderController::class,'cancelOrder'])->name('order.cancel');


    // SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::post('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END

});

//Backtend 
Route::group(['prefix'=>'admin'], function(){ 



//login
Route::get('/login',[UserController::class,'loginForm'])->name('admin.login');
Route::post('/login-post',[UserController::class,'loginPost'])->name('admin.login.post');


//all pages controller
Route::group(['middleware'=>'auth'],function(){

Route::group(['middleware'=>'checkAdmin'],function(){

//logout
Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');

Route::get('/',[HomeController::class,'home'])->name('admin.dashboard');

Route::get('/customer/list',[CustomerController::class,'list'])->name('customer.list');
Route::get('/customer/form',[CustomerController::class,'form'])->name('customer.form');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');


Route::get('/product/list',[ProductController::class,'list'])->name('product.list');
Route::get('/product/form',[ProductController::class,'form'])->name('product.form');
Route::post('/product/store',[ProductController::class,'store'])->name('product.store');


Route::get('/categories/list',[CategoriesController::class,'list'])->name('categories.list');
Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('categories/form',[CategoriesController::class,'form'])->name('categories.form');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');

Route::get('/order/list',[OrderController::class,'list'])->name('order.list');
Route::get('/order/approve/{id}',[OrderController::class,'approve'])->name('order.approve');
Route::get('/order/reject/{id}',[OrderController::class,'reject'])->name('order.reject');
Route::get('/order/form',[OrderController::class,'form'])->name('order.form');
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');

Route::get('/order-details/list',[OrderDetailsController::class,'list'])->name('order.details.list');
Route::get('/order-details/form',[OrderDetailsController::class,'form'])->name('order.details.form');
Route::post('/order-details/store',[OrderDetailsController::class,'store'])->name('order.details.store');


Route::get('/payment/list',[PaymentController::class,'list'])->name('payment.list');
Route::get('/payment/form',[PaymentController::class,'form'])->name('payment.form');
Route::post('/payment/store',[PaymentController::class,'store'])->name('payment.store');

Route::get('/report/list',[ReportController::class,'list'])->name('report.list');
Route::get('/review/list',[ReviewController::class,'list'])->name('review.list');

Route::get('/cart/list',[CartController::class,'list'])->name('cart.list');
Route::get('/cart/form',[CartController::class,'form'])->name('cart.form');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');

Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/form',[UserController::class,'form'])->name('users.form');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
});
});
});