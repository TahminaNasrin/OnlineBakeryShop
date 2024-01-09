<?php

use App\Models\User;
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
use App\Http\Controllers\Frontend\AboutUsController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\DeliveryManController;
use App\Http\Controllers\Backend\OrderDetailsController;
use App\Http\Controllers\Frontend\CartController as FrontendCartController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\OrderController as FrontendOrderController;
use App\Http\Controllers\Frontend\ProductController as FrontendProductController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;
use App\Http\Controllers\Frontend\InvoiceController;
use App\Http\Controllers\Frontend\ReviewController as FrontendReviewController;

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
Route::get('/product-under-cagtegory/{cat_id}',[FrontendProductController::class,'productsUnderCategory'])->name('products.under.category');

Route::get('/about-us',[AboutUsController::class,'aboutUs'])->name('about.us');
//cart codes

Route::get('cart-view',[FrontendCartController::class,'cartView'])->name('cart.view');
Route::get('add-to-cart/{product_id}',[FrontendCartController::class,'addToCart'])->name('add.to.cart');
Route::get('/cart/delete/{id}',[FrontendCartController::class,'delete'])->name('cart.delete');
Route::get('/cart/quantity/decrease/{id}',[FrontendCartController::class,'quantityDecrease'])->name('cart.quantity.decrease');
Route::get('/cart/quantity/increase/{id}',[FrontendCartController::class,'quantityIncrease'])->name('cart.quantity.increase');
Route::get('whole/cart/remove/',[FrontendCartController::class,'removeWholeCart'])->name('whole.cart.remove');


Route::get('/wishlist/view/{user_id}',[WishlistController::class,'wishlistView'])->name('wishlist.view');
Route::get('/add-to-wishlist/{product_id}', [WishlistController::class, 'store'])->name('add.to.wishlist');
Route::get('/remove-wishlist/{wishlist_id}', [WishlistController::class, 'remove'])->name('remove.Wishlist');
//Route::get('/buy-now/{id}',[FrontendOrderController::class,'buyNow'])->name('buy.now');

Route::get('/user/review',[FrontendReviewController::class, 'review'])->name('user.review');
Route::post('/store-review',[FrontendReviewController::class,'storeReview'])->name('review.store');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/profile',[FrontendCustomerController::class,'profile'])->name('profile.view');
    Route::get('/profile-edit/{id}',[FrontendCustomerController::class, 'profileEdit'])->name('profile.edit');
    Route::put('/profile-update/{id}',[FrontendCustomerController::class,'update'])->name('profile.update');
    Route::get('/invoice/{orderId}', [InvoiceController::class,'generateInvoice'])->name('generate.invoice');
    //Route::get('/profile/order-summary/{id}',[FrontendCustomerController::class, 'orderSummary'])->name('profile.order.summary');

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

//Backtend start
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
Route::get('/product/delete/{id}',[ProductController::class,'delete'])->name('product.delete');
Route::get('/product/edit/{id}',[ProductController::class,'edit'])->name('product.edit');
Route::put('/product/update/{id}',[ProductController::class,'update'])->name('product.update');

Route::get('/categories/list',[CategoriesController::class,'list'])->name('categories.list');
Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('categories/form',[CategoriesController::class,'form'])->name('categories.form');
Route::post('/categories/store',[CategoriesController::class,'store'])->name('categories.store');

Route::get('/order/list',[OrderController::class,'list'])->name('order.list');
Route::get('/order/done/{id}',[OrderController::class,'done'])->name('order.done');
Route::get('/order/reject/{id}',[OrderController::class,'reject'])->name('order.reject');
Route::get('/order/delivery-man-assign/{id}',[OrderController::class,'deliveryManAssign'])->name('order.deliveryman.assign');
Route::get('/order/form',[OrderController::class,'form'])->name('order.form');
Route::post('/deliveryman/info/store',[OrderController::class,'deliveryManInfoStore'])->name('DeliveryMan.info.store');
Route::get('/delivery-man/edit/{id}',[OrderController::class,'edit'])->name('deliveryMan.edit');
Route::put('/delivery-man/update/{id}', [OrderController::class, 'update'])->name('deliveryMan.update');


Route::get('/order-details/list',[OrderDetailsController::class,'list'])->name('order.details.list');
Route::get('/order-details/form',[OrderDetailsController::class,'form'])->name('order.details.form');
Route::post('/order-details/store',[OrderDetailsController::class,'store'])->name('order.details.store');
Route::get('/search-date',[OrderDetailsController::class,'search'])->name('sales.report.search');


Route::get('/report/list',[ReportController::class,'list'])->name('report.list');

Route::get('/review/list',[ReviewController::class,'list'])->name('review.list');


Route::get('/delivery-man/list',[DeliveryManController::class,'list'])->name('deliveryMan.list');
Route::get('/delivery-man/form',[DeliveryManController::class,'form'])->name('deliveryMan.form');
Route::post('/delivery-man/store',[DeliveryManController::class,'store'])->name('deliveryMan.store');
Route::get('/delivery-man/delete/{id}',[DeliveryManController::class,'delete'])->name('deliveryMan.delete');
Route::get('/delivery-man/edit/{id}',[DeliveryManController::class,'edit'])->name('deliveryMan.edit');
Route::put('/delivery-man/update/{id}',[DeliveryManController::class,'update'])->name('deliveryMan.update');


Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/form',[UserController::class,'form'])->name('users.form');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');
Route::get('/users/delete/{id}',[UserController::class,'delete'])->name('users.delete');
});
});
});