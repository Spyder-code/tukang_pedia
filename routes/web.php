<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PageController::class,'home'])->name('page.home');
Route::get('/account', [PageController::class,'account'])->name('page.account');
Route::get('/cart', [PageController::class,'cart'])->name('page.cart');
Route::get('/product-wilayah/{id}', [PageController::class,'product_wilayah'])->name('page.product.wilayah');
Route::get('/product-category/{id}', [PageController::class,'product_category'])->name('page.product.category');
Route::get('/product-detail/{product}', [PageController::class,'detail_product'])->name('page.product.detail');


Route::get('/blank', function () {
    return view('admin.blank');
})->name('blank');

Auth::routes();

Route::get('/main', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('profile');
Route::put('/profile/{id}', [App\Http\Controllers\UserController::class, 'updateProfile'])->name('profile.update');
Route::put('/profile/password/{id}', [App\Http\Controllers\UserController::class, 'updatePassword'])->name('profile.update.password');
Route::put('/profile/image/{id}', [App\Http\Controllers\UserController::class, 'updateImage'])->name('profile.update.image');
Route::resource('category',App\Http\Controllers\CategoryController::class);
Route::resource('product',App\Http\Controllers\ProductController::class);
Route::resource('transaction',App\Http\Controllers\TransactionController::class);
Route::resource('review',App\Http\Controllers\ReviewController::class);
