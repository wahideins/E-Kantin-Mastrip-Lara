<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/',[HomeController::class,'home']);
Route::get('/dashboard',[HomeController::class,'login_home'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Admin Route
route::get('admin/dashboard',[HomeController::class,'index'])->middleware(['auth','admin']);
route::get('view_category',[AdminController::class,'view_category'])->middleware(['auth','admin']);
route::post('add_category',[AdminController::class,'add_category'])->middleware(['auth','admin']);
route::get('edit_category/{id}',[AdminController::class,'edit_category'])->middleware(['auth','admin']);
route::post('update_category/{id}',[AdminController::class,'update_category'])->middleware(['auth','admin']);
route::get('delete_category/{id}',[AdminController::class,'delete_category'])->middleware(['auth','admin']);
route::get('add_product',[AdminController::class,'add_product'])->middleware(['auth','admin']);
route::post('upload_product',[AdminController::class,'upload_product'])->middleware(['auth','admin']);
route::get('view_product',[AdminController::class,'view_product'])->middleware(['auth','admin']);
route::get('verif_orders',[AdminController::class,'view_orderInProggress'])->middleware(['auth','admin']);
route::get('view_orders',[AdminController::class,'view_orderComplete'])->middleware(['auth','admin']);
route::get('update_orders/{id}',[AdminController::class,'updateOrders'])->middleware(['auth','admin']);
route::get('delete_product/{id}',[AdminController::class,'delete_product'])->middleware(['auth','admin']);
route::get('update_page/{id}',[AdminController::class,'update_page'])->middleware(['auth','admin']);
route::post('edit_product/{id}',[AdminController::class,'edit_product'])->middleware(['auth','admin']);
route::get('product_search',[AdminController::class,'product_search'])->middleware(['auth','admin']);
route::get('view_orderCompleteByDate',[AdminController::class,'view_orderCompleteByDate'])->middleware(['auth','admin']);




// Pembeli Route
route::get('product_details/{id}',[HomeController::class,'product_details']);
route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);
route::delete('delItem_cart/{id}',[HomeController::class,'delItem_cart'])->middleware(['auth', 'verified']);
route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);
route::post('confirm_order',[HomeController::class,'confirm_order'])->middleware(['auth', 'verified']);
route::post('addQty_cart/{id}', [HomeController::class, 'addQty_cart']);
route::post('minQty_cart/{id}', [HomeController::class, 'minQty_cart']);
Route::get('/receipt/{userId}', [HomeController::class, 'receipt'])->name('home.receipt');
Route::get('/viewPesanan/{userId}', [HomeController::class, 'viewPesanan']);
route::get('/product_search_user',[HomeController::class,'product_search']);



