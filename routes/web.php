<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\CartController;
use App\Http\Controllers\Backend\HomeController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\ReviewController;
use App\Http\Controllers\Backend\PaymentController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\Backend\WishlistController;
use App\Http\Controllers\Backend\CategoriesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\OrderDetailsController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;
use App\Http\Controllers\Frontend\CustomerController as FrontendCustomerController;

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
Route::get('/',[FrontendHomeController::class,'home'])->name('home');

Route::get('/registration',[FrontendCustomerController::class,'registration'])->name('customer.registration');
Route::post('/registration/store',[FrontendCustomerController::class,'store'])->name('customer.registration.store');

Route::get('/login',[FrontendCustomerController::class,'login'])->name('customer.login');
Route::post('/login/post',[FrontendCustomerController::class,'loginPost'])->name('customer.login.post');

//frontend 
Route::group(['prefix'=>'admin'], function(){ 



//login
Route::get('/login',[UserController::class,'loginForm'])->name('admin.login');
Route::post('/login-post',[UserController::class,'loginPost'])->name('admin.login.post');

//all pages controller
Route::group(['middleware'=>'auth'],function(){

//logout
Route::get('/logout',[UserController::class,'logout'])->name('admin.logout');

Route::get('/',[HomeController::class,'home'])->name('admin.dashboard');

Route::get('/customer/list',[CustomerController::class,'list'])->name('customer.list');
Route::get('/customer/form',[CustomerController::class,'form'])->name('customer.form');
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');

Route::get('/categories/list',[CategoriesController::class,'list'])->name('categories.list');
Route::get('/categories/delete/{id}',[CategoriesController::class,'delete'])->name('categories.delete');
Route::get('/categories/edit/{id}',[CategoriesController::class,'edit'])->name('categories.edit');
Route::put('/categories/update/{id}',[CategoriesController::class,'update'])->name('categories.update');
Route::get('/product/form',[CategoriesController::class,'form'])->name('categories.form');
Route::post('/product/store',[CategoriesController::class,'store'])->name('categories.store');

Route::get('/order/list',[OrderController::class,'list'])->name('order.list');
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
Route::get('/wishlist/list',[WishlistController::class,'list'])->name('wishlist.list');

Route::get('/cart/list',[CartController::class,'list'])->name('cart.list');
Route::get('/cart/form',[CartController::class,'form'])->name('cart.form');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');

Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/form',[UserController::class,'form'])->name('users.form');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');

 });
});