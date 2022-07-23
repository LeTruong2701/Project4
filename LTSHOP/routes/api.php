<?php

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

use App\Http\Controllers\API\SanphamController;
use App\Http\Controllers\API\LoaispController;
use App\Http\Controllers\API\KhoController;
use App\Http\Controllers\API\NhanvienController;
use App\Http\Controllers\API\KhachhangController;

use App\Http\Controllers\API\BillsbanController;
use App\Http\Controllers\API\BillsnhapController;
use App\Http\Controllers\API\BilldetailbanController;
use App\Http\Controllers\API\BilldetailnhapController;
use App\Http\Controllers\API\NewsController;

use App\Http\Controllers\API\SlideController;
use App\Http\Controllers\API\PhanhoiController;
use App\Http\Controllers\API\UsersController;
use App\Http\Controllers\API\nhacungcapcontroller;




Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/search','App\Http\Controllers\API\SanphamController@search');



Route::resource('newss', NewsController::class);
Route::resource('users', UsersController::class);
Route::resource('slides', SlideController::class);
Route::resource('phanhois', PhanhoiController::class);

Route::resource('nhanviens', NhanvienController::class);
Route::resource('nhacungcaps', nhacungcapcontroller::class);

Route::resource('khos', KhoController::class);
Route::resource('khachhangs', KhachhangController::class);
Route::resource('loaisps', LoaispController::class);
Route::resource('sanphams', SanphamController::class);
Route::resource('newss', NewsController::class);
Route::resource('billsbans', BillsbanController::class);
Route::resource('billsnhaps', BillsnhapController::class);
Route::resource('billdetailbans', BilldetailbanController::class);
Route::resource('billdetailnhaps', BilldetailnhapController::class);
Route::resource('phanhois', PhanhoiController::class);