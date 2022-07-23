<?php

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

Route::get('/', function () {
    return view('home');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/checkout', function () {
    return view('checkout');
});

Route::get('/product/{id}', function () {
    return view('product');
});

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/blog', function () {
    return view('blog');
});



//  trang admin
Route::get('/login', function () {
    return view('login');
});

Route::get('/admin/homeadmin', function () {
    return view('admin.homeadmin');
});



Route::get('/admin', function () {
    return view('view.layout_admin');
});

Route::get('/admin/sanpham', function () {
    return view('admin.sanpham.index');
});
Route::get('/admin/loaisp', function () {
    return view('admin.loaisp.index');
});
Route::get('/admin/nhanvien', function () {
    return view('admin.nhanvien.index');
});
Route::get('/admin/nhacungcap', function () {
    return view('admin.nhacungcap.index');
});
Route::get('/admin/khachhang', function () {
    return view('admin.khachhang.index');
});
Route::get('/admin/kho', function () {
    return view('admin.kho.index');
});
Route::get('/admin/news', function () {
    return view('admin.news.index');
});
Route::get('/admin/phanhoi', function () {
    return view('admin.phanhoi.index');
});
Route::get('/admin/slide', function () {
    return view('admin.slide.index');
});
Route::get('/admin/user', function () {
    return view('admin.users.index');
});
Route::get('/admin/billsban', function () {
    return view('admin.billsban.index');
});
Route::get('/admin/billdetailban', function () {
    return view('admin.billdetailban.index');
});
Route::get('/admin/billsnhap', function () {
    return view('admin.billsnhap.index');
});
Route::get('/admin/billdetailnhap', function () {
    return view('admin.billdetailnhap.index');
});

