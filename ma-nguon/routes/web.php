<?php

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

Route::get('dang-nhap', function () {
    return view('dang-nhap');
});

Route::get('trang-chu', function () {
    return view('trang-chu');
});

Route::get('quan-ly-nguoi-dung', function () {
    return view('quan-ly-nguoi-dung');
});

Route::get('quan-ly-phong-hoc', 'PhongHocController@layDanhSachPhongHoc');

Route::get('quan-ly-chung-chi', function () {
    return view('quan-ly-chung-chi');
});

Route::get('xem-lich-giang', function () {
    return view('xem-lich-giang');
});

Route::get('dang-ky-hoc-vien', function () {
    return view('dang-ky-hoc-vien');
});

Route::get('phan-cong-giang-day', function () {
    return view('phan-cong-giang-day');
});

Route::get('quan-ly-buoi-hoc', 'BuoiHocController@layDanhSachBuoiHoc');