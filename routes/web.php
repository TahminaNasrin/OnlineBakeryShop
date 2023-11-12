<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\OrderDetailsController;



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

Route::group(['middleware'=>'auth'],function(){


Route::get('/',[HomeController::class,'home'])->name('admin.dashboard');

Route::get('/customer/list',[CustomerController::class,'list']);
Route::get('/customer/form',[CustomerController::class,'form']);
Route::post('/customer/store',[CustomerController::class,'store'])->name('customer.store');

Route::get('/product/type',[CategoriesController::class,'list']);
Route::get('/product/form',[CategoriesController::class,'form']);
Route::post('/product/store',[CategoriesController::class,'store'])->name('product.store');

Route::get('/order/list',[OrderController::class,'list']);
Route::get('/order/form',[OrderController::class,'form']);
Route::post('/order/store',[OrderController::class,'store'])->name('order.store');

Route::get('/order-details/list',[OrderDetailsController::class,'list'])->name('order.details.list');
Route::get('/order-details/form',[OrderDetailsController::class,'form'])->name('order.details.form');
Route::post('/order-details/store',[OrderDetailsController::class,'store'])->name('order.details.store');


Route::get('/payment/list',[PaymentController::class,'list']);
Route::get('/payment/form',[PaymentController::class,'form'])->name('payment.form');

Route::get('/report/list',[ReportController::class,'list']);
Route::get('/review/list',[ReviewController::class,'list']);
Route::get('/wishlist/list',[WishlistController::class,'list']);

Route::get('/cart/list',[CartController::class,'list']);
Route::get('/cart/form',[CartController::class,'form'])->name('cart.form');
Route::post('/cart/store',[CartController::class,'store'])->name('cart.store');

Route::get('/users/list',[UserController::class,'list'])->name('users.list');
Route::get('/users/form',[UserController::class,'form'])->name('users.form');
Route::post('/users/store',[UserController::class,'store'])->name('users.store');

Route::get('/admin/logout',[UserController::class,'logout'])->name('admin.logout');

});

Route::get('/admin/login',[UserController::class,'loginForm'])->name('admin.login');
Route::post('/login-post',[UserController::class,'loginPost'])->name('admin.login.post');

