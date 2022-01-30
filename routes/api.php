<?php

use App\Http\Controllers\Api\DataController;
use App\Http\Controllers\Api\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('regency/{province_id}',[WilayahController::class,'getRegency'])->name('get.regency');
Route::get('district/{regency_id}',[WilayahController::class,'getDistrict'])->name('get.district');
Route::get('category/{category_id}',[DataController::class,'getCategory'])->name('get.category');
