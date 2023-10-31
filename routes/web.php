<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Client\ClientController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
//home
Route::prefix('home')->group(function(){
    Route::get('/',[HomeController::class,'index'])->name('home');
    Route::get('product',[HomeController::class,'showAllProduct'])->name('homeProduct');
});

//admin
Route::middleware(['middlewareAuthLogin'])->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('homeAdmin');
    Route::get('createAuth',[AuthController::class,'create'])->middleware(['middlewareAuthAdmin'])->name('createAuth');
    Route::post('storeAuth',[AuthController::class,'store'])->middleware(['middlewareAuthAdmin'])->name('storeAuth');

});

//login
Route::prefix('login')->group(function(){
    Route::get('/',[AuthController::class,'index'])->name('login');
    Route::post('/',[AuthController::class,'authLogin'])->name('authLogin');
    Route::post('out',[AuthController::class,'authLogOut'])->middleware(['middlewareAuthLogin'])->name('logOut');

    Route::get('chargePassword',[AuthController::class,'chargePassword'])->middleware(['middlewareAuthLogin'])->name('editPassword');
    Route::post('chargePassword',[AuthController::class,'updatePassword'])->middleware(['middlewareAuthLogin'])->name('updatePassword');
});

//product
Route::prefix('product')->group(function(){
    Route::get('/',[ProductController::class,'index'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('product');
    Route::get('keyword',[ProductController::class,'getName'])->name('productName');

    Route::get('add',[ProductController::class,'create'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productAdd');
    Route::get('id={id}',[ProductController::class,'show'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productId');
    Route::get('edit{id}',[ProductController::class,'edit'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productEdit');
    Route::get('delete{id}',[ProductController::class,'destroy'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productDelete');
    Route::get('xlsx',[ProductController::class,'export'])->name('export');

    Route::post('add',[ProductController::class,'store'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productStore');
    Route::post('update{id}',[ProductController::class,'update'])->middleware(['middlewareAuthLogin','middlewareAuthAdmin'])->name('productUpdate');
});

//client
Route::prefix('client')->middleware(['middlewareAuthLogin'])->group(function(){
    Route::get('client{id}',[AuthController::class,'show'])->name('informationUser');
    Route::get('/',[ClientController::class,'index'])->middleware(['middlewareAuthClient'])->name('staff');
    Route::get('product',[ClientController::class,'allProductClient'])->middleware(['middlewareAuthClient'])->name('productClient');
    Route::get('staff',[AdminController::class,'allPersonnel'])->middleware(['middlewareAuthAdmin'])->name('client');
});
