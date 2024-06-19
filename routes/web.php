<?php

use App\Http\Controllers\Admin\oderController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\UploadController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/index', function () {
    return view('admin.home');
});
// product
Route::get('/admin/product/add', function () {return view('admin.product/add');});

Route::post('/admin/product_add', [ProductController::class, 'insert_product']);

Route::get('/admin/product_list', [ProductController::class, 'list_product']);

route::get('/admin/product_delete', [ProductController::class, 'delete_product']);

Route::get('/admin/product_edit/{id}', [ProductController::class, 'edit_product']);

Route::post('/admin/product_edit/{id}', [ProductController::class, 'update_product']);


// giỏ hàng
Route::get('/admin/order_detail/{order_detail}', [oderController::class,'detail_order']);

Route::get('/admin/order_list', [oderController::class,'list_order']);
Route::get('/admin/order_list/delete{id}', [oderController::class,'delete_list']) ->name('delete.order');

//lưu image
Route::post('/upload', [UploadController::class, 'uploadImage']);
Route::post('/uploads', [UploadController::class, 'uploads']);

//frontend;
Route::get('/', [FrontendController::class,'index']);

Route::get('/product/{id}', [FrontendController::class, 'show_product']);
Route::get('/order_cf', function () {return view('order.confirm');});
Route::get('/order_ss', function () {return view('order.success');});
Route::post('/cart', [FrontendController::class, 'add_cart']);
Route::get('/cart', [FrontendController::class, 'show_cart'])->name('show_cart');
Route::get('/cart/remove/{id}', [FrontendController::class, 'remove_cart'])->name('remove_cart');
Route::post('/cart/update', [FrontendController::class,'update_cart'])->name('update_cart');
Route::post('/cart/send', [FrontendController::class, 'send_cart']);


