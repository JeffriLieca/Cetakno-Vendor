<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckboxController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\gambarController;
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

// Route::get('/', [UserController::class, 'login'])->name('login');
// Route::get(('/'),function(){
//     return view ('products');
// });
Route::get('/', [ProductController::class, 'loadproduct'])->name('loadproduct');

Route::get('/products', function () {
    return view('products');
});
// Route::get('/add-product', function () {
//     return view('add-product');
// });

Route::get('/customers', function () {
    return view('customers');
});
Route::get('/employees', function () {
    return view('employees');
});
Route::get('/order-list', function () {
    return view('order-list');
});

Route::get('/order-single', function () {
    return view('order-single');
});
Route::get('/reviews', function () {
    return view('reviews');
});

Route::get('/add', function () {
    return view('addcheckbox');
});

// Route::get('/signin', function () {
//     return view('signin');
// });

Route::get('/products', [ProductController::class, 'loadproduct'])->name('loadproduct');
Route::match(['get', 'post'],'/add-product', [ProductController::class, 'addproduct'])->name('add-product');
Route::post('/Upgambar', [ProductController::class, 'simpanGambar'])->name('uploadgambarprod');

Route::get('/quill', function () {
    return view('cobaquill');
});
Route::get('/gamb', function () {
    return view('upload_gambar');
});

Route::get('/checkboxes', [CheckboxController::class, 'index'])->name('checkboxes.index');
Route::post('/save-checkbox', [CheckboxController::class, 'simpanData'])->name('save-checkbox');
Route::post('/simpan-data', [ProductController::class, 'simpanData'])->name('simpan_data');
Route::post('/Upgamb', [gambarController::class, 'simpanGambar'])->name('uploadgambar');
Route::get('/pagination', [UserController::class, 'loadproduct'])->name('coba_pagination');
Route::get('/pagination2', [ProductController::class, 'loadproduct2'])->name('coba_pagination3');
Route::post('/Upgambar', [ProductController::class, 'simpanGambar'])->name('uploadgambarprod');

Route::post('/simpan-data-coba', [ProductController::class, 'simpanData2'])->name('simpan_data2');

Route::match(['get', 'post'],'/edit-product/{id}/{i?}', [ProductController::class, 'editproduct'])->name('edit-product');
Route::match(['get', 'post'], '/edit-product2', [ProductController::class, 'updateData'])->name('save-edit-product');
Route::post('/addsubprod', [ProductController::class, 'addsub'])->name('addsubprod');

Route::post('/signin', [LoginController::class, 'login'])->name('signin-pegawai');

// Route::post('/logout', 'LoginController@logout')->name('logout');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/single', function () {
    return view('shop-single');
});

Route::post('/uploadgambar', [ProductController::class, 'uploadgambaraws'])->name('uploadgambar');